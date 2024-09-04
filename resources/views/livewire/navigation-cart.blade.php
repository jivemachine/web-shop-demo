<x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
    {{ __('You cart ') }} ({{ $this->count }})
</x-nav-link>
