<x-guest-layout>
    <div class="min-h-screen bg-cover bg-center flex items-center justify-center"
     style="background-image: url('{{ asset('images/bg.jpg') }}');">

    <div class="bg-black bg-opacity-60 backdrop-blur-md p-10 rounded-xl shadow-xl w-full max-w-md">
        <div class="text-center mb-6">
            <img src="{{ asset('images/blackcat.svg') }}" alt="Logo" class="mx-auto w-16 h-16 mb-4">
            <h1 class="text-2xl font-semibold text-white"></h1>
            <p class="text-sm text-gray-400 tracking-wide">BARBER RESERVE SYSTEM</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- メール -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-300">メールアドレス</label>
                <input id="email" type="email" name="email" required autofocus
                       class="mt-1 block w-full rounded bg-gray-900 text-white border border-gray-600 focus:ring-white focus:border-white">
            </div>

            <!-- パスワード -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-300">パスワード</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 block w-full rounded bg-gray-900 text-white border border-gray-600 focus:ring-white focus:border-white">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center text-sm text-gray-300">
                    <input type="checkbox" name="remember" class="mr-2">
                    ログイン状態を保存
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-gray-400 hover:text-white hover:underline">
                    パスワードを忘れた？
                </a>
            </div>

            <!-- ボタン -->
            <button type="submit"
                    class="w-full py-2 px-4 bg-white text-black font-semibold rounded hover:bg-gray-200 transition">
                ログイン
            </button>
        </form>
    </div>
</div>

</x-guest-layout>
