<?php

namespace App\Actions;
use AmoCRM\Models\CustomFieldsValues\NumericCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\NumericCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueModels\NumericCustomFieldValueModel;

class ProfitAction
{
    public static function handle($leadCustomFieldsValues, $price, $cost)
    {
        $profit = (new NumericCustomFieldValuesModel())->setFieldId(9503);
        $profit->setValues(( new NumericCustomFieldValueCollection())->add((new NumericCustomFieldValueModel())->setValue($price - $cost)));
        $leadCustomFieldsValues->add($profit);
    }
}
