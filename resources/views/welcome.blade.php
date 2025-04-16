<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    <div class="bg-welcome justify-items-center">
        <div class="grid" style="width: 90vw">
            <div class="flex">
                <div class="content-center m-auto w-200">
                    <div class="grid">
                        <h3 class="font-bold" style="color: #93a0a5">Created by Roman Beniuk</h3>
                        <h1 class="font-extrabold text-5xl" style="color: #4a545a">Знайдіть ідеальне житло</h1>
                        <div class="grid text-lg my-5">
                            <h4>Швидкий пошук без компромісів.</h4>
                            <h4>Прозорі угоди без прихованих платежів.</h4>
                            <h4>Найкращі пропозиції на ринку.</h4>
                            <h4>Супровід на кожному етапі.</h4>
                            <h4>Обирайте разом із тисячами задоволених клієнтів.</h4>
                        </div>
                        <div class="flex gap-5">
                            <a href="/estate/buyNIF" class="p-5 rounded-2xl btn-welcome">Переглянути об’єкти</a>
                            <a href="/policy" class="p-5 rounded-2xl btn-welcome">Умови використання</a>
                        </div>
                    </div>
                </div>
                <div class="ml-auto mx-15 py-5">
                    <img style="width: 30vw" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/img/welcome/welcome-buildings.jpg') }}" alt="">
                </div>
            </div>
            <div class="mt-30">
                <div class="p-10 text-5xl font-extrabold text-[#4a545a]">
                    Недавно додана нерухомість
                </div>
                <div class="grid grid-cols-4 justify-items-center">
                    @foreach($estates as $estate)
                        <a id="estate-{{$estate['id']}}" href="/estate/show/{{ $estate->id }}" class="border-5 border-[#6c94a4] rounded-4xl w-11/12 my-5 h-100 cursor-pointer welcome-estate content-end"
                            @if ($estate->photos->isNotEmpty())
                                style="background-image: url('{{ asset('storage/' . $estate->photos->first()->photo) }}')">
                            @else
                                style="background-color: #ccc">
                            @endif
                            <div id="estate_welcome" class="flex flex-col text-white mb-2 ml-2 p-3 gap-y-1">
                                @php
                                    if($estate["is_sell"]){
                                        $price_t = (int)$estate['price'] . " ₴";
                                    } else {
                                        $price_t = "₴ " . (int)$estate['price'] . " за місяць";
                                    }
                                @endphp
                                <x-estate.window-text class="text-sm" estate="{{$estate['builder']}}"><i class="bi bi-building-fill-gear"></i></x-estate.window-text>
                                <x-estate.window-text class="text-xl font-extrabold uppercase" estate="{{$estate['complex']}}" />
                                <x-estate.window-text class="text-md" estate="{{$estate['city']}}"><i class="bi bi-geo"></i></x-estate.window-text>
                                <x-estate.window-text class="text-xl font-bold" estate="{{ $price_t }}"><i class="bi bi-tag"></i></x-estate.window-text>
                                <x-estate.window-text class="text-sm" estate="{{$estate['street']}}"><i class="bi bi-geo-alt"></i></x-estate.window-text>
                            </div>
                        </a>
                    @endforeach
                </div>
                <nav class="flex m-5 p-5 justify-end">
                    <nav>{{ $estates->links() }}</nav>
                </nav>
            </div>
        </div>
    </div>
</x-layout>
