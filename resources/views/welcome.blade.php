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
                            <a class="p-5 rounded-2xl btn-welcome">Переглянути об’єкти</a>
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
                        <a href="{{$estate['id']}}" class="border-5 border-[#6c94a4] rounded-4xl w-11/12 my-5 h-100 bg-if cursor-pointer welcome-estate content-end" style="background-image: url('https://picsum.photos/seed/{{ rand(0, 1000000) }}/900/900')">
                            <div id="estate_welcome" class="flex flex-col text-white mb-2 ml-2 p-3 gap-y-1">
                                <div class="text-sm"><i class="bi bi-building-fill-gear"></i> {{$estate['builder']}}</div>
                                <div class="text-xl font-extrabold uppercase">{{$estate['complex']}}</div>
                                <div class="text-md"><i class="bi bi-geo"></i> {{$estate['city']}}</div>
                                <div class="text-xl font-bold"><i class="bi bi-tag"></i> {{(int)$estate['price']}} ₴</div>
                                <div class=""><i class="bi bi-geo-alt"></i> {{$estate['street']}}</div>
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
