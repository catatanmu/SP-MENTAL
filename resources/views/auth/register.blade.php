<x-guest-layout>
    <x-slot name="title">
        Mendaftar
    </x-slot>

    <x-auth-card>
    
        {{-- show alert if there is errors --}}
        <x-alert-error/>

        <x-slot name="title">
            DAFTAR AKUN
        </x-slot>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <!-- Name field -->
            <x-input type="text" text="Nama" name="name" />

            <!-- Email field -->
            <x-input type="text" text="Nama Pengguna" name="username" />

            <!-- Password field -->
            <x-input type="password" text="Kata Sandi" name="password" />

            <!-- Password confirmation field -->
            <x-input type="password" text="Ulangi Kata Sandi" name="password_confirmation" />
            
            <x-button type="primary btn-block" text="Daftar" for="submit" />
        </form>
        <div class="text-center mt-4">
            <hr>
            <a class="font-weight-bold small" href="{{ route('login') }}">Sudah punya akun?</a>
        </div>
    </x-auth-card>
</x-guest-layout>
