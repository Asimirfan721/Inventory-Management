@extends('layouts.app')

@section('content')
<div class="container">

  <h4 class="mb-4">Currency Management</h4>

  <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Home</a>
  <a href="{{ route('currency.create') }}" class="btn btn-primary mb-3">+ Create Currency</a>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Code</th>
        <th>Currency</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($currencies as $index => $currency)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $currency->code }}</td>
        <td>{{ $currency->currency }}</td>
        <td> 
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $currency->id }}">Edit</button>
          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $currency->id }}">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- Edit Modals -->
@foreach($currencies as $currency)
<div class="modal fade" id="editModal{{ $currency->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $currency->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('currency.update', $currency->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Currency</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Currency</label>
            <input type="text" name="currency" class="form-control" value="{{ $currency->currency }}" required>
          </div>
          <div class="form-group">
            <label>Code</label>
            <input type="text" name="code" class="form-control" value="{{ $currency->code }}" required>
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
@foreach($currencies as $currency)
<div class="modal fade" id="deleteModal{{ $currency->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $currency->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('currency.destroy', $currency->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Currency</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this currency?
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

<!-- Add Currency Modal (if you want modal-based add, otherwise use create page) -->
<div class="modal fade" id="addCurrencyModal" tabindex="-1" role="dialog" aria-labelledby="addCurrencyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('currency.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCurrencyModalLabel">Add Currency</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Currency</label>
            <input type="text" name="currency" class="form-control" placeholder="Name of currency" required>
          </div>
          <div class="form-group">
            <label>Code</label>
            <input type="text" name="code" class="form-control" placeholder="Shortcut key" required>
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

<style>
  body {
      background-color: rgb(27, 120, 213);
      font-family: 'Times New Roman', sans-serif;
  }

  .container {
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      padding: 40px;
      max-width: 900px;
      margin: 50px auto;
  }

  h4 {
      color: #343a40;
      font-weight: bold;
  }

  .btn {
      border-radius: 20px;
      padding: 10px 20px;
  }

  .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
  }

  .btn-secondary {
      background-color: #6c757d;
      border-color: #6c757d;
  }

  .form-group label {
      font-weight: bold;
      color: #495057;
  }

  .form-control {
      border-radius: 20px;
      padding: 10px;
      border: 1px solid #ced4da;
  }

  .btn-success {
      background-color: #28a745;
      border-color: #28a745;
      border-radius: 20px;
      padding: 10px 20px;
  }

  .btn-success:hover {
      background-color: #218838;
      border-color: #1e7e34;
  }
</style>
@endsection
