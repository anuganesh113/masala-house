@extends("admin.layouts.layout")
@section("page_title", "Create Gallery")

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
							<h3 class="m-portlet__head-text">Create Gallery</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
							href="{{ route('admin.galleries.index') }}">
							<i class="la la-list"></i> Gallery List
						</a>
					</div>
				</div>

				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" \
                      action="{{ route('admin.galleries.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

					@csrf

					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-lg-8">
								<label>Name<span class="text-danger">*</span></label>
								<input type="text"
                                       name="name"
                                       class="form-control m-input"
                                       placeholder="Name"
                                       value="{{ old("name") }}"
                                />
							</div>
                            <div class="col-lg-4">
                                <label>Order<span class="text-danger">*</span></label>
                                <input type="number"
                                       name="order"
                                       class="form-control m-input"
                                       value="{{ old('order') ?? 1 }}">
                            </div>
						</div>

                        <x-admin.image-field :data="['required' => true]"/>

						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
                                    Gallery
                                    <span class="text-danger">*
                                        Max {{ \App\Constants\General::GALLERY_ALLOWED }} Images at a time
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
									<a href="{{ route('admin.galleries.index') }}"
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
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/5/tinymce.min.js" referrerpolicy="origin" defer></script>
    <script src="{{ asset('admin-assets/custom-js/tinymce-script.js') }}" defer></script>
@endpush
