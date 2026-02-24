@extends("admin.layouts.layout")
@section("page_title", "Edit Blog")

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
							<h3 class="m-portlet__head-text">Edit Blog</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
							href="{{ route('admin.blogs.index') }}">
							<i class="la la-list"></i> Blog List
						</a>
					</div>
				</div>

				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
					action="{{ route('admin.blogs.update', $blog) }}"
					method="POST" enctype="multipart/form-data" >

                    @method('PATCH')
					@csrf

					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
                            <div class="col-lg-3">
                                <label>Tag</label>
                                <input type="text"
                                       name="tag"
                                       class="form-control m-input"
                                       placeholder="Tag"
                                       value="{{ old('tag') ?? data_get($blog, 'tag') }}">
                            </div>
							<div class="col-lg-9">
								<label>Name<span class="text-danger">*</span></label>
								<input type="text"
                                       class="form-control m-input"
                                       placeholder="Name"
                                       name="name"
                                       value="{{ old('name') ?? data_get($blog, 'name') }}">
							</div>
							<div class="col-lg-12">
								<label>Slug<span class="text-danger">*</span></label>
								<input type="text"
                                       class="form-control m-input"
                                       placeholder="Slug"
                                       name="slug"
                                       value="{{ old('slug')??data_get($blog, 'slug') }}">
							</div>
						</div>

						<x-admin.image-field :data="[
                            'path'=>App\Enums\UploadFilePath::BLOGS_PATH,
                            'value'=>data_get($blog, 'image')]"
                        />

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <label>Image Alt<span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control m-input"
                                       placeholder="Image Alt"
                                       name="image_alt"
                                       value="{{ old('image_alt')??data_get($blog, 'image_alt') }}">
                            </div>
                        </div>

						<div class="form-group m-form__group">
                            <label>Excerpt</label>
                            <textarea class="tinymce form-control m-input"
                                      name="excerpt"
                                      rows="15">{{ old('excerpt')??data_get($blog, 'excerpt') }}</textarea>
                        </div>

						<div class="form-group m-form__group">B
                            <label>Description</label>
                            <textarea class="tinymce form-control m-input"
                                      name="description"
                                      rows="25">{{ old('description')??data_get($blog, 'description') }}</textarea>
                        </div>

						<div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>Author<span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control m-input"
                                       placeholder="Author"
                                       name="author"
                                       value="{{ old('author')??data_get($blog, 'author') }}">
                            </div>
							<div class="col-lg-6">
                                <x-admin.radio-status :data="['value' => data_get($blog, 'status')]"/>
							</div>
                        </div>

                        <x-admin.seo :data="data_get($blog, 'seo')" />

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
