@extends('layouts.app')

@section('content') 
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h3 class="mb-4">Add New Company</h3>

    <div class="d-flex justify-content-start gap-2 mb-3">
        <a href="{{ url('/') }}" class="btn btn-secondary">Home</a>
        <a href="{{ route('company.index') }}" class="btn btn-primary">Back to Company Page</a>
    </div>

    <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Logo</label>
            <input type="file" name="logo" class="form-control" accept="image/*" required>

            <!-- Optional live preview -->
            <img id="logoPreview" src="#" alt="Logo Preview" class="mt-2 d-none img-thumbnail" width="100">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Company Name" required>
        </div>

        <div class="mb-3"> 
            <label class="form-label fw-semibold" for="currency_id">Select Currency</label>
            <select name="currency_id" class="form-control" required>
                <option value="">-- Select Currency --</option>
                @foreach($currencies as $currency)
                    <option value="{{ $currency->id }}">{{ $currency->currency }} ({{ $currency->code }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Add Company</button>
    </form>
</div>

<script>
    // Optional: live image preview before uploading
    document.querySelector('input[name="logo"]').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('logoPreview');
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('d-none');
        }
    });
</script>
@endsection
