@extends('layouts.app')

@section('content')
<div class="container"> 
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <h3 class="mb-4">Currency Management</h3>

  <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Home</a>
  <a href="{{ route('currency.create') }}" class="btn btn-primary mb-3">+ Create Currency</a>
  
  <table class="table table-bordered" id="currencyTable">
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
      <tr id="row-{{ $currency->id }}">
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

