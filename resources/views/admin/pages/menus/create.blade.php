@extends("admin.layouts.layout")
@section("page_title", "Create Menu")

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
							<h3 class="m-portlet__head-text">Create Menu</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
							href="{{ route('admin.menus.index') }}">
							<i class="la la-list"></i> Menus List
						</a>
					</div>
				</div>

				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                      action="{{ route('admin.menus.store') }}"
                      method="POST"
                      enctype="multipart/form-data" >

					@csrf

					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>Category<span class="text-danger">*</span></label>
                                <select class="form-control m-input m-input--square" name="category_id">
                                    <option selected value="">-- SELECT --</option>
                                    @foreach($categories ?? [] as $value)
                                        <option value="{{ $value->id }}"
                                            @selected(old('category') == $value->id)
                                        >
                                            {{ ucwords($value->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
							<div class="col-lg-8">
								<label>Name<span class="text-danger">*</span></label>
								<input type="text"
                                       name="name"
                                       class="form-control m-input"
                                       placeholder="Name"
                                       value="{{ old('name') }}">
							</div>
						</div>

						<x-admin.image-field :data="[
                            'required' => true
                        ]"/>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <label>Image Alt</label>
                                <input type="text"
                                       name="image_alt"
                                       class="form-control m-input"
                                       placeholder="Name"
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
                            <div class="col-lg-3">
                                <label>Old Price</label>
                                <input type="text"
                                       name="old_price"
                                       class="form-control m-input"
                                       placeholder="Old Price"
                                       value="{{ old('old_price') }}">
                            </div>
                            <div class="col-lg-3">
                                <label>Price<span class="text-danger">*</span></label>
                                <input type="text"
                                       name="price"
                                       class="form-control m-input"
                                       placeholder="Price"
                                       value="{{ old('price') }}">
                            </div>
                            <div class="col-lg-3">
                                <label>Advertise Type<span class="text-danger">*</span> </label>
                                <div class="m-checkbox-inline">
                                    @foreach(App\Enums\FoodType::getValues() as $type)
                                        <label @class(["m-checkbox", "m-checkbox--bold", "m-checkbox--state-success" => $loop->first, "m-checkbox--state-danger" => $loop->last])>
                                            <input type="radio"
                                                   name="type"
                                                   value="{{ $type }}"
                                                @checked($loop->first)
                                            >
                                            {{ ucwords($type) }}
                                            <span></span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-3">
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
									<a href="{{ route('admin.menus.index') }}"
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
