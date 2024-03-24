@props(['name', 'type', 'value' => ''])

<div class="flex flex-col mt-2">
    <label for="{{ $name }}">{{ $slot }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="bg-transparent py-1 px-2 outline-none border-b border-gray-600 focus:border-black" value="{{ $value }}">
    @error($name)
        <p class="text-red-500">{{ $message }}</p>
    @enderror
</div>
