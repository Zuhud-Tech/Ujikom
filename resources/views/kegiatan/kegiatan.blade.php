<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />

        <style>
                html,
            body {
                height: 100%;
            }

            body {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            main {
                flex: 1;
            }



            .card-kegiatan {
                transition: all 0.3s ease;
                cursor: pointer;
            }

            .card-kegiatan:hover {
                transform: translateY(-8px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15) !important;
            }
        </style>

    </head>

    <body>
        <header>
            @include('partials.navbar')
        </header>
        <main>

           

            <!-- KEGIATAN -->
        @php
            use App\Models\Kegiatan;

            $kegiatans = Kegiatan::latest('tanggal')
                ->get();
        @endphp

        <section class="py-5">

            <div class="container">

                <!-- Judul -->
                <div class="text-center my-5">

                    <h2 class="fw-bold">
                        Kegiatan 
                    </h2>

                    <p class="text-muted">
                        Informasi kegiatan SMKN 4 Bogor
                    </p>

                </div>


                <!-- Card -->
                <div class="row g-4">

                    @foreach ($kegiatans as $kegiatan)

                        <div class="col-12 col-md-4">

                            <a href="{{ route('kegiatan.detail', $kegiatan->id) }}"
                            class="text-decoration-none text-dark">

                                <div class="card card-kegiatan h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                                    <img
                                        src="{{ asset('storage/' . $kegiatan->gambar) }}"
                                        class="card-img-top"
                                        style="height: 230px; object-fit: cover;"
                                        alt="{{ $kegiatan->judul_kegiatan }}"
                                    >

                                    <div class="card-body p-4">

                                        <h5 class="fw-bold mb-3">
                                            {{ $kegiatan->judul_kegiatan }}
                                        </h5>

                                        <p class="text-muted mb-3">
                                            {{ Str::limit($kegiatan->deskripsi_kegiatan, 100) }}
                                        </p>

                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}
                                        </small>

                                    </div>

                                </div>

                            </a>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>


        </main>
        <footer>
            @include('partials.footer')
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
