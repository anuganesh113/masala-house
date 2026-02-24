@extends("admin.layouts.layout")
@section("page_title", "Create Advertise")

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
                                <h3 class="m-portlet__head-text">Create Advertise</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
                               href="{{ route('admin.advertises.index') }}">
                                <i class="la la-list"></i> Advertise List
                            </a>
                        </div>
                    </div>

                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                          action="{{ route('admin.advertises.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="m-portlet__body">

                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Advertise Name<span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="name"
                                           class="form-control m-input"
                                           placeholder="Advertise Name"
                                           value="{{ old('name') }}">
                                </div>
                                <div class="col-lg-6">
                                    <label>Link</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text"
                                               class="form-control m-input"
                                               name="link"
                                               value="{{ old('link') }}"
                                               placeholder="Link">
                                    </div>
                                </div>
                            </div>

                            <x-admin.image-field :data="['required'=>true]" />

                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Order</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="number"
                                               name="order"
                                               class="form-control m-input"
                                               value="{{ old('order')??1 }}"
                                               placeholder="Order">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Advertise Type<span class="text-danger">*</span> </label>
                                    <div class="m-checkbox-inline">
                                        @foreach(App\Enums\AdvertiseType::getValues() as $type)
                                            <label class="m-checkbox m-checkbox--bold m-checkbox--state-primary">
                                                <input type="radio"
                                                       name="type"
                                                       value="{{ $type }}"
                                                    @checked($loop->first)
                                                >
                                                {{ ucwords($type) }}
                                                <span></span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <x-admin.radio-status />
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
                                        <a href="{{ route('admin.advertises.index') }}" class="btn btn-danger text-light">
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
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/5/tinymce.min.js" referrerpolicy="origin" defer></script>
    <script src="{{ asset('admin-assets/custom-js/tinymce-script.js') }}" defer></script>
@endpush
