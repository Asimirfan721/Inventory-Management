@extends(layouts.app)

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
    Create User
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createUserModalLabel">Create New User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">
            <div class="mb-3">
              <label>Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
  
            <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
  
            <div class="mb-3">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
  
            <div class="mb-3">
              <label>Phone</label>
              <input type="text" name="phone" class="form-control">
            </div>
  
            <div class="mb-3">
              <label>Role</label>
              <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
            </div>
  
            <div class="mb-3">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Create User</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  