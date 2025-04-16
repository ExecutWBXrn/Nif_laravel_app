@php use App\Models\User; @endphp
<x-layout>
    <x-slot:title>Estate of {{ $estate->user->name }}</x-slot:title>
    <div class="flex min-h-screen w-full">
        <div class="w-5/12 h-full border-5 border-[#6c94a4]">
            <div id="default-carousel" class="relative w-full h-screen p-3" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-full overflow-hidden rounded-lg md:h-full">
                    @foreach($estate->photos as $photo)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset("storage/" . $photo->photo) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    @endforeach
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    @for($i=1; $i<count($estate->photos); $i++)
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide {{ $i+1 }}" data-carousel-slide-to="{{ $i }}"></button>
                    @endfor
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
                </button>
            </div>
        </div>
        <div class="flex-1 flex-col w-7/12 h-full border-5 border-[#6c94a4]">
            <div class="flex justify-between p-5 mt-25 mx-15 gap-y-5">
                <div class="flex flex-col">
                    <h3 class="font-bold text-3xl text-[#4a545a]">Місто</h3>
                    <h5 class="text-lg ml-1 text-gray-700"><i class="bi bi-geo"></i> {{$estate->city}}</h5>
                </div>
                <div class="flex flex-col">
                    <h3 class="font-bold text-3xl text-[#4a545a]">Вулиця</h3>
                    <h5 class="text-lg ml-1 text-gray-700"><i class="bi bi-geo-alt"></i> {{$estate->street}} </h5>
                </div>
                <div class="flex flex-col">
                    <h3 class="font-bold text-3xl text-[#4a545a]">Ціна</h3>
                    @if($estate->is_sell)
                        <h5 class="text-lg ml-1 text-gray-700">{{$estate->price}} ₴</h5>
                    @else
                        <h5 class="text-lg ml-1 text-gray-700">₴ {{$estate->price}} за місяць</h5>
                    @endif
                </div>
            </div>
            <div class="p-5 ml-15 w-4/5">
                <h3 class="font-extrabold text-5xl text-[#4a545a]">Опис</h3>
                @if($estate->description)
                    <h5 class="text-lg ml-5 my-5 text-gray-700">{{$estate->description}}</h5>
                @else
                    <h5 class="text-lg ml-5 my-5 text-gray-700">—</h5>
                @endif
            </div>
            <div class="flex flex-wrap p-5 ml-15 w-4/5 gap-x-15 gap-y-10 justify-between">
                @if($estate->builder)
                    <div class="flex flex-col w-1/4">
                        <h3 class="font-bold text-xl text-[#4a545a]">Будівельник</h3>
                        <h5 class="text-lg ml-1 text-gray-700"><i class="bi bi-building-fill-gear"></i> {{$estate->builder}}</h5>
                    </div>
                @endif
                @if($estate->complex)
                    <div class="flex flex-col w-1/4">
                        <h3 class="font-bold text-xl text-[#4a545a]">Комплекс</h3>
                        <h5 class="text-lg ml-1 text-gray-700">{{$estate->complex}}</h5>
                    </div>
                @endif
                <div class="flex flex-col w-1/4">
                    <h3 class="font-bold text-xl text-[#4a545a]">Продавець</h3>
                    <h5 class="text-lg ml-1 text-blue-500"><i class="bi bi-person-fill"></i> <a href="/dashboard/{{$estate->user->id}}">{{$estate->user->name }}</a></h5>
                </div>
                <div class="flex flex-col w-1/4">
                    <h3 class="font-bold text-xl text-[#4a545a]">Стан</h3>
                    <h5 class="text-lg ml-1 text-gray-700"><i class="bi bi-building-lock"></i> {{$estate->is_sell?"Продається":"Здається в оренду"}}</h5>
                </div>
                    @if($estate->amount_of_room)
                        <div class="flex flex-col w-1/4">
                            <h3 class="font-bold text-xl text-[#4a545a]">Кількість кімнат</h3>
                            <h5 class="text-lg ml-1 text-gray-700">{{$estate->amount_of_room}}</h5>
                        </div>
                    @endif
                    @if($estate->floor)
                        <div class="flex flex-col w-1/4">
                            <h3 class="font-bold text-xl text-[#4a545a]">Поверх</h3>
                            <h5 class="text-lg ml-1 text-gray-700">{{$estate->floor}}</h5>
                        </div>
                    @endif
                    @if($estate->floor_estate)
                        <div class="flex flex-col w-1/4">
                            <h3 class="font-bold text-xl text-[#4a545a]">Поверховість</h3>
                            <h5 class="text-lg ml-1 text-gray-700">{{$estate->floor_estate}}</h5>
                        </div>
                    @endif
                    @if($estate->square)
                        <div class="flex flex-col w-1/4">
                            <h3 class="font-bold text-xl text-[#4a545a]">Площа</h3>
                            <h5 class="text-lg ml-1 text-gray-700">{{$estate->square}} м³</h5>
                        </div>
                    @endif
                    @if($estate->square_of_kitchen)
                        <div class="flex flex-col w-1/4">
                            <h3 class="font-bold text-xl text-[#4a545a]">Площа кухні</h3>
                            <h5 class="text-lg ml-1 text-gray-700">{{$estate->square_of_kitchen}} м³</h5>
                        </div>
                    @endif
                    @if($estate->building_date)
                        <div class="flex flex-col w-1/4">
                            <h3 class="font-bold text-xl text-[#4a545a]">Дата побудови</h3>
                            <h5 class="text-lg ml-1 text-gray-700">{{$estate->building_date}}</h5>
                        </div>
                    @endif
            </div>
            <div class="flex p-5 ml-15 w-4/5 justify-between">
                <div>
                    <h3 class="font-bold text-xl text-[#4a545a]">Дата додавання нерухомості на сайт</h3>
                    <h5 class="text-lg ml-1 text-gray-700">{{$estate->created_at}}</h5>
                </div>
                <div>
                    <h3 class="font-bold text-xl text-[#4a545a]">Дата останнього оновлення нерухомості на сайті</h3>
                    <h5 class="text-lg ml-1 text-gray-700">{{$estate->updated_at}}</h5>
                </div>
            </div>
            @auth
            @can('edit', $estate)
            <div class="flex p-5 ml-15 w-4/5 justify-between">
                <a href="/estate/edit/{{$estate->id}}" class="py-3 px-5 rounded-2xl text-center bg-yellow-300 cursor-pointer btn-orange-shadow">Редагувати</a>
                <button type="submit" form="estate_destroy" class="py-3 px-5 rounded-2xl text-white text-center bg-red-500 cursor-pointer btn-red-shadow">Видалити</button>
            </div>
            @endcan
            @cannot('edit', $estate)
                @can('fav', $estate)
                    <div class="flex p-5 ml-15 w-4/5 justify-between">
                        <button type="submit" form="estate_fav" class="py-3 px-5 rounded-2xl text-center bg-blue-300 cursor-pointer btn-blue-shadow"><i class="bi bi-bookmark-heart-fill"></i> Додати в обране</button>
                    </div>
                @endcan
                @cannot('fav', $estate)
                    <div class="flex p-5 ml-15 w-4/5 justify-between">
                        <a class="py-3 px-5 rounded-2xl text-center bg-blue-300 cursor-pointer btn-blue-shadow" href="/favorite"><i class="bi bi-bookmark-heart-fill"></i> Переглянути в обраному</a>
                    </div>
                @endcannot
            @endcannot
            @endauth
        </div>
    </div>
    @can('edit', $estate)
    <form id="estate_destroy" method="post" action="{{ route('estate.destroy', [$estate]) }}" class="hidden">
        @csrf
        @method('delete')
    </form>
    @endcan
    @cannot('edit', $estate)
        <form id="estate_fav" method="post" action="{{ route('estate.fav', [$estate]) }}" class="hidden">
            @csrf
        </form>
    @endcannot
</x-layout>
