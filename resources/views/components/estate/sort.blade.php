<div class="text-2xl text-[#4a545a] font-extrabold text-center mb-20">
    <form action="{{$action}}" class="flex p-5 justify-center gap-x-5">
        <div class="py-5">
            Сортувати
        </div>
        <select name="sort" id="sort" class="border-2 border-[#6c94a4] rounded-full pr-10 text-lg">
            <option value="builder" {{$sortField==='builder'?"selected":""}}>Будівельником</option>
            <option value="complex" {{$sortField==='complex'?"selected":""}}>Комплексом</option>
            <option value="city" {{$sortField==='city'?"selected":""}}>Містом</option>
            <option value="price" {{$sortField==='price'?"selected":""}}>Ціною</option>
            <option value="street" {{$sortField==='street'?"selected":""}}>Вулицею</option>
            <option value="amount_of_room" {{$sortField==='amount_of_room'?"selected":""}}>Кількістю кімнат</option>
            <option value="floor" {{$sortField==='floor'?"selected":""}}>Поверхом</option>
            <option value="floor_estate" {{$sortField==='floor_estate'?"selected":""}}>Поверховістю</option>
            <option value="square" {{$sortField==='square'?"selected":""}}>Площею</option>
            <option value="square_of_kitchen" {{$sortField==='square_of_kitchen'?"selected":""}}>Площею кухні</option>
            <option value="building_date" {{$sortField==='building_date'?"selected":""}}>Датою будівництва</option>
        </select>
        <div class="py-5">
            ПО
        </div>
        <select name="direction" id="direction" class="border-2 border-[#6c94a4] rounded-full pr-10 text-lg">
            <option value="DESC" {{$sortDirection==='desc'?"selected":""}}>Спаданню</option>
            <option value="ASC" {{$sortDirection==='ASC'?"selected":""}}>Зростанню</option>
        </select>
        <button class="py-3 px-5 rounded-2xl text-center bg-blue-300 cursor-pointer btn-blue-shadow" type="submit">Сортувати</button>
    </form>
</div>
