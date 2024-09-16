<!-- sidebar -->
<div id="sidebar" class="">
    <div class="sidebar-top">
        <a class="navbar-brand" href="{{ route('home') }}"> <img
                src="{{ getFile(config('location.logoIcon.path') . 'logo.png') }}" alt=""/></a>
        <button class="sidebar-toggler d-md-none" onclick="toggleSideMenu()">
            <i class="fal fa-times"></i>
        </button>
    </div>
    <ul class="main">
        <li>
            <a class="{{ menuActive(['user.home'], 3) }}" href="{{ route('user.home') }}"><i
                    class="fal fa-th-large"></i>@lang('Tablero')</a>
        </li>
        @bookCita
        <li>
            <a class="{{ menuActive(['user.my.appointment', 'user.search.appointment'], 3) }}"
               href="{{ route('user.my.appointment') }}"><i
                    class="fa-thin fa-calendar-check"></i>@lang('My Cita')</a>
        </li>
        @endbookCita
        @plan
        <li>
            <a class="{{ menuActive(['user.my.plan', 'user.search.plan'], 3) }}" href="{{ route('user.my.plan') }}"><i
                    class="fal fa-tags"></i>@lang('my plan')</a>
        </li>
        @endplan

        <li>
            <a class="{{ menuActive(['user.my.order', 'user.order.search', 'user.my.order.details'], 3) }}"
               href="{{ route('user.my.order') }}"><i class="fas fa-cart-arrow-down"></i>@lang('my order')</a>
        </li>

        <li>
            <a class="{{ menuActive(['user.my.wishlist', 'user.search.wishlist'], 3) }}"
               href="{{ route('user.my.wishlist') }}"><i
                    class="fa-sharp fa-regular fa-heart"></i>@lang('my wish list')</a>
        </li>
        @shop

        <li>
            <a class="{{ menuActive(['user.my.transaction', 'user.transaction.search'], 3) }}"
               href="{{ route('user.my.transaction') }}"><i class="fal fa-sliders-h"></i>@lang('my transaction')</a>
        </li>
          <li>
            <a class="{{ menuActive(['user.ticket.list', 'user.ticket.view', 'user.ticket.create'], 3) }}"
               href="{{ route('user.ticket.list') }}"><i class="fal fa-user-headset" aria-hidden="true"></i>@lang('Soporte Ticket')</a>
        </li>

        <li>
            <a class="{{ menuActive(['user.twostep.security'], 3) }}"
               href="{{ route('user.twostep.security') }}"><i class="fas fa-user-shield"></i>@lang('2FA Security')</a>
        </li>
        @endshop
        <li>
            <a class="{{ menuActive(['user.profile'], 3) }}" href="{{ route('user.profile') }}"><i
                    class="fal fa-user-edit"></i>@lang('Editar Perfil')</a>
        </li>
        <li>
            @auth
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fal fa-sign-out-alt"></i>@lang('Sign Out')</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endauth
        </li>
    </ul>
</div>
