<!-- resources/views/components/guest.blade.php -->
<html>
<head>
    <title>Login</title>
    @vite('resources/css/app.css') {{-- Viteが有効であれば --}}
</head>
<body
    class="min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center"
    style="background-image: url('{{ asset('images/hair-woman.avif') }}');"
>
    {{ $slot }}
</body>
</html>
