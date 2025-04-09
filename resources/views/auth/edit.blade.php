@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
    $left_data = [
        'Ім\'я:',
        'Прізвище:',
        'Номер телефону:',
        'Електронна пошта:',
        ];
    $right_data = [
        old('name') === null ? $user->name : old('name'),
        old('surname') === null ? $user->surname : old('surname'),
        old('phone') === null ? $user->phone : old('phone'),
        old('email') === null ? $user->email : old('email'),
    ];
    $id = [
        'name',
        'surname',
        'phone',
        'email'
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
        <form method="post" action="/edit" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="grid border border-[#845e43] my-5" style=" border-top-left-radius: 25px; border-top-right-radius: 25px;">
                <div class="font-bold p-5 bg-[#9c947c]" style=" border-top-left-radius: 25px; border-top-right-radius: 25px;">Персональні дані</div>
                <div class="flex flex-col">
                    @foreach($left_data as $ld)
                        <div class="flex p-5 border border-[#845e43] items-center">
                            <div class="flex-1/2 text-gray-500 font-bold">
                                {{ $ld }}
                            </div>
                            <div class="flex-1/2">
                                <x-form.input id="{{ $id[$i] }}" placeholder="{{ $right_data[$i] }}" value="{{ $right_data[$i] }}"/>
                            </div>
                        </div>
                        @php $i++ @endphp
                    @endforeach
                        <div class="flex p-5 border border-[#845e43] items-center">
                            <div class="flex-1/2 text-gray-500 font-bold">
                                Змінити зображення
                            </div>
                            <div class="flex-1/2">
                                <x-form.input id="avatar" type="file"/>
                            </div>
                        </div>
                </div>
            </div>
            <div class="flex flex-col justify-center border border-[#845e43] my-5 p-5 gap-y-2" style="border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">
                <button type="submit" class="py-3 px-5 w-full text-center bg-blue-300 cursor-pointer btn-blue-shadow" style="border-top-left-radius: 25px; border-top-right-radius: 25px;"><i class="bi bi-reply-all-fill"></i> Зберегти зміни</button>
                <button form="delete" type="submit" class="py-3 px-5 w-full text-white text-center bg-red-500 cursor-pointer btn-red-shadow" style="border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;"><i class="bi bi-trash-fill"></i> Видалити користувача</button>
            </div>
        </form>
    </div>
    <form id="delete" method="post" action="/edit" class="hidden">
        @csrf
        @method('delete')
    </form>
</x-layout>
