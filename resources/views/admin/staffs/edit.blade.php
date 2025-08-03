@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/flower.avif') }}');">
    <div class="min-h-screen px-4 py-12 font-['M_PLUS_1p'] flex flex-col items-center">

        {{-- タイトル --}}
        <div class="text-center mb-6 container mt-5">
            <h2 class="text-2xl font-bold text-gray-800">スタッフ情報編集</h2>
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
            <form action="{{ route('staff.update', $staff->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block font-semibold text-gray-700 mb-1">氏名</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $staff->name) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block font-semibold text-gray-700 mb-1">メールアドレス</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $staff->email) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label for="phone" class="block font-semibold text-gray-700 mb-1">電話番号</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $staff->phone) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>



                <div class="flex justify-between items-center pt-2">
                    <a href="{{ route('staff.index') }}"
                        class="text-gray-700 hover:underline text-sm">← スタッフ一覧へ戻る</a>
                    <button type="submit"
                        class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-700 transition">
                        更新
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
