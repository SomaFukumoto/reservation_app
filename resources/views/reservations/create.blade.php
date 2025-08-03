@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center bg-no-repeat w-full mt-5" style="background-image: url('{{ asset('images/flower.avif') }}');">
    <div class="min-h-screen px-4 py-12 font-['M_PLUS_1p'] flex flex-col items-center">
        <div class="bg-white/70 p-8 rounded-2xl shadow-xl w-full max-w-md">
            <h2 class="text-xl font-bold text-center mb-6">予約フォーム</h2>

            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block font-semibold mb-1">メニューを選択</label>
                    <select name="menu_id" class="w-full border rounded p-2" required>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}（{{ $menu->duration }}分 / ¥{{ $menu->price }}）</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-1">予約日時</label>
                    <input type="text" id="reservation_at" name="reservation_at" class="w-full border rounded p-2" required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-1">スタッフを選択</label>
                    <select name="staff_id" class="w-full border rounded p-2">
                        @foreach ($staffs as $staff)
                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 w-full">
                    予約する
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Flatpickrの読み込み --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        flatpickr("#reservation_at", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today",
            inline: true  // ★ これでカレンダー常時表示
        });
    });
</script>
@endsection
