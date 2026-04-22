@section("page_title", "Categories List")
@extends("admin.layouts.layout")

@push("header")
<style>
    tr:nth-child(even) {
  background-color: #f4f3f8;
}

 .table-bordered td {
    border: none;
}
</style>
@endpush
  

@section("content")
<div class="m-content">

    @include("admin.includes.errors")

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Categories List
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
                        <a href="{{ route('admin.categories.create') }}"
                            class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-plus"></i>
                                <span>Create Category</span>
                            </span>
                        </a>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>
             <!-- class="m-datatable" -->
            <table class="table table-bordered table-hover" id="sortable_table" width="100%">
                <thead>
                    <tr>
                        <th># <i class="la la-long-arrow-up text-primary" style="font-size: 14px; margin-left: 5px;"></i></th>
                        <th>Name</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
               <tbody id="tablecontents">

                    @foreach($categories??[] as $value)
                   
                        <tr id="categories-{{ $value->id }}" class="row1" data-id="{{ $value->id }}" style="cursor: move;">
                            <td> <i class="la la-arrows-v sort-handler" style="cursor: move; margin-right: 8px;"></i>{{ $value->order }}</td>
                            <td>{{ data_get($value, 'name') }}</td>
                            <td class="center">@datetime(data_get($value, "created_at"))</td>
                            <td data-field="Actions" class="m-datatable__cell">
                                <span style="overflow: visible; width: 110px;">
                                    <a href="{{ route('admin.categories.edit', $value->id) }}"
                                        class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                                        <i class="la la-edit text-success"></i>
                                    </a>
                                    <a href="javascript:;" onclick="deleteCategories({{ $value->id }})"
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
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
   
 <script type="text/javascript">
        $(function() {
            $("#tablecontents").sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
             
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {

                var order = [];
                $('tr.row1').each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('admin.categories.reorder') }}",
                    data: {
                        order: order,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            window.location.reload();
                        showAlertMessage({ message: response.success, success: true });
                        } else {
                            console.log(response);
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });

            }

            // Quick search functionality
            $("#generalSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tablecontents tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
 @endpush
