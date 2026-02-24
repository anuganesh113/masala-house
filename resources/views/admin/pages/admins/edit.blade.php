@extends("admin.layouts.layout")
@section("page_title", "Edit Admin")

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
							<h3 class="m-portlet__head-text">Edit Admin</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
							href="{{ route('admin.admins.index') }}">
							<i class="la la-list"></i> Admin List
						</a>
					</div>
				</div>

				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
					action="{{ route('admin.admins.update', $admin->id) }}"
					method="POST" enctype="multipart/form-data" >

                    @method('PATCH')
					@csrf

					<div class="m-portlet__body">

						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>Name<span class="text-danger">*</span></label>
								<input type="text"
                                       name="name"
                                       class="form-control m-input"
                                       placeholder="Name"
                                       value="{{ old('name')??data_get($admin, "name") }}">
							</div>
							<div class="col-lg-6">
								<label>Email<span class="text-danger">*</span></label>
								<input type="email"
                                       name="email"
                                       class="form-control m-input"
                                       placeholder="Email" value="{{ old('email')??data_get($admin, "email") }}">
							</div>
						</div>

                        <x-admin.image-field :data="[
                            'label' => 'Profile',
                            'name' => 'profile',
                            'mimes' => \App\Enums\Mimes::IMG,
                            'max' => \App\Enums\Max::IMAGE,
                            'path' => \App\Enums\UploadFilePath::ADMINS_PATH,
                            'value' => data_get($admin, 'profile')
                        ]"
                        />

                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>Status<span class="text-danger">*</span></label>
                                <div class="m-checkbox-inline">
                                    <label class="m-checkbox m-checkbox--solid">
                                        <input type="radio"
                                               name="status"
                                               value="1"
                                               checked
                                        />
                                        Active
                                        <span></span>
                                    </label>
                                    <label class="m-checkbox m-checkbox--solid">
                                        <input type="radio"
                                               name="status"
                                               value="0"
                                            {{ !data_get($admin, "status") ? 'checked' : '' }}
                                        />
                                        Banned
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Contact</label>
                                <div class="m-input-icon m-input-icon--right">
                                    <input type="number" class="form-control m-input" name="contact"
                                           placeholder="Contact" value="{{ old('contact')??data_get($admin, "contact") }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Address</label>
                                <div class="m-input-icon m-input-icon--right">
                                    <input type="text" class="form-control m-input" name="address"
                                           placeholder="Address" value="{{ old('address')??data_get($admin, "address") }}">
                                </div>
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
									<a href="{{ route('admin.admins.index') }}" class="btn btn-danger text-light">
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
