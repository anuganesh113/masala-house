@section("page_title", "FAQs List")
@extends("admin.layouts.layout")

@section("content")
<div class="m-content">

    @include("admin.includes.errors")

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head" style="    padding: 25px 2.2rem;">
            <div class="m-portlet__head-caption" style="display: grid;">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        FAQs List  {{ requestfaq(['type' => request()->segment(3),'id' => request()->segment(4)]) }}
                    </h3>
                      <a href="{{ url('admin/' . request()->segment(3) . 's') }}"
                            class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill float-right">
                            <span>
                                <i class="la la-long-arrow-left"></i>
                                <span>Back {{ ucfirst( request()->segment(3))}} List</span>
                            </span>
                        </a>
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
                        <a href="{{ route('admin.faqtypecreate', ['type' => request()->segment(3), 'id' => request()->segment(4)]) }}"
                            class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-plus"></i>
                <span>Create FAQs {{ requestfaq(['type' => request()->segment(3),'id' => request()->segment(4)]) }} </span>
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
                        <th>Question</th>
                    
                        <th>FAQ Status</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($faqs??[] as $value)
                    <tr id="faqs-{{ $value->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ data_get($value, "question") }}</td>

                        <td>
                            <span class="m-badge m-badge--{{ data_get($value, "status") ? 'success' : 'danger' }} m-badge--wide">
                                {{ data_get($value, "status") ? "Active" : "Inactive" }}
                            </span>
                        </td>
                        <td class="center">@datetime(data_get($value, "created_at"))</td>
                        <td data-field="Actions" class="m-datatable__cell">
                            <span style="overflow: visible; width: 110px;">
                                <a href="{{ route('admin.faqtypeedit', [ 'id' => $value->id,  'type' =>  $value->model_type,]) }}"
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                                    <i class="la la-edit text-success"></i>
                                </a>
                                <a href="javascript:;" onclick="deleteFAQS({{ data_get($value, "id") }})"
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