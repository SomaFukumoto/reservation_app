@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/flower.avif') }}');">

    <div class="min-h-screen px-4 py-12 font-['M_PLUS_1p'] flex flex-col items-center justify-center">

        {{-- タイトル --}}
        <div class="text-center mb-12">
            <h2 class="text-2xl font-bold text-gray-800">メニュー</h2>
        </div>


        {{-- メニュー一覧（オリジナルのまま） --}}
        <div class="w-full max-w-xl space-y-4">
            @foreach ($menus as $menu)
                <div class="flex justify-between items-center bg-white/80 p-4 rounded-xl shadow-md">
                    <div class="text-gray-800">
                        <span class="font-semibold">{{ $menu->name }}</span>
                        <span class="text-sm text-gray-600">（{{ $menu->duration }}分 / ¥{{ number_format($menu->price) }}）</span>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
