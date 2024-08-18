<li class="nav-item dropdown">
    <a class="nav-link text-white dropdown-toggle" href="javascript:void(0);" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $title }}
    </a>
    <ul class="dropdown-menu bg-header-footer dropdown-menu-dark animate__animated animate__fadeIn" aria-labelledby="navbarScrollingDropdown">
        @forelse($items as $index => $item)
            <li><a class="dropdown-item" href="{{ $item['url'] }}">{{ $item['name'] }}</a></li>
            @if($includeDivider && !$loop->last)
                <li><hr class="dropdown-divider"></li>
            @endif
        @empty
            <li><a class="dropdown-item" href="#">No Items Available</a></li>
        @endforelse
    </ul>
</li>
