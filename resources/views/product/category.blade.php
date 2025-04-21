@extends('layouts.app')

@section('content')
<div class="container">
  <h3 class="mb-4">Categories</h3>

  <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Back</a>
  <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCategoryModal">+ Create Category</button>

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
      @foreach($categories as $index => $category)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $category->title }}</td>
        <td>{{ $category->slug }}</td>
        <td>
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $category->id }}">Edit</button>
          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $category->id }}">Delete</button>
        </td>
      </tr>

      <!-- Edit Modal -->
      <div class="modal fade" id="editModal{{ $category->id }}">
        <div class="modal-dialog">
          <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="modal-content">
              <div class="modal-header"><h5>Edit Category</h5></div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" value="{{ $category->title }}" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Summary</label>
                  <input type="text" name="slug" value="{{ $category->slug }}" class="form-control" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="deleteModal{{ $category->id }}">
        <div class="modal-dialog">
          <form action="{{ route('category.destroy', $category->id) }}" method="POST">
            @csrf @method('DELETE')
            <div class="modal-content">
              <div class="modal-header"><h5>Confirm Delete</h5></div>
              <div class="modal-body">
                Are you sure you want to delete <strong>{{ $category->title }}</strong>?
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Yes, Delete</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      @endforeach
    </tbody>
  </table>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal">
  <div class="modal-dialog">
    <form action="{{ route('category.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header"><h5>Add Category</h5></div>
        <div class="modal-body">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Summary</label>
            <input type="text" name="slug" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Add</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
