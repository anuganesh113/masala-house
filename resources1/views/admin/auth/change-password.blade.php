@extends("admin.layouts.layout")
@section("page_title", "Change Password")

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
                                <h3 class="m-portlet__head-text">Change Password</h3>
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
                          action="{{ route('admin.update.password') }}" method="POST" enctype="multipart/form-data" >

                        @csrf

                        <div class="m-portlet__body">

                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label>Current Password<span class="text-danger">*</span></label>
                                    <input type="password"
                                           name="current_password"
                                           class="form-control m-input"
                                           placeholder="current password"
                                    />
                                    @error("current_password")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label>New Password<span class="text-danger">*</span></label>
                                    <input type="password"
                                           name="new_password"
                                           class="form-control m-input"
                                           placeholder="new password"
                                    />
                                    @error("new_password")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label>Confirm Password<span class="text-danger">*</span></label>
                                    <input type="password"
                                           name="confirm_password"
                                           class="form-control m-input"
                                           placeholder="confirm password"
                                    />
                                    @error("confirm_password")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-upload"></i>
                                            Update
                                        </button>
                                        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger text-light">
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
