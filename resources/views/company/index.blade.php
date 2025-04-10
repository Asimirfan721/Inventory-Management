@extends('layouts.app') <!-- or any layout you're using -->

@section('content')
<div class="container">

  <h4 class="mb-4">Comapny Management</h4>

  <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">Back</a>
  <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCurrencyModal">+ Create Currency</button>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Logo</th>
        <th>Name</th>
        <th>currency</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($companies as $index => $company)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $company->code }}</td>
        <td>{{ $company->company }}</td>
        <td>
          <!-- Edit Button triggers modal -->
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $currency->id }}">Edit</button>
        </td>
      </tr>

      <!-- Edit Modal -->
      <div class="modal fade" id="editModal{{ $company->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $currency->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <form action="{{ route('company.update', $company->id) }}" method="POST">
          @csrf
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Edit company</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span>&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>company</label>
                <input type="text" name="company" class="form-control" value="{{ $company->company }}" required>
              </div>
              <div class="form-group">
                <label>Code</label>
                <input type="text" name="code" class="form-control" value="{{ $company->code }}" required>
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

<!-- Add Company Modal -->
<div class="modal fade" id="addCurrencyModal" tabindex="-1" role="dialog" aria-labelledby="addCurrencyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="addCompanyForm" action="{{ route('company.store') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addCurrencyModalLabel">Add  company</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="form-group">
                    <label>Logo</label>
                    <input type="text" name="company" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="code" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Currency</label>
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
<script>
    $(document).ready(function() {
        $('#addCompanyForm').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        let newRow = `
                            <tr>
                                <td>${response.company.id}</td>
                                <td>${response.company.code}</td>
                                <td>${response.company.company}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal${response.company.id}">Edit</button>
                                </td>
                            </tr>
                        `;
                        $('table tbody').append(newRow);
                        $('#addCurrencyModal').modal('hide');
                        $('#addCompanyForm')[0].reset();
                    } else {
                        alert('Error adding company');
                    }
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>
@endsection
