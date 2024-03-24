<?php

namespace App\Http\Controllers;

use AmoCRM\Models\CustomFieldsValues\ValueCollections\NumericCustomFieldValueCollection;
use App\Http\Requests\LeadRequest;
use App\Http\Requests\LeadUpdateCostRequest;
use App\Http\Requests\LeadUpdatePriceRequest;
use Illuminate\Http\Request;
use App\Actions\ApiClientAction;
use AmoCRM\Models\LeadModel;
use AmoCRM\Collections\Leads\LeadsCollection;
use AmoCRM\Collections\CustomFieldsValuesCollection;
use AmoCRM\Models\CustomFieldsValues\NumericCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueModels\NumericCustomFieldValueModel;
use App\Actions\ProfitAction;
use Illuminate\Support\Facades\File;

class LeadController extends Controller
{
    public function index()
    {
        $leads = ApiClientAction::handle()->leads()->get();
        return view('leads.index', [
            'leads' => $leads
        ]);
    }

    public function store(LeadRequest $request)
    {
        $data = $request->validated();
        $lead = new LeadModel();
        $lead->setName($data['name']);
        $lead->setPrice($data['price']);
        $leadsCollection = new LeadsCollection();
        $leadCustomFieldsValues = new CustomFieldsValuesCollection();
        ProfitAction::handle($leadCustomFieldsValues, $lead->getPrice(), 0);
        $lead->setCustomFieldsValues($leadCustomFieldsValues);
        $leadsCollection->add($lead);
        ApiClientAction::handle()->leads()->add($leadsCollection);
        return redirect()->route('leads.index');
    }

    public function editCost($lead_id)
    {
        $lead = ApiClientAction::handle()->leads()->getOne($lead_id);
        return view('leads.editCost', [
            'lead' => $lead
        ]);
    }

    public function editPrice($lead_id)
    {
        $lead = ApiClientAction::handle()->leads()->getOne($lead_id);
        return view('leads.editPrice', [
            'lead' => $lead
        ]);
    }

    public function updateCost(LeadUpdateCostRequest $request, $lead_id)
    {
        $data = $request->validated();
        $lead = ApiClientAction::handle()->leads()->getOne($lead_id);
        if ($lead->getCustomFieldsValues()->getBy('fieldId', 9505) && $lead->getCustomFieldsValues()->getBy('fieldId', 9505)->getValues()[0]->getValue() ===$data['cost']) {
            return redirect()->route('leads.index');
        }
        $leadCustomFieldsValues = new CustomFieldsValuesCollection();
        $cost = (new NumericCustomFieldValuesModel())->setFieldId(9505);
        $cost->setValues(( new NumericCustomFieldValueCollection())->add((new NumericCustomFieldValueModel())->setValue($data['cost'])));
        $leadCustomFieldsValues->add($cost);
        ProfitAction::handle($leadCustomFieldsValues, $lead->getPrice(), $data['cost']);
        $lead->setCustomFieldsValues($leadCustomFieldsValues);
        ApiClientAction::handle()->leads()->updateOne($lead);
        return redirect()->route('leads.index');
    }

    public function updatePrice(LeadUpdatePriceRequest $request, $lead_id)
    {
        $data = $request->all();
        $lead = ApiClientAction::handle()->leads()->getOne($lead_id);
        if ($lead->getPrice() == $request['price']) {
            return redirect()->route('leads.index');
        }
        $cost = $lead->getCustomFieldsValues()->getBy('fieldId', 9505)->getValues()[0]->getValue();
        $lead->setPrice($data['price']);
        $leadCustomFieldsValues = new CustomFieldsValuesCollection();
        ProfitAction::handle($leadCustomFieldsValues, $lead->getPrice(), $cost);
        $lead->setCustomFieldsValues($leadCustomFieldsValues);
        ApiClientAction::handle()->leads()->updateOne($lead);
        return redirect()->route('leads.index');
    }
    public function seed()
    {
        $jsonData = File::get(base_path('storage/leads.json'));
        $data = json_decode($jsonData, true);
        foreach ($data as $datum) {
            $lead = new LeadModel();
            $lead->setName($datum['name']);
            $lead->setPrice($datum['price']);
            $leadsCollection = new LeadsCollection();
            $leadCustomFieldsValues = new CustomFieldsValuesCollection();
            $cost = new NumericCustomFieldValuesModel();
            $cost->setFieldId(9505);
            $cost->setValues(( new NumericCustomFieldValueCollection())->add((new NumericCustomFieldValueModel())->setValue($datum['cost'])));
            $leadCustomFieldsValues->add($cost);
            ProfitAction::handle($leadCustomFieldsValues, $lead->getPrice(), $datum['cost']);
            $lead->setCustomFieldsValues($leadCustomFieldsValues);
            $leadsCollection->add($lead);
            ApiClientAction::handle()->leads()->add($leadsCollection);
        }
        return redirect()->route('leads.index');
    }
}
