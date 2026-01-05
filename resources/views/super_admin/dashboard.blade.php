@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Super Admin Dashboard</div>

                <div class="card-body">
                    <p>Welcome to the Super Admin Dashboard!</p>
                    <p>Your role: {{ auth()->user()->role }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection