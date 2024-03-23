<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

Route::as('leads.')->group(function () {
    Route::get('/', [LeadController::class, 'index'])->name('index');
    Route::post('/store', [LeadController::class, 'store'])->name('store');
});
//Route::get('/add', function () {
////    $lead = new LeadModel();
////    $lead->setName('NEEEW!!');
////    $lead->setPrice(1000);
////    $leadCustomFieldsValues = new CustomFieldsValuesCollection();
////    $cost = new NumericCustomFieldValuesModel();
////    $cost->setFieldId(9505);
////    $cost->setValues(( new NumericCustomFieldValueCollection())->add((new NumericCustomFieldValueModel())->setValue(123)));
////    $leadCustomFieldsValues->add($cost);
////    $profit = new NumericCustomFieldValuesModel();
////    $profit->setFieldId(9503);
////    $profit->setValues(( new NumericCustomFieldValueCollection())->add((new NumericCustomFieldValueModel())->setValue(321)));
////    $leadCustomFieldsValues->add($profit);
////    $lead->setCustomFieldsValues($leadCustomFieldsValues);
////    $leadsCollection = new LeadsCollection();
////    $leadsCollection->add($lead);
////    apiClient()->leads()->add($leadsCollection);
////    dd(apiClient()->leads()->get());
//});
//// себестоимость - 9505
//// прибыль - 9506
