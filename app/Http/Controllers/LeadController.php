<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use Illuminate\Http\Request;
use App\Actions\ApiClientAction;
use AmoCRM\Models\LeadModel;
use AmoCRM\Collections\Leads\LeadsCollection;
class LeadController extends Controller
{

    public function index()
    {
        $leads = ApiClientAction::handle()->leads()->get()->toArray();
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
        $leadsCollection->add($lead);
        ApiClientAction::handle()->leads()->add($leadsCollection);
        return redirect()->route('leads.index');
    }
}
