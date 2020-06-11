<style>

    .menu-item-active-here{
        background-color: white;
        position: absolute;
        right: 0;
        top: 0;
        display: none;
        width: 0;
        height: 100%;
        border-style: solid;
        border-width: 26px 13px 26px 0;
        border-color: #383f72 #f2f3f8 #383f72 #383f72 !important;
    }

    .menu-item-active{
        background: #383f72;
    }

    .menu-item-active .menu-item-active-here{
        display: block;
    }
</style>

<div class="left-side-menu">
 <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 937px;"><div class="slimscroll-menu active" style="overflow: hidden; width: auto; height: 937px; margin-top: 50px">
     <!-- Logo content end -->
     <!-------------------------------------->
    <div class="sidenav-user">
        <h4 class="mb-1 mt-0">{{ auth()->user()->username }}</h4>
        <img src="{{ asset('assets/images/users/avatar.png') }}" alt="" class="rounded-circle user-photo-image">
    </div>
    <!-------------------------------------->
    <!-- Menu link start -->
    <ul class="metismenu side-nav in">

        <li class="menu-item mt-3 {{ Request::is('admin/dashboard*') ? 'menu-item-active' : '' }}">
            <a href="{{route('admin.dashboard')}}" class="menu-link">
                <span class="menu-item-active-here"></span>
                <i class="mdi mdi-view-dashboard"></i>
                <span>Dashboard</span>
                <span id="all-parts-counter" class="badge badge-primary-lighten badge-pill float-right mr-3"></span>
            </a>
        </li>

        <li class="menu-item {{ Request::is('admin/location*') ? 'menu-item-active' : '' }}">
            <a href="{{route('admin.location.index')}}" class="menu-link">
                <span class="menu-item-active-here"></span>
                <i class="feather dripicons-location "></i>
                <span>Locations</span>
                <span id="all-parts-counter" class="badge badge-primary-lighten badge-pill float-right mr-3"></span>
            </a>
        </li>
        <li class="menu-item {{ Request::is('admin/theme*') ? 'menu-item-active' : '' }}">
            <a href="{{route('admin.theme.index')}}" class="menu-link">
                <span class="menu-item-active-here"></span>
                <i class="mdi mdi-checkbox-multiple-blank"></i>
                <span>Themes</span>
                <span id="all-parts-counter" class="badge badge-primary-lighten badge-pill float-right mr-3"></span>
            </a>
        </li>
        <li class="menu-item {{ Request::is('admin/m-theme-location*') ? 'menu-item-active' : '' }}">
            <a href="{{route('admin.m-theme-location.index')}}" class="menu-link">
                <span class="menu-item-active-here"></span>
                <i class="feather icon-box "></i>
                <span>Location-Themes</span>
                <span id="all-parts-counter" class="badge badge-primary-lighten badge-pill float-right mr-3"></span>
            </a>
        </li>

        <li class="menu-item {{ Request::is('admin/special-date*') ? 'menu-item-active' : '' }}">
            <a href="{{route('admin.special-date.index')}}" class="menu-link">
                <span class="menu-item-active-here"></span>
                <i class="mdi mdi-calendar-star"></i>
                <span>SpecialDates</span>
                <span id="all-parts-counter" class="badge badge-primary-lighten badge-pill float-right mr-3"></span>
            </a>
        </li>

        <li class="menu-item {{ Request::is('admin/deal*') ? 'menu-item-active' : '' }}">
            <a href="{{route('admin.deal.index')}}" class="menu-link">
                <span class="menu-item-active-here"></span>
                <i class="mdi mdi-camera-image"></i>
                <span>Deals</span>
                <span id="all-parts-counter" class="badge badge-primary-lighten badge-pill float-right mr-3"></span>
            </a>
        </li>

        <li class="menu-item {{ Request::is('admin/import-deal*') ? 'menu-item-active' : '' }}">
            <a href="{{route('admin.deal.import-json')}}" class="menu-link">
                <span class="menu-item-active-here"></span>
                <i class="mdi mdi-camera-image"></i>
                <span>Import JSON</span>
                <span id="all-parts-counter" class="badge badge-primary-lighten badge-pill float-right mr-3"></span>
            </a>
        </li>

        <hr style="background-color: grey" class="my-1"/>
        <li class="menu-item">
            <a href="javascript:" onclick="document.getElementById('logout-form').submit();" class="menu-link">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <i class="feather dripicons-exit"></i>
                <span>Log Out</span>
                <span id="all-parts-counter" class="badge badge-primary-lighten badge-pill float-right mr-3"></span>
            </a>
        </li>
     </ul>
     <!-- Menu link end -->
     <!-------------------------------------->
{{-- sdfasdfs --}}
     <div class="clearfix"></div>
 </div><div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 8px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 642.73px;"></div><div class="slimScrollRail" style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
</div>

