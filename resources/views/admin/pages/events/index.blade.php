@section("page_title", "Events List")
@extends("admin.layouts.layout")

@section("content")
<div class="m-content">

    @include("admin.includes.errors")

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Event List
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
                        <a href="{{ route('admin.events.create') }}"
                            class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-plus"></i>
                                <span>Create Events</span>
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
                        <th>Event Type</th>


                        <th>Event Status</th>
                        <th>Add Faqs</th>

                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($events??[] as $value)
                    <tr id="events-{{ $value->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ data_get($value, 'name') }}</td>


                        <td>{{$value->type == 1 ? 'Event' : 'Catering' }}</td>


                        <td>
                            <span class="m-badge m-badge--{{ data_get($value, 'status') ?'success' : 'danger' }} m-badge--wide">
                                {{ data_get($value, 'status') ? 'Active' : 'Inactive' }}
                            </span>
                        </td>

                        <td>
                            {{findfaqcount('event', $value->id)}}
                            <a href="{{ route('admin.faqtype', ['type' => 'event', 'id' => $value->id]) }}"
                                class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Click to add a FAQ">

                                <i class="la la-long-arrow-right text-danger"></i>
                            </a>
                        </td>

                        <td class="center">@datetime(data_get($value, "created_at"))</td>
                        <td data-field="Actions" class="m-datatable__cell">
                            <span style="overflow: visible; width: 110px;">
                                <a href="{{ route('admin.events.edit', $value->id) }}"
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                                    <i class="la la-edit text-success"></i>
                                </a>
                                <a href="{{ route('admin.event.delete', $value->id) }}"
                                    onclick="return confirm('Are you sure you want to delete this event?')"
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                    title="Delete">
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

@endpush