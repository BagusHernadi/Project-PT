    <!-- ===== NEWSLETTER / CTA SECTION ===== -->
    <section class="newsletter-section" id="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <div class="newsletter-text">
                    <h2>Bagaimana kami bisa membantu Anda?</h2>
                    <p>Hubungi tim ahli kami untuk menemukan solusi terbaik bagi bisnis Anda.</p>
                </div>
                <form class="newsletter-form" id="newsletterForm" onsubmit="return handleNewsletter(event)">
                    <input type="email" placeholder="Alamat email Anda" required aria-label="Alamat email">
                    <button type="submit">Berlangganan!</button>
                </form>
            </div>
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer class="footer" id="footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Address Column -->
                <div class="footer-col">
                    <h3>Alamat</h3>
                    <p>
                        <?php echo isset($company['address']) ? $company['address'] : '[Alamat perusahaan]'; ?>,
                        <?php echo isset($company['city']) ? $company['city'] : 'Indonesia'; ?>.
                    </p>
                </div>

                <!-- Links Column -->
                <div class="footer-col">
                    <h3>Tautan</h3>
                    <ul>
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#tentang">Tentang Kami</a></li>
                        <li><a href="#layanan">Layanan</a></li>
                        <li><a href="#kontak">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Social & Supported -->
                <div class="footer-col">
                    <div class="footer-social">
                        <a href="#" class="footer-social-icon" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="footer-social-icon" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#" class="footer-social-icon" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="footer-social-icon" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <p>Copyright &copy; <a href="#"><?php echo $company['name']; ?></a>, <?php echo date('Y'); ?></p>
                <p>All Rights Reserved By IT Division</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTopBtn" aria-label="Kembali ke Atas">
        <i class="fa-solid fa-chevron-up"></i>
    </button>

    <!-- Main JavaScript -->
    <script src="js/script.js"></script>
</body>
</html>
