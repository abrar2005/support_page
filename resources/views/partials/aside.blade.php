    <div class="logo">
        <img src="/img/logo.png" alt="">
    </div>
    <nav>
        <ul>
            @include('components.aside_menu', [
                'name' => 'Alle tickets',
                'icon' => 'ticket.svg',
                'link' => 'alle_tickets',
            ])
            @include('components.aside_menu', [
                'name' => 'users',
                'icon' => 'group.svg',
                'link' => 'users',
            ])
            @include('components.aside_menu', [
                'name' => 'historie',
                'icon' => 'history.svg',
                'link' => 'history',
            ])
            @include('components.aside_menu', [
                'name' => 'Trashed',
                'icon' => 'delete.svg',
                'link' => 'trashed',
            ])
            @include('components.aside_menu', [
                'name' => 'Settings',
                'icon' => 'setting.svg',
                'link' => 'settings',
            ])
            @include('components.aside_menu', [
                'name' => 'Logout',
                'icon' => 'logout.svg',
                'link' => 'logout'
            ])
        </ul>
    </nav>
