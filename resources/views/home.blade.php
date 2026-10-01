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

        <link rel="shortcut icon" href="public\img\logo2.png" type="image/x-icon">

        <style>
            .card {
                transition: all 0.3s ease;
                cursor: pointer;
            }

            .card:hover {
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
            <!-- hero -->
            <div class="text-white text-center d-flex align-items-center justify-content-center min-vh-100" 
            style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('img/banner.jpg') }}'); background-size: cover; background-position: center;">
                <div class="container">
                    <h1 class="display-4 fw-bold mb-4">Selamat datang di website GalP4t</h1>
                    <p class="lead mb-4">Website seputar kegiatan di sekolah SMKN 4 Bogor.</p>
                    
                </div>
            </div>

            <!-- tentang -->
            <div class="text-black text-center d-flex align-items-center justify-content-center" style="min-height: 50vh;">
                <div class="container">
                    <h1 class="display-6 fw-bold mb-4">Tentang</h1>
                    <p class="lead fw-normal">SMKN 4 Bogor adalah Sekolah Menengah Kejuruan (SMK) negeri yang berlokasi di Kota Bogor, Jawa Barat. Berdiri sejak tahun 2009, sekolah ini memiliki akreditasi A dan berkomitmen mencetak lulusan yang unggul, berkarakter, serta kompeten di bidang teknologi dan kejuruan. Dengan semangat "Siap kerja, santun, mandiri, dan kreatif", SMKN 4 Bogor menggabungkan pembelajaran teori dan praktik untuk mempersiapkan siswa menghadapi dunia kerja, melanjutkan pendidikan, maupun berwirausaha
                
                </div>
            </div>

            <!-- jurusan -->
            <div class="py-5">
                <div class="container">

                    <h1 class="text-black fw-bold text-center mb-5">
                        Jurusan
                    </h1>

                    <div class="row g-4">

                        <!-- PPLG -->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="card-jurusan h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                                <img src="{{ asset('img/pplg.png') }}"
                                    class="card-img-top"
                                    style="height: 250px; object-fit: cover;">

                                <div class="card-body text-center p-4">
                                    <h5 class="fw-bold">PPLG</h5>

                                    <p class="text-muted mb-0">
                                        Pengembangan Perangkat Lunak dan Gim
                                    </p>
                                </div>

                            </div>
                        </div>


                        <!-- TPFL -->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="card-jurusan h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                                <img src="{{ asset('img/tp.png') }}"
                                    class="card-img-top"
                                    style="height: 250px; object-fit: cover;">

                                <div class="card-body text-center p-4">
                                    <h5 class="fw-bold">TPFL</h5>

                                    <p class="text-muted mb-0">
                                        Teknik Pengelasan dan Fabrikasi Logam
                                    </p>
                                </div>

                            </div>
                        </div>


                        <!-- TO -->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="card-jurusan h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                                <img src="{{ asset('img/to.png') }}"
                                    class="card-img-top"
                                    style="height: 250px; object-fit: cover;">

                                <div class="card-body text-center p-4">
                                    <h5 class="fw-bold">TO</h5>

                                    <p class="text-muted mb-0">
                                        Teknik Otomotif
                                    </p>
                                </div>

                            </div>
                        </div>


                        <!-- TJKT -->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="card-jurusan h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                                <img src="{{ asset('img/tkj.png') }}"
                                    class="card-img-top"
                                    style="height: 250px; object-fit: cover;">

                                <div class="card-body text-center p-4">
                                    <h5 class="fw-bold">TJKT</h5>

                                    <p class="text-muted mb-0">
                                        Teknik Jaringan Komputer dan Telekomunikasi
                                    </p>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>


        <!-- Kegiatan -->
        @php
            use App\Models\Kegiatan;
            use Illuminate\Support\Facades\Storage;

            $kegiatans = Kegiatan::latest('tanggal')
                ->take(3)
                ->get();
        @endphp

        <div class="py-5">
            <div class="container">

                <h1 class="text-center fw-bold mb-5">
                    Kegiatan Terbaru
                </h1>

                <div class="row g-4">

                    @foreach ($kegiatans as $kegiatan)

                    <div class="col-12 col-md-4">

                        <a href="{{ route('kegiatan.detail', $kegiatan->id) }}"
                            class="text-decoration-none text-dark">

                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                                <img
                                    src="{{ Storage::url($kegiatan->gambar) }}"
                                    class="card-img-top"
                                    style="height: 250px; object-fit: cover;"
                                    alt="{{ $kegiatan->judul_kegiatan }}"
                                >

                                <div class="card-body p-4">

                                    <h5 class="fw-bold">
                                        {{ $kegiatan->judul_kegiatan }}
                                    </h5>

                                    <p class="text-muted mb-2">
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

            <div class ="text-center">
                <a href ="/kegiatan" class="btn btn-dark my-5 ">
                    Lihat yang Lain
                </a>
            </div>
                

            </div>
        </div>

        <!-- prestasi -->
        @php
            use App\Models\Prestasi;

            $prestasis = Prestasi::latest('tanggal')
                ->take(3)
                ->get();
        @endphp

        <div class="py-5">
            <div class="container">

                <h1 class="text-center fw-bold mb-5">
                    Prestasi Terbaru
                </h1>

                <div class="row g-4">

                    @foreach ($prestasis as $prestasi)

                        <div class="col-12 col-md-4">

                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

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

                            </div>

                        </div>

                    @endforeach

                </div>

                <div class ="text-center">
                <a href ="/prestasi" class="btn btn-dark my-5 ">
                    Lihat yang Lain
                </a>
            </div>

            </div>
        </div>

        <!-- penilaian -->
        <section id="penilaian" class="py-5" style="background-color: #ffffff;">
            <div class="container">

                <div class="text-center mb-5">
                    <h2 class="fw-bold">Penilaian Website</h2>
                    <p class="text-muted">
                        Berikan penilaian Anda terhadap website SMKN 4 Bogor.
                    </p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">

                                <form action="{{ route('penilaian.store') }}" method="POST">

                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">
                                            Nama
                                        </label>

                                        <input
                                            type="text"
                                            name="nama"
                                            class="form-control"
                                            placeholder="Masukkan nama"
                                            required
                                        >
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">
                                            Rating
                                        </label>

                                        <select name="rating" class="form-select" required>
                                            <option value="">Pilih rating</option>
                                            <option value="5">★★★★★ - Sangat Baik</option>
                                            <option value="4">★★★★☆ - Baik</option>
                                            <option value="3">★★★☆☆ - Cukup</option>
                                            <option value="2">★★☆☆☆ - Kurang</option>
                                            <option value="1">★☆☆☆☆ - Sangat Kurang</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">
                                            Komentar
                                        </label>

                                        <textarea
                                            name="komentar"
                                            class="form-control"
                                            rows="4"
                                            placeholder="Tulis komentar Anda..."
                                            required
                                        ></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        Kirim Penilaian
                                    </button>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        

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

