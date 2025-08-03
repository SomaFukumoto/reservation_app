@extends('layouts.app')

@section('content')
<div class="font-['M_PLUS_1p'] min-h-screen bg-cover bg-center bg-no-repeat py-16 px-4" style="background-image: url('{{ asset('images/flower.avif') }}');">

    {{-- ロゴとタイトル（ヒーロー） --}}
    <div class="text-center mb-16">
        <img src="{{ asset('images/blackcat.svg') }}" alt="Logo" class="h-16 mx-auto mb-4">
        <h2 class="text-2xl md:text-3xl font-bold text-white tracking-wide">ようこそ、{{ Auth::user()->name }} 様</h2>
    </div>

    {{-- メインカード（グリッド2列） --}}
    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- カード1：メニュー一覧 --}}
        <a href="{{ route('menus.index') }}" class="no-underline text-current flex items-start gap-4 p-6 bg-white/60  rounded-2xl shadow-xl hover:scale-105 hover:shadow-2xl transition-transform duration-300">
            <img src="{{ asset('images/logo-square.svg') }}" alt="Icon" class="h-8 w-8">
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-1">メニューを見る</h3>
                <p class="text-sm text-gray-600">サービス内容の確認</p>
            </div>
        </a>

        {{-- カード2：予約する --}}
        <a href="{{ route('reservations.create') }}" class="no-underline text-current flex items-start gap-4 p-6 bg-white/60 rounded-2xl shadow-xl hover:scale-105 hover:shadow-2xl transition-transform duration-300">
            <img src="{{ asset('images/logo-square.svg') }}" alt="Icon" class="h-8 w-8">
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-1">予約する</h3>
                <p class="text-sm text-gray-600">日時とメニューを選んで予約</p>
            </div>
        </a>

        {{-- カード3：予約一覧 --}}
        <a href="{{ route('reservations.index') }}" class="no-underline text-current flex items-start gap-4 p-6 bg-white/60 rounded-2xl shadow-xl hover:scale-105 hover:shadow-2xl transition-transform duration-300">
            <img src="{{ asset('images/logo-square.svg') }}" alt="Icon" class="h-8 w-8">
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-1">予約を確認</h3>
                <p class="text-sm text-gray-600">予約状況の確認</p>
            </div>
        </a>

        {{-- カード4：プロフィール --}}
        <a href="{{ route('profile.edit') }}" class="no-underline text-current flex items-start gap-4 p-6 bg-white/60 rounded-2xl shadow-xl hover:scale-105 hover:shadow-2xl transition-transform duration-300">
            <img src="{{ asset('images/logo-square.svg') }}" alt="Icon" class="h-8 w-8">
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-1">プロフィール</h3>
                <p class="text-sm text-gray-600">お客様情報の確認・編集</p>
            </div>
        </a>
    </div>

    {{-- モーダル（※元のまま残しています） --}}
    <div id="confirmModal" tabindex="-1" class="hidden fixed top-0 left-0 w-full h-full bg-black/50 z-50">
        <div class="relative p-6 w-full max-w-md mx-auto mt-32 bg-white rounded shadow-md">
            <h3 class="text-lg font-semibold text-gray-800">確認</h3>
            <p class="mt-2 text-gray-600">この操作を実行してもよろしいですか？</p>
            <div class="mt-4 flex justify-end gap-2">
                <button data-modal-hide="confirmModal" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">キャンセル</button>
                <button class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">実行</button>
            </div>
        </div>
    </div>

    {{-- React用 --}}
    <div id="modal-root"></div>
    @viteReactRefresh
    @vite(['resources/js/app.js'])

</div>
@endsection
