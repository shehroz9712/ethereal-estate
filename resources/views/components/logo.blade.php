@props([
    'dark' => false,
    'class' => 'h-10 sm:h-12 md:h-14 w-auto inline-block object-contain align-middle',
    'alt' => 'Ethereal Estates'
])

@if($dark)
    <img src="{{ asset('assets/images/logo.png') }}"
         alt="{{ $alt }}"
         class="{{ $class }}" />
@else
    <img src="{{ asset('assets/images/logo-dark.png') }}"
         onerror="this.src='{{ asset('assets/images/logo.png') }}'"
         alt="{{ $alt }}"
         class="{{ $class }}" />
@endif
