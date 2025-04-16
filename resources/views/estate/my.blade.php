<x-layout>
    <x-slot:title>
        Додана нерухомість
    </x-slot:title>
    <div class="bg-welcome justify-items-center">
        <div class="grid" style="width: 90vw">
            <div class="mt-30">
                <div class="p-10 text-5xl font-extrabold text-[#4a545a] justify-self-center">
                    Додана нерухомість
                </div>
                <div class="grid grid-cols-1 justify-items-center">
                    @if($estates->isEmpty())
                        <div class="font-bold text-2xl text-[#93a0a5] mt-10">тут зявлятиметься додана вами нерухомість</div>
                    @else
                        <x-estate.sort action="/estate" sortField="{{$sortField}}" sortDirection="{{$sortDirection}}" />
                    @endif
                    @foreach($estates as $estate)
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
                                    @if(in_array($sortField, ['amount_of_room', 'floor', 'floor_estate', 'square', 'square_of_kitchen', 'building_date']))
                                        <x-estate.window-text class="text-sm" estate="{{$estate[$sortField]}}"><i class="bi bi-house-gear-fill"></i> (параметр сортування) </x-estate.window-text>
                                    @endif
                                </div>
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
