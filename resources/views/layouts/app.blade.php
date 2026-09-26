```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Campus Bookstore')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

    <header class="bg-dark text-white py-4 mb-4">
        <div class="container">
            <h1>📚 Shelves</h1>
            <p class="mb-1">Digital Bookstore Directory</p>
            <p class="mb-0">
                Created By:
                <strong>Michael Andrei Camu</strong>
            </p>
        </div>
    </header>

    <div class="container">

        @include('partials._nav')

        <main>
            @yield('content')
        </main>

    </div>

</body>
</html>
```
