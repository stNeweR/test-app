<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Http\Requests\LeadUpdateCostRequest;
use App\Http\Requests\LeadUpdatePriceRequest;
use App\Actions\ApiClientAction;
use App\Services\LeadService;

class LeadController extends Controller
{
    public function index()
    {
        $leads = ApiClientAction::handle()->leads()->get();
        return view('leads.index', [
            'leads' => $leads
        ]);
    }

    public function store(LeadRequest $request, LeadService $service)
    {
        $data = $request->validated();
        $service->store($data, 0);
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

    public function updateCost(LeadUpdateCostRequest $request, $lead_id, LeadService $service)
    {
        $data = $request->validated();
        $service->updateCost($data, $lead_id);
        return redirect()->route('leads.index');
    }

    public function updatePrice(LeadUpdatePriceRequest $request, $lead_id, LeadService $service)
    {
        $data = $request->validated();
        $service->updatePrice($data, $lead_id);
        return redirect()->route('leads.index');
    }

    public function seed(LeadService $service)
    {
        $service->seed();
        return redirect()->route('leads.index');
    }
}
