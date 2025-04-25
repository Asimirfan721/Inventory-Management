@extends('layouts.app')

@section('content')

<!-- Create User Button -->
<div class="d-flex justify-content-end mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
        + Create User
    </button>
</div>

<!-- User Table -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">User List</h5>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?? '-' }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>
                        @if($user->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('access.user.index', $user->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('access.user.index', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('access.user.index', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach

                @if($users->isEmpty())
                <tr>
                    <td colspan="8" class="text-center">No users found.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- Include Create User Modal Here -->
<!-- Create User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route('access.user.store') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createUserModalLabel">Create New User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
  
          <div class="modal-body">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" id="name" class="form-control" required>
            </div>
  
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>
  
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" name="phone" id="phone" class="form-control">
            </div>
  
            <div class="mb-3">
              <label for="role" class="form-label">Role</label>
              <select name="role" id="role" class="form-select" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
            </div>
  
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select name="status" id="status" class="form-select" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
  
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>
          </div>
  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
  
        </div>
      </form>
    </div>
  </div>
  

@endsection
