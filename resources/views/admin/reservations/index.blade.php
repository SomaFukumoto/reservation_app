@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/flower.avif') }}');">
    <div class="min-h-screen px-4 py-12 font-['M_PLUS_1p'] flex flex-col items-center">

        {{-- タイトル --}}
        <div class="text-center mb-6 container mt-5">
            <h2 class="text-2xl font-bold text-gray-800">予約一覧</h2>
        </div>

        {{-- 成功メッセージ --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded-md shadow mb-4 w-full max-w-3xl text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- 予約がない場合 --}}
        @if ($reservations->isEmpty())
            <p class="text-gray-600">予約はまだありません。</p>
        @else
            {{-- 予約一覧（縦並びカード） --}}
            <div class="w-full max-w-3xl space-y-4">
                @foreach($reservations as $reservation)
                    <div class="bg-white/70 p-6 rounded-xl shadow-md flex flex-col sm:flex-row sm:justify-between sm:items-center">
                        <div class="mb-4 sm:mb-0">
                            <p class="font-semibold text-gray-800">{{ $reservation->user->name }}（{{ $reservation->user->phone }}）</p>
                            <p class="text-sm text-gray-600">{{ $reservation->menu->name }}｜{{ \Carbon\Carbon::parse($reservation->reservation_at)->format('Y年m月d日 H:i') }}</p>
                        </div>
                        <div>
                            <span class="px-3 py-1 rounded-full text-sm font-medium
                                @if($reservation->status === 'pending') bg-gray-200 text-gray-700
                                @elseif($reservation->status === 'confirmed') bg-green-100 text-green-700
                                @elseif($reservation->status === 'canceled') bg-red-100 text-red-700
                                @else bg-gray-200 text-gray-700 @endif">
                                @if ($reservation->status === 'canceled')
                                    キャンセル済み
                                @elseif ($reservation->status === 'confirmed')
                                    確定
                                @else
                                    保留中
                                @endif
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>
@endsection
