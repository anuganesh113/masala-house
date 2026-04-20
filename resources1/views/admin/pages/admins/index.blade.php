@section("page_title", "Admins List")
@extends("admin.layouts.layout")

@section("content")
<div class="m-content">

    @include("admin.includes.errors")

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Admins List
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
                                    <input type="text" class="form-control m-input"
                                        placeholder="Search..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span>
                                            <i class="la la-search"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                        <a href="{{ route('admin.admins.create') }}"
                            class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-plus"></i>
                                <span>Create Admin</span>
                            </span>
                        </a>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>
            <table class="m-datatable" id="html_table" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Profile</th>
                        <th>Contact</th>
                        <th>Admin Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($admins ?? [] as $value)
                    <tr id="admins-{{ data_get($value, 'id') }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ data_get($value, "name") }}</td>
                        <td>{{ (!empty(data_get($value, "profile")) ? "Profile Found" : "Profile Not Found") }}</td>
                        <td>
                            <a href="tel:{{ data_get($value, 'contact') }}">{{ data_get($value, "contact") }}</a><br>
                        </td>
                        <td>
                            <span class="m-badge m-badge--{{ data_get($value, "status") ? 'success' : 'danger' }} m-badge--wide">
                                {{ data_get($value, "status", 0) ? "Active" : "Inactive" }}
                            </span>
                        </td>
                        <td class="center">@datetime($value->created_at)</td>
                        <td data-field="Actions" class="m-datatable__cell">
                            <span style="overflow: visible; width: 110px;">
                                <a href="{{ route('admin.admins.edit', $value->id) }}"
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                                    <i class="la la-edit text-success"></i>
                                </a>
                                @if(currentUser()->id !== $value->id)
                                    <a href="javascript:;" onclick="deleteAdmins({{ $value->id }})"
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                                        <i class="la la-trash text-danger"></i>
                                    </a>
                                @endif
                            </span>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push("footer")
    <script src="{{ asset('admin-assets/js/html-table.js') }}" type="text/javascript" charset="utf-8" defer></script>
    <script src="{{ asset('admin-assets/custom-js/deletion-script.js') }}" type="text/javascript" charset="utf-8" defer></script>
@endpush
