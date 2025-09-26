<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'My App')</title>

  <!-- Quick: Tailwind CDN for prototyping.
       If you use Vite/compiled CSS, replace the line below with @vite('resources/css/app.css') -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.0/dist/tailwind.min.css" rel="stylesheet">
  <!-- ✅ Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite(['resources/css/app.css'])
    @vite(['resources/css/app.css', 'resources/js/app.js']) --}}



  <style>
    /* small helper to center the card nicely */
    .auth-bg {
      background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
      min-height: 100vh;
    }
  </style>
</head>
<body class="antialiased text-slate-700">
  <div class="auth-bg flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full space-y-8">
      <div class="text-center text-white mb-4">
        <a href="{{ url('/') }}" class="inline-block">
          <h1 class="text-3xl font-extrabold">My App</h1>
        </a>
        <p class="text-slate-300 mt-1">Secure access portal</p>
      </div>

      @yield('content')
      <div class="text-center text-sm text-slate-300">
        &copy; {{ date('Y') }} My App
      </div>
    </div>
  </div>

  <!-- in layouts/app.blade.php -->
  <script src="//unpkg.com/alpinejs" defer></script>
  @stack('scripts')
</body>
</html>
