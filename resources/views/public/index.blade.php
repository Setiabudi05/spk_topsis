@extends('public.layouts.app')

@push('css')
@endpush
@push('js')
@endpush

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Sistem Pendukung Keputusan Pemilihan Guru</h1>
                    <p data-aos="fade-up" data-aos-delay="100">Aplikasi ini berguna untuk proses recruitmen guru pada jurusan teknik komputer dan jaringan (TKJ)</p>
                    <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                        @auth
                            <a href="{{ route('public.pendaftaran.index') }}" class="btn-get-started">Daftar Sekarang <i class="bi bi-arrow-right"></i></a>
                        @else
                            <a href="{{ route('login') }}" class="btn-get-started">Daftar Sekarang <i class="bi bi-arrow-right"></i></a>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="{{ asset('assets/public/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up">
            <div class="row gx-0">

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>Who We Are</h3>
                        <h2>Expedita voluptas omnis cupiditate totam eveniet nobis sint iste. Dolores est repellat corrupti reprehenderit.</h2>
                        <p>
                            Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit
                            voluptatum nam et est corrupti.
                        </p>
                        <div class="text-center text-lg-start">
                            <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Read More</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('assets/public/img/about.jpg') }}" class="img-fluid" alt="">
                </div>

            </div>
        </div>

    </section><!-- /About Section -->

    <!-- Values Section -->
    <section id="values" class="values section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Our Values</h2>
            <p>What we value most<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <img src="{{ asset('assets/public/img/values-1.png') }}" class="img-fluid" alt="">
                        <h3>Ad cupiditate sed est odio</h3>
                        <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.</p>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <img src="{{ asset('assets/public/img/values-2.png') }}" class="img-fluid" alt="">
                        <h3>Voluptatem voluptatum alias</h3>
                        <p>Repudiandae amet nihil natus in distinctio suscipit id. Doloremque ducimus ea sit non.</p>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <img src="{{ asset('assets/public/img/values-3.png') }}" class="img-fluid" alt="">
                        <h3>Fugit cupiditate alias nobis.</h3>
                        <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p>
                    </div>
                </div><!-- End Card Item -->

            </div>

        </div>

    </section><!-- /Values Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Happy Clients</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-journal-richtext color-orange flex-shrink-0" style="color: #ee6c20;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-headset color-green flex-shrink-0" style="color: #15be56;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Hours Of Support</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-people color-pink flex-shrink-0" style="color: #bb0852;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Hard Workers</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section><!-- /Stats Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Features</h2>
            <p>Our Advacedd Features<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-5">

                <div class="col-xl-6" data-aos="zoom-out" data-aos-delay="100">
                    <img src="{{ asset('assets/public/img/features.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-xl-6 d-flex">
                    <div class="row align-self-center gy-4">

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Eos aspernatur rem</h3>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Facilis neque ipsa</h3>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Volup amet volupt</h3>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Rerum omnis sint</h3>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Alias possimus</h3>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="700">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Repellendus molli</h3>
                            </div>
                        </div><!-- End Feature Item -->

                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Features Section -->

    <!-- Alt Features Section -->
    <section id="alt-features" class="alt-features section">

        <div class="container">

            <div class="row gy-5">

                <div class="col-xl-7 d-flex order-2 order-xl-1" data-aos="fade-up" data-aos-delay="200">

                    <div class="row align-self-center gy-5">

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-award"></i>
                            <div>
                                <h4>Corporis voluptates sit</h4>
                                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-card-checklist"></i>
                            <div>
                                <h4>Ullamco laboris nisi</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-dribbble"></i>
                            <div>
                                <h4>Labore consequatur</h4>
                                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-filter-circle"></i>
                            <div>
                                <h4>Beatae veritatis</h4>
                                <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-lightning-charge"></i>
                            <div>
                                <h4>Molestiae dolor</h4>
                                <p>Et fuga et deserunt et enim. Dolorem architecto ratione tensa raptor marte</p>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-patch-check"></i>
                            <div>
                                <h4>Explicabo consectetur</h4>
                                <p>Est autem dicta beatae suscipit. Sint veritatis et sit quasi ab aut inventore</p>
                            </div>
                        </div><!-- End Feature Item -->

                    </div>

                </div>

                <div class="col-xl-5 d-flex align-items-center order-1 order-xl-2" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/public/img/alt-features.png') }}" class="img-fluid" alt="">
                </div>

            </div>

        </div>

    </section><!-- /Alt Features Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>F.A.Q</h2>
            <p>Frequently Asked Questions</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

                    <div class="faq-container">

                        <div class="faq-item faq-active">
                            <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                            <div class="faq-content">
                                <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor
                                    rhoncus dolor purus non.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque
                                    eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                            <div class="faq-content">
                                <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl
                                    suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div><!-- End Faq Column-->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">

                    <div class="faq-container">

                        <div class="faq-item">
                            <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque
                                    eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h3>
                            <div class="faq-content">
                                <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                    suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                            <div class="faq-content">
                                <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi. Distinctio ipsam dolore et.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div><!-- End Faq Column-->

            </div>

        </div>

    </section><!-- /Faq Section -->

    <!-- Team Section -->
    {{-- <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Team</h2>
                <p>Our hard working team</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('assets/public/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                                <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum exercitationem iure minima enim corporis et voluptate.</p>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('assets/public/img/team/team-2.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                                <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente.</p>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('assets/public/img/team/team-3.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                                <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates enim aut architecto porro aspernatur molestiae modi.</p>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('assets/public/img/team/team-4.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                                <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut aliquid doloremque ut possimus ipsum officia.</p>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                </div>

            </div>

        </section> --}}
    <!-- /Team Section -->

    <!-- Recent Posts Section -->
    {{-- <section id="recent-posts" class="recent-posts section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Recent Posts</h2>
                <p>Recent posts form our Blog</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-5">

                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset('assets/public/img/blog/blog-1.jpg') }}" class="img-fluid" alt="">
                                <span class="post-date">December 12</span>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">Julia Parker</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                                    </div>
                                </div>

                                <hr>

                                <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                            </div>

                        </div>
                    </div><!-- End post item -->

                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset('assets/public/img/blog/blog-2.jpg') }}" class="img-fluid" alt="">
                                <span class="post-date">July 17</span>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Et repellendus molestiae qui est sed omnis</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">Mario Douglas</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                                    </div>
                                </div>

                                <hr>

                                <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                            </div>

                        </div>
                    </div><!-- End post item -->

                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="post-item position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset('assets/public/img/blog/blog-3.jpg') }}" class="img-fluid" alt="">
                                <span class="post-date">September 05</span>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Quia assumenda est et veritati tirana ploder</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">Lisa Hunter</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Economics</span>
                                    </div>
                                </div>

                                <hr>

                                <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                            </div>

                        </div>
                    </div><!-- End post item -->

                </div>

            </div>

        </section> --}}
    <!-- /Recent Posts Section -->
@endsection
