@extends("admin.layouts.layout")
@section("page_title", "Create Deal")
@push('header')
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.2/themes/base/jquery-ui.css">
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

						      <x-admin.image-field :data="[
                            'label' => 'Image',
                            'name' => 'image',
                           
                        ]" />

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
                                           class="form-control m-input"
                                           name="price"
                                           value="{{ old('price') }}"
                                           placeholder="Price">
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
								<label>Start Date</label>
								<div class="m-input-icon m-input-icon--right">
									<input type="text" id='start_date'
                                           class="form-control m-input"
                                           name="start_date"
                                           value="{{ old('start_date') }}">
								</div>
							</div>
						
                            <div class="col-lg-4">
								<label>End Date</label>
								<div class="m-input-icon m-input-icon--right">
									<input type="text" id='end_date'
                                           class="form-control m-input"
                                           name="end_date"
                                           value="{{ old('end_date') }}">
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
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://code.jquery.com/ui/1.14.2/jquery-ui.js"></script>
	<script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#start_date" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 2
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#end_date" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 2
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
      return date;
    }
  } );
  </script>
@endpush
