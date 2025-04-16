@props(['is_essential' => true, 'estate' => null])
@if($estate)
    <div {{ $attributes->merge(['class' => '']) }}>{{ $slot }} {{ $estate }}</div>
@endif
