@extends("admin.layouts.layout")
@section("page_title", "Edit Menu")

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
                            <h3 class="m-portlet__head-text">Edit Menu</h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
                            href="{{ route('admin.menus.index') }}">
                            <i class="la la-list"></i> Menu List
                        </a>
                    </div>
                </div>

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                    action="{{ route('admin.menus.update', $menu) }}"
                    method="POST" enctype="multipart/form-data">

                    @method('PATCH')
                    @csrf

                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>Category<span class="text-danger">*</span></label>
                                <select class="form-control m-input m-input--square" name="category_id">
                                    <option selected value="">-- SELECT --</option>
                                    @foreach($categories ?? [] as $value)
                                    <option value="{{ $value->id }}"
                                        @selected($menu->category->id == $value->id)
                                        >
                                        {{ ucwords($value->name) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-8">
                                <label>Menu Name<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control m-input"
                                    placeholder="Menu Name"
                                    name="name"
                                    value="{{ old('name')??data_get($menu, "name") }}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <label>Menu Slug<span class="text-danger"></span></label>
                                <input type="text"
                                    class="form-control m-input"
                                    placeholder="Menu Slug"
                                    name="slug"
                                    value="{{ old('slug')??data_get($menu, "slug") }}">
                            </div>
                        </div>

                        <x-admin.image-field :data="[
                            'path'=>App\Enums\UploadFilePath::MENUS_PATH,
                            'value'=>data_get($menu, 'image')]" />

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <label>Image Alt<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control m-input"
                                    placeholder="Image Alt"
                                    name="image_alt"
                                    value="{{ old('image_alt')??data_get($menu, "image_alt") }}">
                            </div>
                        </div>

                        <div class="form-group m-form__group">
                            <label>Excerpt</label>
                            <textarea class="summernote_reg form-control m-input"
                                name="excerpt"
                                rows="15">{{ old('excerpt')??data_get($menu, "excerpt") }}</textarea>
                        </div>

                        <div class="form-group m-form__group">
                            <label>Description</label>
                            <textarea class="summernote_reg form-control m-input"
                                name="description"
                                rows="25">{{ old('description')??data_get($menu, "description") }}</textarea>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-3">
                                <label>Old Price</label>
                                <input type="text"
                                    name="old_price"
                                    class="form-control m-input"
                                    placeholder="Old Price"
                                    value="{{ old('old_price') ?? data_get($menu, 'old_price') }}">
                            </div>
                            <div class="col-lg-3">
                                <label>Price<span class="text-danger">*</span></label>
                                <input type="text"
                                    name="price"
                                    class="form-control m-input"
                                    placeholder="Price"
                                    value="{{ old('price') ?? data_get($menu, 'price') }}">
                            </div>
                            <div class="col-lg-3">
                                <label>Advertise Type<span class="text-danger">*</span> </label>
                                <div class="m-checkbox-inline">
                                    @foreach(App\Enums\FoodType::getValues() as $type)
                                    <label @class(["m-checkbox", "m-checkbox--bold" , "m-checkbox--state-success"=> $loop->first, "m-checkbox--state-danger" => $loop->last])>
                                        <input type="radio"
                                            name="type"
                                            value="{{ $type }}"
                                            @checked($type===$menu->type)
                                        >
                                        {{ ucwords($type) }}
                                        <span></span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-admin.radio-status :data="['value' => data_get($menu, 'status')]" />
                            </div>
                        </div>

                        <x-admin.seo :data="data_get($menu, 'seo')" />

                    </div>

                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-upload"></i>
                                        Submit
                                    </button>
                                    <a href="{{ route('admin.menus.index') }}"
                                        class="btn btn-danger text-light">
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

@push("footer")
@include('_helpers._summernote')
<script src="https://cdn.tiny.cloud/1/{{ env('summernote_reg_API_KEY') }}/summernote_reg/5/summernote_reg.min.js" referrerpolicy="origin" defer></script>
<script src="{{ asset('admin-assets/custom-js/summernote_reg-script.js') }}" defer></script>
@endpush