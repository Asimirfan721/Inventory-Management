@extends('layouts.app') <!-- or any layout you're using -->

@section('content')
<div class="container">
  <h4 class="mb-4">Account Management</h4>

  <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Back</a>
  <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addaccountModal">+ Create Account</button>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Description</th>
        <th>Balance</th>
        <th>Account Number</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($accounts as $index => $account)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $account->name }}</td>
        <td>{{ $account->phone }}</td>
        <td>{{ $account->description }}</td>
        <td>{{ $account->balance }}</td>
        <td>{{ $account->account_number }}</td>
        <td>
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $account->id }}">Edit</button>
          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $account->id }}">Delete</button>
        </td>
      </tr>

      <!-- Edit Modal -->
      <div class="modal fade" id="editModal{{ $account->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $account->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="{{ route('account.update', $account->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $account->id }}">Edit Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span>&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" value="{{ $account->name }}" required>
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" name="phone" class="form-control" value="{{ $account->phone }}">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" name="description" class="form-control" value="{{ $account->description }}">
                </div>
                <div class="form-group">
                  <label>Balance</label>
                  <input type="number" step="0.01" name="balance" class="form-control" value="{{ $account->balance }}">
                </div>
                <div class="form-group">
                  <label>Account Number</label>
                  <input type="text" name="account_number" class="form-control" value="{{ $account->account_number }}">
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
      <div class="modal fade" id="deleteModal{{ $account->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $account->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="{{ route('account.destroy', $account->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $account->id }}">Delete Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span>&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete this account?
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

<!-- Add Account Modal -->
<div class="modal fade" id="addaccountModal" tabindex="-1" role="dialog" aria-labelledby="addaccountModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('account.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addaccountModalLabel">Add Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder ="Enter your Name" required>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" placeholder ="Enter your Number"required>
          </div>
          <div class="form-group">
  <label>Balance</label>
  <input type="number" step="0.01" name="balance" class="form-control" placeholder ="Enter your Amount" required>
</div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" class="form-control" placeholder ="Enter your Description" required>
          </div>
          <div class="form-group">
            <label>Account Number</label>
            <input type="text" name="account_number" class="form-control" placeholder ="Enter your Account Number" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Account</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
