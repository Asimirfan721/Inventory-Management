@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Company Management</h4>

    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">Back</a>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCompanyModal">+ Create Company</button>

    <table class="table table-bordered" id="companyTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Logo</th>
                <th>Name</th>
                <th>Currency</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $index => $company)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $company->Logo }}</td>
                <td>{{ $company->Name }}</td>
                <td>{{ $company->currency }}</td>
                <td>
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $company->id }}">Edit</button>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $company->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $company->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('company.update', $company->id) }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Company</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                <label>Logo</label>
<input type="text" name="Logo" class="form-control" required>

<label>Name</label>
<input type="text" name="Company" class="form-control" required>

<label>Currency</label>
<input type="text" name="currency" class="form-control" required>
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
<div class="modal fade" id="addCompanyModal" tabindex="-1" role="dialog" aria-labelledby="addCompanyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="addCompanyForm" action="{{ route('company.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Company</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="text" name="Logo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Currency</label>
                        <input type="text" name="currency" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Company</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#addCompanyForm').on('submit', function (e) {
            e.preventDefault();
            let form = $(this);
            let formData = form.serialize();

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: formData,
                success: function (response) {
                    if (response.success) {
                        let newRow = `
                            <tr>
                                <td>#</td>
                                <td>${response.company.logo}</td>
                                <td>${response.company.name}</td>
                                <td>${response.company.currency}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal${response.company.id}">Edit</button>
                                </td>
                            </tr>
                        `;
                        $('#companyTable tbody').append(newRow);
                        $('#addCompanyModal').modal('hide');
                        form[0].reset();
                    } else {
                        alert('Failed to add company.');
                    }
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                    alert('An error occurred.');
                }
            });
        });
    });
</script>
@endsection
