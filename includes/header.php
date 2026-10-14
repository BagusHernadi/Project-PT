<?php
/**
 * PT. Jafindo Innovatech Permai - Header Include
 * Contains: DOCTYPE, head, top bar, navbar
 */

// Company data configuration (placeholder - easy to replace)
$company = [
    'name'    => 'PT. Jafindo Innovatech Permai',
    'short'   => 'Jafindo',
    'tagline' => 'Connecting Innovation & Technology',
    'email'   => 'jafindoinnovatech@gmail.com',
    'phone'   => 'https://wa.me/6281288008091',
    'address' => '[Jl. Permata Raya No.96, RT.004/RW.015, Tanah Tinggi, Kec. Tangerang, Kota Tangerang, Banten 15119]',
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PT. Jafindo Innovatech Permai - Perusahaan yang menghadirkan solusi inovatif dan teknologi terdepan untuk mendukung kebutuhan bisnis Anda.">
    <meta name="keywords" content="Jafindo, Innovatech, solusi bisnis, teknologi, inovasi, Indonesia">
    <meta name="author" content="PT. Jafindo Innovatech Permai">
    <title><?php echo $company['name']; ?> | Solusi Inovatif untuk Bisnis Anda</title>

    <!-- Google Fonts - Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">

    <!-- Favicon placeholder -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='15' fill='%234053FF'/><text x='50%25' y='55%25' font-family='Arial' font-size='45' font-weight='bold' fill='white' text-anchor='middle' dominant-baseline='middle'>JI</text></svg>">
</head>
<body>
    <!-- ===== TOP BAR ===== -->
    <div class="top-bar" id="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <div class="top-bar-item">
                    <i class="fa-regular fa-envelope"></i>
                    <a href="mailto:<?php echo $company['email']; ?>"><?php echo $company['email']; ?></a>
                </div>
                <div class="top-bar-item">
                    <i class="fa-solid fa-phone"></i>
                    <span><?php echo $company['phone']; ?></span>
                </div>
                <div class="top-bar-item">
                    <i class="fa-solid fa-location-dot"></i>
                    <span><?php echo $company['address']; ?> - <?php echo $company['city']; ?></span>
                </div>
            </div>
            <div class="top-bar-right">
                <a href="#" class="top-bar-social" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="top-bar-social" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="#" class="top-bar-social" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="top-bar-social" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <a href="#beranda" class="navbar-brand">
                <div class="navbar-logo">JI</div>
                <div class="navbar-brand-text">
                    <h1><?php echo $company['name']; ?></h1>
                    <span><?php echo $company['tagline']; ?></span>
                </div>
            </a>

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
                <li><a href="#kontak" class="nav-link">Kontak</a></li>
                <li class="nav-cta-mobile">
                    <a href="#kontak" class="btn-primary" onclick="closeNav()">Minta Penawaran</a>
                </li>
            </ul>

            <a href="#kontak" class="btn-primary nav-cta-desktop">Minta Penawaran</a>

            <button class="mobile-toggle" id="mobileToggle" aria-label="Buka Menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>
