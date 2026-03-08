@extends("admin.layouts.layout")
@section("page_title", "Create Video")

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
                            <h3 class="m-portlet__head-text">Create Video</h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
                            href="{{ url('admin/videos') }}">
                            <i class="la la-list"></i> Video List
                        </a>
                    </div>
                </div>

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                    action="{{ route('admin.videos.create') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="video_id" value="{{ $popups->id ?? '' }}">

                    <div class="m-portlet__body">

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <label>Name<span class="text-danger">*</span></label>
                                <input type="text"
                                    name="name"
                                    class="form-control m-input"
                                    placeholder="Name"
                                    value="{{ old('name')??data_get($popups, 'name') }}">
                            </div>

                        </div>

                        <div class="form-group m-form__group row">
                            <h2>Video Specification</h2>
                            <table id="videoTable" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Video Url</th>
                                        <th>
                                            <span id="addRowBtn" class="btn btn-primary">Add Row</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($popups->metadata))

                                    @foreach ($popups->metadata as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><input type="text" class="name-input form-control"
                                                name="metadata[]"
                                                value="{{ $value ?? '' }}" placeholder="Enter name">
                                        </td>

                                        <td><span class="removeRowBtn btn btn-danger">Remove Row</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td>1</td>
                                        <td><input type="text" class="name-input form-control"
                                                name="metadata[]" placeholder="Enter video URL"></td>
                                        <td><span class="removeRowBtn btn btn-danger">Remove Row</span></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
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
                            <a href="{{ route('admin.popups.index') }}" class="btn btn-danger text-light">
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

<script>
    $(document).ready(function() {
        // Add Row functionality
        $("#addRowBtn").click(function() {
            // Increment the row number
            var rowNum = $("#videoTable tbody tr").length + 1;

            // Construct the new row
            var newRow = '<tr>' +
                '<td>' + rowNum + '</td>' +
                '<td><input type="text" class="name-input form-control"  name="metadata[]" placeholder="Enter name"></td>' +
                '<td><span class="removeRowBtn btn btn-danger">Remove Row</span></td>' +
                '</tr>';


            // Append the new row to the table body
            $("#videoTable tbody").append(newRow);
        });

        // Remove Row functionality
        $(document).on("click", ".removeRowBtn", function() {
            $(this).closest("tr").remove();
            $("#videoTable tbody tr").each(function(index) {
                $(this).find("td:first").text(index + 1);
            });
        });
    });
</script>

@endpush