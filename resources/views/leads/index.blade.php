@extends('layouts.main')


@section('page')
    <div class="my-10">
        <div class="relative overflow-x-auto">
            <h1 class="text-xl font-bold">Все сделки:</h1>
            <table class="w-full text-left">
                <thead class="bg-gray-950 px-2">
                    <tr>
                        <th class="py-1 px-4">ID</th>
                        <th class="py-1 px-4">Название сделки</th>
                        <th class="py-1 px-4">Бюджет</th>
                        <th class="py-1 px-4">Себестоимость</th>
                        <th class="py-1 px-4">Прибыль</th>
                        <th class="py-1 px-4">Изменить</th>
                    </tr>
                </thead>
                <tbody class="bg-slate-700">
                    @foreach($leads as $key => $lead)
                        <tr class="{{ $key == $leads->count() -1 ? '' : 'border-b' }} border-gray-600">
                            <td class="px-4 py-1 ">{{ $lead->getId() }}</td>
                            <td class="px-4 py-1 ">{{ $lead->getName() }}</td>
                            <td class="px-4 py-1 ">{{ $lead->getPrice() }}</td>
                            <td class="px-4 py-1 ">
                                @if($lead->getCustomFieldsValues() &&  $lead->getCustomFieldsValues()->getBy('fieldId', 9505))
                                    {{ $lead->getCustomFieldsValues()->getBy('fieldId', 9505)->getValues()[0]->getValue() }}
                                @else
                                    пусто....
                                @endif
                            </td>
                            <td class="px-4 py-1 ">
                                @if($lead->getCustomFieldsValues() && $lead->getCustomFieldsValues()->getBy('fieldId', 9503))
                                    {{ $lead->getCustomFieldsValues()->getBy('fieldId', 9503)->getValues()[0]->getValue() }}
                                @else
                                    пусто..
                                @endif
                            </td>
                            <td class="px-4 py-1">
                                @if($lead->getCustomFieldsValues()->getBy('fieldId', 9505))
                                    <a href="{{ route('leads.editPrice', $lead->getId()) }}">Изменить бюджет</a><br>
                                    <a href="{{ route('leads.editCost', $lead->getId()) }}">Изменить себестоимость</a>
                                @else
                                    <a href="{{ route('leads.editCost', $lead->getId())  }}">Добавить себестоимость</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <form action="{{ route('leads.store') }}" method="post" class="bg-slate-700 mt-4 rounded  py-2 px-4">
                <h1 class="text-xl font-bold">Добавить сделку!</h1>
                @csrf
                @method('post')
                <div class="flex flex-col py-2">
                    <x-form-input name="name" type="text">Название сделки:</x-form-input>
                    <x-form-input name="price" type="number">Бюджет:</x-form-input>
                </div>
                <button type="submit">Добавить!</button>
            </form>
        </div>
    </div>
@endsection
