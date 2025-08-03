<nav class="bg-white/50 backdrop-blur-md shadow-sm fixed-top shadow-sm">
  <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center font-['M_PLUS_1p']">

    {{-- 左：ロゴ＋メニュー --}}
    <div class="flex items-center gap-6">

    @can('is-admin')
        <a href="{{ route('admin.dashboard') }}" class="font-bold text-gray-800">
            <img src="{{ asset('images/blackcat.svg') }}" alt="Logo" class="h-10 mx-auto ">
        </a>
        <a href="{{ route('admin.reservations.index') }}" class="text-gray-700 hover:text-gray-900 text-sm">予約一覧</a>
        <a href="{{ route('admin.menus.index') }}" class="text-gray-700 hover:text-gray-900 text-sm">メニュー管理</a>
        <a href="{{ route('staff.index') }}" class="text-gray-700 hover:text-gray-900 text-sm">スタッフ</a>
    @else
        <a href="{{ route('dashboard') }}" class="font-bold text-gray-800">
            <img src="{{ asset('images/blackcat.svg') }}" alt="Logo" class="h-10 mx-auto ">
        </a>
        <a href="{{ route('reservations.create') }}" class="text-gray-700 hover:text-gray-900 text-sm">予約する</a>
        <a href="{{ route('reservations.index') }}" class="text-gray-700 hover:text-gray-900 text-sm">予約確認</a>
        <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-gray-900 text-sm">プロフィール</a>
    @endcan
    </div>

    {{-- 右：ユーザー名＋ログアウト --}}
    <div class="flex items-center gap-4">
        <span class="text-sm text-gray-600 hidden md:inline">こんにちは、{{ Auth::user()->name }} さん</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm bg-gray-100 text-gray-800 px-3 py-1 rounded hover:bg-gray-200 transition">
            ログアウト
            </button>
        </form>
        </div>

    </div>
</nav>
