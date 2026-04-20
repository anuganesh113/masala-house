@section("page_title", "Facilities List")
@extends("admin.layouts.layout")

@section("content")
<div class="m-content">

    @include("admin.includes.errors")

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">Facilities List</h3>
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
                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                        <a href="{{ route('admin.facilities.create') }}"
                            class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-plus"></i>
                                <span>Create Facilities</span>
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
                        <th>Title</th>
                        <th>Icon</th>
                        <th>Image</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($facilities ?? [] as $value)
                        <tr id='facilities-{{ $value->id }}'>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ data_get($value, 'name') }}</td>
                            <td>{{ data_get($value, 'title') }}</td>
                            <td>{{ !empty(data_get($value, 'icon')) ? 'Icon Found' : 'Icon Not Found' }}</td>
                            <td>{{ !empty(data_get($value, 'image')) ? 'Image Found' : 'Image Not Found' }}</td>
                            <td class="center">@datetime(data_get($value, "created_at"))</td>
                            <td data-field="Actions" class="m-datatable__cell">
                                <span style="overflow: visible; width: 110px;">
                                    <a href="{{ route('admin.facilities.edit', $value->id) }}"
                                        class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                                        <i class="la la-edit text-success"></i>
                                    </a>
                                    <a href="javascript:;" onclick="deleteFacilities({{ $value->id }})"
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
@endsection

@push("footer")
    <script src="{{ asset('admin-assets/js/html-table.js') }}" type="text/javascript" charset="utf-8" defer></script>
    <script src="{{ asset('admin-assets/custom-js/deletion-script.js') }}" type="text/javascript" charset="utf-8" defer></script>
@endpush
