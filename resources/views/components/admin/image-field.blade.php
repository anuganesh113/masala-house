<div class="form-group m-form__group row">
    <div class="col-lg-6">
        @if(isset($sample) && !empty($sample))
        <a href="{{ $sample }}" target="_blank">
           Click here to view :: <em>Sample for background image :: {{ $hint ?? '' }}</em>
        </a>
        <br>
        @endif
          
        <label>
            {{ ucwords($label) }}
            <span class="text-danger">
                {{ $required ? '*' : '' }}
                ({{ strtoupper($mimes) }}) MAX
                {{ $max }}
            </span>
        </label>
        <div></div>
        <div class="custom-file" style="width:60%">
            <input type="file" name="{{ $name }}" class="custom-file-input" id="customFile"
                   accept="{{ $accept }}"
                   onchange="showPreview(event, '{{ $name }}');">
            <label class="custom-file-label selected" for="customFile">Choose file</label>
        </div>
    </div>
    <div class="col-lg-6">
        <label>{{ ucwords($label) }} Here</label>
        <div class="m-checkbox-inline">
            <img id="{{ $name }}"
                 style="max-width: 255px; max-height: 215px; {{ $name == 'white_logo' ? 'background-color: #0f0f11;' : '' }} {{ empty($full_path) ? 'display:none;' : '' }}"
                 src="{{ $full_path }}"
                 alt="{{ $label }}"
            />
        </div>
    </div>
</div>
