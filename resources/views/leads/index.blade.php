@extends('layouts.main')


@section('page')
    <div class="">
        <div class="relative overflow-x-auto">
            <h1 class="text-xl font-bold">Все сделки:</h1>
            <table class="w-full text-left">
                <thead class="bg-gray-950 px-2">
                    <tr>
                        <th class="py-1 px-4"> ID</th>
                        <th class="py-1 px-4"> Name</th>
                        <th class="py-1 px-4"> Price</th>
                        <th class="py-1 px-4"> Cost</th>
                        <th class="py-1 px-4"> Profit</th>
                    </tr>
                </thead>
                <tbody class="bg-slate-700">
                    @foreach($leads as $key => $lead)
                        <tr class="{{ $key == count($leads) -1 ? '' : 'border-b' }} border-gray-600">
                            <td class="px-4 py-1 ">{{$lead['id']}}</td>
                            <td class="px-4 py-1 ">{{$lead['name']}}</td>
                            <td class="px-4 py-1 ">{{$lead['price']}}</td>
                            <td class="px-4 py-1 ">{{ $lead['custom_fields_values'][0]['values'][0]['value'] }}</td>
                            <td class="px-4 py-1 ">
                                @if(isset($lead['custom_fields_values'][1]))
                                    {{ $lead['custom_fields_values'][1]['values'][0]['value'] }}
                                @else
                                    halo!
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <form action="{{ route('leads.store') }}" method="post" class="bg-slate-700 mt-4 rounded  py-2 px-4">
                @csrf
                @method('post')
                <div class="flex py-2">
                    <x-form-input name="name" type="text">Название сделки:</x-form-input>
                    <x-form-input name="price" type="number">Бюджет:</x-form-input>
                </div>
{{--                <x-form-input name="name" type="text">Бюджет</x-form-input>--}}
{{--                <x-form-input name="name" type="text"></x-form-input>--}}
                <button type="submit">add!</button>
            </form>
        </div>
    </div>
@endsection
