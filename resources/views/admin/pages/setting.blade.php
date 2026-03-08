@extends("admin.layouts.layout")
@section("page_title", "Website Setting")

@section("content")
<div class="m-content">

    @include('admin.includes.errors')

    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">

                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">Website Setting</h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
                            href="{{ route('admin.dashboard') }}">
                            <i class="la la-list"></i> Admin Dashboard
                        </a>
                    </div>
                </div>

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                    action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data" >

                    @csrf

                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control m-input"
                                    placeholder="Name" value="{{ old('name')??data_get($setting, "name") }}">
                            </div>
                            <div class="col-lg-6">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control m-input"
                                    placeholder="Email" value="{{ old('email')??data_get($setting, "email") }}">
                            </div>

                        </div>

                        <x-admin.image-field :data="[
                            'label' => 'Logo',
                            'name' => 'logo',
                            'path' => \App\Enums\UploadFilePath::LOGO_PATH,
                            'value' => data_get($setting, 'color_logo')
                        ]"
                        />

                        <x-admin.image-field :data="[
                            'label' => 'White Logo',
                            'name' => 'white_logo',
                            'path' => \App\Enums\UploadFilePath::LOGO_PATH,
                            'value' => data_get($setting, 'white_logo')
                        ]"
                        />

                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>Contact</label>
                                <input type="number" name="contact" class="form-control m-input"
                                    placeholder="Contact" value="{{ old('contact')??data_get($setting, "contact") }}">
                            </div>
                            <div class="col-lg-4">
                                <label>Phone</label>
                                <input type="number" name="phone" class="form-control m-input"
                                    placeholder="Phone" value="{{ old('phone')??data_get($setting, "phone") }}">
                            </div>
                            <div class="col-lg-4">
                                <label>Address</label>
                                <div class="m-input-icon m-input-icon--right">
                                    <input type="text" class="form-control m-input" name="address"
                                           value="{{ old('address')??data_get($setting, "address") }}"
                                           placeholder="Address">
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <label>Google Map</label>
                                <div class="m-input-icon m-input-icon--right">
                                    <input type="text" class="form-control m-input" name="metadata[google_map_address]"
                                        value="{{ old('metadata.google_map_address')??data_get($setting, "metadata.google_map_address") }}"
                                        placeholder="Google Map Address">
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-form__group">
                            <label>Google Map Iframe<span class="text-danger">*</span></label>
                            <textarea class="form-control m-input"
                                      name="metadata[google_map_iframe]"
                                      rows="7">{{ old('metadata.google_map_iframe')??data_get($setting, "metadata.google_map_iframe") }}</textarea>
                        </div>

                        {{--<div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <table width="100%">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Count</th>
                                        <th>Unit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(range(0, 3) as $range)
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control m-input" name="metadata[title][{{$range}}]"
                                                       value="{{ old('metadata.title.'.$range)??data_get($setting, 'metadata.title.'.$range) }}"
                                                       placeholder="Title">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control m-input" name="metadata[count][{{$range}}]"
                                                       value="{{ old('metadata.count.'.$range)??data_get($setting, 'metadata.count.'.$range) }}"
                                                       placeholder="Count">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control m-input" name="metadata[unit][{{$range}}]"
                                                       value="{{ old('metadata.unit.'.$range)??data_get($setting, 'metadata.unit.'.$range) }}"
                                                       placeholder="Unit">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>--}}

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <label>Footer Text</label>
                                <textarea class="summernote_reg form-control m-input" name="footer_text"
                                rows="7">{{ old("footer_text")??data_get($setting, "footer_text") }}</textarea>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>Facebook Link</label>
                                <div class="m-input-icon m-input-icon--right">
                                    <input type="text" class="form-control m-input" name="social[facebook]"
                                           value="{{ old('social.facebook')??data_get($setting, "social.facebook") }}"
                                           placeholder="Facebook Link">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Youtube Link</label>
                                <div class="m-input-icon m-input-icon--right">
                                    <input type="text" class="form-control m-input" name="social[youtube]"
                                           value="{{ old('social.youtube')??data_get($setting, "social.youtube") }}"
                                           placeholder="youtube link">
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>Instagram Link</label>
                                <div class="m-input-icon m-input-icon--right">
                                    <input type="text" class="form-control m-input" name="social[instagram]"
                                           value="{{ old('social.instagram')??data_get($setting, "social.instagram") }}"
                                           placeholder="Instagram Link">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Twitter Link</label>
                                <div class="m-input-icon m-input-icon--right">
                                    <input type="text" class="form-control m-input" name="social[twitter]"
                                           value="{{ old('social.twitter')??data_get($setting, "social.twitter") }}"
                                           placeholder="Twitter Link">
                                </div>
                            </div>
                        </div>

                        <x-admin.seo :data="data_get($setting, 'seo', [])" />

                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-upload"></i>
                                        Submit
                                    </button>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-danger text-light">
                                        <i class="la la-close"></i>
                                        Cancel
                                    </a>
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
