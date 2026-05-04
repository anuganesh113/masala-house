@extends("admin.layouts.layout")
@section("page_title", "Create FAQs")

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
							<h3 class="m-portlet__head-text">Create FAQs {{ $model->name ?? '' }}</h3>
						</div>
					</div>
					@php
					$route = route('admin.faqs.index');
					if (isset($faq) && $faq) {

					$route = route('admin.' . request()->segment(5) . 's.index');
					} else {
					$route = route('admin.' . request()->segment(4) . 's.index');
					}


					@endphp

					<div class="m-portlet__head-tools">
						<a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
							href="{{ $route }}">
							<i class="la la-list"></i> {{ isset($faq) ? request()->segment(5) : request()->segment(4) }} List
						</a>
					</div>
				</div>


				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
					action="{{ isset($faq) ? route('admin.faqtypestore', $faq->id) : route('admin.faqtypestore') }}"
					method="POST"
					enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="model_type" value="{{  $faq->model_type ?? request()->segment(4) }}">
					<input type="hidden" name="model_id" value="{{ $model->id ?? '' }}">
					<input type="hidden" name="faq_id" value="{{ $faq->id ?? '' }}">

					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<label>Question<span class="text-danger">*</span></label>
								<input type="text"
									name="question"
									class="form-control m-input"
									placeholder="Question"
									value="{{ old('question') ?? $faq->question ?? '' }}" />
							</div>
						</div>

						<div class="form-group m-form__group col-lg-12">
							<label>Answer<span class="text-danger">*</span></label>
							<textarea class="form-control m-input summernote_reg"
								name="answer"
								placeholder="Answer"
								rows="15">{{ old('answer') ?? $faq->answer ?? '' }}</textarea>
						</div>
						<div class="form-group m-form__group  row">
							<div class="col-lg-8">
								<label>Order<span class="text-danger">*</span></label>
								<input type="number"
									name="order"
									class="form-control m-input"
									placeholder="Order"
									value="{{ old('order') ?? $faq->order ?? 1 }}" />
							</div>

							<div class="col-lg-4 mt-4">
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
									@if(isset($faq) && $faq)

									  <a href="{{ route('admin.faqtype', ['type' => request()->segment(5),'id' => $model->id]) }}"
										class="btn btn-danger text-light">

									@else
	                                 <a href="{{ route('admin.faqtype', ['type' => request()->segment(4),'id' => request()->segment(5)]) }}"
										class="btn btn-danger text-light">
										@endif
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