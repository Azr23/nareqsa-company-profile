<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->company_name ?? 'Company Profile' }}</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            /* Palet warna mengikuti logo kemerahan */
            --brand-primary: #b23a28; 
            --brand-primary-dark: #8a2b1e;
            --brand-secondary: #1e293b; /* Slate Dark */
            --brand-light: #f8fafc;
            --brand-gray: #64748b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--brand-secondary);
            background-color: var(--brand-light);
            overflow-x: hidden;
        }

        /* Utilities */
        .text-primary-brand { color: var(--brand-primary) !important; }
        .bg-primary-brand { background-color: var(--brand-primary) !important; }
        .section-padding { padding: 100px 0; }
        .subtitle {
            color: var(--brand-primary);
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 0.85rem;
            margin-bottom: 1rem;
            display: inline-block;
        }

        /* Navbar */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        .navbar-custom.scrolled {
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .navbar-brand {
            font-weight: 800;
            color: var(--brand-primary) !important;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
        }
        .nav-link {
            font-weight: 600;
            color: var(--brand-secondary) !important;
            margin: 0 10px;
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--brand-primary);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after { width: 100%; }

        /* Buttons */
        .btn-brand {
            background-color: var(--brand-primary);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid var(--brand-primary);
        }
        .btn-brand:hover {
            background-color: transparent;
            color: var(--brand-primary);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(178, 58, 40, 0.2);
        }
        .btn-outline-brand {
            background-color: transparent;
            color: var(--brand-primary);
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid var(--brand-primary);
        }
        .btn-outline-brand:hover {
            background-color: var(--brand-primary);
            color: white;
            transform: translateY(-3px);
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
            position: relative;
            padding-top: 80px;
        }
        .hero-shape {
            position: absolute;
            right: 0;
            top: 0;
            width: 45%;
            height: 100%;
            background-color: var(--brand-primary);
            clip-path: polygon(20% 0, 100% 0, 100% 100%, 0% 100%);
            opacity: 0.04;
            z-index: 0;
        }
        .hero-content { position: relative; z-index: 1; }
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            color: var(--brand-secondary);
        }
        .hero-title span { color: var(--brand-primary); }
        .hero-text {
            font-size: 1.2rem;
            color: var(--brand-gray);
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        /* About Section */
        .about-section { background-color: #ffffff; }
        .about-img-wrap {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        }
        .about-img-wrap::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(45deg, rgba(178,58,40,0.7), rgba(178,58,40,0.1));
            z-index: 1;
        }
        .about-content { padding-left: 3rem; }
        .about-text {
            font-size: 1.1rem;
            color: var(--brand-gray);
            line-height: 1.8;
        }

        /* Services Section */
        .service-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 40px 30px;
            height: 100%;
            transition: all 0.4s ease;
            border: 1px solid rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .service-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: var(--brand-primary);
            z-index: -1;
            transform: scaleY(0);
            transform-origin: bottom;
            transition: transform 0.4s ease;
        }
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(178,58,40,0.15);
        }
        .service-card:hover::before { transform: scaleY(1); }
        .service-icon {
            width: 70px; height: 70px;
            background: rgba(178,58,40,0.1);
            color: var(--brand-primary);
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 2.2rem;
            margin-bottom: 25px;
            transition: all 0.4s ease;
        }
        .service-card:hover .service-icon {
            background: #ffffff;
            color: var(--brand-primary);
            transform: rotateY(360deg);
        }
        .service-title { font-weight: 700; margin-bottom: 15px; transition: color 0.4s; font-size: 1.25rem;}
        .service-desc { color: var(--brand-gray); line-height: 1.7; transition: color 0.4s; }
        .service-card:hover .service-title,
        .service-card:hover .service-desc { color: #ffffff; }

        /* Contact Section */
        .contact-section { background-color: #ffffff; }
        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
            padding: 25px;
            background: var(--brand-light);
            border-radius: 16px;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }
        .contact-item:hover {
            background: #ffffff;
            border-color: rgba(178,58,40,0.1);
            box-shadow: 0 15px 30px rgba(0,0,0,0.05);
            transform: translateX(5px);
        }
        .contact-icon {
            width: 60px; height: 60px;
            background: var(--brand-primary);
            color: #ffffff;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
            margin-right: 20px;
        }
        .contact-info h4 { font-weight: 700; font-size: 1.1rem; margin-bottom: 5px; }
        .contact-info p { color: var(--brand-gray); margin-bottom: 0; font-size: 1rem; line-height: 1.5; }

        /* Footer */
        .footer {
            background-color: var(--brand-secondary);
            color: #ffffff;
            padding: 80px 0 30px;
        }
        .footer-brand { color: #ffffff; font-weight: 800; font-size: 1.8rem; margin-bottom: 20px; display: inline-block; }
        .footer-brand span { color: var(--brand-primary); }
        .footer-text { color: rgba(255,255,255,0.7); line-height: 1.8; }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 60px;
            padding-top: 30px;
            text-align: center;
            color: rgba(255,255,255,0.5);
        }

        /* Responsive */
        @media (max-width: 991px) {
            .hero-title { font-size: 2.8rem; }
            .about-content { padding-left: 0; margin-top: 40px; }
            .hero-shape { display: none; }
        }
        @media (max-width: 768px) {
            .hero-title { font-size: 2.2rem; }
            .section-padding { padding: 70px 0; }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top py-3" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">{{ $profile->company_name ?? 'Logo' }}</a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list fs-1 text-primary-brand"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="#home">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <a href="#contact" class="btn btn-brand w-100">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="hero-shape"></div>
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1000">
                    <span class="subtitle">Selamat Datang di</span>
                    <h1 class="hero-title">{{ $profile->company_name ?? 'Perusahaan Kami' }}</h1>
                    <p class="hero-text">Mitra profesional dan terpercaya untuk mewujudkan visi bisnis Anda. Kami mengedepankan kualitas, inovasi, dan dedikasi dalam setiap langkah operasional kami.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="#about" class="btn btn-brand">Pelajari Lebih Lanjut</a>
                        <a href="#services" class="btn btn-outline-brand">Layanan Kami</a>
                    </div>
                </div>
                <!-- Gambar Hero -->
                <div class="col-lg-5 d-none d-lg-block" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <div style="width:100%; height: 500px; background: url('{{ asset('logo.png') }}') center/contain no-repeat; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section-padding about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                    <div class="about-img-wrap">
                        <img src="{{ asset('logo.png') }}" alt="Tentang Kami" class="img-fluid" style="height: 550px; width: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <div class="about-content">
                        <span class="subtitle">Tentang Kami</span>
                        <h2 class="display-5 fw-bold mb-4">Dedikasi Untuk <span class="text-primary-brand">Kesuksesan</span> Anda</h2>
                        <p class="about-text mb-4">{{ $profile->about ?? 'Deskripsi tentang perusahaan kami. Kami berfokus pada memberikan solusi terbaik untuk setiap tantangan bisnis dengan pendekatan modern dan efisien.' }}</p>
                        <div class="row mt-5">
                            <div class="col-sm-6 mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <i class="bi bi-star-fill text-primary-brand fs-4"></i>
                                    </div>
                                    <h5 class="fw-bold mb-0">Profesional</h5>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <i class="bi bi-lightning-fill text-primary-brand fs-4"></i>
                                    </div>
                                    <h5 class="fw-bold mb-0">Inovatif</h5>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <i class="bi bi-shield-check text-primary-brand fs-4"></i>
                                    </div>
                                    <h5 class="fw-bold mb-0">Terpercaya</h5>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <i class="bi bi-graph-up-arrow text-primary-brand fs-4"></i>
                                    </div>
                                    <h5 class="fw-bold mb-0">Berkembang</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="section-padding">
        <div class="container">
            <div class="text-center mb-5 pb-3" data-aos="fade-up" data-aos-duration="1000">
                <span class="subtitle">Keahlian Kami</span>
                <h2 class="display-5 fw-bold">Layanan Terbaik <span class="text-primary-brand">Kami</span></h2>
            </div>
            <div class="row g-4">
                @foreach($services as $index => $service)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ ($index % 3) * 100 }}">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi {{ $service->icon }}"></i>
                        </div>
                        <h4 class="service-title">{{ $service->title }}</h4>
                        <p class="service-desc">{{ $service->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section-padding contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                    <span class="subtitle">Mari Terhubung</span>
                    <h2 class="display-5 fw-bold mb-4">Hubungi <span class="text-primary-brand">Kami</span></h2>
                    <p class="text-muted fs-5 mb-5">Kami siap mendengarkan kebutuhan Anda dan memberikan solusi yang paling tepat. Jangan ragu untuk menghubungi tim kami.</p>
                    
                    <div class="contact-info-wrapper mt-4">
                        <div class="contact-item">
                            <div class="contact-icon"><i class="bi bi-geo-alt"></i></div>
                            <div class="contact-info">
                                <h4>Alamat Kantor</h4>
                                <p>{{ $profile->address ?? 'Alamat belum tersedia saat ini' }}</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon"><i class="bi bi-envelope"></i></div>
                            <div class="contact-info">
                                <h4>Email</h4>
                                <p>{{ $profile->email ?? 'info@perusahaan.com' }}</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon"><i class="bi bi-telephone"></i></div>
                            <div class="contact-info">
                                <h4>Telepon</h4>
                                <p>{{ $profile->phone ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <div class="bg-light p-4 p-md-5 rounded-4 shadow-sm border border-light h-100 d-flex flex-column justify-content-center">
                        <h3 class="fw-bold mb-4">Kirim Pesan Cepat</h3>
                        <form>
                            <div class="mb-4">
                                <label class="form-label fw-medium">Nama Lengkap</label>
                                <input type="text" class="form-control form-control-lg bg-white border-0 shadow-none px-4" placeholder="Masukkan nama Anda">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-medium">Alamat Email</label>
                                <input type="email" class="form-control form-control-lg bg-white border-0 shadow-none px-4" placeholder="Masukkan email Anda">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-medium">Pesan Anda</label>
                                <textarea class="form-control form-control-lg bg-white border-0 shadow-none px-4 py-3" rows="4" placeholder="Tuliskan pesan Anda di sini..."></textarea>
                            </div>
                            <button type="button" class="btn btn-brand w-100 btn-lg mt-2">Kirim Pesan Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <a href="#" class="footer-brand text-decoration-none">{{ $profile->company_name ?? 'CV Nareqsa Jaya' }}</a>
                    <p class="footer-text mt-3 pe-lg-5">Menjadi mitra terbaik untuk perjalanan bisnis Anda menuju kesuksesan dengan layanan profesional, inovatif, dan terpercaya. Kami hadir untuk memberikan solusi nyata.</p>
                    <div class="d-flex gap-3 mt-4">
                        <a href="#" class="btn btn-outline-light rounded-circle" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; transition: 0.3s;"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-outline-light rounded-circle" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; transition: 0.3s;"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="btn btn-outline-light rounded-circle" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; transition: 0.3s;"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                    <h5 class="text-white fw-bold mb-4 fs-5">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a href="#home" class="text-white-50 text-decoration-none" style="transition: 0.3s;">Beranda</a></li>
                        <li class="mb-3"><a href="#about" class="text-white-50 text-decoration-none" style="transition: 0.3s;">Tentang Kami</a></li>
                        <li class="mb-3"><a href="#services" class="text-white-50 text-decoration-none" style="transition: 0.3s;">Layanan</a></li>
                        <li class="mb-3"><a href="#contact" class="text-white-50 text-decoration-none" style="transition: 0.3s;">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-white fw-bold mb-4 fs-5">Informasi Tambahan</h5>
                    <ul class="list-unstyled footer-text">
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-geo-alt-fill text-primary-brand me-3 fs-5"></i>
                            <span>{{ $profile->address ?? 'Alamat Kantor Utama' }}</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-envelope-fill text-primary-brand me-3 fs-5"></i>
                            <span>{{ $profile->email ?? 'email@domain.com' }}</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-telephone-fill text-primary-brand me-3 fs-5"></i>
                            <span>{{ $profile->phone ?? '-' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">&copy; {{ date('Y') }} {{ $profile->company_name ?? 'Perusahaan' }}. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS Animation
        AOS.init({
            once: true,
            offset: 50,
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
                navbar.classList.replace('py-3', 'py-2');
            } else {
                navbar.classList.remove('scrolled');
                navbar.classList.replace('py-2', 'py-3');
            }
        });
    </script>
</body>
</html>