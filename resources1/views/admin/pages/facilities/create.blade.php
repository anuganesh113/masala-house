@extends("admin.layouts.layout")
@section("page_title", "Create Facilities")

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
							<h3 class="m-portlet__head-text">Create Facilities</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
							href="{{ route('admin.facilities.index') }}">
							<i class="la la-list"></i> Facilities List
						</a>
					</div>
				</div>

				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                      action="{{ route('admin.facilities.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>Facility Name<span class="text-danger">*</span></label>
								<input type="text"
                                       name="name"
                                       class="form-control m-input"
                                       placeholder="Facility Name"
                                       value="{{ old('name') }}">
							</div>
							<div class="col-lg-6">
								<label>Facility Title<span class="text-danger">*</span></label>
								<input type="text"
                                       name="title"
                                       class="form-control m-input"
                                       placeholder="Facility Title"
                                       value="{{ old('title') }}">
							</div>
						</div>

                        <x-admin.image-field :data="[
                            'label' => 'Feature Icon',
                            'name' => 'icon',
                            'required' => true,
                        ]"
                        />

                        <x-admin.image-field :data="[
                            'label' => 'Feature Image',
                            'name' => 'image',
                            'required' => true,
                        ]"
                        />

						<div class="form-group m-form__group">
                            <label>Description<span class="text-danger">*</span></label>
                            <textarea class="summernote_reg form-control m-input"
                                      name="description"
                                      rows="25">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>Facility Tag<span class="text-danger">*</span></label>
                                <input type="text"
                                       name="tag"
                                       class="form-control m-input"
                                       placeholder="Facility Tag"
                                       value="{{ old('tag') }}">
                            </div>
                            <div class="col-lg-4">
                                <x-admin.radio-status />
                            </div>
                            <div class="col-lg-4">
                                <label>Order<span class="text-danger">*</span></label>
                                <input type="number"
                                       name="order"
                                       class="form-control m-input"
                                       value="{{ old('order') ?? 1 }}">
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
									<a href="{{ route('admin.facilities.index') }}"
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
