<x-layout>
    <x-slot:title>
        Registry
    </x-slot:title>
    <div class="flex w-screen h-screen justify-between">
        <div class="bg-if2 content-center justify-items-end" style="width: 50%">
            <img class="ml-auto" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/img/welcome/ivano-frankivsk-oblast-map.png') }}" alt="">
        </div>
        <div class="content-center" style="width: 50%; background-color: #b7ab97">
            <div class="justify-items-start ml-30 ">
                <form method="post" action="/registry" enctype="multipart/form-data" class="grid justify-center bg-white p-10 rounded-3xl" style="background-color: #f4f0d4; border: #c6884b solid 5px">
                    @csrf
                    <x-form.input id="name" placeholder="Роман" value="{{ old('name') }}">Введіть ім'я:</x-form.input>
                    <x-form.input id="surname" placeholder="Романюк" value="{{ old('surname') }}">Введіть Прізвище:</x-form.input>
                    <x-form.input id="email" type="email" placeholder="email@example.com" value="{{ old('email') }}">Введіть електронну адресу:</x-form.input>
                    <x-form.input id="phone" placeholder="067*******" value="{{ old('phone') }}">Введіть номер телефона:</x-form.input>
                    <x-form.input id="password" type="password" placeholder="password">Введіть пароль:</x-form.input>
                    <x-form.input id="password_confirmation" type="password" placeholder="repeat password">Повторіть пароль:</x-form.input>
                    <x-form.input id="avatar" type="file">Завантажити аватар</x-form.input>
                    <button class="btn-img-default p-2 my-5 rounded-2xl text-lg font-extrabold text-white"><i class="bi bi-person-circle"></i> Зареєструватися</button>
                    <a href="/login" class="underline hover:text-blue-600 transition-colors duration-300">Увійти <i class="bi bi-arrow-right"></i></a>
                </form>
            </div>
        </div>
    </div>
</x-layout>
