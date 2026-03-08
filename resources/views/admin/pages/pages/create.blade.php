@extends("admin.layouts.layout")
@section("page_title", "Create Page")

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
							<h3 class="m-portlet__head-text">Create Page</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
							href="{{ route('admin.pages.index') }}">
							<i class="la la-list"></i> Page List
						</a>
					</div>
				</div>
				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
					action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data" >

					@csrf

					<div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-3">
                                <label>Parent Page</label>
                                <select class="form-control m-input m-input--square" name="parent">
                                    <option selected value="">-- SELECT --</option>
                                    @foreach($pages??[] as $value)
                                        <option value="{{ data_get($value, 'id') }}" >
                                            {{ ucwords(data_get($value, 'name')) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>Name<span class="text-danger">*</span></label>
                                <input type="text"
                                       name="name"
                                       class="form-control m-input"
                                       placeholder="Name"
                                       value="{{ old('name') }}"
                                />
                            </div>
                            <div class="col-lg-5">
                                <label>Title</label>
                                <input type="text"
                                       name="title"
                                       class="form-control m-input"
                                       placeholder="Title"
                                       value="{{ old('title') }}"
                                />
                            </div>
                        </div>

                        <x-admin.image-field :data="[
                            'label' => 'Image One',
                            'name' => 'image_one',
                        ]"
                        />

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <label>Image One Alt</label>
                                <input type="text"
                                       name="image_one_alt"
                                       class="form-control m-input"
                                       placeholder="Image One Alt"
                                       value="{{ old('image_one_alt') }}"
                                />
                            </div>
                        </div>

                        <x-admin.image-field :data="[
                            'label' => 'Image Two',
                            'name' => 'image_two',
                        ]"
                        />

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <label>Image Two Alt</label>
                                <input type="text"
                                       name="image_two_alt"
                                       class="form-control m-input"
                                       placeholder="Image Two Alt"
                                       value="{{ old('image_two_alt') }}"
                                />
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>
                                    Images
                                    <span class="text-danger">*
                                        Max {{ \App\Constants\General::EVENT_GALLERY_ALLOWED }} Images at a time
                                        (MAX: {{ strtoupper(\App\Enums\Max::IMAGE) }} each)
                                    </span>
                                </label>
                                <div></div>
                                <div class="custom-file" style="width:60%">
                                    <input type="file"
                                           name="images[]"
                                           class="custom-file-input"
                                           multiple
                                           id="customFile"
                                           accept="{{ allowedExtensions(explode(',', \App\Enums\Mimes::IMG)) }}"
                                    />
                                    <label class="custom-file-label selected" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>

						<div class="form-group m-form__group">
                            <label>Excerpt</label>
                            <textarea class="summernote_reg form-control m-input"
                                      name="excerpt"
                                      rows="15">{{ old("excerpt") }}</textarea>
                        </div>

                        <div class="form-group m-form__group">
                            <label>Description</label>
                            <textarea class="summernote_reg form-control m-input"
                                      name="description"
                                      rows="25">{{ old("description") }}</textarea>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>Template<span class="text-danger">*</span></label>
                                <div class="m-input-icon m-input-icon--right">
                                    <input type="text"
                                           class="form-control m-input"
                                           name="template"
                                           value="{{ old('template', 'common-page') }}"
                                           placeholder="Page"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Order<span class="text-danger">*</span></label>
                                <div class="m-input-icon m-input-icon--right">
                                    <input type="number" name="order" class="form-control m-input"
                                           value="{{ old('order') ?? 1 }}" placeholder="Order">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <x-admin.radio-status />
                            </div>
                        </div>

                        <x-admin.seo :data="[]" />

					</div>
					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-6">
									<button type="submit" class="btn btn-primary">
										<i class="la la-upload"></i>
										Submit
									</button>
									<a href="{{ route('admin.pages.index') }}" class="btn btn-danger text-light">
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
    <script src="https://cdn.tiny.cloud/1/{{ env('summernote_reg_API_KEY') }}/summernote_reg/5/summernote_reg.min.js" referrerpolicy="origin" defer></script>
    <script src="{{ asset('admin-assets/custom-js/summernote_reg-script.js') }}" defer></script>
@endpush
