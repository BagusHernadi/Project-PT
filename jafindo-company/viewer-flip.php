<?php
/**
 * Flipbook Viewer - Menampilkan PDF COMPRO dengan efek buku
 */
$pdfPath = 'documents/COMPRO_JAFINDO.pdf';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile - PT. Jafindo Innovatech Permai</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .viewer-header {
            background: rgba(255, 255, 255, 0.98);
            color: #333;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            z-index: 100;
        }
        .viewer-header h1 {
            font-size: 20px;
            font-weight: 600;
            color: #1a1a2e;
        }
        .viewer-header .badge {
            background: linear-gradient(135deg, #4053FF 0%, #647DEE 100%);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 13px;
            margin-left: 15px;
        }
        .viewer-header a {
            color: #4053FF;
            text-decoration: none;
            padding: 8px 20px;
            background: rgba(64, 83, 255, 0.1);
            border-radius: 5px;
            transition: all 0.3s;
            font-weight: 600;
        }
        .viewer-header a:hover {
            background: rgba(64, 83, 255, 0.2);
        }
        .flipbook-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            perspective: 3000px;
            overflow: hidden;
        }
        .book {
            position: relative;
            width: 800px;
            height: 600px;
            transform-style: preserve-3d;
            transform: rotateX(10deg) rotateY(0deg);
            transition: transform 0.5s ease;
        }
        .book:hover {
            transform: rotateX(5deg) rotateY(2deg);
        }
        .page {
            position: absolute;
            width: 400px;
            height: 600px;
            background: white;
            transform-style: preserve-3d;
            transform-origin: left center;
            transition: transform 1.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            backface-visibility: hidden;
            overflow: hidden;
            border-radius: 0 8px 8px 0;
        }
        .page img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            pointer-events: none;
        }
        .page-left {
            left: 0;
            border-radius: 8px 0 0 8px;
            transform-origin: right center;
            box-shadow: -8px 0 25px rgba(0,0,0,0.2);
        }
        .page-right {
            left: 400px;
            border-radius: 0 8px 8px 0;
            box-shadow: 8px 0 25px rgba(0,0,0,0.2);
        }
        .page.flipping {
            z-index: 100;
            animation: pageGlow 0.6s ease-in-out;
        }
        .page.flipped {
            transform: rotateY(-180deg);
            z-index: 1;
        }
        .page-left.flipped {
            transform: rotateY(180deg);
        }
        .page::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(0,0,0,0.2) 0%, transparent 15%);
            pointer-events: none;
        }
        .page-right::before {
            background: linear-gradient(to left, rgba(0,0,0,0.2) 0%, transparent 15%);
        }
        .page.flipping::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 80px;
            height: 100%;
            background: linear-gradient(to left, rgba(64, 83, 255, 0.3) 0%, rgba(100, 125, 238, 0.2) 30%, transparent 100%);
            pointer-events: none;
            animation: curlEffect 1.5s ease-in-out;
        }
        @keyframes pageGlow {
            0%, 100% {
                box-shadow: 0 0 30px rgba(64, 83, 255, 0.3);
            }
            50% {
                box-shadow: 0 0 60px rgba(64, 83, 255, 0.6), 0 0 100px rgba(100, 125, 238, 0.4);
            }
        }
        @keyframes curlEffect {
            0% {
                width: 0;
                opacity: 0;
            }
            50% {
                width: 120px;
                opacity: 1;
            }
            100% {
                width: 80px;
                opacity: 0.8;
            }
        }
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        .page.bounce {
            animation: bounce 0.5s ease;
        }
        .controls {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 -4px 20px rgba(0,0,0,0.1);
            z-index: 100;
        }
        .control-btn {
            padding: 12px 30px;
            background: linear-gradient(135deg, #4053FF 0%, #647DEE 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(64, 83, 255, 0.3);
        }
        .control-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(64, 83, 255, 0.4);
        }
        .control-btn:active {
            transform: translateY(0);
        }
        .control-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        .page-indicator {
            padding: 12px 30px;
            background: rgba(64, 83, 255, 0.1);
            color: #4053FF;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
        }
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.98);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(64, 83, 255, 0.2);
            border-top-color: #4053FF;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        .loading-text {
            font-size: 20px;
            color: #4053FF;
            font-weight: 600;
        }
        .loading.hidden {
            display: none;
        }
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 0;
        }
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(64, 83, 255, 0.3);
            border-radius: 50%;
            animation: float 15s infinite;
        }
        @keyframes float {
            0%, 100% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) rotate(720deg);
                opacity: 0;
            }
        }
        @media (max-width: 900px) {
            .book {
                width: 100%;
                max-width: 400px;
                height: 566px;
            }
            .page {
                width: 100%;
                height: 566px;
            }
            .page-left {
                left: 0;
            }
            .page-right {
                left: 0;
            }
            .flipbook-container {
                padding: 20px 10px;
            }
        }
    </style>
