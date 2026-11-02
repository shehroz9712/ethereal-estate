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
@php
    $initialSavedItems = [];
    if (auth()->check()) {
        $initialSavedItems = auth()->user()->savedProperties->map(function ($p) {
            return [
                'id' => $p->id,
                'title' => $p->title,
                'city' => $p->city,
                'price' => $p->formatted_price,
                'image' => $p->primary_image_url,
                'url' => route('properties.show', $p->slug),
            ];
        })->values()->all();
    }
@endphp
<body class="min-h-full flex flex-col bg-white text-gray-900 selection:bg-amber-100 selection:text-amber-900 {{ $bodyClass ?? '' }}"
      x-data="{ 
          menuOpen: false,
          registerModalOpen: false,
          savedDrawerOpen: false,
          searchModalOpen: false,
          activePropertyId: null,
          activePropertyTitle: '',
          isAuthenticated: {{ auth()->check() ? 'true' : 'false' }},
          savedItems: @json($initialSavedItems),
          init() {
              if (!this.isAuthenticated) {
                  this.savedItems = [];
                  try {
                      localStorage.removeItem('ethereal_saved_properties');
                  } catch (e) {}
              }
          },
          openRegisterModal(id = null, title = '') {
              this.activePropertyId = id;
              this.activePropertyTitle = title;
              this.registerModalOpen = true;
          },
          closeRegisterModal() {
              this.registerModalOpen = false;
          },
          openSearchModal() {
              this.searchModalOpen = true;
              this.$nextTick(() => {
                  if (this.$refs.globalSearchInput) {
                      this.$refs.globalSearchInput.focus();
                  }
              });
          },
          toggleSaveProperty(prop) {
              if (!this.isAuthenticated) {
                  // Login required! Do not save without login
                  const currentUrl = window.location.href;
                  window.location.href = "{{ route('login') }}?redirect=" + encodeURIComponent(currentUrl) + "&info=" + encodeURIComponent('Please sign in to save properties to your wishlist.');
                  return;
              }

              const idx = this.savedItems.findIndex(i => i.id == prop.id);
              if (idx > -1) {
                  this.savedItems.splice(idx, 1);
              } else {
                  this.savedItems.push(prop);
              }

              // Sync with server
              fetch('/properties/' + prop.id + '/favorite', {
                  method: 'POST',
                  headers: {
                      'X-CSRF-TOKEN': '{{ csrf_token() }}',
                      'Accept': 'application/json'
                  }
              })
              .then(r => {
                  if (r.status === 401) {
                      this.isAuthenticated = false;
                      this.savedItems = [];
                      window.location.href = "{{ route('login') }}?redirect=" + encodeURIComponent(window.location.href) + "&info=" + encodeURIComponent('Please sign in to save properties to your wishlist.');
                  }
              })
              .catch(() => {});
          },
          removeSavedItem(id) {
              if (!this.isAuthenticated) {
                  this.savedItems = [];
                  return;
              }
              this.savedItems = this.savedItems.filter(i => i.id != id);
              fetch('/properties/' + id + '/favorite', {
                  method: 'POST',
                  headers: {
                      'X-CSRF-TOKEN': '{{ csrf_token() }}',
                      'Accept': 'application/json'
                  }
              }).catch(() => {});
          },
          isPropertySaved(id) {
              return this.isAuthenticated && this.savedItems.some(i => i.id == id);
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

    <!-- Saved Properties / Wishlist Drawer -->
    <x-wishlist-drawer />

    <!-- Global Quick Search Modal (available on all pages) -->
    <x-global-search-modal />

    <!-- Floating Circular Human Bot & Chat Concierge -->
    <x-human-bot-chat />

    @stack('scripts')
</body>
</html>
