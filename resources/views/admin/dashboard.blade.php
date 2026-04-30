@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')
@section('page_title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title">Total Products</h5>
                <h2 class="display-4">{{ \App\Models\Product::count() ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 bg-success text-white">
            <div class="card-body">
                <h5 class="card-title">Active Brands</h5>
                <h2 class="display-4">{{ \App\Models\Brand::where('status', 'active')->count() ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 bg-info text-white">
            <div class="card-body">
                <h5 class="card-title">Subscribers</h5>
                <h2 class="display-4">{{ \App\Models\Subscription::count() ?? 0 }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <h5>Selamat datang di Admin Panel INDRACO!</h5>
        <p class="text-muted">Gunakan menu di sebelah kiri untuk mengelola konten website Anda.</p>
    </div>
</div>
@endsection
