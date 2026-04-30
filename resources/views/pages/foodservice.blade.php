@extends('layouts.app')

@section('title', 'Layanan Makanan – INDRACO')

@section('content')
<main id="konten">
    <h1 class="visually-hidden">halaman layanan makanan</h1>
    <div class="container">
        @php
            $services = [
                ['name' => 'kopi', 'desc' => 'Dari Sumatra hingga Papua, seri kopi specialty Indonesia yang sudah terkenal ke mancanegara.'],
                ['name' => 'Krimer', 'desc' => 'Krimer berkualitas dengan standar produksi dan penjaminan mutu yang tinggi.'],
                ['name' => 'teh', 'desc' => 'Teh autentik Indonesia dengan pengalaman tradisi ngeteh yang kaya.'],
                ['name' => 'jahe', 'desc' => 'Minuman jahe premium yang memberikan kehangatan seimbang.'],
                ['name' => 'Coklat', 'desc' => 'Dipetik dari kebun kakao asli Indonesia, lini produk coklat kami mengutamakan rasa asli.'],
                ['name' => 'Gula', 'desc' => 'Gula dan berbagai produk pemanis lainnya juga tersedia dalam berbagai tipe.'],
            ];
        @endphp

        @foreach($services as $index => $service)
        <section class="py-5">
            <div class="py-lg-5">
                <h2 class="display-4 fw-thin text-capitalize"><b class="fw-bold">{{ $service['name'] }}</b></h2>
                <p class="lead mb-5">{{ $service['desc'] }}</p>
            </div>
        </section>
        @if(!$loop->last)
        <hr class="m-0">
        @endif
        @endforeach
    </div>
</main>
@endsection
