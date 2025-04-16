<x-layout>
    <x-slot:title>Орендувати житло</x-slot:title>
    <div class="justify-items-center">
        <div class="w-10/12 p-15">
            <div class="text-5xl text-[#4a545a] font-extrabold text-center mb-20">
                Орендувати нерухомість у Івано-Франківську
            </div>
            <x-estate.sort action="/estate/rentNIF" sortField="{{$sortField}}" sortDirection="{{$sortDirection}}" />
            <div class="grid grid-cols-4 justify-items-center">
                @foreach($estates as $estate)
                    <a id="estate-{{$estate['id']}}" href="/estate/show/{{ $estate->id }}" class="border-5 border-[#6c94a4] rounded-4xl w-11/12 my-5 h-150 cursor-pointer welcome-estate content-end"
                        @if ($estate->photos->isNotEmpty())
                           style="background-image: url('{{ asset('storage/' . $estate->photos->first()->photo) }}')">
                        @else
                            style="background-color: #ccc">
                        @endif
                        <div id="estate_welcome" class="flex flex-col text-white mb-2 ml-2 p-3 gap-y-1">
                            <x-estate.window-text class="text-sm" estate="{{$estate['builder']}}"><i class="bi bi-building-fill-gear"></i></x-estate.window-text>
                            <x-estate.window-text class="text-xl font-extrabold uppercase" estate="{{$estate['complex']}}" />
                            <x-estate.window-text class="text-md" estate="{{$estate['city']}}"><i class="bi bi-geo"></i></x-estate.window-text>
                            <x-estate.window-text class="text-xl font-bold" estate="₴ {{(int)$estate['price']}} за місяць"><i class="bi bi-tag"></i></x-estate.window-text>
                            <x-estate.window-text class="text-sm" estate="{{$estate['street']}}"><i class="bi bi-geo-alt"></i></x-estate.window-text>
                            @if(in_array($sortField, ['amount_of_room', 'floor', 'floor_estate', 'square', 'square_of_kitchen', 'building_date']))
                                <x-estate.window-text class="text-sm" estate="{{$estate[$sortField]}}"><i class="bi bi-house-gear-fill"></i> (параметр сортування) </x-estate.window-text>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
            <nav class="flex m-5 p-5 justify-end">
                <nav>{{ $estates->links() }}</nav>
            </nav>
        </div>
    </div>
</x-layout>
