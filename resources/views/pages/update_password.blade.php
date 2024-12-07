<form method="POST" action="{{ route('updatePassword') }}">
    @csrf
    <div class="mb-3">
        <label for="old_password" class="form-label">Old Password</label>
        <input type="password" name="old_password" class="form-control" id="old_password" required>
    </div>
    
    <div class="mb-3">
        <label for="new_password" class="form-label">New Password</label>
        <input type="password" name="new_password" class="form-control" id="new_password" required>
    </div>

    <div class="mb-3">
        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
        <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Password</button>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif