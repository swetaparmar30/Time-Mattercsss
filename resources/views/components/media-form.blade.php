@props(['media' => null, 'action' => 'create'])

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Display Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                name="name" value="{{ old('name', $media->name ?? '') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">This is the display name for the media</div>
        </div>
    </div>

    @if($action === 'edit' && $media)
        <div class="col-md-6">
            <div class="mb-3">
                <label for="file_name" class="form-label">File Name</label>
                <input type="text" class="form-control @error('file_name') is-invalid @enderror"
                    id="file_name" name="file_name"
                    value="{{ old('file_name', pathinfo($media->file_name, PATHINFO_FILENAME)) }}">
                @error('file_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">
                    <strong>⚠️ Warning: </strong> This will rename the actual file on disk.<br>
                    <small class="text-muted">Extension: .{{ pathinfo($media->file_name, PATHINFO_EXTENSION) }}</small>
                </div>
            </div>
        </div>
    @endif
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="directory" class="form-label">Directory <span class="text-danger">*</span></label>
            <select class="form-select @error('directory') is-invalid @enderror" id="directory"
                name="directory" required>
                <option value="">Select Directory</option>
                <option value="gallery" {{ old('directory', $media->directory ?? '') == 'gallery' ? 'selected' : '' }}>Gallery</option>
                <option value="teams" {{ old('directory', $media->directory ?? '') == 'teams' ? 'selected' : '' }}>Teams</option>
                <option value="products" {{ old('directory', $media->directory ?? '') == 'products' ? 'selected' : '' }}>Products</option>
                <option value="blog" {{ old('directory', $media->directory ?? '') == 'blog' ? 'selected' : '' }}>Blog</option>
                <option value="banners" {{ old('directory', $media->directory ?? '') == 'banners' ? 'selected' : '' }}>Banners</option>
                <option value="documents" {{ old('directory', $media->directory ?? '') == 'documents' ? 'selected' : '' }}>Documents</option>
            </select>
            @error('directory')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="collection_name" class="form-label">Collection</label>
            <input type="text" class="form-control @error('collection_name') is-invalid @enderror"
                id="collection_name" name="collection_name"
                value="{{ old('collection_name', $media->collection_name ?? '') }}"
                placeholder="e.g., profile, gallery, featured">
            @error('collection_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                id="sort_order" name="sort_order"
                value="{{ old('sort_order', $media->sort_order ?? 0) }}" placeholder="0">
            @error('sort_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">Lower numbers appear first</div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_public" name="is_public" value="1"
                    @checked(old('is_public', $media->is_public ?? true))>
                <label class="form-check-label" for="is_public">
                    Make this media public
                </label>
            </div>
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="alt_text" class="form-label">Alt Text</label>
    <input type="text" class="form-control @error('alt_text') is-invalid @enderror" id="alt_text"
        name="alt_text" value="{{ old('alt_text', $media->alt_text ?? '') }}"
        placeholder="Alternative text for accessibility">
    @error('alt_text')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
        name="description" rows="3"
        placeholder="Description of the media">{{ old('description', $media->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

@if($action === 'create')
    <div class="mb-3">
        <label for="file" class="form-label">File <span class="text-danger">*</span></label>
        <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
            name="file" accept="image/*" required>
        @error('file')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div class="form-text">Supported formats: JPG, PNG, GIF, WebP, SVG, BMP, TIFF, ICO (Max: 10MB)</div>
    </div>
@endif
