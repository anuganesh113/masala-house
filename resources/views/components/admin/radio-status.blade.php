<label>{{ isset($label) ? ucwords($label) : 'Status' }}<span class="text-danger">*</span> </label>
    <div class="m-checkbox-inline">
    @foreach(App\Enums\Status::getValues() as $status)
        <label class="m-checkbox m-checkbox--bold m-checkbox--state-{{ $status == App\Enums\Status::ACTIVE ? 'success' : 'danger' }}">
            <input type="radio"
                   name="{{ $name ?? 'status' }}"
                   value="{{ $status }}"
                {{ ($value == $status) ? 'checked' : '' }}
            >
            {{ $status == App\Enums\Status::ACTIVE ? 'Active' : 'Inactive' }}
            <span></span>
        </label>
    @endforeach
</div>
