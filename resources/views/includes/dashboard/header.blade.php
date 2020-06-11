
<div class="navbar-custom">
    <!------------------------------------->
    <!-- right side topbar content start -->
    <ul class="list-unstyled topbar-right-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none mx-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="{{ asset('assets/images/users/avatar.png') }}" alt="user-image" class="rounded-circle user-photo-image">
                </span>
                <span>
                    <span class="account-user-name">{{ auth()->user()->username }}</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown" x-placement="bottom-end" style="position: absolute; transform: translate3d(-23px, 70px, 0px); top: 0px; left: 0px; will-change: transform;">
                <div class="dropdown-divider"></div>
                <a href="javascript:" onclick="document.getElementById('logout-form').submit();" class="dropdown-item"><i class="feather icon-power text-danger"></i> &nbsp; Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            </div>
        </li>
    </ul>
    <button class="button-menu-mobile open-left">
        <i class="feather icon-menu"></i>
    </button>
</div>

