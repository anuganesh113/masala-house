@include('admin.includes.header')

<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

    @include('admin.includes.side-bar')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div id="app" style="position:relative">
            <noscript>
                <div style="position: absolute;width: 100%;height: 100%;background: rgba(255,255,255,0.5);text-align: center;z-index: 999999;">
                    <div class="alert alert-danger"
                        style="font-size: 14px;font-weight: 400;padding: 10px;margin-bottom: 0;margin-top: 20%;background-position: center;box-shadow: 0 1px 15px 1px rgba(69,65,78,.08);color:#fff;display: inline-block;">
                        <i class="la la-warning"></i>
                        <strong>Your browser does not support JavaScript!</strong>
                    </div>
                </div>
            </noscript>
            <flash message=""></flash>

                @yield('content')

        </div>
    </div>
</div>

@include('admin.includes.footer')
