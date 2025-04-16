<x-layout>
    <x-slot:title>
        Обране
    </x-slot:title>
    <div class="bg-welcome justify-items-center">
        <div class="grid" style="width: 90vw">
            <div class="mt-30">
                <div class="p-10 text-5xl font-extrabold text-[#4a545a] justify-self-center">
                    Обрана нерухомість
                </div>
                <div class="grid grid-cols-1 justify-items-center">
                    @if($rel->isEmpty())
                        <div class="font-bold text-2xl text-[#93a0a5] mt-10">тут зявлятиметься обрана нерухомість</div>
                    @endif
                    @foreach($rel as $favorite)
                        @php $estate = $favorite->estate; @endphp
                        <a id="estate-{{$estate['id']}}" href="/estate/show/{{ $estate->id }}" class="border-5 border-[#6c94a4] rounded-4xl w-11/12 my-5 h-100 welcome-estate content-end"
                           @if ($estate->photos->isNotEmpty())
                               style="background-image: url('{{ asset('storage/' . $estate->photos->first()->photo) }}'); background-repeat: no-repeat; background-size: cover">
                            @else
                                style="background-color: #ccc">
                            @endif
                            <div class="flex justify-between">
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
                            </div>
                        </a>
                        <div class="justify-self-end mr-30">
                            <form method="post" action="{{ route('estate.fav.destroy', $favorite) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 underline mr-5 cursor-pointer"><i class="bi bi-heartbreak-fill"></i> Видалити з обраного</button>
                            </form>
                        </div>
                    @endforeach
                </div>
                <nav class="flex m-5 p-5 justify-end">
                    <nav>{{ $rel->links() }}</nav>
                </nav>
            </div>
        </div>
    </div>
</x-layout>
