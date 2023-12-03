<li class="nav-item">
    @php
        
        $badge = $attributes->get('badge');
    @endphp
    <a {{ $attributes->merge(['class' => 'nav-link', 'href' => $link]) }}>
        @if($icon)<i class="nav-icon {{ $icon }} d-block d-lg-none d-xl-block"></i>@endif
        @if($title)
        <span>
            {{ $title }}
            {{-- position-absolute top-0 start-100 translate-middle --}}
            {{-- <i class="bg-primary border rounded-circle fs-6 ">11</i> --}}
            
        </span>

        
        @endif
      
        {{-- @if ($badge)
            badge
        @endif --}}
    </a>
   
</li>
