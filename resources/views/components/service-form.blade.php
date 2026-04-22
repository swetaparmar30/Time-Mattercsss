@props(['service' => null, 'action' => 'create'])

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Service Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                name="name" value="{{ old('name', $service->name ?? '') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
            <select class="form-select @error('category') is-invalid @enderror" id="category"
                name="category" required>
                <option value="">Select Category</option>
                <option value="physical_therapy" {{ old('category', $service->category ?? '') == 'physical_therapy' ? 'selected' : '' }}>Physical Therapy</option>
                <option value="sports_therapy" {{ old('category', $service->category ?? '') == 'sports_therapy' ? 'selected' : '' }}>Sports Therapy</option>
                <option value="rehabilitation" {{ old('category', $service->category ?? '') == 'rehabilitation' ? 'selected' : '' }}>Rehabilitation</option>
                <option value="wellness" {{ old('category', $service->category ?? '') == 'wellness' ? 'selected' : '' }}>Wellness</option>
                <option value="massage" {{ old('category', $service->category ?? '') == 'massage' ? 'selected' : '' }}>Massage Therapy</option>
                <option value="assessment" {{ old('category', $service->category ?? '') == 'assessment' ? 'selected' : '' }}>Assessment</option>
            </select>
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                    id="price" name="price" value="{{ old('price', $service->price ?? '') }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-text">Leave empty for consultation-based pricing</div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" class="form-control @error('duration') is-invalid @enderror"
                id="duration" name="duration" value="{{ old('duration', $service->duration ?? '') }}"
                placeholder="e.g., 60 minutes, 1 hour">
            @error('duration')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="short_description" class="form-label">Short Description</label>
    <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description"
        name="short_description" rows="2" placeholder="Brief description for listings">{{ old('short_description', $service->short_description ?? '') }}</textarea>
    @error('short_description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Full Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
        name="description" rows="4" placeholder="Detailed service description">{{ old('description', $service->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="featured_image" class="form-label">Featured Image</label>
            <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                id="featured_image" name="featured_image" accept="image/*">
            @error('featured_image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">Main service image (Max: 5MB)</div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="gallery_images" class="form-label">Gallery Images</label>
            <input type="file" class="form-control @error('gallery_images.*') is-invalid @enderror"
                id="gallery_images" name="gallery_images[]" accept="image/*" multiple>
            @error('gallery_images.*')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">Additional service images (Max: 5MB each)</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                    @checked(old('is_active', $service->is_active ?? true))>
                <label class="form-check-label" for="is_active">
                    Active service
                </label>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                id="sort_order" name="sort_order"
                value="{{ old('sort_order', $service->sort_order ?? 0) }}" min="0">
            @error('sort_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">Lower numbers appear first</div>
        </div>
    </div>
</div>

<hr>

<h6>Service Details</h6>

<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="benefits" class="form-label">Benefits</label>
            <textarea class="form-control @error('benefits') is-invalid @enderror" id="benefits"
                name="benefits" rows="3" placeholder="List key benefits (one per line)">{{ old('benefits', is_array($service->benefits ?? null) ? implode("\n", $service->benefits) : '') }}</textarea>
            @error('benefits')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">One benefit per line</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label for="requirements" class="form-label">Requirements</label>
            <textarea class="form-control @error('requirements') is-invalid @enderror" id="requirements"
                name="requirements" rows="3" placeholder="List requirements (one per line)">{{ old('requirements', is_array($service->requirements ?? null) ? implode("\n", $service->requirements) : '') }}</textarea>
            @error('requirements')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">One requirement per line</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label for="what_to_expect" class="form-label">What to Expect</label>
            <textarea class="form-control @error('what_to_expect') is-invalid @enderror" id="what_to_expect"
                name="what_to_expect" rows="3" placeholder="What patients can expect (one per line)">{{ old('what_to_expect', is_array($service->what_to_expect ?? null) ? implode("\n", $service->what_to_expect) : '') }}</textarea>
            @error('what_to_expect')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">One expectation per line</div>
        </div>
    </div>
</div>

<hr>

<h6>SEO Settings</h6>

<div class="mb-3">
    <label for="meta_title" class="form-label">Meta Title</label>
    <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
        id="meta_title" name="meta_title"
        value="{{ old('meta_title', $service->meta_title ?? '') }}"
        placeholder="SEO title for search engines">
    @error('meta_title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="meta_description" class="form-label">Meta Description</label>
    <textarea class="form-control @error('meta_description') is-invalid @enderror"
        id="meta_description" name="meta_description" rows="2"
        placeholder="SEO description for search engines">{{ old('meta_description', $service->meta_description ?? '') }}</textarea>
    @error('meta_description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="meta_keywords" class="form-label">Meta Keywords</label>
    <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror"
        id="meta_keywords" name="meta_keywords"
        value="{{ old('meta_keywords', $service->meta_keywords ?? '') }}"
        placeholder="Keywords separated by commas">
    @error('meta_keywords')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="form-text">Separate keywords with commas</div>
</div>
