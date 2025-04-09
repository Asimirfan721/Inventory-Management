@extends('layouts.app') <!-- or any layout you're using -->

@section('content')
<div class="container">
    <h4 class="mb-4">Currency Management</h4>

    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCurrencyModal">+ Create Currency</button>

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
                <td><button class="btn btn-sm btn-primary">Edit</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
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
                    <input type="text" name="currency" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Code</label>
                    <input type="text" name="code" class="form-control" required>
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
@endsection
