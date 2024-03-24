@extends('layouts.main')

@section('page')
    <div>
        <h1 class="font-bold text-xl">Информация о сделке:</h1>
        <p>Название: {{ $lead->toArray()['name'] }}</p>
        <p>Бюджет: {{ $lead->toArray()['price'] }}</p>
    </div>
    <div>
        <h1 class="font-bold text-xl">Изменение себестоимости:</h1>
        <form action="{{ route('leads.updateCost', $lead->toArray()['id']) }}" method="post">
            @method('put')
            @csrf
            <x-form-input name="cost" type="number" value="{{ $lead->getCustomFieldsValues() &&  $lead->getCustomFieldsValues()->getBy('fieldId', 9505) ?  $lead->getCustomFieldsValues()->getBy('fieldId', 9505)->getValues()[0]->getValue() : '' }}">Себестоимость:</x-form-input>
            <button type="submit">Добавить себестоимость!</button>
        </form>
    </div>
@endsection
