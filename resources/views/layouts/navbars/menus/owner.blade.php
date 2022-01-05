<ul class="navbar-nav">
    @if(config('app.ordering'))
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="ni ni-basket text-success"></i> {{ __('Live Orders') }}<div class="blob red"></div>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="ni ni-basket text-orangse"></i> {{ __('Orders') }}
            </a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="ni ni-shop text-info"></i> {{ __('Restaurant') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="ni ni-collection text-pink"></i> {{ __('Menu') }}
        </a>
    </li>

    @if (config('app.isqrsaas') && (!config('settings.qrsaas_disable_odering') || config('settings.enable_guest_log')))
        @if(!config('settings.is_whatsapp_ordering_mode'))
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="ni ni-ungroup text-red"></i> {{ __('Tables') }}
                </a>
            </li>
        @endif
    @endif

    @if (config('app.isqrsaas')&&!config('settings.is_whatsapp_ordering_mode'))
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="ni ni-mobile-button text-red"></i> {{ __('QR Builder') }}
            </a>
        </li>
        @if(config('settings.enable_guest_log'))
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="ni ni-calendar-grid-58 text-blue"></i> {{ __('Customers log') }}
            </a>
        </li>
        @endif
    @endif


        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="ni ni-credit-card text-orange"></i> {{ __('Plan') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="ni ni-money-coins text-blue"></i> {{ __('Finances') }}
            </a>
        </li>

        <!--
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="ni ni-tag text-pink"></i> {{ __('Coupons') }}
            </a>
        </li>
    -->


    <li class="nav-item">
            <a class="nav-link" href="">
                <i class="ni ni-send text-green"></i> {{ __('Share') }}
            </a>
    </li>

    @foreach (auth()->user()->getExtraMenus() as $menu)
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="{{ $menu['icon'] }}"></i> {{ __($menu['name']) }}
                </a>
        </li>
    @endforeach

</ul>
