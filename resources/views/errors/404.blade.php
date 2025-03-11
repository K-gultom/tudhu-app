<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous">

        {{-- Ini CDN Icon --}}
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <title>{{ config('app.name') }}</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                padding: 50px;
            }
            h1 {
                font-size: 50px;
                color: #ff4c4c;
            }
            p {
                font-size: 18px;
            }
            a {
                text-decoration: none;
                color: #007bff;
                font-size: 20px;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>

        <div class="text-center">
            <h1 class="text-danger">404</h1>
            <p>Maaf, halaman yang Anda tuju tidak ada.</p>
            <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

    </body>
</html>