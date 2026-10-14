<?php
/**
 * PT. Jafindo Innovatech Permai
 * Single-Page Company Profile Website
 * 
 * Teknologi: PHP Native, HTML5, CSS3, Vanilla JavaScript
 * Dijalankan menggunakan XAMPP
 * 
 * KONFIGURASI: Ubah data di bawah ini sesuai informasi resmi perusahaan.
 */

// ===== KONFIGURASI DATA PERUSAHAAN =====
// Ganti placeholder di bawah ini dengan data resmi perusahaan
$company = [
    'name'    => 'PT. Jafindo Innovatech Permai',
    'short'   => 'Jafindo',
    'tagline' => 'Connecting Innovation & Technology',
    'email'   => 'subaguskasep@gmail.com',       // Ganti dengan email resmi
    'phone'   => '6281288008091',                      // Ganti dengan nomor resmi
    'phone_link' => 'https://wa.me/6281288008091',     // Link WhatsApp
    'address' => 'Jl. Permata Raya No.96, RT.004/RW.015, Tanah Tinggi, Kec. Tangerang, Kota Tangerang, Banten 15119',  // Ganti dengan alamat resmi
    'address_link' => 'https://maps.app.goo.gl/XVe3zSZyi1Ay5o9y9',  // Link Google Maps
    'city'    => 'Tangerang',                         // Ganti dengan kota resmi
];

// Sosial media (kosongkan jika belum tersedia)
$social = [
    'facebook'  => '#',
    'linkedin'  => '#',
    'instagram' => '#',
    'youtube'   => '#',
];

// Base path untuk aset
$base = '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($company['name']); ?> - Perusahaan yang menghadirkan solusi inovatif dan teknologi terdepan untuk mendukung kebutuhan bisnis Anda.">
    <meta name="keywords" content="Jafindo, Innovatech, solusi bisnis, teknologi, inovasi, Indonesia">
    <meta name="author" content="<?php echo htmlspecialchars($company['name']); ?>">
    <title><?php echo htmlspecialchars($company['name']); ?> | Solusi Inovatif untuk Bisnis Anda</title>

    <!-- Google Fonts - Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">

    <!-- Favicon (placeholder berbasis SVG) -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='15' fill='%234053FF'/><text x='50%25' y='55%25' font-family='Arial' font-size='45' font-weight='bold' fill='white' text-anchor='middle' dominant-baseline='middle'>JI</text></svg>">
