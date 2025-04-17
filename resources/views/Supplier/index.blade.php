@extends('layouts.app')

@section('content')
<div class="container">
  <h4 class="mb-4">Supplier Management</h4>

  <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Back</a>
  <a href="{{ route('supplier.create') }}" class="btn btn-primary mb-3">+ Create Supplier</a>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered"> 
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th> 
        <th>Company</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($suppliers as $index => $supplier)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $supplier->name }}</td>
        <td>{{ $supplier->email }}</td>
        <td>{{ $supplier->phone }}</td>
        <td>{{ $supplier->address }}</td>
        <td>{{ $supplier->company->name ?? 'N/A' }}</td>
        <td>
          <!-- Edit Modal Trigger -->
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $supplier->id }}">Edit</button>

          <!-- Delete Modal Trigger -->
          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $supplier->id }}">Delete</button>
        </td>
      </tr>

      <!-- Edit Modal -->
      <div class="modal fade" id="editModal{{ $supplier->id }}" tabindex="-1">
        <div class="modal-dialog">
          <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
              <div class="modal-header">
                <h5>Edit Supplier</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" value="{{ $supplier->name }}" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" value="{{ $supplier->email }}" required>
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" name="phone" class="form-control" value="{{ $supplier->phone }}" required>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="address" class="form-control" value="{{ $supplier->address }}" required>
                </div>
                <div class="form-group">
  <label>Company</label>
  <select name="company_id" class="form-control" required>
    <option value="">-- Choose Company --</option>
    @foreach($companies as $company)
      <option value="{{ $company->id }}" {{ $supplier->company_id == $company->id ? 'selected' : '' }}>
        {{ $company->name }}
      </option>
    @endforeach
  </select>
</div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="deleteModal{{ $supplier->id }}" tabindex="-1">
        <div class="modal-dialog">
          <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
              <div class="modal-header">
                <h5>Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
              </div>
              <div class="modal-body">Are you sure you want to delete this supplier?</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="submit">Yes, Delete</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      @endforeach
    </tbody>
  </table>
</div>
@endsection
