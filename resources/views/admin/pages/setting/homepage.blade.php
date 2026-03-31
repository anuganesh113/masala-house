@extends("admin.layouts.layout")

@section('title', 'Ceo Setting')

@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Hear from our Ceo</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <form method="post" action="{{ route('admin.settingUpdate') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Ceo Title</label>
                        <div class="col-lg-9">
                            <input name="ceo_title" class="form-control" type="text"
                                value="{{ $setting['ceo_title'] ?? '' }} ">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Ceo Position</label>
                        <div class="col-lg-9">
                            <input name="ceo_position" class="form-control" type="text"
                                value="{{ $setting['ceo_position'] ?? '' }} ">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Ceo Image</label>
                        <div class="col-lg-5">
                            <input type="file" class="form-control" name="ceo_image">
                        </div>
                        <div class="col-lg-4">
                            <div class="img-thumbnail float-right">
                                @if (isset($setting['ceo_image']))
                                <img src="{{ asset('uploads/setting/website/' . $setting['ceo_image']) }}"
                                    alt="{{ $setting['ceo_image'] ?? 'Ceo' }}" height="50">
                                @endif

                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Ceo Message </label>
                        <div class="col-lg-9">
                            <textarea name="ceo_message" id="ceo_message" cols="30" rows="10" class="form-control"
                                style="height: 200px;"> {{ $setting['ceo_message'] ?? '' }}</textarea>
                        </div>
                    </div>



                    @php

                    $arr_categories = [];
                    if (isset($setting['home_page_menu']) && !empty($setting['home_page_menu'])) {
                    $arr_categories = json_decode($setting['home_page_menu']);
                    }
                    @endphp


                    <div class="form-group row">

                        <div class="form-group allcategories">
                            <label>Select your Menu</label>
                            <br>
                            @foreach($menus as $menu)
                            <input type="checkbox" name="home_page_menu[]" value="{{ $menu->id }}"
                                @if (in_array($menu->id, $arr_categories)) checked="checked" @endif
                            > &nbsp;&nbsp;{{ $menu->name }}
                            <br>
                            @endforeach

                        </div>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

</div>
<!-- /Page Wrapper -->
@endsection



@section('js')

@endsection