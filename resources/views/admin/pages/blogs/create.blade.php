@extends('admin.layouts.layout')
@section('page_title', 'Create Blog')

@section('content')
<div class='m-content'>

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
							<h3 class="m-portlet__head-text">Create Blog</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
							href="{{ route('admin.blogs.index') }}">
							<i class="la la-list"></i> Blogs List
						</a>
					</div>
				</div>

				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                      action="{{ route('admin.blogs.store') }}"
                      method="POST"
                      enctype="multipart/form-data" >

					@csrf

					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-lg-3">
								<label>Tag</label>
								<input type="text"
                                       name="tag"
                                       class="form-control m-input"
                                       placeholder="Tag"
                                       value="{{ old('tag') }}">
							</div>
							<div class="col-lg-9">
								<label>Name<span class="text-danger">*</span></label>
								<input type="text"
                                       name="name"
                                       class="form-control m-input"
                                       placeholder="Name"
                                       value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<label>Slug<span class="text-danger">*</span></label>
								<input type="text"
                                       name="slug"
                                       class="form-control m-input"
                                       placeholder="Slug"
                                       value="{{ old('slug') }}">
							</div>
						</div>

						<x-admin.image-field :data="[ 'required' => true ]"/>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <label>Image Alt<span class="text-danger">*</span></label>
                                <input type="text"
                                       name="image_alt"
                                       class="form-control m-input"
                                       placeholder="Image Alt"
                                       value="{{ old('image_alt') }}">
                            </div>
                        </div>

						<div class="form-group m-form__group">
                            <label>Excerpt</label>
                            <textarea class="tinymce form-control m-input"
                                      name="excerpt"
                                      rows="15">{{ old('excerpt') }}</textarea>
                        </div>

						<div class="form-group m-form__group">
                            <label>Description</label>
                            <textarea class="tinymce form-control m-input"
                                      name="description"
                                      rows="25">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>Author<span class="text-danger">*</span></label>
                                <input type="text"
                                       name="author"
                                       class="form-control m-input"
                                       placeholder="Author"
                                       value="{{ old('author') }}">
                            </div>
                            <div class="col-lg-6">
                                <x-admin.radio-status />
                            </div>
                        </div>

                        <x-admin.seo :data="[]"/>
					</div>

					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-6">
									<button type="submit" class="btn btn-primary">
										<i class="la la-upload"></i>
										Submit
									</button>
									<a href="{{ route('admin.blogs.index') }}"
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
