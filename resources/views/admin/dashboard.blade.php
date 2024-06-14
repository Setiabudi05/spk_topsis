@extends('layouts.master')

@section('content')
    <link rel="stylesheet" href="/assets/scss/iconly.scss">

    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Data Kriteria</h6>
                                    <h6 class="font-extrabold mb-0">{{ $total_kriteria }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Data Alternatif</h6>
                                    <h6 class="font-extrabold mb-0">{{ $total_alternatif }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Data Penilaian</h6>
                                    <h6 class="font-extrabold mb-0">{{ $total_penilaian }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Data User</h6>
                                    <h6 class="font-extrabold mb-0">{{ $total_user }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Explanation Section --}}
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sistem Pendukung Keputusan Metode TOPSIS</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                Metode TOPSIS (Technique for Order Preference by Similarity to Ideal Solution) adalah salah satu metode dalam Sistem Pendukung Keputusan (SPK) yang digunakan untuk mencari solusi terbaik dari sejumlah alternatif. Prinsip dasar dari metode ini adalah bahwa alternatif yang dipilih harus memiliki jarak terdekat dari solusi ideal positif dan jarak terjauh dari solusi ideal negatif.
                            </p>
                            <p>
                                Langkah-langkah dalam metode TOPSIS adalah sebagai berikut:
                            </p>
                            <ol>
                                <li><b>Normalisasi Matriks Keputusan:</b> Langkah ini dilakukan untuk mengubah berbagai atribut ke dalam skala yang dapat diperbandingkan.</li>
                                <li><b>Normalisasi Matriks Keputusan Terbobot:</b> Matriks yang sudah dinormalisasi kemudian dikalikan dengan bobot masing-masing kriteria.</li>
                                <li><b>Menentukan Solusi Ideal Positif dan Negatif:</b> Solusi ideal positif terdiri dari elemen-elemen terbaik dari setiap kriteria, sedangkan solusi ideal negatif terdiri dari elemen-elemen terburuk dari setiap kriteria.</li>
                                <li><b>Menghitung Jarak Setiap Alternatif terhadap Solusi Ideal Positif dan Negatif:</b> Jarak ini dihitung dengan menggunakan metode Euclidean.</li>
                                <li><b>Menghitung Nilai Preferensi untuk Setiap Alternatif:</b> Nilai preferensi ini dihitung untuk menentukan peringkat setiap alternatif. Alternatif dengan nilai preferensi tertinggi adalah alternatif terbaik.</li>
                            </ol>
                            <p>
                                Metode TOPSIS sangat efektif karena sederhana, mudah dipahami, dan mampu mempertimbangkan baik jarak terhadap solusi ideal positif maupun negatif. Ini membuat TOPSIS menjadi salah satu metode yang populer dalam berbagai aplikasi SPK.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Need: Apexcharts -->
<script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="assets/static/js/pages/dashboard.js"></script>
@endsection