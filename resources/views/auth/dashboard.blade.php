@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
    $left_data = [
        'Повне ім\'я:',
        'Номер телефону:',
        'Електронна пошта:',
        'Дата створення акаунту:',
        ];
    $right_data = [
        $user->name . " " . $user->surname,
        $user->phone,
        $user->email,
        $user->created_at,
    ];
    $i=0;
@endphp

<x-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>
    <div class="grid m-auto rounded-3xl" style="width: 50%">
        <div class="grid bg-profile justify-items-center p-10 pb-0">
            <img class="rounded-full w-75 h-75 border-5 mt-10" src="{{ asset('storage/avatars/' . $user->avatar) }}">
            <h1 class="text-4xl p-5 mt-5 font-bold"><i class="bi bi-file-person-fill"></i> {{ $user->name . $user->surname }}</h1>
            <h3 class="text-2xl p-5 mb-5 mt-2 text-gray-500"><i class="bi bi-envelope-fill"></i> {{ $user->email }}</h3>
        </div>
        <div class="grid border border-[#845e43] my-5" style=" border-top-left-radius: 25px; border-top-right-radius: 25px;">
            <div class="font-bold p-5 bg-[#9c947c]" style=" border-top-left-radius: 25px; border-top-right-radius: 25px;">Персональні дані</div>
            <div class="flex flex-col">
                @foreach($left_data as $ld)
                    <div class="flex p-5 border border-[#845e43]">
                        <div class="flex-1/2 text-gray-500 font-bold">
                            {{ $ld }}
                        </div>
                        <div class="flex-1/2 font-bold">
                            {{ $right_data[$i] }}
                        </div>
                    </div>
                    @php $i++ @endphp
                @endforeach
            </div>
        </div>
        <div class="flex justify-between border border-[#845e43] my-5 p-5" style="border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">
            <a href="/logout" class="py-3 px-5 rounded-2xl text-white text-center bg-red-500 cursor-pointer btn-red-shadow"><i class="bi bi-door-open"></i> Вийти</a>
            <a href="/edit" class="py-3 px-5 rounded-2xl text-center bg-yellow-300 cursor-pointer btn-orange-shadow">Редагувати акаунт</a>
        </div>
    </div>
</x-layout>
