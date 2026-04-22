@props(['condition' => null, 'action' => 'create'])

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Condition Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                name="name" value="{{ old('name', $condition->name ?? '') }}" required>
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
                <option value="musculoskeletal" {{ old('category', $condition->category ?? '') == 'musculoskeletal' ? 'selected' : '' }}>Musculoskeletal</option>
                <option value="neurological" {{ old('category', $condition->category ?? '') == 'neurological' ? 'selected' : '' }}>Neurological</option>
                <option value="sports_injury" {{ old('category', $condition->category ?? '') == 'sports_injury' ? 'selected' : '' }}>Sports Injury</option>
                <option value="chronic_pain" {{ old('category', $condition->category ?? '') == 'chronic_pain' ? 'selected' : '' }}>Chronic Pain</option>
                <option value="post_surgical" {{ old('category', $condition->category ?? '') == 'post_surgical' ? 'selected' : '' }}>Post-Surgical</option>
                <option value="work_related" {{ old('category', $condition->category ?? '') == 'work_related' ? 'selected' : '' }}>Work-Related</option>
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
            <label for="severity_level" class="form-label">Severity Level</label>
            <select class="form-select @error('severity_level') is-invalid @enderror" id="severity_level"
                name="severity_level">
                <option value="">Select Severity</option>
                <option value="mild" {{ old('severity_level', $condition->severity_level ?? '') == 'mild' ? 'selected' : '' }}>Mild</option>
                <option value="moderate" {{ old('severity_level', $condition->severity_level ?? '') == 'moderate' ? 'selected' : '' }}>Moderate</option>
                <option value="severe" {{ old('severity_level', $condition->severity_level ?? '') == 'severe' ? 'selected' : '' }}>Severe</option>
                <option value="chronic" {{ old('severity_level', $condition->severity_level ?? '') == 'chronic' ? 'selected' : '' }}>Chronic</option>
            </select>
            @error('severity_level')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                id="sort_order" name="sort_order"
                value="{{ old('sort_order', $condition->sort_order ?? 0) }}" min="0">
            @error('sort_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">Lower numbers appear first</div>
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="short_description" class="form-label">Short Description</label>
    <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description"
        name="short_description" rows="2" placeholder="Brief description for listings">{{ old('short_description', $condition->short_description ?? '') }}</textarea>
    @error('short_description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Full Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
        name="description" rows="4" placeholder="Detailed condition description">{{ old('description', $condition->description ?? '') }}</textarea>
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
            <div class="form-text">Main condition image (Max: 5MB)</div>
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
            <div class="form-text">Additional condition images (Max: 5MB each)</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                    @checked(old('is_active', $condition->is_active ?? true))>
                <label class="form-check-label" for="is_active">
                    Active condition
                </label>
            </div>
        </div>
    </div>
</div>

<hr>

<h6>Condition Details</h6>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="symptoms" class="form-label">Symptoms</label>
            <textarea class="form-control @error('symptoms') is-invalid @enderror" id="symptoms"
                name="symptoms" rows="4" placeholder="List common symptoms (one per line)">{{ old('symptoms', is_array($condition->symptoms ?? null) ? implode("\n", $condition->symptoms) : '') }}</textarea>
            @error('symptoms')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">One symptom per line</div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="causes" class="form-label">Common Causes</label>
            <textarea class="form-control @error('causes') is-invalid @enderror" id="causes"
                name="causes" rows="4" placeholder="List common causes (one per line)">{{ old('causes', is_array($condition->causes ?? null) ? implode("\n", $condition->causes) : '') }}</textarea>
            @error('causes')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">One cause per line</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="treatments" class="form-label">Treatment Options</label>
            <textarea class="form-control @error('treatments') is-invalid @enderror" id="treatments"
                name="treatments" rows="4" placeholder="List treatment options (one per line)">{{ old('treatments', is_array($condition->treatments ?? null) ? implode("\n", $condition->treatments) : '') }}</textarea>
            @error('treatments')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">One treatment per line</div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="prevention" class="form-label">Prevention Tips</label>
            <textarea class="form-control @error('prevention') is-invalid @enderror" id="prevention"
                name="prevention" rows="4" placeholder="List prevention tips (one per line)">{{ old('prevention', is_array($condition->prevention ?? null) ? implode("\n", $condition->prevention) : '') }}</textarea>
            @error('prevention')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">One tip per line</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="related_services" class="form-label">Related Services</label>
            <textarea class="form-control @error('related_services') is-invalid @enderror" id="related_services"
                name="related_services" rows="3" placeholder="List related services (one per line)">{{ old('related_services', is_array($condition->related_services ?? null) ? implode("\n", $condition->related_services) : '') }}</textarea>
            @error('related_services')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">One service per line</div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="related_conditions" class="form-label">Related Conditions</label>
            <textarea class="form-control @error('related_conditions') is-invalid @enderror" id="related_conditions"
                name="related_conditions" rows="3" placeholder="List related conditions (one per line)">{{ old('related_conditions', is_array($condition->related_conditions ?? null) ? implode("\n", $condition->related_conditions) : '') }}</textarea>
            @error('related_conditions')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">One condition per line</div>
        </div>
    </div>
</div>

<hr>

<h6>SEO Settings</h6>

<div class="mb-3">
    <label for="meta_title" class="form-label">Meta Title</label>
    <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
        id="meta_title" name="meta_title"
        value="{{ old('meta_title', $condition->meta_title ?? '') }}"
        placeholder="SEO title for search engines">
    @error('meta_title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="meta_description" class="form-label">Meta Description</label>
    <textarea class="form-control @error('meta_description') is-invalid @enderror"
        id="meta_description" name="meta_description" rows="2"
        placeholder="SEO description for search engines">{{ old('meta_description', $condition->meta_description ?? '') }}</textarea>
    @error('meta_description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="meta_keywords" class="form-label">Meta Keywords</label>
    <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror"
        id="meta_keywords" name="meta_keywords"
        value="{{ old('meta_keywords', $condition->meta_keywords ?? '') }}"
        placeholder="Keywords separated by commas">
    @error('meta_keywords')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="form-text">Separate keywords with commas</div>
</div>
