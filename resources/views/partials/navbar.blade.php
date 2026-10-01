<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand fw-bold d-flex align-items-center" href="/admin/login">
                <img
                    src="{{ asset('img/logo2.png') }}"
                    style="width: 50px; height: 50px; object-fit: cover; margin-top: 0;"
                >
            </a>

            <!-- Toggle Mobile -->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav position-absolute start-50 translate-middle-x fs-5 gap-xl-5">

                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/kegiatan">
                            Kegiatan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/prestasi">
                            Prestasi
                        </a>
                    </li>

                    

                </ul>

            </div>

        </div>
    </nav>

</body>
</html>