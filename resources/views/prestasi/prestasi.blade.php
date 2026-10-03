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

            .card-prestasi {
                transition: all 0.3s ease;
                cursor: pointer;
            }

            .card-prestasi:hover {
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

       
        
        <!-- prestasi -->
            @php
                use App\Models\Prestasi;

                $prestasis = Prestasi::latest('tanggal')
                    
                    ->get();
            @endphp

            <div class="py-5">
                <div class="container">

                    <!-- Judul -->
                    <div class="text-center my-5">

                        <h2 class="fw-bold">
                            Prestasi
                        </h2>

                        <p class="text-muted">
                            Informasi prestasi SMKN 4 Bogor
                        </p>

                    </div>

                    <div class="row g-4">

                        @foreach ($prestasis as $prestasi)

                            <div class="col-12 col-md-4">

                                    <a href="{{ route('prestasi.detail', $prestasi->id) }}"class="text-decoration-none text-dark">
                                
                                        <div class="card card-prestasi h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                                            <img
                                                src="{{ asset('storage/' . $prestasi->gambar) }}"
                                                class="card-img-top"
                                                style="height: 250px; object-fit: cover;"
                                                alt="{{ $prestasi->judul_prestasi }}"
                                            >

                                            <div class="card-body p-4">

                                                <h5 class="fw-bold">
                                                    {{ $prestasi->judul_prestasi }}
                                                </h5>

                                                <p class="text-muted mb-2">
                                                    {{ Str::limit($prestasi->deskripsi_prestasi, 100) }}
                                                </p>

                                                <small class="text-muted">
                                                    {{ \Carbon\Carbon::parse($prestasi->tanggal)->format('d M Y') }}
                                                </small>

                                            </div>
                                    </a>
                                </div>

                            </div>

                        @endforeach

                    </div>

                    

                </div>
            </div>
        </main>

        <footer>
            @include('partials.footer')
        </footer>
        
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
