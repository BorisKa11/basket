<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700&display=swap"
      rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

@stack('styles')

<title>{{ $pageSubtitle ?? 'Тестовое' }}</title>
