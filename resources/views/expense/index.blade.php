@extends('layouts.app')

@section('content')
<div class="container">
  
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <h3 class="mb-4">Expense Management</h3>

    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Home</a>
    <a href="{{ route('expense.create') }}" class="btn btn-primary mb-3">+ Create Expense</a>
    <form method="GET" action="{{ route('expense.index') }}" class="form-inline mb-3">
    <input type="text" name="search" class="form-control mr-2" placeholder="Search..." value="{{ request('search') }}">

    <select name="type" class="form-control mr-2">
        <option value="">-- All Types --</option>
        <option value="In" {{ request('type') == 'In' ? 'selected' : '' }}>In</option>
        <option value="Out" {{ request('type') == 'Out' ? 'selected' : '' }}>Out</option>
    </select>

    <button type="submit" class="btn btn-primary">Filter</button>
    <a href="{{ route('expense.index') }}" class="btn btn-secondary">Clear All</a>
</form>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Expense_ID</th>
        <th>Date</th>
        <th>Expense Description</th>
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
        <td>{{ $expense->expense_id }}</td>
        <td>{{ $expense->date }}</td>
        <td>{{ $expense->note }}</td>
        <td>{{ $expense->type }}</td>
        <td>{{ $expense->amount }}</td>
        <td>{{ $expense->account }}</td>
        <td>{{ $expense->remarks }}</td>
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
                <h5 class="modal-title">Edit Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span>&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="form-group">
                  <label>Expense_ID</label>
                  <input type="text" name="expense_id" class="form-control" value="{{ $expense->expense_id }}" required>
                </div>

                <div class="form-group">
                  <label>Date</label>
                  <input type="date" name="date" class="form-control" value="{{ $expense->date }}" required>
                </div>

                <div class="form-group">
                  <label>Note</label>
                  <input type="text" name="note" class="form-control" value="{{ $expense->note }}" required>
                </div>

                <div class="form-group">
                  <label>Type</label>
                  <input type="text" name="type" class="form-control" value="{{ $expense->type }}" required>
                </div>

                <div class="form-group">
                  <label>Amount</label>
                  <input type="number" step="0.01" name="amount" class="form-control" value="{{ $expense->amount }}" required>
                </div>

                <div class="form-group">
                  <label>Account</label>
                  <input type="text" name="account" class="form-control" value="{{ $expense->account }}" required>
                </div>

                <div class="form-group">
                  <label>Remarks</label>
                  <input type="text" name="remarks" class="form-control" value="{{ $expense->remarks }}">
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

      <!-- Delete Modal -->
      <div class="modal fade" id="deleteModal{{ $expense->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $expense->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="{{ route('expense.destroy', $expense->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Expense</h5>
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
    </tbody>
  </table>
</div>

<!-- Add Expense Modal -->
<div class="modal fade" id="addexpenseModal" tabindex="-1" role="dialog" aria-labelledby="addexpenseModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('expense.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Expense</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label>Expense_ID</label>
            <input type="text" name="expense_id" class="form-control" placeholder="Expense Unique Id" required>
          </div>

          <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" class="form-control" placeholder="Select Date" required>
          </div>

          <div class="form-group">
            <label>Note</label>
            <input type="text" name="note" class="form-control" placeholder="Expense Type" required>
          </div>

          <div class="form-group">
            <label>Type</label>
            <input type="text" name="type" class="form-control" placeholder="cash In/Out" required>
          </div>

          <div class="form-group">
            <label>Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" placeholder="Enter Balance"required>
          </div>

          <div class="form-group">
            <label>Account</label>
            <input type="text" name="account" class="form-control" placeholder="Enter account Number" required>
          </div>

          <div class="form-group">
            <label>Remarks</label>
            <input type="text" name="remarks" class="form-control" placeholder="Expense description" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Expense</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
