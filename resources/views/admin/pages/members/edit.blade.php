@extends("admin.layouts.layout")
@section("page_title", "Edit Member Message")

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
							<h3 class="m-portlet__head-text">Edit Member Message</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
							href="{{ route('admin.members.index') }}">
							<i class="la la-list"></i>Member Message List
						</a>
					</div>
				</div>

				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                      action="{{ route('admin.members.update', $member) }}"
                      method="POST"
                      enctype="multipart/form-data" >

                    @method('PATCH')
					@csrf

					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>Name<span class="text-danger">*</span></label>
								<input type="text" class="form-control m-input" placeholder="Name"
									name="name" value="{{ old('name')??data_get($member, "name") }}">
							</div>
                            <div class="col-lg-6">
                                <label>Designation<span class="text-danger">*</span></label>
                                <input type="text" class="form-control m-input" placeholder="Designation"
                                       name="designation" value="{{ old('designation')??data_get($member, "designation") }}">
                            </div>
						</div>

						<x-admin.image-field :data="['path'=>App\Enums\UploadFilePath::MEMBERS_PATH, 'value'=>data_get($member, 'image')]" />

						<div class="form-group m-form__group">
                            <label>Message<span class="text-danger">*</span></label>
                            <textarea class="tinymce form-control m-input" name="message"
                                      rows="25">{{ old('message')??data_get($member, "message") }}</textarea>
                        </div>

						<div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>Order<span class="text-danger">*</span></label>
                                <input type="number" class="form-control m-input" placeholder="Order"
                                       name="order" value="{{ old('order')??data_get($member, "order", 1) }}">
                            </div>
                            <div class="col-lg-6">
                                <x-admin.radio-status :data="['value' => data_get($member, 'status')]"/>
                            </div>
                        </div>

                        <x-admin.seo :data="data_get($member, 'seo')" />

					</div>

					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-6">
									<button type="submit" class="btn btn-primary">
										<i class="la la-upload"></i>
										Submit
									</button>
									<a href="{{ route('admin.members.index') }}"
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
