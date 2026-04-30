@extends('layouts.app')

@section('title', 'Mesin-mesin & Peralatan Khusus – INDRACO')

@section('content')
<main id="konten">
    <h1 class="visually-hidden">halaman mesin-mesin & peralatan khusus</h1>
    <div class="container">
        <!-- Section: Mesin Kopi -->
        <section class="py-5">
            <div class="py-lg-5">
                <h2 class="display-4 fw-thin text-capitalize">mesin <br> <b class="fw-bold">kopi</b></h2>
                <p class="lead mb-5">Menjaga kualitas kopi tetap prima lewat proses cermat yang dilakukan dengan mesin kopi terbaik.</p>
                <ul class="list-unstyled mb-0 row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-gap-5 gx-md-5">
                    @php
                        $coffeeMachines = [
                            ['name' => 'Mesin kopi full-otomatis', 'desc' => 'Siapkan kopi dalam hitungan menit, dengan hanya tap pada mesin yang mudah penggunaannya.', 'img' => 'eq-coffee-machine-full-auto.png'],
                            ['name' => 'Mesin kopi semi-otomatis', 'desc' => 'Sajikan kopi dengan mudah, memanfaatkan mesin semi-otomatis yang terpercaya.', 'img' => 'eq-coffee-machine-semi-auto.png'],
                            ['name' => 'Sistem seduh kopi', 'desc' => 'Sistem penyeduhan kopi yang sesuai untuk berbagai keperluan dan metode penyajian.', 'img' => 'eq-seduh-kopi.png'],
                            ['name' => 'Mesin Kapsul Kopi', 'desc' => 'Menyajikan kopi dengan lebih mudah. Mesin kapsul kopi yang mudah digunakan.', 'img' => 'eq-capsules-machine.png'],
                            ['name' => 'Grinder', 'desc' => 'Untuk penggunaan pribadi dan profesional, dapatkan manfaat terbaik dari mesin giling kopi kami.', 'img' => 'eq-grinder.png'],
                        ];
                    @endphp
                    @foreach($coffeeMachines as $item)
                    <li class="col">
                        <article>
                            <img src="{{ asset('images/' . $item['img']) }}" alt="" aria-hidden="true" loading="lazy" class="theme-image" style="aspect-ratio: 1/1; width: 30%; object-fit: contain;">
                            <h3 class="fw-bold fs-4 text-capitalize my-3">{{ $item['name'] }}</h3>
                            <p>{{ $item['desc'] }}</p>
                        </article>
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>

        <hr class="m-0">

        <!-- Section: Dispenser -->
        <section class="py-5">
            <div class="py-lg-5">
                <h2 class="display-4 fw-thin text-capitalize">dispenser <br> <b class="fw-bold">minuman</b></h2>
                <p class="lead mb-5">Set dispenser minuman dengan teknologi terbaru untuk berbagai acara.</p>
                <ul class="list-unstyled mb-0 row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-gap-5 gx-md-5">
                    <li class="col">
                        <article>
                            <img src="{{ asset('images/eq-instant-drink-machine.png') }}" alt="" aria-hidden="true" loading="lazy" class="theme-image" style="aspect-ratio: 1/1; width: 30%; object-fit: contain;">
                            <h3 class="fw-bold fs-4 text-capitalize my-3">Mesin minuman instan</h3>
                            <p>Jaga kualitas minuman tetap paling baik, dan sajikan lebih baik menggunakan mesin minuman instan kami.</p>
                        </article>
                    </li>
                    <li class="col">
                        <article>
                            <img src="{{ asset('images/eq-dispenser-cold.png') }}" alt="" aria-hidden="true" loading="lazy" class="theme-image" style="aspect-ratio: 1/1; width: 30%; object-fit: contain;">
                            <h3 class="fw-bold fs-4 text-capitalize my-3">Dispenser minuman dingin</h3>
                            <p>Untuk berbagai jenis minuman segar! Dispenser minuman dingin kami telah siap untuk berbagai kegunaan.</p>
                        </article>
                    </li>
                </ul>
            </div>
        </section>

        <hr class="m-0">

        <!-- Section: Aksesori -->
        <section class="py-5">
            <div class="py-lg-5">
                <h2 class="display-4 fw-thin text-capitalize">aksesori</h2>
                <p class="lead mb-5">Dari mesin pengaduk susu sampai gelas berlapis dua, nikmati alat-alat tradisi kami.</p>
                <ul class="list-unstyled mb-0 row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-gap-5 gx-md-5">
                    @php
                        $accessories = [
                            ['name' => 'Mesin Pengaduk Susu', 'desc' => 'Menjaga kualitas produk susu Anda pada tingkat kesegaran paling tinggi.', 'img' => 'eq-acc-milk-shake.png'],
                            ['name' => 'Ketel elektrik', 'desc' => 'Menjaga kopi dan teh pada suhu optimum memerlukan dedikasi khusus.', 'img' => 'eq-acc-electric-ketel.png'],
                            ['name' => 'French Press', 'desc' => 'Sentuhan artistik dari alat French Press kini lebih dekat dengan keseharian Anda.', 'img' => 'eq-acc-french-press.png'],
                            ['name' => 'Moka Pot', 'desc' => 'Menggunakan sistem aliran moka pot yang legendaris, menghasilkan pengalaman kopi yang nyata.', 'img' => 'eq-acc-moka-pot.png'],
                            ['name' => 'Gelas Dua Lapis', 'desc' => 'Sentuhan artistik dalam penyajian kopi, semua dalam bentuk gelas unik ini.', 'img' => 'eq-acc-2glass.png'],
                        ];
                    @endphp
                    @foreach($accessories as $item)
                    <li class="col">
                        <article>
                            <img src="{{ asset('images/' . $item['img']) }}" alt="" aria-hidden="true" loading="lazy" class="theme-image" style="aspect-ratio: 1/1; width: 30%; object-fit: contain;">
                            <h3 class="fw-bold fs-4 text-capitalize my-3">{{ $item['name'] }}</h3>
                            <p>{{ $item['desc'] }}</p>
                        </article>
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
</main>
@endsection
