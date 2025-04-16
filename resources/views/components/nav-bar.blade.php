<div class="flex py-5 gap-x-10 justify-between border border-gray-300">
    <div class="flex gap-x-5">
        <a href="/"><img class="w-20" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/img/welcome/ivano-frankivsk-oblast-map.png') }}" alt=""></a>
        <div class="text-3xl content-center font-extrabold">
            Нерухомість Івано-Франкіська
        </div>
    </div>
    <div class="flex flex-1 items-center gap-x-10 text-2xl">
        <x-nav.a href="/estate/buyNIF"><i class="bi bi-bag-fill"></i> Купівля</x-nav.a>
        <x-nav.a href="/estate/rentNIF"><i class="bi bi-cash"></i> Оренда</x-nav.a>
        <x-nav.a href="/estate/addNIF"><i class="bi bi-cash-coin"></i> Продаж</x-nav.a>
    </div>
    <div class="flex items-center gap-x-10 mr-5 text-2xl">
        @guest()
            <x-nav.a href="/login"><i class="bi bi-box-arrow-right"></i> Увійти</x-nav.a>
            <x-nav.a href="/registry"><i class="bi bi-box-arrow-in-right"></i> Зареєструватися</x-nav.a>
        @endguest
        @auth()
            <x-nav.a href="/favorite"><i class="bi bi-clipboard-heart"></i> Обране</x-nav.a>
            <x-nav.a href="/dashboard/{{Auth::id()}}"><div class="flex text-center items-center gap-x-5">Профіль <img class="w-10 h-10 rounded-full border border-3" src="{{ asset('storage/avatars/' . \Illuminate\Support\Facades\Auth::user()->avatar) }} " alt=""></div></x-nav.a>
        @endauth
    </div>
</div>
