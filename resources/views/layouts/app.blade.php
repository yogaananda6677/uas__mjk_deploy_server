<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>UAS Web Profil & CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('profile') }}">Web UAS</a>

        <div>
            <a href="{{ route('profile') }}" class="btn btn-sm btn-outline-light">Profil</a>
            <a href="{{ route('projects.index') }}" class="btn btn-sm btn-warning">CRUD Project</a>
        </div>
    </div>
</nav>

<main class="container py-4">
    @yield('content')
</main>

<footer class="text-center py-3 bg-dark text-white mt-5">
    <small>© 2026 - Web Profil & CRUD Laravel</small>
</footer>

</body>
</html>
