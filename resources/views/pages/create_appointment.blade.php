<div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tambah data
            </div>
            <div class="card-body">
                <form action="/appointment/store" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                        <label for="vaccineId">Vaccine ID:</label>
                        <select name="vaccineId" id="vaccineId" class="form-control">
                            @foreach ($vaccine as $v)
                                <option value="{{ $v->id }}">{{ $v->dose }}</option>
                            @endforeach
                        </select>
<br>
                        <label for="place">Place :</label>
                        <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" name="place" value="{{ old('place') }}">
                        @error('place')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dateAvailibilityStart">Date Start:</label>
                        <input type="number" class="form-control @error('dateAvailibilityStart') is-invalid @enderror" id="dateAvailibilityStart" name="dateAvailibilityStart" value="{{ old('dateAvailibilityStart') }}">
                        @error('dateAvailibilityStart')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dateAvailibilityEnd">Date End :</label>
                        <input type="number" class="form-control @error('dateAvailibilityEnd') is-invalid @enderror" id="dateAvailibilityEnd" name="dateAvailibilityEnd" value="{{ old('dateAvailibilityEnd') }}">
                        @error('dateAvailibilityEnd')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
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
            </div>
        </div>