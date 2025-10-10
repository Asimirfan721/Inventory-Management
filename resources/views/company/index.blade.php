@extends('layouts.app')

@section('content')
<div class="container">
    <head><link rel="stylesheet" href="{{ asset('css/style.css') }}"></head> 

    <h3 class="mb-4">Company Management</h3> 

    <div class="d-flex justify-content-start gap-2 mb-3">
        <a href="{{ url('/') }}" class="btn btn-secondary">Home</a>
        <a href="{{ route('company.create') }}" class="btn btn-primary">+ Create Company</a>
    </div>

    <table class="table table-bordered align-middle text-center" id="companyTable">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Logo</th>
                <th>Name</th>
                <th>Currency</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $index => $company)
            <tr id="row-{{ $company->id }}">
                <td>{{ $index + 1 }}</td>

                <!-- Display the image instead of file name -->
                <td>
                    @if($company->logo)
                       <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="50" height="50">
                    @else
                        <span class="text-muted">No Logo</span>
                    @endif
                </td>

                <td>{{ $company->name }}</td>

                <td>
                    @foreach($currencies as $currency)
                        @if($currency->id == $company->currency_id)
                            {{ $currency->code }}
                        @endif
                    @endforeach
                </td>

                <td>
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $company->id }}">Edit</button>
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $company->id }}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Edit Modals -->
@foreach($companies as $company)
<div class="modal fade" id="editModal{{ $company->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Logo</label>

                        @if($company->logo)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="img-thumbnail rounded" width="100">
                            </div>
                        @endif

                        <input type="file" name="logo" class="form-control" accept="image/*">
                        <small class="text-muted">Upload new logo (optional)</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Currency</label>
                        <select name="currency_id" class="form-control" required>
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->id }}" {{ $company->currency_id == $currency->id ? 'selected' : '' }}>
                                    {{ $currency->currency }} ({{ $currency->code }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

<!-- Delete Modals -->
@foreach($companies as $company)
<div class="modal fade" id="deleteModal{{ $company->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('company.destroy', $company->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Company</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this company?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection
