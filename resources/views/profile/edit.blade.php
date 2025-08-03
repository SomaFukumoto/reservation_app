@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/flower.avif') }}');">
    <div class="min-h-screen px-4 py-12 font-['M_PLUS_1p'] flex flex-col items-center">

        {{-- タイトル --}}
        <div class="text-center mb-8 container mt-5">
            <h2 class="text-2xl font-bold text-gray-800">プロフィール編集</h2>
        </div>

        {{-- フォームカード --}}
        <div class="bg-white/70 p-8 rounded-xl shadow-md w-full max-w-xl">
            <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                @csrf
                @method('PATCH')

                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-1">名前</label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-400" required>
                </div>

                <div>
                    <label for="phone" class="block text-gray-700 font-semibold mb-1">電話番号</label>
                    <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-400">
                </div>

                <div>
                    <label for="address" class="block text-gray-700 font-semibold mb-1">住所</label>
                    <input type="text" name="address" value="{{ old('address', auth()->user()->address) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-400">
                </div>

                <div class="text-right">
                    <button type="submit"
                        class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-700 transition">
                        保存
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
