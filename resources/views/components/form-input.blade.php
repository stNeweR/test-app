@props(['name', 'type'])

<div>
    <label for="{{ $name }}">{{ $slot }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="bg-transparent py-1 px-2 outline-none border-b border-gray-600 focus:border-black">
</div>
