<div id="app-sidepanel" class="app-sidepanel"> 
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column" id="sidebar">
        <a href="" id="sidepanel-close" class="sidepanel-close"><i class="fa-solid fa-xmark"></i></a>
        <div class="app-branding">
            <a class="app-logo d-flex align-items-center" href="/">
                <img class="logo-icon " src="/images/logofood.png" alt="logo">
                <img class="logo-icon-text " src="/images/foodosotext.png" alt="logotext">
            </a>
        </div> 
        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1 mt-3">
            <ul class="app-menu list-unstyled accordion">
                
                {{-- dashboard  --}}
                <li class="nav-item">
                    <a class="nav-link {{ Request::is("/") ? 'active' : '' }}" href="/">
                        <span class="nav-icon">
                            <i class="fa-solid fa-house-chimney"></i>
                        </span>
                        <span class="nav-link-text">Overview</span>
                    </a>
                </li>

                @can('admin')
                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle {{ Request::is('user') ? 'active' : (Request::is('user/create') ? 'active' : '') }}" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="{{ Request::is('user') ? 'true' : (Request::is('user/create') ? 'true' : 'false') }}" aria-controls="submenu-3" role="button">
                        <span class="nav-icon">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <span class="nav-link-text">Employee</span>
                        <span class="submenu-arrow">
                            <i class="fa-solid fa-chevron-down arrow"></i>
                        </span>
                    </a>
                    <div id="submenu-3" class="submenu submenu-3 {{ Request::is('user') ? 'collapse show' : (Request::is('user/create') ? 'collapse show' : 'collapse') }}" data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link {{ Request::is('user') ? 'active' :  ''}}" href="/user">All Employee's</a></li>
                            <li class="submenu-item"><a class="submenu-link {{ Request::is('user/create') ? 'active' :  ''}}" href="/user/create">Add New Employee</a></li>
                        </ul>
                    </div>
                </li>
                @endcan

                {{-- menu --}}
                @can('manager')
                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle {{ Request::is('menu') ? 'active' : (Request::is('menu/create') ? 'active' : '') }}" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="{{ Request::is('menu') ? 'true' : (Request::is('menu/create') ? 'true' : 'false') }}" aria-controls="submenu-1" role="button">
                        <span class="nav-icon">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </span>
                        <span class="nav-link-text">Menu</span>
                        <span class="submenu-arrow">
                            <i class="fa-solid fa-chevron-down arrow"></i>
                        </span>
                    </a>
                    <div id="submenu-1" class="submenu submenu-1 {{ Request::is('menu') ? 'collapse show' : (Request::is('menu/create') ? 'collapse show' : 'collapse') }}" data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link {{ Request::is('menu') ? 'active' :  ''}}" href="/menu">All Menu's</a></li>
                            <li class="submenu-item"><a class="submenu-link {{ Request::is('menu/create') ? 'active' :  ''}}" href="/menu/create">Add New Menu</a></li>
                        </ul>
                    </div>
                </li>
                @endcan

                {{-- transaction  --}}
                @cannot('admin')
                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle {{ Request::is('transaction') ? 'active' : (Request::is('transaction/create') ? 'active' : '') }}" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="{{ Request::is('transaction') ? 'true' : (Request::is('transaction/create') ? 'true' : 'false') }}" aria-controls="submenu-2" role="button">
                        <span class="nav-icon">
                            <i class="fa-solid fa-dollar-sign"></i>
                        </span>
                        <span class="nav-link-text">Transaction</span>
                        <span class="submenu-arrow">
                            <i class="fa-solid fa-chevron-down arrow"></i>
                        </span>
                    </a>
                    <div id="submenu-2" class="collapse submenu submenu-2 {{ Request::is('transaction') ? 'collapse show' : (Request::is('transaction/create') ? 'collapse show' : 'collapse') }}" data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            @can('manager')
                            <li class="submenu-item"><a class="submenu-link {{ Request::is('transaction') ? 'active' :  ''}}" href="/transaction">All Transaction's</a></li>
                            @endcan
                            @can('cashier')
                            <li class="submenu-item"><a class="submenu-link {{ Request::is('transaction') ? 'active' :  ''}}" href="/transaction">All Transaction's</a></li>
                            <li class="submenu-item"><a class="submenu-link {{ Request::is('transaction/create') ? 'active' :  ''}}" href="/transaction/create">Make Order</a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan
                
                {{-- activityLog --}}
                @cannot('cashier')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is("activityLog") ? 'active' : '' }}" href="/activityLog">
                        <span class="nav-icon">
                            <i class="fa-solid fa-clipboard-list"></i>
                        </span>
                        <span class="nav-link-text">Activity Log</span>
                    </a>
                </li>
                @endcan

            </ul>
        </nav>
    </div>
</div>