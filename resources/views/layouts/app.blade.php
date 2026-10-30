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
          savedDrawerOpen: false,
          searchModalOpen: false,
          activePropertyId: null,
          activePropertyTitle: '',
          savedItems: [],
          init() {
              try {
                  const stored = localStorage.getItem('ethereal_saved_properties');
                  if (stored) {
                      this.savedItems = JSON.parse(stored);
                  }
              } catch (e) {
                  this.savedItems = [];
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
              const idx = this.savedItems.findIndex(i => i.id == prop.id);
              if (idx > -1) {
                  this.savedItems.splice(idx, 1);
              } else {
                  this.savedItems.push(prop);
              }
              try {
                  localStorage.setItem('ethereal_saved_properties', JSON.stringify(this.savedItems));
              } catch (e) {}

              // Also sync with server if logged in
              fetch('/properties/' + prop.id + '/favorite', {
                  method: 'POST',
                  headers: {
                      'X-CSRF-TOKEN': '{{ csrf_token() }}',
                      'Accept': 'application/json'
                  }
              }).catch(() => {});
          },
          removeSavedItem(id) {
              this.savedItems = this.savedItems.filter(i => i.id != id);
              try {
                  localStorage.setItem('ethereal_saved_properties', JSON.stringify(this.savedItems));
              } catch (e) {}
          },
          isPropertySaved(id) {
              return this.savedItems.some(i => i.id == id);
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
