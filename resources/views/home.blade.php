@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h3>Welcome to the Currency App</h3>
    <a href="{{ route('currency.index') }}" class="btn btn-primary mt-4">Currency</a>
</div>
@endsection
