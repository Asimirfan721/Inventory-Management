@extends('layouts.app') <!-- or any layout you're using -->

@section('content')
<div class="container">

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <h3 class="mb-4">Brand</h3>

  <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Back</a>
  <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCurrencyModal">+ Create Brand</button>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Title</th>
        <th>Summary</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($brands as $index => $brand)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $brand->title }}</td>
        <td>{{ $brand->summary }}</td>
        <td>
          <!-- Edit Button triggers the Edit Modal -->
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $brand->id }}">Edit</button>
          <!-- Delete Button triggers the Delete Modal -->
          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $brand->id }}">Delete</button>
        </td>
      </tr>

      <!-- Edit Modal -->
      <div class="modal fade" id="editModal{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $brand->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="{{ route('brand.update', $brand->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span>&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" class="form-control" value="{{ $brand->title }}" required>
                </div>
                <div class="form-group">
                  <label>Summary</label>
                  <input type="text" name="summary" class="form-control" value="{{ $brand->summary }}" required>
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
    </tbody>
  </table>
</div>

<!-- Add Brand Modal -->
<div class="modal fade" id="addCurrencyModal" tabindex="-1" role="dialog" aria-labelledby="addCurrencyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('brand.store') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addCurrencyModalLabel">Add Brand</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="title" class="form-control" placeholder="Brand Name" required>
            </div>
            <div class="form-group">
              <label>Summary</label>
              <input type="text" name="summary" class="form-control" placeholder="Brand Summary" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </div>
    </form>
  </div>
</div>

<!-- Delete Modal -->
@foreach($brands as $brand)
<div class="modal fade" id="deleteModal{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $brand->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('brand.destroy', $brand->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel{{ $brand->id }}">Delete Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this brand?
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
