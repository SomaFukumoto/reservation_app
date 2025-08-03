@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/flower.avif') }}');">

    <div class="min-h-screen px-4 py-12 font-['M_PLUS_1p'] flex flex-col items-center justify-center">

        {{-- タイトル --}}
        <div class="text-center mb-12 ">
            <h2 class="text-2xl font-bold text-gray-800">管理者用メニュー一覧</h2>
        </div>


        {{-- メニュー一覧（オリジナルのまま） --}}
        <div class="w-full max-w-xl space-y-4 ">
            @foreach ($menus as $menu)
                <div class="flex justify-between items-center bg-white/80 p-4 rounded-xl shadow-md">
                    <div class="text-gray-800">
                        <span class="font-semibold">{{ $menu->name }}</span>
                        <span class="text-sm text-gray-600">（{{ $menu->duration }}分 / ¥{{ number_format($menu->price) }}）</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('menus.edit', $menu->id) }}" class="text-blue-600 hover:text-blue-800 transition">
                            <img src="{{ asset('images/edit-pencil.svg') }}" alt="Icon" class="h-6 w-6">
                        </a>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 transition">
                                <img src="{{ asset('images/trash.svg') }}" alt="Icon" class="h-6 w-6">
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
            {{-- 新規追加ボタン --}}
            <div class="mb-6 w-full max-w-xl text-right">
                <a href="{{ route('menus.create') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                    ＋ 新規追加
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
