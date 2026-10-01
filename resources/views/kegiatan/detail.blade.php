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
    </head>

    <body>
        <header>
            @include('partials.navbar')
        </header>
        <main class="py-5">

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-8 py-5">

                        <img
                            src="{{ asset('storage/' . $kegiatan->gambar) }}"
                            class="img-fluid rounded-4 shadow mb-4"
                            style="width: 400px;"
                            alt="{{ $kegiatan->judul_kegiatan }}"
                        >

                        <h1 class="fw-bold">
                            {{ $kegiatan->judul_kegiatan }}
                        </h1>

                        <p class="text-muted">
                            {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}
                        </p>

                        <hr>

                        <p>
                            {{ $kegiatan->deskripsi_kegiatan }}
                        </p>

                        <a href="{{ url('/kegiatan') }}" class="btn btn-dark">
                            ← Kembali
                        </a>

                    </div>

                </div>

            </div>

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
