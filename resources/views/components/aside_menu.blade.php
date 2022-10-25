<a href="{{ '/'. $link }}">
    <li class="{{ Request::is($link) ? 'aside_menu_item active' : 'aside_menu_item' }}">
        <img src="/img/icons/{{ $icon }}" alt={{ $name }}><span>{{ $name }}</span>
    </li>
</a>
