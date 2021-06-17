<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo/text_logo-light.png') }}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('home') }}" class="dropdown-toggle no-arrow @if (request()->is('home*')) active @endif">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('packages') }}" class="dropdown-toggle no-arrow @if (request()->is('packages*')) active @endif">
                        <span class="micon dw dw-gift"></span><span class="mtext">Packages</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-user1"></span><span class="mtext">Users</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('clients') }}" class="@if (request()->is('clients*')) active @endif">Clients</a></li>
                        <li><a href="{{ route('resellers') }}" class="@if (request()->is('resellers*')) active @endif">Resellers</a></li>
                        <li><a href="{{ route('staff') }}" class="@if (request()->is('staff*')) active @endif">Staff</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-profits-1"></span><span class="mtext">Transactions</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('income') }}" class="@if (request()->is('income*')) active @endif">Income</a></li>
                        <li><a href="{{ route('expenses') }}" class="@if (request()->is('expenses*')) active @endif">Expenses</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-settings1"></span><span class="mtext">Options</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('tickets') }}" class="@if (request()->is('tickets*')) active @endif">Tickets</a></li>
                        <li><a href="{{ route('reports') }}" class="@if (request()->is('reports*')) active @endif">Reports</a></li>
                        <li><a href="{{ route('settings') }}" class="@if (request()->is('settings*')) active @endif">Settings</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
