@extends('layouts.app') <!-- or any layout you're using -->

@section('content')
<div class="container">

  <h4 class="mb-4">expense Management</h4>

  <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Back</a>
  <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addexpenseModal">+ Create expense</button>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($expenses as $index => $expense)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $expense->name }}</td>
        <td>{{ $expense->email }}</td>
        <td>{{ $expense->phone }}</td>
        <td>{{ $expense->address }}</td>
        <td>
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $expense->id }}">Edit</button>
          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $expense->id }}">Delete</button>
        </td>
      </tr>

      <!-- Edit Modal -->
      <div class="modal fade" id="editModal{{ $expense->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $expense->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="{{ route('expense.update', $expense->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span>&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" value="{{ $expense->name }}" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" value="{{ $expense->email }}" required>
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" name="phone" class="form-control" value="{{ $expense->phone }}" required>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="address" class="form-control" value="{{ $expense->address }}" required>
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

<!-- Add expense Modal -->
<div class="modal fade" id="addexpenseModal" tabindex="-1" role="dialog" aria-labelledby="addexpenseModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('expense.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addSexpenseModalLabel">Add expense</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" required>
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
 
<!-- Delete Modals -->
@foreach($expenses as $expense)
<div class="modal fade" id="deleteModal{{ $expense->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $expense->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('expense.destroy', $expense->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel{{ $expense->id }}">Delete expense</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this expense?
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
