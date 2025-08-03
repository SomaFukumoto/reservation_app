@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/flower.avif') }}');">
    <div class="min-h-screen px-4 py-12 font-['M_PLUS_1p'] flex flex-col items-center">

        {{-- タイトル --}}
        <div class="text-center mb-6 w-full mt-5">
            <h2 class="text-2xl font-bold text-gray-800">メニュー編集</h2>
        </div>

        {{-- エラーメッセージ --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-2 rounded-md shadow mb-4 w-full max-w-2xl">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- 編集フォーム --}}
        <div class="bg-white/70 p-6 rounded-xl shadow-md w-full max-w-2xl">
            <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-1">メニュー名</label>
                    <input type="text" name="name" value="{{ old('name', $menu->name) }}"
                           class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-1">所要時間（分）</label>
                    <input type="number" name="duration" value="{{ old('duration', $menu->duration) }}"
                           class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-1">価格（円）</label>
                    <input type="number" name="price" value="{{ old('price', $menu->price) }}"
                           class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>


                <div class="flex justify-between items-center pt-2">
                    <a href="{{ route('admin.menus.index') }}"
                       class="text-gray-700 hover:underline text-sm">← メニュー一覧へ戻る</a>
                    <button type="submit"
                        class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-700 transition">
                        アップデート
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
