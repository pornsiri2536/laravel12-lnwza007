<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
</head>
<body>
    <header>
        <h1>My Laravel App</h1>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
