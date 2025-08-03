@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/flower.avif') }}');">
    <div class="min-h-screen flex items-center justify-center px-4 py-12 font-['M_PLUS_1p']">
        <div class="w-full max-w-md bg-white/60 p-8 rounded-2xl shadow-xl">

            {{-- タイトル --}}
            <h2 class="text-xl font-bold text-gray-800 text-center mb-6">スタッフ新規登録</h2>

            {{-- エラーメッセージ --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded mb-4 text-sm">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- フォーム --}}
            <form action="{{ route('staff.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">氏名</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">メールアドレス</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">電話番号</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                        class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                </div>

                <div class="flex justify-between items-center pt-2">
                    <a href="{{ route('staff.index') }}"
                       class="text-gray-700 hover:underline text-sm">← スタッフ一覧へ戻る</a>
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
