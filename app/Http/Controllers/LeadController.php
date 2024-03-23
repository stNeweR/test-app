<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\ApiClientAction;
class LeadController extends Controller
{

    public function index()
    {
        $leads = ApiClientAction::handle()->leads()->get()->toArray();
//        return view('leads.index');
        dd($leads);
    }

}