</head>
<body>

    <!-- ===== TOP BAR ===== -->
    <div class="top-bar" id="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <div class="top-bar-item">
                    <i class="fa-regular fa-envelope"></i>
                    <a href="mailto:<?php echo htmlspecialchars($company['email']); ?>"><?php echo htmlspecialchars($company['email']); ?></a>
                </div>
                <div class="top-bar-item">
                    <i class="fa-solid fa-phone"></i>
                    <a href="<?php echo htmlspecialchars($company['phone_link']); ?>" target="_blank"><?php echo htmlspecialchars($company['phone']); ?></a>
                </div>
                <div class="top-bar-item">
                    <i class="fa-solid fa-location-dot"></i>
                    <a href="<?php echo htmlspecialchars($company['address_link']); ?>" target="_blank"><?php echo htmlspecialchars($company['address']); ?> - <?php echo htmlspecialchars($company['city']); ?></a>
                </div>
            </div>
            <div class="top-bar-right">
                <a href="<?php echo $social['facebook']; ?>" class="top-bar-social" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="<?php echo $social['linkedin']; ?>" class="top-bar-social" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="<?php echo $social['instagram']; ?>" class="top-bar-social" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="<?php echo $social['youtube']; ?>" class="top-bar-social" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <!-- Logo & Brand -->
            <a href="#beranda" class="navbar-brand">
                <!-- Logo placeholder: ganti <img> di bawah jika logo resmi sudah tersedia -->
                <?php if (file_exists(__DIR__ . '/assets/images/logo.png')): ?>
                    <img src="<?php echo $base; ?>assets/images/logo.png" alt="Logo <?php echo htmlspecialchars($company['short']); ?>" class="navbar-logo-img">
                <?php else: ?>
                    <div class="navbar-logo">JI</div>
                    <div class="navbar-brand-text">
                        <h1><?php echo htmlspecialchars($company['name']); ?></h1>
                        <span><?php echo htmlspecialchars($company['tagline']); ?></span>
                    </div>
                <?php endif; ?>
            </a>

            <!-- Navigation Menu -->
            <ul class="navbar-nav" id="navbarNav">
                <button class="mobile-close" id="navClose" aria-label="Tutup Menu">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <li><a href="#beranda" class="nav-link active">Beranda</a></li>
                <li><a href="#tentang" class="nav-link">Tentang Kami</a></li>
                <li>
                    <a href="#layanan" class="nav-link">
                        Layanan <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
                    </a>
                </li>
                <li><a href="#industri" class="nav-link">Industri</a></li>
                <li><a href="#sertifikat" class="nav-link">Sertifikat</a></li>
                <li><a href="#pengalaman" class="nav-link">Pengalaman</a></li>
                <li><a href="#kontak" class="nav-link">Kontak</a></li>
                <li class="nav-cta-mobile">
                    <a href="#kontak" class="btn-primary" onclick="closeNav()">Minta Penawaran</a>
                </li>
            </ul>

            <!-- CTA Button (Desktop) -->
            <a href="#kontak" class="btn-primary nav-cta-desktop">Minta Penawaran</a>

            <!-- Mobile Toggle -->
            <button class="mobile-toggle" id="mobileToggle" aria-label="Buka Menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- ===== HERO SECTION ===== -->
    <section class="hero" id="beranda">
        <!-- Decorative Red Dots -->
        <div class="red-dots dot-group-1">
            <span class="red-dot"></span>
            <span class="red-dot"></span>
            <span class="red-dot"></span>
            <span class="red-dot"></span>
            <span class="red-dot"></span>
        </div>
        <div class="red-dots dot-group-2">
            <span class="red-dot"></span>
            <span class="red-dot"></span>
            <span class="red-dot"></span>
        </div>

        <div class="hero-left">
            <div class="hero-left-inner">
                <span class="hero-label fade-in">Solusi Bisnis</span>
                <h2 class="hero-heading fade-in">
                    Kami Menghadirkan
                    <strong>Solusi Inovatif</strong>
                </h2>
                <p class="hero-description fade-in">
                    PT. Jafindo Innovatech Permai berkomitmen menghadirkan solusi inovatif 
                    yang mendukung kebutuhan bisnis melalui pendekatan profesional, teknologi, 
                    dan pengembangan berkelanjutan.
                </p>
                <a href="viewer-flip.php" class="btn-outline fade-in">Tentang Perusahaan</a>
            </div>
        </div>

        <div class="hero-right">
            <!-- Ganti dengan gambar resmi perusahaan: assets/images/hero.jpg -->
            <?php if (file_exists(__DIR__ . '/assets/images/hero.jpg')): ?>
                <img src="<?php echo $base; ?>assets/images/hero.jpg" 
                     alt="Fasilitas Teknologi - <?php echo htmlspecialchars($company['name']); ?>"
                     loading="eager">
            <?php else: ?>
                <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=80" 
                     alt="Teknologi dan Inovasi Bisnis - <?php echo htmlspecialchars($company['name']); ?>"
                     loading="eager">
            <?php endif; ?>
        </div>
    </section>

    <!-- ===== TENTANG KAMI SECTION ===== -->
    <section class="about-section" id="tentang">
        <div class="container">
            <div class="about-grid">
                <!-- Kolom 1: Jelajahi -->
                <div class="about-col about-col-explore fade-in-left">
                    <h3 class="about-col-title">Jelajahi</h3>
                    <p class="about-col-link">
                        PT. Jafindo Innovatech Permai berfokus pada pengembangan solusi 
                        dan layanan yang mendukung kebutuhan pelanggan serta pertumbuhan bisnis.
                    </p>
                </div>

                <!-- Kolom 2: Siapa Kami -->
                <div class="about-col fade-in">
                    <h2>Siapa Kami</h2>
                    <p>
                        PT. Jafindo Innovatech Permai merupakan perusahaan yang mengutamakan 
                        inovasi, kualitas layanan, dan pendekatan profesional dalam mendukung 
                        kebutuhan pelanggan. Kami berupaya membangun hubungan kerja sama 
                        yang berkelanjutan melalui solusi yang relevan dan berorientasi 
                        pada kebutuhan bisnis.
                    </p>
                    <a href="#layanan" class="btn-more">Selengkapnya</a>
                </div>

                <!-- Kolom 3: Keahlian & Kapabilitas -->
                <div class="about-col fade-in-right">
                    <h2>Keahlian &amp; Kapabilitas</h2>
                    <p>
                        Kami mengedepankan pemahaman kebutuhan pelanggan, pengembangan solusi 
                        yang efektif, serta peningkatan kualitas layanan untuk membantu 
                        pelanggan mencapai tujuan bisnisnya.
                    </p>
                    <a href="#layanan" class="btn-more">Pelajari Layanan</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== LAYANAN & INDUSTRI SECTION ===== -->
    <section class="industry-section" id="layanan">
        <div class="container">
            <div class="industry-layout">
                <!-- Kartu Gambar Layanan -->
                <div class="industry-cards">
                    <?php
                    // Konfigurasi kartu layanan - mudah disesuaikan
                    $services = [
                        [
                            'title' => 'Teknologi & Inovasi',
                            'image' => 'layanan-1.jpg',
                            'fallback' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=400&q=80',
                            'alt' => 'Teknologi dan Inovasi'
                        ],
                        [
                            'title' => 'Solusi Bisnis',
                            'image' => 'layanan-2.jpg',
                            'fallback' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=400&q=80',
                            'alt' => 'Solusi Bisnis'
                        ],
                        [
                            'title' => 'Pengembangan Sistem',
                            'image' => 'layanan-3.jpg',
                            'fallback' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&q=80',
                            'alt' => 'Pengembangan Sistem'
                        ],
                        [
                            'title' => 'Layanan Profesional',
                            'image' => 'layanan-4.jpg',
                            'fallback' => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=400&q=80',
                            'alt' => 'Layanan Profesional'
                        ],
                    ];

                    foreach ($services as $index => $service):
                        $imgPath = __DIR__ . '/assets/images/' . $service['image'];
                        $imgSrc = file_exists($imgPath) 
                            ? $base . 'assets/images/' . $service['image'] 
                            : $service['fallback'];
                    ?>
                    <div class="industry-card fade-in">
                        <img src="<?php echo $imgSrc; ?>" 
                             alt="<?php echo htmlspecialchars($service['alt']); ?>" 
                             loading="lazy">
                        <div class="industry-card-overlay">
                            <span class="industry-card-title"><?php echo htmlspecialchars($service['title']); ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Deskripsi Layanan -->
                <div class="industry-info fade-in-right" id="industri">
                    <h2>Solusi untuk<br>Berbagai Kebutuhan</h2>
                    <p>
                        Kami berupaya menyediakan layanan dan solusi yang dapat disesuaikan 
                        dengan kebutuhan pelanggan, dengan mengutamakan efektivitas, kualitas, 
                        dan keberlanjutan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== SERTIFIKAT SECTION ===== -->
    <section class="certificate-section" id="sertifikat">
        <div class="container">
            <div class="section-header">
                <h2>Sertifikat & Akreditasi</h2>
                <p>Komitmen kami terhadap kualitas dan standar profesional</p>
            </div>
            <div class="certificate-grid">
                <div class="certificate-card">
                    <div class="certificate-icon">
                        <i class="fa-solid fa-certificate"></i>
                    </div>
                    <h3>Sertifikat Badan Usaha</h3>
                    <p>SBU-IN007</p>
                    <a href="assets/pdf/SBU-IN001.pdf" target="_blank" class="btn-certificate">
                        <i class="fa-solid fa-eye"></i> Lihat Sertifikat
                    </a>
                </div>
                <div class="certificate-card">
                    <div class="certificate-icon">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <h3>SBU Besar</h3>
                    <p>Ukuran Besar</p>
                    <a href="assets/pdf/SBU file ukuran Besar.pdf" target="_blank" class="btn-certificate">
                        <i class="fa-solid fa-eye"></i> Lihat Sertifikat
                    </a>
                </div>
                <div class="certificate-card">
                    <div class="certificate-icon">
                        <i class="fa-solid fa-medal"></i>
                    </div>
                    <h3>SBU Menengah</h3>
                    <p>BG009 Menengah</p>
                    <a href="assets/pdf/SBU-BG009 Menengah.pdf" target="_blank" class="btn-certificate">
                        <i class="fa-solid fa-eye"></i> Lihat Sertifikat
                    </a>
                </div>
                <div class="certificate-card">
                    <div class="certificate-icon">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h3>SBU Menengah</h3>
                    <p>BG006 Menengah</p>
                    <a href="assets/pdf/SBU-BG006.pdf" target="_blank" class="btn-certificate">
                        <i class="fa-solid fa-eye"></i> Lihat Sertifikat
                    </a>
                </div>
                <div class="certificate-card">
                    <div class="certificate-icon">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h3>SBU Menengah</h3>
                    <p>BG007 Menengah</p>
                    <a href="assets/pdf/SBU-BG007.pdf" target="_blank" class="btn-certificate">
                        <i class="fa-solid fa-eye"></i> Lihat Sertifikat
                    </a>
                </div>
                <div class="certificate-card">
                    <div class="certificate-icon">
                        <i class="fa-solid fa-check-circle"></i>
                    </div>
                    <h3>SBU Menengah</h3>
                    <p>BG002 Menengah</p>
                    <a href="assets/pdf/SBU-BG002 Menengah.pdf" target="_blank" class="btn-certificate">
                        <i class="fa-solid fa-eye"></i> Lihat Sertifikat
                    </a>
                </div>
                <div class="certificate-card">
                    <div class="certificate-icon">
                        <i class="fa-solid fa-ribbon"></i>
                    </div>
                    <h3>SBU Menengah</h3>
                    <p>BG006 Menengah</p>
                    <a href="assets/pdf/BG006 MENENGAH SBU.pdf" target="_blank" class="btn-certificate">
                        <i class="fa-solid fa-eye"></i> Lihat Sertifikat
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== PENGALAMAN KERJA SECTION ===== -->
    <section class="experience-section" id="pengalaman">
        <div class="container">
            <div class="section-header">
                <h2>Pengalaman Kerja</h2>
                <p>Proyek-proyek yang telah kami kerjakan dengan profesionalisme</p>
            </div>
            <div class="experience-preview">
                <div class="experience-card fade-in">
                    <div class="experience-icon">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <h3>Daftar Pengalaman Kerja</h3>
                    <p>Kami telah menyelesaikan berbagai proyek di berbagai lokasi dengan standar kualitas yang tinggi.</p>
                    <button class="btn-primary" id="showExperienceBtn">
                        <i class="fa-solid fa-eye"></i> Selengkapnya
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CTA / HUBUNGI KAMI SECTION ===== -->
    <section class="cta-section" id="kontak">
        <div class="cta-bg-pattern"></div>
        <div class="container">
            <div class="cta-content">
                <div class="cta-text">
                    <h2>Bagaimana Kami Dapat Membantu Anda?</h2>
                    <p>Hubungi kami untuk mendiskusikan kebutuhan dan menemukan solusi yang sesuai bagi bisnis Anda.</p>
                </div>
                <div class="cta-buttons">
                    <a href="<?php echo htmlspecialchars($company['phone_link']); ?>" target="_blank" class="btn-primary">
                        <i class="fa-brands fa-whatsapp"></i> Hubungi via WhatsApp
                    </a>
                    <a href="mailto:<?php echo htmlspecialchars($company['email']); ?>" class="btn-outline">
                        <i class="fa-regular fa-envelope"></i> Kirim Email
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer class="footer" id="footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Kolom Alamat -->
                <div class="footer-col">
                    <h3>Alamat</h3>
                    <p>
                        <a href="<?php echo htmlspecialchars($company['address_link']); ?>" target="_blank">
                            <?php echo htmlspecialchars($company['address']); ?>,
                            <?php echo htmlspecialchars($company['city']); ?>.
                        </a>
                    </p>
                </div>

                <!-- Kolom Tautan -->
                <div class="footer-col">
                    <h3>Tautan</h3>
                    <ul>
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#tentang">Tentang Kami</a></li>
                        <li><a href="#layanan">Layanan</a></li>
                        <li><a href="#industri">Industri</a></li>
                        <li><a href="#sertifikat">Sertifikat</a></li>
                        <li><a href="#pengalaman">Pengalaman</a></li>
                        <li><a href="#kontak">Kontak</a></li>
                    </ul>
                </div>

                <!-- Kolom Sosial Media -->
                <div class="footer-col">
                    <div class="footer-social">
                        <a href="<?php echo $social['facebook']; ?>" class="footer-social-icon" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="<?php echo $social['linkedin']; ?>" class="footer-social-icon" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="<?php echo $social['instagram']; ?>" class="footer-social-icon" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="<?php echo $social['youtube']; ?>" class="footer-social-icon" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <p>Copyright &copy; <a href="#"><?php echo htmlspecialchars($company['name']); ?></a>, <?php echo date('Y'); ?></p>
                <p>Hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- ===== TOMBOL CHAT MENGAMBANG ===== -->
    <div class="chat-float" id="chatFloat">
        <button class="chat-float-btn" id="chatFloatBtn" aria-label="Hubungi Kami">
            <i class="fa-solid fa-comment-dots"></i>
        </button>
        <div class="chat-float-panel" id="chatFloatPanel">
            <div class="chat-panel-header">
                <span>Halo! 👋</span>
                <button class="chat-panel-close" id="chatPanelClose" aria-label="Tutup Chat">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="chat-panel-body">
                <p>Selamat datang di <?php echo htmlspecialchars($company['short']); ?>! Ada yang bisa kami bantu?</p>
                <a href="<?php echo htmlspecialchars($company['phone_link']); ?>" target="_blank" class="btn-primary chat-contact-btn" onclick="closeChatPanel()">
                    <i class="fa-brands fa-whatsapp"></i> Chat WhatsApp
                </a>
                <a href="mailto:<?php echo htmlspecialchars($company['email']); ?>" class="btn-outline chat-contact-btn" onclick="closeChatPanel()">
                    <i class="fa-regular fa-envelope"></i> Kirim Email
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTopBtn" aria-label="Kembali ke Atas">
        <i class="fa-solid fa-chevron-up"></i>
    </button>

    <!-- ===== PENGALAMAN KERJA MODAL ===== -->
    <div class="modal-overlay" id="experienceModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>DAFTAR PENGALAMAN KERJA PERUSAHAAN</h2>
                <h3>PT. JAFINDO INNOVATECH PERMAI</h3>
                <button class="modal-close" id="closeModalBtn" aria-label="Tutup">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="experience-table-wrapper">
                    <table class="experience-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Proyek</th>
                                <th>Lokasi</th>
                                <th>Instansi / Proyek Pemberi Pekerjaan</th>
                                <th>Nilai Kontrak</th>
                                <th>Periode / Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><strong>ASRAMA HAJI CIPONDOH</strong></td>
                                <td>CIPONDOH, TANGERANG</td>
                                <td>PT. TOTAL TANJUNG INDAH</td>
                                <td>Rp 2.929.830.195</td>
                                <td>2024 (SELESAI)</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><strong>RS IMC BINTARO</strong></td>
                                <td>BINTARO, TANGERANG SELATAN</td>
                                <td>PT. SARI ASIH</td>
                                <td>Rp 1.530.000.000</td>
                                <td>2024 (SELESAI)</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><strong>Sekolah Rakyat Kab. Pasuruan</strong></td>
                                <td>Kota Pasuruan</td>
                                <td>Nindya Karya KSO</td>
                                <td>Rp 13.444.427.000</td>
                                <td>2026 (Selesai)</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><strong>Sekolah Rakyat Kediri</strong></td>
                                <td>Kabupaten Kediri</td>
                                <td>PT. Dwiarta Teknologi International</td>
                                <td>Rp 23.434.737.146</td>
                                <td>2026 (Selesai)</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><strong>UNAIR Jakarta</strong></td>
                                <td>Grogol, Jakarta Barat</td>
                                <td>PT. Kowi Teknik Utama</td>
                                <td>Rp 586.521.600</td>
                                <td>2026 - 2027 (Proses Pengerjaan)</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td><strong>RSUD Muara Rupit</strong></td>
                                <td>Musi Rawas Utara</td>
                                <td>WEGE-WISWA KSO</td>
                                <td>Rp 1.500.000.000</td>
                                <td>2026 - 2027 (Proses Pengerjaan)</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td><strong>RSUD Muara Dua</strong></td>
                                <td>Jl. Raya Ranau Kec. Buay Kab. Ogan Komering Ulu Selatan, Sumatera Selatan</td>
                                <td>PT. Dwiarta Teknologi International</td>
                                <td>Rp 4.930.000.000</td>
                                <td>2026 - 2027 (Proses Pengerjaan)</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td><strong>Proyek Yonif TP 852</strong></td>
                                <td>Kabupaten Deli Serdang, Medan</td>
                                <td>PT. PADIMUN GOLDEN</td>
                                <td>Rp 2.000.000.000</td>
                                <td>2026 (Selesai)</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td><strong>Proyek YTP 902</strong></td>
                                <td>Serdang Bedagai, Medan</td>
                                <td>PT. PADIMUN GOLDEN</td>
                                <td>Rp 2.154.000.000</td>
                                <td>2026 (Selesai)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <p>Tangerang, 29 September 2026</p>
                    <p><strong>PT. JAFINDO INNOVATECH PERMAI</strong></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main JavaScript -->
    <script src="<?php echo $base; ?>assets/js/script.js"></script>
</body>
</html>
