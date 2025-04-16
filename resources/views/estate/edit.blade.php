<x-layout>
    <x-slot:title>Редагувати нерухомість</x-slot:title>
    <div class="justify-items-center">
        <div class="w-10/12 p-15 justify-items-center">
            <div class="text-5xl text-[#4a545a] font-extrabold text-center mb-20">
                Редагувати нерухомість
            </div>
            <form method="post" action="{{ route('estate.update', [$estate]) }}" class="space-y-5 w-3/5 border p-10 rounded-3xl border-5 bg-[#845e43]" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="flex flex-col border border-5 border-black rounded-3xl p-5 space-y-2 bg-[#fdf7d5]">
                    <label class="flex text-lg" for="builder">Забудовник <div class="font-light text-gray-300 ml-3">(* не обов'язково)</div></label>
                    <input class="border-2 border-[#6c94a4] rounded-full p-3 text-lg" type="text" id="builder" name="builder" value="{{$estate->builder}}" placeholder="builder">
                </div>
                <div class="flex flex-col border border-5 border-black rounded-3xl p-5 space-y-2 bg-[#fdf7d5]">
                    <label class="flex text-lg" for="complex">Комплекс <div class="font-light text-gray-300 ml-3">(* не обов'язково)</div></label>
                    <input class="border-2 border-[#6c94a4] rounded-full p-3 text-lg" type="text" id="complex" name="complex" value="{{$estate->complex}}" placeholder="ЖК ІФ">
                </div>
                <div id="create_estate_city" class="flex flex-col border border-5 border-black rounded-3xl p-5 space-y-2 bg-[#fdf7d5]">
                    <label class="flex text-lg" for="city">Місто</label>
                    <input class="border-2 border-[#6c94a4] rounded-full p-3 text-lg" type="text" id="city" name="city" value="{{$estate->city}}" placeholder="Івано-Франківськ">
                    <x-estate.error for="city" />
                </div>
                <div class="flex flex-col border border-5 border-black rounded-3xl p-5 space-y-2 bg-[#fdf7d5]">
                    <label class="flex text-lg" for="is_sell">Продаж/здача</label>
                    <select name="is_sell" id="is_sell" class="border-2 border-[#6c94a4] rounded-full p-3 text-lg">
                        <option value="1" selected>Продати</option>
                        <option value="0" {{ $estate->is_sell?"":"selected" }}>Здати</option>
                    </select>
                    <x-estate.error for="is_sell" />
                </div>
                <div class="flex flex-col border border-5 border-black rounded-3xl p-5 space-y-2 bg-[#fdf7d5]">
                    <label class="flex text-lg {{ $estate->is_sell?"":"hidden" }}" for="price">Ціна</label>
                    <label class="flex text-lg {{ $estate->is_sell?"hidden":"" }}" for="price">Ціна за місяць</label>
                    <input class="border-2 border-[#6c94a4] rounded-full p-3 text-lg" id="price" type="number" name="price" value="{{$estate->price}}" placeholder="100000 ₴">
                    <x-estate.error for="price" />
                </div>
                <div id="create_estate_street" class="flex flex-col border border-5 border-black rounded-3xl p-5 space-y-2 bg-[#fdf7d5]">
                    <label class="flex text-lg" for="street">Вулиця</label>
                    <input class="border-2 border-[#6c94a4] rounded-full p-3 text-lg" type="text" id="street" name="street" value="{{$estate->street}}" placeholder="Івано-Франківськ">
                    <x-estate.error for="street" />
                </div>
                <div class="flex flex-col border border-5 border-black rounded-3xl p-5 space-y-2 bg-[#fdf7d5]">
                    <label class="flex text-lg" for="photos">Добавити фото квартири</label>
                    <input id="photos" type="file" name="photos[]" multiple class="border-2 border-[#6c94a4] rounded-full p-3 text-lg">
                    <x-estate.error for="photos" />
                </div>
                <div class="flex flex-col border border-5 border-black rounded-3xl p-5 space-y-2 bg-[#fdf7d5]">
                    <label class="flex text-lg"for="description">Опис <div class="font-light text-gray-300 ml-3">(* не обов'язково)</div></label>
                    <textarea type="text" id="description" name="description" placeholder="Введіть опис">{{$estate->description}}</textarea>
                </div>
                <div class="flex flex-col border border-5 border-black rounded-3xl p-5 space-y-2 bg-[#fdf7d5]">
                    <label class="flex text-lg"for="amount_of_room">Кількість кімнат <div class="font-light text-gray-300 ml-3">(* не обов'язково)</div></label>
                    <input class="border-2 border-[#6c94a4] rounded-full p-3 text-lg" type="number" id="amount_of_room" name="amount_of_room" value="{{$estate->amount_of_room}}" placeholder="Введіть кількість кімнат">
                </div>
                <div class="flex flex-col border border-5 border-black rounded-3xl p-5 space-y-2 bg-[#fdf7d5]">
                    <label class="flex text-lg"for="floor">Поверх <div class="font-light text-gray-300 ml-3">(* не обов'язково)</div></label>
                    <input class="border-2 border-[#6c94a4] rounded-full p-3 text-lg" type="number" id="floor" name="floor" value="{{$estate->floor}}" placeholder="Введіть поверх">
                </div>
                <div class="flex flex-col border border-5 border-black rounded-3xl p-5 space-y-2 bg-[#fdf7d5]">
                    <label class="flex text-lg"for="floor_estate">Поверховість <div class="font-light text-gray-300 ml-3">(* не обов'язково)</div></label>
                    <input class="border-2 border-[#6c94a4] rounded-full p-3 text-lg" type="number" id="floor_estate" name="floor_estate" value="{{$estate->floor_estate}}" placeholder="Введіть поверховість">
                </div>
                <div class="flex flex-col border border-5 border-black rounded-3xl p-5 space-y-2 bg-[#fdf7d5]">
                    <label class="flex text-lg"for="square">Площа <div class="font-light text-gray-300 ml-3">(* не обов'язково)</div></label>
                    <input class="border-2 border-[#6c94a4] rounded-full p-3 text-lg" type="number" id="square" name="square" value="{{$estate->square}}" placeholder="Введіть площу">
                </div>
                <div class="flex flex-col border border-5 border-black rounded-3xl p-5 space-y-2 bg-[#fdf7d5]">
                    <label class="flex text-lg"for="square_of_kitchen">Площа кухні <div class="font-light text-gray-300 ml-3">(* не обов'язково)</div></label>
                    <input class="border-2 border-[#6c94a4] rounded-full p-3 text-lg" type="number" id="square_of_kitchen" name="square_of_kitchen" value="{{$estate->square_of_kitchen}}" placeholder="Введіть площу кухні">
                </div>
                <div class="flex flex-col border border-5 border-black rounded-3xl p-5 space-y-2 bg-[#fdf7d5]">
                    <label class="flex text-lg"for="building_date">Дата побудови <div class="font-light text-gray-300 ml-3">(* не обов'язково)</div></label>
                    <input class="border-2 border-[#6c94a4] rounded-full p-3 text-lg" type="date" id="building_date" name="building_date" value="{{$estate->building_date}}" placeholder="Введіть площу">
                </div>
                <div class="justify-self-end">
                    <button type="submit" class="btn-img-default py-2 px-4 my-5 rounded-2xl text-lg font-extrabold text-white border"><i class="bi bi-building-add mr-2"></i> Редагувати оголошення</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
