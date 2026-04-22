@props(['team' => null, 'action' => 'create'])

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                name="name" value="{{ old('name', $team->name ?? '') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('position') is-invalid @enderror" id="position"
                name="position" value="{{ old('position', $team->position ?? '') }}" required>
            @error('position')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" value="{{ old('email', $team->email ?? '') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone"
                name="phone" value="{{ old('phone', $team->phone ?? '') }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <select class="form-select @error('department') is-invalid @enderror" id="department"
                name="department">
                <option value="">Select Department</option>
                <option value="management" {{ old('department', $team->department ?? '') == 'management' ? 'selected' : '' }}>Management</option>
                <option value="therapy" {{ old('department', $team->department ?? '') == 'therapy' ? 'selected' : '' }}>Therapy</option>
                <option value="administration" {{ old('department', $team->department ?? '') == 'administration' ? 'selected' : '' }}>Administration</option>
                <option value="support" {{ old('department', $team->department ?? '') == 'support' ? 'selected' : '' }}>Support</option>
            </select>
            @error('department')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="experience_years" class="form-label">Experience (Years)</label>
            <input type="number" class="form-control @error('experience_years') is-invalid @enderror"
                id="experience_years" name="experience_years"
                value="{{ old('experience_years', $team->experience_years ?? '') }}" min="0" max="50">
            @error('experience_years')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="bio" class="form-label">Bio</label>
    <textarea class="form-control @error('bio') is-invalid @enderror" id="bio"
        name="bio" rows="4" placeholder="Brief biography of the team member">{{ old('bio', $team->bio ?? '') }}</textarea>
    @error('bio')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="specializations" class="form-label">Specializations</label>
            <input type="text" class="form-control @error('specializations') is-invalid @enderror"
                id="specializations" name="specializations"
                value="{{ old('specializations', $team->specializations ?? '') }}"
                placeholder="e.g., Sports Therapy, Rehabilitation">
            @error('specializations')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">Separate multiple specializations with commas</div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="profile_image" class="form-label">Profile Image</label>
            <input type="file" class="form-control @error('profile_image') is-invalid @enderror"
                id="profile_image" name="profile_image" accept="image/*">
            @error('profile_image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">Recommended size: 300x300px (Max: 5MB)</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="linkedin_url" class="form-label">LinkedIn URL</label>
            <input type="url" class="form-control @error('linkedin_url') is-invalid @enderror"
                id="linkedin_url" name="linkedin_url"
                value="{{ old('linkedin_url', $team->linkedin_url ?? '') }}"
                placeholder="https://linkedin.com/in/username">
            @error('linkedin_url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="twitter_url" class="form-label">Twitter URL</label>
            <input type="url" class="form-control @error('twitter_url') is-invalid @enderror"
                id="twitter_url" name="twitter_url"
                value="{{ old('twitter_url', $team->twitter_url ?? '') }}"
                placeholder="https://twitter.com/username">
            @error('twitter_url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                    @checked(old('is_active', $team->is_active ?? true))>
                <label class="form-check-label" for="is_active">
                    Active team member
                </label>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                id="sort_order" name="sort_order"
                value="{{ old('sort_order', $team->sort_order ?? 0) }}" min="0">
            @error('sort_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">Lower numbers appear first</div>
        </div>
    </div>
</div>
