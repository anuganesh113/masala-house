@extends("admin.layouts.layout")
@section("page_title", "Create Deal")
@push('header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush


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
							<h3 class="m-portlet__head-text">Create Deal</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
							href="{{ route('admin.deals.index') }}">
							<i class="la la-list"></i> Deal List
						</a>
					</div>
				</div>

				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
					action="{{ route('admin.deals.store') }}" method="POST" enctype="multipart/form-data">

					@csrf

					<div class="m-portlet__body">

						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>Name<span class="text-danger">*</span></label>
								<input type="text"
									name="name"
									class="form-control m-input"
									placeholder="Name"
									value="{{ old('name') }}" required>
							</div>
							<div class="col-lg-6">
								<label>Link</label>
								<div class="m-input-icon m-input-icon--right">
									<input type="text"
										class="form-control m-input"
										name="link"
										value="{{ old('link') }}"
										placeholder="Link">
								</div>
							</div>
						</div>

						<x-admin.image-field :data="['label' => 'Image', 'name' => 'image', ]" />

						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<label>Excerpt</label>
								<textarea class="form-control m-input"
									name="excerpt"
									rows="4">{{ old('excerpt') }}</textarea>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<label>Description</label>
								<textarea class="summernote_reg form-control m-input"
									name="description"
									rows="4">{{ old('description') }}</textarea>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>Price</label>
								<div class="m-input-icon m-input-icon--right">
									<input type="number" step="0.01"
										class="form-control m-input" name="price" value="{{ old('price') }}" placeholder="Price">
								</div>
							</div>
							<div class="col-lg-6">
								<label>Order</label>
								<div class="m-input-icon m-input-icon--right">
									<input type="number"
										name="order"
										class="form-control m-input"
										value="{{ old('order')??1 }}"
										placeholder="Order" required>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label>Start Date <span class="text-danger">*</span></label>
								<div class='input-group date'>
									<input type='text' class="form-control start_date" name="start_date" value="{{ old('start_date') }}"  onkeydown="return false" style="z-index: 2;" />
									<span class="flaticon-calendar " style="position: relative;right: 38px;font-size: xx-large;"></span>
								</div>
							</div>

							<div class="col-lg-4">
								<label>End Date <span class="text-danger">*</span></label>
								<div class='input-group date'>
									<input type='text' class="form-control end_date" name="end_date" value="{{ old('end_date') }}"  onkeydown="return false"  style="z-index: 2;"/>
									<span class="flaticon-calendar " style="position: relative;right: 38px;font-size: xx-large;"></span>
								</div>
							</div>

							<div class="col-lg-4">
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
									<a href="{{ route('admin.deals.index') }}" class="btn btn-danger text-light">
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
	flatpickr(".end_date", {
		enableTime: true,
		dateFormat: "Y-m-d H:i",
		onOpen: function(selectedDates, dateStr, instance) {
			// Get start date value when end date picker opens
			var startDateValue = $('.start_date').val();
			if (startDateValue) {
				// Set minDate to the start date value
				instance.set('minDate', startDateValue);
			}
		},
		onChange: function(dates, str, instance) {
			showResult("dateTimeResult", str);
		}
	});

	// Initialize the end date with the deal start date if available
	var dealStartDate = "{{ $deal->start_date ?? '' }}";
	if (dealStartDate) {
		$('.end_date').val(dealStartDate);

		// Also set minDate for flatpickr if deal start date exists
		var endDatePicker = $('.end_date')[0]._flatpickr;
		if (endDatePicker) {
			endDatePicker.set('minDate', dealStartDate);
		}
	}
</script>

<script>
	flatpickr(".start_date", {
		enableTime: true,
		dateFormat: "Y-m-d H:i",
		minDate: new Date(),
		onChange: (dates, str) => {
			showResult("dateTimeResult", str);
		}
	});
</script>


@endpush