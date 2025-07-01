@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="d-flex">
    <!-- Sidebar  is here-->
    <div class="sidebar bg-dark text-white">
        <h4 class="mb-4 text-center">SILVER LIBERTY LLC</h4>
        <div class="accordion" id="sidebarAccordion">
            <ul class="list-unstyled">
                <li class="mb-2 fw-bold text-uppercase small">Main</li>
                <li>
                    <a href="#" class="text-white d-block mb-2">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a data-bs-toggle="collapse" href="#accessSubmenu" role="button" aria-expanded="false"
                       aria-controls="accessSubmenu" class="btn btn-secondary w-100 text-start btn-sm mb-2">
                        <i class="bi bi-person-lock me-2"></i> Access ▾
                    </a>
                    <div class="collapse" id="accessSubmenu" data-bs-parent="#sidebarAccordion">
                        <ul class="list-unstyled ps-3 mt-2">
                            <li><a href="{{ route('access.user.index') }}" class="text-white d-block mb-1">User Management</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-2 fw-bold text-uppercase small mt-3">Management</li>
                <li>
                    <a data-bs-toggle="collapse" href="#companySubmenu" role="button" aria-expanded="false"
                       aria-controls="companySubmenu" class="btn btn-primary w-100 text-start btn-sm mb-2">
                        <i class="bi bi-building me-2"></i> Company ▾
                    </a>
                    <div class="collapse" id="companySubmenu" data-bs-parent="#sidebarAccordion">
                        <ul class="list-unstyled ps-3 mt-2">
                            <li><a href="{{ route('company.create') }}" class="text-white d-block mb-1">Add Company</a></li>
                            <li><a href="{{ route('company.index') }}" class="text-white d-block mb-1">Browse Company</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-bs-toggle="collapse" href="#productSubmenu" role="button" aria-expanded="false"
                       aria-controls="productSubmenu" class="btn btn-secondary w-100 text-start btn-sm mb-2">
                        <i class="bi bi-box-seam me-2"></i> Product ▾
                    </a>
                    <div class="collapse" id="productSubmenu" data-bs-parent="#sidebarAccordion">
                        <ul class="list-unstyled ps-3 mt-2">
                            <li><a href="{{ route('product.create') }}" class="text-white d-block mb-1">Add Product</a></li>
                            <li><a href="{{ route('product.index') }}" class="text-white d-block mb-1">Browse Product</a></li>
                            <li><a href="{{ route('product.brand')}}" class="text-white d-block mb-1">Brand</a></li>
                            <li><a href="{{ route('product.category')}}" class="text-white d-block mb-1">Category</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-bs-toggle="collapse" href="#supplierSubmenu" role="button" aria-expanded="false"
                       aria-controls="supplierSubmenu" class="btn btn-danger w-100 text-start btn-sm mb-2">
                        <i class="bi bi-truck me-2"></i> Supplier ▾
                    </a>
                    <div class="collapse" id="supplierSubmenu" data-bs-parent="#sidebarAccordion">
                        <ul class="list-unstyled ps-3 mt-2">
                            <li><a href="{{ route('supplier.index') }}" class="text-white d-block mb-1">Browse Supplier</a></li>
                            <li><a href="{{ route('supplier.create') }}" class="text-white d-block mb-1">Add Supplier</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-bs-toggle="collapse" href="#customerSubmenu" role="button" aria-expanded="false"
                       aria-controls="customerSubmenu" class="btn btn-primary w-100 text-start btn-sm mb-2">
                        <i class="bi bi-people me-2"></i> Customer ▾
                    </a>
                    <div class="collapse" id="customerSubmenu" data-bs-parent="#sidebarAccordion">
                        <ul class="list-unstyled ps-3 mt-2">
                            <li><a href="{{ route('customer.index') }}" class="text-white d-block mb-1">Browse Customer</a></li>
                            <li><a href="{{ route('customer.create') }}" class="text-white d-block mb-1">Add Customer</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-bs-toggle="collapse" href="#expenseSubmenu" role="button" aria-expanded="false"
                       aria-controls="expenseSubmenu" class="btn btn-secondary w-100 text-start btn-sm mb-2">
                        <i class="bi bi-cash-stack me-2"></i> Expense ▾
                    </a>
                    <div class="collapse" id="expenseSubmenu" data-bs-parent="#sidebarAccordion">
                        <ul class="list-unstyled ps-3 mt-2">
                            <li><a href="{{ route('expense.index') }}" class="text-white d-block mb-1">Browse Expense</a></li>
                            <li><a href="{{ route('expense.create') }}" class="text-white d-block mb-1">Add Expense</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-bs-toggle="collapse" href="#accountSubmenu" role="button" aria-expanded="false"
                       aria-controls="accountSubmenu" class="btn btn-danger w-100 text-start btn-sm mb-2">
                        <i class="bi bi-wallet2 me-2"></i> Account ▾
                    </a>
                    <div class="collapse" id="accountSubmenu" data-bs-parent="#sidebarAccordion">
                        <ul class="list-unstyled ps-3 mt-2">
                            <li><a href="{{ route('account.index') }}" class="text-white d-block mb-1">Browse Account</a></li>
                            <li><a href="{{ route('account.create') }}" class="text-white d-block mb-1">Add Account</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-bs-toggle="collapse" href="#stockSubmenu" role="button" aria-expanded="false"
                       aria-controls="stockSubmenu" class="btn btn-primary w-100 text-start btn-sm mb-2">
                        <i class="bi bi-archive me-2"></i> Stock ▾
                    </a>
                    <div class="collapse" id="stockSubmenu" data-bs-parent="#sidebarAccordion">
                        <ul class="list-unstyled ps-3 mt-2">
                            <li><a href="{{ route('stock.index') }}" class="text-white d-block mb-1">Browse Stock</a></li>
                            <li><a href="{{ route('stock.create') }}" class="text-white d-block mb-1">Add Stock</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-bs-toggle="collapse" href="#currencySubmenu" role="button" aria-expanded="false"
                       aria-controls="currencySubmenu" class="btn btn-info w-100 text-start btn-sm mb-2">
                        <i class="bi bi-currency-exchange me-2"></i> Currency ▾
                    </a>
                    <div class="collapse" id="currencySubmenu" data-bs-parent="#sidebarAccordion">
                        <ul class="list-unstyled ps-3 mt-2">
                            <li><a href="{{ route('currency.index') }}" class="text-white d-block mb-1">Browse Currency</a></li>
                            <li><a href="{{ route('currency.create') }}" class="text-white d-block mb-1">Add Currency</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content w-100">
        <div class="topbar d-flex justify-content-between align-items-center p-3">
            <h5 class="mb-0">Home</h5>
            <i class="bi bi-person-circle" style="font-size: 24px;"></i>
        </div>
        <div class="p-4 bg-white rounded shadow-sm mt-2">
            <h3>Welcome Super Admin</h3>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

<style>
.sidebar {
    overflow-y: auto;
    min-width: 260px;
    padding: 10px;
}
.sidebar h4 {
    font-size: 16px;
    margin-bottom: 10px;
}
.sidebar ul li a {
    font-size: 13px;
    padding: 5px;
}
</style>
