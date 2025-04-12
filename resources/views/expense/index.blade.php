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
        <th>Expense_ID</th>
        <th>Date</th>
        <th>Note</th>
        <th>Type</th>
        <th>Amount</th>
        <th>Account</th>
        <th>Remarks</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($expenses as $index => $expense)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $expense->Expense_ID }}</td>
        <td>{{ $expense->Date }}</td>
        <td>{{ $expense->Note }}</td>
        <td>{{ $expense->Type }}</td>
        <td>{{ $expense->Amount }}</td>
        <td>{{ $expense->Account }}</td>
        <td>{{ $expense->Remarks }}</td>
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
                  <label>Note</label>
                  <input type="text" name="name" class="form-control" value="{{ $expense->name }}" required>
                </div>
                <div class="form-group">
                  <label>Type</label>
                  <input type="email" name="email" class="form-control" value="{{ $expense->email }}" required>
                </div>
                <div class="form-group">
                  <label>Account</label>
                  <input type="text" name="phone" class="form-control" value="{{ $expense->phone }}" required>
                </div>
                <div class="form-group">
                  <label>Remarks</label>
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
            <label>Expense ID</label>
            <input type="text" name="expense" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Date</label>
            <input type="email" name="date" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Note</label>
            <input type="text" name="note" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Type</label>
            <input type="text" name="type" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Amount</label>
            <input type="text" name="amount" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Account</label>
            <input type="text" name="account" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Remarks</label>
            <input type="text" name="remarks" class="form-control" required>
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
