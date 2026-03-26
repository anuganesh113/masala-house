@extends("admin.layouts.layout")
@section("page_title", "Edit Event")

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
							<h3 class="m-portlet__head-text">Edit Event</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
							href="{{ route('admin.events.index') }}">
							<i class="la la-list"></i> Event List
						</a>
					</div>
				</div>

				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
					action="{{ route('admin.events.update', $event->id) }}"
					method="POST"
					enctype="multipart/form-data">

					@method('PATCH')
					@csrf

					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-lg-10">
								<label>Event Name<span class="text-danger">*</span></label>
								<input type="text"
									class="form-control m-input mb-3"
									placeholder=" Name"
									name="name"
									value="{{ old('name')??data_get($event, "name") }}" />



								<label>Event Title<span class="text-danger ">*</span></label>
								<input type="text"
									name="metadata[title]"
									class="form-control m-input mt-2"
									placeholder="Title"
									value="{{ old('metadata.title')??data_get($event, "metadata.title") }}" />
							</div>
							<div class="col-lg-2">
								<x-admin.radio-status :data="['value' => data_get($event, 'status')]" />



								<div class="col-lg-12 mt-4">
									<input type="hidden" name="model_type" value="event">
									<label>Select Event Type<span class="text-danger">*</span></label>
									<select class="form-control m-input m-input--square" name="type">
										<option selected value="">-- SELECT --</option>

										<option value="1" {{ $event && $event->type == 1 ? 'selected' : '' }}>Event</option>
										<option value="2" {{ $event && $event->type == 2 ? 'selected' : '' }}>Catering</option>



									</select>
								</div>
							</div>
						</div>
					</div>



					<x-admin.image-field :data="['path'=>App\Enums\UploadFilePath::EVENT_PATH, 'value'=>data_get($event, 'image')]" />


					<div class="form-group m-form__group">
						<label>Excerpt<span class="text-danger">*</span></label>
						<textarea class=" form-control m-input" name="excerpt"
							rows="10">{{ old('excerpt')??data_get($event, "excerpt") }}</textarea>
					</div>

					<div class="form-group m-form__group">
						<label>Description<span class="text-danger">*</span></label>
						<textarea class="summernote_reg form-control m-input" name="description"
							rows="25">{{ old('description')??data_get($event, "description") }}</textarea>
					</div>

					<x-admin.seo :data="data_get($event, 'seo')" />

					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-6">
									<button type="submit" class="btn btn-primary">
										<i class="la la-upload"></i>
										Submit
									</button>
									<a href="{{ route('admin.events.index') }}"
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
<script src="https://cdn.tiny.cloud/1/{{ env('summernote_reg_API_KEY') }}/summernote_reg/5/summernote_reg.min.js" referrerpolicy="origin" defer></script>
<script src="{{ asset('admin-assets/custom-js/summernote_reg-script.js') }}" defer></script>
@endpush