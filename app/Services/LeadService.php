<?php

namespace App\Services;

use AmoCRM\Collections\CustomFieldsValuesCollection;
use AmoCRM\Collections\Leads\LeadsCollection;
use AmoCRM\Models\CustomFieldsValues\NumericCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\NumericCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueModels\NumericCustomFieldValueModel;
use AmoCRM\Models\LeadModel;
use App\Actions\ApiClientAction;
use App\Actions\ProfitAction;
use Illuminate\Support\Facades\File;

class LeadService
{
    public function store($data, $cost)
    {
        $lead = new LeadModel();
        $lead->setName($data['name']);
        $lead->setPrice($data['price']);
        $leadCustomFieldsValues = new CustomFieldsValuesCollection();
        ProfitAction::handle($leadCustomFieldsValues, $lead->getPrice(), $cost);
        $lead->setCustomFieldsValues($leadCustomFieldsValues);
        ApiClientAction::handle()->leads()->add(LeadsCollection::make([$lead]));
    }

    public function updateCost($data, $lead_id)
    {
        $lead = ApiClientAction::handle()->leads()->getOne($lead_id);
        if ($lead->getCustomFieldsValues()->getBy('fieldId', 9505) && $lead->getCustomFieldsValues()->getBy('fieldId', 9505)->getValues()[0]->getValue() === $data['cost']) {
            return redirect()->route('leads.index');
        }
        $leadCustomFieldsValues = new CustomFieldsValuesCollection();
        $cost = (new NumericCustomFieldValuesModel())->setFieldId(9505);
        $cost->setValues((new NumericCustomFieldValueCollection())->add((new NumericCustomFieldValueModel())->setValue($data['cost'])));
        $leadCustomFieldsValues->add($cost);
        ProfitAction::handle($leadCustomFieldsValues, $lead->getPrice(), $data['cost']);
        $lead->setCustomFieldsValues($leadCustomFieldsValues);
        ApiClientAction::handle()->leads()->updateOne($lead);
    }

    public function updatePrice($data, $lead_id)
    {
        $lead = ApiClientAction::handle()->leads()->getOne($lead_id);
        if ($lead->getPrice() == $data['price']) {
            return redirect()->route('leads.index');
        }
        $cost = $lead->getCustomFieldsValues()->getBy('fieldId', 9505)->getValues()[0]->getValue();
        $lead->setPrice($data['price']);
        $leadCustomFieldsValues = new CustomFieldsValuesCollection();
        ProfitAction::handle($leadCustomFieldsValues, $lead->getPrice(), $cost);
        $lead->setCustomFieldsValues($leadCustomFieldsValues);
        ApiClientAction::handle()->leads()->updateOne($lead);
    }

    public function seed()
    {
        $jsonData = File::get(base_path('storage/leads.json'));
        $data = json_decode($jsonData, true);
        $leads = LeadsCollection::make(array_map(function ($datum) {
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
            return $lead;
        }, $data));
        ApiClientAction::handle()->leads()->add($leads);
    }
}
