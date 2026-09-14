<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Zharifah Dzikra - Frontend & Web Developer')
    </title>

    <meta name="description" content="@yield('description', 'Zharifah Dzikra adalah Frontend dan Web Developer yang berfokus pada pengembangan web menggunakan React.js dan Laravel.')">
    <meta name="author" content="Zharifah Dzikra">
    <meta name="robots" content="@yield('robots', 'index, follow')">

    <link rel="canonical" href="{{ url()->current() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @yield('content')

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: @json(session('success')),
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
</body>

</html>