</head>
<body>
    <div class="loading" id="loading">
        <div class="loading-spinner"></div>
        <div class="loading-text">Memuat Company Profile...</div>
    </div>

    <div class="particles" id="particles"></div>

    <div class="viewer-header">
        <div style="display: flex; align-items: center;">
            <h1>Company Profile</h1>
            <span class="badge">PDF Flipbook</span>
        </div>
        <a href="index.php">← Kembali ke Website</a>
    </div>
    
    <div class="flipbook-container">
        <div class="book" id="book">
            <!-- Pages will be generated by JavaScript -->
        </div>
    </div>

    <div class="controls">
        <button class="control-btn" id="prevBtn" onclick="prevPage()">
            <i class="fa-solid fa-chevron-left"></i> Sebelumnya
        </button>
        <div class="page-indicator" id="pageIndicator">Halaman 1</div>
        <button class="control-btn" id="nextBtn" onclick="nextPage()">
            Selanjutnya <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

        let pdfDoc = null;
        let currentPage = 1;
        let totalPages = 0;
        const book = document.getElementById('book');
        const loading = document.getElementById('loading');
        const pageIndicator = document.getElementById('pageIndicator');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        async function loadPDF() {
            try {
                const pdf = await pdfjsLib.getDocument('<?php echo $pdfPath; ?>').promise;
                pdfDoc = pdf;
                totalPages = pdf.numPages;
                await renderPages();
                loading.classList.add('hidden');
                updateControls();
            } catch (error) {
                console.error('Error loading PDF:', error);
                loading.innerHTML = '<div class="loading-text">Gagal memuat PDF. <a href="<?php echo $pdfPath; ?>" download style="color: #4053FF;">Download PDF</a></div>';
            }
        }

        async function renderPage(pageNum) {
            const page = await pdfDoc.getPage(pageNum);
            const scale = 1.5;
            const viewport = page.getViewport({ scale });

            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            await page.render({
                canvasContext: context,
                viewport: viewport
            }).promise;

            return canvas.toDataURL();
        }

        async function renderPages(direction = 'next') {
            const pages = book.querySelectorAll('.page');
            
            if (direction === 'next' && pages.length > 0) {
                // Animate flip effect
                pages.forEach((page, index) => {
                    page.classList.add('flipping');
                    setTimeout(() => {
                        page.classList.add('flipped');
                    }, index * 100);
                });
                
                await new Promise(resolve => setTimeout(resolve, 600));
            } else if (direction === 'prev' && pages.length > 0) {
                // Animate flip back
                pages.forEach((page, index) => {
                    page.classList.remove('flipped');
                    setTimeout(() => {
                        page.classList.remove('flipping');
                    }, index * 100);
                });
                
                await new Promise(resolve => setTimeout(resolve, 600));
            }
            
            book.innerHTML = '';
            
            // Render current page and next page for two-page spread
            const page1Data = await renderPage(currentPage);
            const page1Img = document.createElement('img');
            page1Img.src = page1Data;
            page1Img.style.width = '100%';
            page1Img.style.height = '100%';
            page1Img.style.objectFit = 'contain';

            const page1Div = document.createElement('div');
            page1Div.className = 'page page-left bounce';
            page1Div.style.zIndex = '10';
            page1Div.appendChild(page1Img);
            book.appendChild(page1Div);

            if (currentPage < totalPages) {
                const page2Data = await renderPage(currentPage + 1);
                const page2Img = document.createElement('img');
                page2Img.src = page2Data;
                page2Img.style.width = '100%';
                page2Img.style.height = '100%';
                page2Img.style.objectFit = 'contain';

                const page2Div = document.createElement('div');
                page2Div.className = 'page page-right bounce';
                page2Div.style.zIndex = '11';
                page2Div.appendChild(page2Img);
                book.appendChild(page2Div);
            }

            // Remove bounce class after animation
            setTimeout(() => {
                document.querySelectorAll('.page').forEach(page => {
                    page.classList.remove('bounce');
                });
            }, 500);
        }

        async function nextPage() {
            if (currentPage < totalPages - 1) {
                currentPage += 2;
                await renderPages('next');
                updateControls();
            }
        }

        async function prevPage() {
            if (currentPage > 1) {
                currentPage -= 2;
                await renderPages('prev');
                updateControls();
            }
        }

        function updateControls() {
            pageIndicator.textContent = `Halaman ${currentPage}${currentPage < totalPages ? '-' + (currentPage + 1) : ''} dari ${totalPages}`;
            prevBtn.disabled = currentPage === 1;
            nextBtn.disabled = currentPage >= totalPages - 1;
        }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight') nextPage();
            if (e.key === 'ArrowLeft') prevPage();
        });

        // Create floating particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 15 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                particlesContainer.appendChild(particle);
            }
        }

        // Load PDF on page load
        loadPDF();
        createParticles();
    </script>
</body>
</html>
