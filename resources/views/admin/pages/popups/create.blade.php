@extends("admin.layouts.layout")
@section("page_title", "Create Popup")

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
							<h3 class="m-portlet__head-text">Create Popup</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
							href="{{ route('admin.popups.index') }}">
							<i class="la la-list"></i> Popup List
						</a>
					</div>
				</div>

				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
					action="{{ route('admin.popups.store') }}" method="POST" enctype="multipart/form-data">

					@csrf

					<div class="m-portlet__body">

						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>Name<span class="text-danger">*</span></label>
								<input type="text"
                                       name="name"
                                       class="form-control m-input"
                                       placeholder="Name"
                                       value="{{ old('name') }}">
							</div>
                            <div class="col-lg-6">
                                <label>Title<span class="text-danger">*</span></label>
                                <input type="text"
                                       name="title"
                                       class="form-control m-input"
                                       placeholder="Title"
                                       value="{{ old('title') }}">
                            </div>
						</div>

						<x-admin.image-field :data="['required'=>true]" />

						<div class="form-group m-form__group">
                            <label>Description</label>
                            <textarea class="tinymce form-control m-input"
                                      name="description"
                                      rows="15">{{ old('description') }}</textarea>
                        </div>

						<div class="form-group m-form__group row">
							<div class="col-lg-8">
								<label>Link</label>
								<div class="m-input-icon m-input-icon--right">
									<input type="text"
                                           class="form-control m-input"
                                           name="link"
                                           value="{{ old('link') }}"
                                           placeholder="Link">
								</div>
							</div>
              
                            <div class="col-lg-2">
                                <x-admin.radio-status />
                            </div>
						</div>

						<div class="form-group m-form__group row">

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
									<a href="{{ route('admin.popups.index') }}" class="btn btn-danger text-light">
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
