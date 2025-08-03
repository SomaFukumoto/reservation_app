@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/flower.avif') }}');">
    <div class="min-h-screen flex items-center justify-center px-4 py-12 font-['M_PLUS_1p']">
        <div class="w-full max-w-md bg-white/60 p-8 rounded-2xl shadow-xl">
            {{-- タイトル --}}
            <h2 class="text-xl font-bold text-gray-800 text-center mb-6">メニュー登録</h2>

            {{-- フォーム --}}
            <form action="{{ route('menus.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">メニュー名</label>
                    <input type="text" name="name" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">所要時間（分）</label>
                    <input type="number" name="duration" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">価格（円）</label>
                    <input type="number" name="price" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400" required>
                </div>

                <div class="flex justify-between items-center pt-2">
                    <a href="{{ route('admin.menus.index') }}"
                        class="text-gray-700 hover:underline text-sm">← メニュー一覧へ戻る</a>
                    <button type="submit"
                        class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-700 transition">
                        登録
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
