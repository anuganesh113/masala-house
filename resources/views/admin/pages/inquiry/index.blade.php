@section("page_title", "Inquiry List")
@extends("admin.layouts.layout")

@section("content")
<div class="m-content">

    @include("admin.includes.errors")

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Inquiry List
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-8">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span>
                                            <i class="la la-search"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="m-datatable" id="html_table" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($inquiries ?? [] as $value)
                    <tr id="inquiry-{{ data_get($value, 'id') }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ data_get($value, "product.name", "NOT DEFINED") }}</td>
                        <td>{{ data_get($value, "metadata.name") }}</td>
                        <td>{{ data_get($value, "metadata.contact") }}</td>
                        <td>{{ data_get($value, "metadata.address") }}</td>
                        <td class="center">@datetime(data_get($value, "created_at"))</td>
                        <td data-field="Actions" class="m-datatable__cell">
                            <span style="overflow: visible; width: 110px;">
                                <a href="javascript:;"
                                   class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                   data-toggle="modal" data-target="#admin_inquiry_details"
                                   onclick="loadInquiryDetail({{$value}})"
                                   title="View">
                                        <i class="la la-eye text-success"></i>
                                    </a>
                                <a href="javascript:;" onclick="deleteInquiry({{ data_get($value, "id") }})"
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                                    <i class="la la-trash text-danger"></i>
                                </a>
                            </span>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="admin_inquiry_details" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="exampleModalLabel">
                    Inquiry Details
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label">Product:</label>
                    <input type="text" readonly class="form-control" id="product">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Name:</label>
                    <input type="text" readonly class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Contact:</label>
                    <input type="text" readonly class="form-control" id="contact">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Email:</label>
                    <input type="text" readonly class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Address:</label>
                    <input type="text" readonly class="form-control" id="address">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Message:</label>
                    <textarea readonly class="form-control" id="message" rows="10"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push("footer")
    <script src="{{ asset('admin-assets/js/html-table.js') }}" type="text/javascript" charset="utf-8" defer></script>
    <script src="{{ asset('admin-assets/custom-js/deletion-script.js') }}" type="text/javascript" charset="utf-8" defer></script>

    <script type="text/javascript" charset="utf-8" async defer>

        function loadInquiryDetail(data){
            $(`input#product`).val(data.product?.name);
            $(`input#name`).val(data.metadata.name);
            $(`input#contact`).val(data.metadata.contact);
            $(`input#email`).val(data.metadata.email);
            $(`input#address`).val(data.metadata.address);
            $(`textarea#message`).val(data.metadata.message);
        }

    </script>
@endpush
