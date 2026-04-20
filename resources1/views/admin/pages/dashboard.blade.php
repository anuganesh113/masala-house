@section("page_title", "Admin Dashboard")
@extends("admin.layouts.layout")

@section("content")
<div class="m-content">
    <div class="m-portlet">
        <div class="m-portlet__body m-portlet__body--no-padding">
            <div class="row m-row--col-separator-xl">

                @foreach($data ?? [] as $key => $value)
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">Total {{ ucwords($key) }}</h4><br>
                                <span class="m-widget24__desc"></span>
                                <span class="m-widget24__stats m--font-secondary">{{ $value }}</span>
                                <div class="m--space-40"></div>
                                <span class="m-widget24__number">
                                    @if(Route::has(sprintf('admin.%s.index', $key)))
                                        <a href="{{ route(sprintf('admin.%s.index', $key)) }}"
                                           title="Total {{ ucwords($key) }}"
                                        >
                                            View List
                                        </a>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
