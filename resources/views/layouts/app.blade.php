<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Ethereal Estates — Invest in Tomorrow\'s Address' }}</title>
    <meta name="description" content="{{ $description ?? 'Discover exclusive pre-construction opportunities and luxury real estate across Ontario with Ethereal Estates.' }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="min-h-full flex flex-col bg-white text-gray-900 selection:bg-amber-100 selection:text-amber-900 {{ $bodyClass ?? '' }}"
      x-data="{ 
          menuOpen: false,
          registerModalOpen: false,
          activePropertyId: null,
          activePropertyTitle: '',
          openRegisterModal(id = null, title = '') {
              this.activePropertyId = id;
              this.activePropertyTitle = title;
              this.registerModalOpen = true;
          },
          closeRegisterModal() {
              this.registerModalOpen = false;
          }
      }">

    <!-- Flash Alerts -->
    <x-alerts />

    <!-- Site Navbar -->
    <x-navbar :dark="$navDark ?? false" :activePage="$activePage ?? ''" />

    <!-- Main Content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- Site Footer (rendered unless disabled e.g. on full-screen split precon page) -->
    @unless($hideFooter ?? false)
        <x-footer />
    @endunless

    <!-- Global VIP Register Modal -->
    <x-register-modal />

    @stack('scripts')
</body>
</html>
