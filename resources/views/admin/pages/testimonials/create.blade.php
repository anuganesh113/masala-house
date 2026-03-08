@extends("admin.layouts.layout")
@section("page_title", "Create Testimonial")

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
							<h3 class="m-portlet__head-text">Create Testimonial</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
							href="{{ route('admin.testimonials.index') }}">
							<i class="la la-list"></i>
                            Testimonial List
						</a>
					</div>
				</div>
				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
					action="{{ route('admin.testimonials.store') }}"
					method="POST" enctype="multipart/form-data" >
					@csrf
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>Member</label>
                                <select class="form-control m-input m-input--square" name="member_message_id">
                                    <option selected value="">-- SELECT --</option>
                                    @foreach($members??[] as $value)
                                        <option value="{{ $value->id }}" @checked([$value->id == old('member_message_id')])>
                                            {{ ucwords($value->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
							<div class="col-lg-8">
								<label>Name<span class="text-danger">*</span></label>
								<input type="text" name="name" class="form-control m-input"
                                       placeholder="Name" value="{{ old('name') }}">
							</div>
						</div>

                        <x-admin.image-field />

						<div class="form-group m-form__group">
                            <label>Message<span class="text-danger">*</span></label>
                            <textarea class="summernote_reg form-control m-input" name="message"
                                      rows="15">{{ old('message') }}</textarea>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
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
									<a href="{{ route('admin.testimonials.index') }}"
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
