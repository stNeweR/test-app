@extends('layouts.main')

@section('page')
    <div>
        <h1 class="font-bold text-xl">Информация о сделке:</h1>
        <p>Название: {{ $lead->toArray()['name'] }}</p>
        <p>Бюджет: {{ $lead->toArray()['price'] }}</p>
    </div>
    <div>
        <h1 class="font-bold text-xl">Изменение бюджета:</h1>
        <form action="{{ route('leads.updatePrice', $lead->toArray()['id']) }}" method="post">
            @method('put')
            @csrf
            <x-form-input name="price" type="number" value="{{ $lead->toArray()['price'] }}">Бюджет:</x-form-input>
            <button type="submit">Изменить бюджет</button>
        </form>
    </div>
@endsection
