<x-nav-link href="{{ route('cart') }}" :active="request()->routeIs('cart')">
    {{ __('You cart ') }} ({{ $this->count }})
</x-nav-link>
