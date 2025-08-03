@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/flower.avif') }}');">
    <div class="min-h-screen px-4 py-12 font-['M_PLUS_1p'] flex flex-col items-center">

        {{-- タイトル --}}
        <div class="text-center mb-6 container mt-5">
            <h2 class="text-2xl font-bold text-gray-800">スタッフ一覧</h2>
        </div>

        {{-- 成功メッセージ --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded-md shadow mb-4 w-full max-w-3xl text-center">
                {{ session('success') }}
            </div>
        @endif


        {{-- スタッフ一覧 --}}
        @if ($staffs->isEmpty())
            <p class="text-gray-600">スタッフは登録されていません。</p>
        @else
            <div class="w-full max-w-3xl space-y-4">
                @foreach ($staffs as $staff)
                    <div class="bg-white/70 p-6 rounded-xl shadow-md flex justify-between items-center">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $staff->name }}</p>
                            <p class="text-sm text-gray-600">メール: {{ $staff->email }}</p>
                            <p class="text-sm text-gray-600">電話: {{ $staff->phone }}</p>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('staff.edit', $staff->id) }}" >
                                <img src="{{ asset('images/edit-pencil.svg') }}" alt="Icon" class="h-6 w-6">
                            </a>
                            <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <img src="{{ asset('images/trash.svg') }}" alt="Icon" class="h-6 w-6">
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                {{-- 新規スタッフ登録ボタン --}}
                <div class="mb-6 w-full max-w-3xl text-right">
                    <a href="{{ route('staff.create') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-300 transition">
                        ＋ 新規スタッフ登録
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

@endsection
