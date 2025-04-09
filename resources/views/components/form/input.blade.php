@props(['id' => 'name'])
<p class="mr-auto my-3" for="{{ $id }}">{{ $slot }}</p>
<input id="{{ $id }}" name="{{ $id }}" {{ $attributes->merge(['class' => "input_form bg-white text-black mr-auto py-2 px-4 rounded-2xl border border-gray-200 outline-none focus:ring focus:ring-orange-500 focus:text-black focus:bg-gray-200 input_shadow"]) }}>
@error($id)
<p class="text-sm text-red-600">{{ $message }}</p>
@enderror
