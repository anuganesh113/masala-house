<div class="form-group m-form__group row">
    <div class="col-lg-6">
        <label>SEO Title</label>
        <div class="m-input-icon m-input-icon--right">
            <input type="text"
                   class="form-control m-input"
                   name="seo[title]"
                   placeholder="SEO Title"
                   value="{{ old('seo.title') ?? data_get($data, 'title') }}">
        </div>
    </div>
    <div class="col-lg-6">
        <label>SEO Keywords</label>
        <textarea class="form-control m-input"
                  name="seo[keywords]"
                  placeholder="SEO Keywords"
                  rows="3">{{ old('seo.keywords') ?? data_get($data, 'keywords') }}</textarea>
    </div>
</div>

<div class="form-group m-form__group row">
    <div class="col-lg-12">
        <label>SEO Description</label>
        <textarea class="form-control m-input"
                  name="seo[description]"
                  placeholder="SEO Description"
                  rows="3">{{ old('seo.description') ?? data_get($data, 'description') }}</textarea>
    </div>
</div>
