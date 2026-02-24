@section("page_title", "Contact List")
@extends("admin.layouts.layout")

@section("content")
<div class="m-content">

    @include("admin.includes.errors")

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Contact List
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($contacts ?? [] as $value)
                    <tr id="contact-{{ data_get($value, 'id') }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ data_get($value, 'metadata.name') }}</td>
                        <td>{{ data_get($value, 'metadata.email') }}</td>
                        <td>{{ data_get($value, 'metadata.subject') }}</td>
                        <td class="center">@datetime(data_get($value, "created_at"))</td>
                        <td data-field="Actions" class="m-datatable__cell">
                            <span style="overflow: visible; width: 110px;">
                                <a href="{{ route('admin.contact.view', data_get($value, "id")) }}"
                                   class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                   data-toggle="modal" data-target="#admin_contact_details"
                                   onclick="loadContactDetail({{$value}})"
                                   title="View">
                                        <i class="la la-eye text-success"></i>
                                    </a>
                                <a href="javascript:;" onclick="deleteContact({{ data_get($value, "id") }})"
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

<div class="modal fade" id="admin_contact_details" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="exampleModalLabel">
                    Contact Details
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label">Full Name:</label>
                    <input type="text" readonly class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Email:</label>
                    <input type="text" readonly class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Subject:</label>
                    <input type="text" readonly class="form-control" id="subject">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Message:</label>
                    <textarea class="form-control m-input" readonly rows="5" id="message" ></textarea>
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

        function loadContactDetail(data){
            $(`input#name`).val(data.metadata.name);
            $(`input#email`).val(data.metadata.email);
            $(`input#subject`).val(data.metadata.subject);
            $(`textarea#message`).val(data.metadata.message);
        }

    </script>
@endpush
