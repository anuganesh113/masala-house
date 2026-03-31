@extends("admin.layouts.layout")
@section("page_title", "Home Page")

@section("content")
<div class="m-content">

    @include("admin.includes.errors")

    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">Home Page</h3>
                        </div>
                    </div>

                </div>

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                    action="{{ route('admin.settingUpdate') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-md-6">
                                <label>II Section Heading<span class="text-danger"></span></label>
                                <input type="text"
                                    name="section_2_heading"
                                    class="form-control m-input mb-2"
                                    placeholder="II Section Heading"
                                    value="{{ $setting['section_2_heading'] ?? '' }}" />
                                <label>II Section Title<span class="text-danger "></span></label>
                                <input type="text"
                                    name="section_2_title"
                                    class="form-control m-input mt-2"
                                    placeholder="Title"
                                    value="{{ $setting['section_2_title'] ?? '' }}" />

                                @php

                                $arr_categories = [];
                                if (isset($setting['section_2_menu']) && !empty($setting['section_2_menu'])) {
                                $arr_categories = json_decode($setting['section_2_menu']);
                                }
                                @endphp

                                <div class="col-lg-12 mt-4" >
                                    <label>Select Menus for II Section <span class="text-danger">*</span> </label>
                                    <div class="" style="max-height: 350px;overflow-y: scroll;padding: 5px 10px;">
                                        @foreach($menus as $menu)
                                        <input type="checkbox" class="" name="section_2_menu[]" value="{{ $menu->id }}"
                                            @if (in_array($menu->id, $arr_categories)) checked="checked" @endif
                                        > &nbsp;&nbsp;{{ $menu->name }}
                                        <br>
                                        @endforeach



                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <label>III Section Heading<span class="text-danger"></span></label>
                                <input type="text"
                                    name="section_3_heading"
                                    class="form-control m-input mb-2"
                                    placeholder="III Section Heading"
                                    value="{{ $setting['section_3_heading'] ?? '' }}" />

                                <label>III Section Title<span class="text-danger ">*</span></label>
                                <input type="text"
                                    name="section_3_title"
                                    class="form-control m-input mt-2"
                                    placeholder="Title"
                                    value="{{ $setting['section_3_title'] ?? '' }}" *>  



                                    @php

                                $arr_3_categories = [];
                                if (isset($setting['section_3_menu']) && !empty($setting['section_3_menu'])) {
                                $arr_3_categories = json_decode($setting['section_3_menu']);
                                }
                                @endphp

                                <div class="col-lg-12 mt-4" >
                                    <label>Select Menus for III Section <span class="text-danger">*</span> </label>
                                    <div class=""  style="max-height: 350px;overflow-y: scroll;padding: 5px 10px;">
                                        @foreach($menus as $menu)
                                        <input type="checkbox" class="" name="section_3_menu[]" value="{{ $menu->id }}"
                                            @if (in_array($menu->id, $arr_3_categories)) checked="checked" @endif
                                        > &nbsp;&nbsp;{{ $menu->name }}
                                        <br>
                                        @endforeach



                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
            </div>













            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-upload"></i>
                                Submit
                            </button>

                        </div>
                    </div>
                </div>
            </div>

            </form>

        </div>
    </div>
</div>
</div>
@endsection



@section('js')

@endsection