<?php
/**
 * PDF Viewer - Menampilkan PDF COMPRO langsung di browser
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
            background: #f5f5f5;
        }
        .viewer-header {
            background: linear-gradient(135deg, #4053FF 0%, #647DEE 100%);
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .viewer-header h1 {
            font-size: 20px;
            font-weight: 600;
        }
        .viewer-header a {
            color: white;
            text-decoration: none;
            padding: 8px 20px;
            background: rgba(255,255,255,0.2);
            border-radius: 5px;
            transition: background 0.3s;
        }
        .viewer-header a:hover {
            background: rgba(255,255,255,0.3);
        }
        .viewer-container {
            height: calc(100vh - 60px);
            background: #1a1a1a;
        }
        .viewer-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        .viewer-fallback {
            display: none;
            padding: 40px;
            text-align: center;
            background: white;
            margin: 20px;
            border-radius: 10px;
        }
        .viewer-fallback h2 {
            color: #4053FF;
            margin-bottom: 20px;
        }
        .viewer-fallback p {
            color: #666;
            margin-bottom: 20px;
        }
        .viewer-fallback a {
            display: inline-block;
            padding: 12px 30px;
            background: #4053FF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .viewer-fallback a:hover {
            background: #3033aa;
        }
    </style>
</head>
<body>
    <div class="viewer-header">
        <h1>Company Profile - PT. Jafindo Innovatech Permai</h1>
        <a href="index.php">← Kembali ke Website</a>
    </div>
    
    <div class="viewer-container">
        <iframe src="<?php echo $pdfPath; ?>" type="application/pdf" id="pdfFrame"></iframe>
    </div>
    
    <div class="viewer-fallback" id="fallback">
        <h2>Company Profile</h2>
        <p>Browser Anda tidak mendukung tampilan PDF langsung. Silakan download file untuk melihat company profile.</p>
        <a href="<?php echo $pdfPath; ?>" download>Download PDF</a>
    </div>
    
    <script>
        // Cek jika iframe gagal memuat PDF
        const iframe = document.getElementById('pdfFrame');
        const fallback = document.getElementById('fallback');
        
        iframe.onerror = function() {
            iframe.style.display = 'none';
            fallback.style.display = 'block';
        };
        
        // Cek setelah beberapa detik jika PDF gagal dimuat
        setTimeout(function() {
            try {
                if (!iframe.contentDocument && !iframe.contentWindow) {
                    iframe.style.display = 'none';
                    fallback.style.display = 'block';
                }
            } catch(e) {
                iframe.style.display = 'none';
                fallback.style.display = 'block';
            }
        }, 3000);
    </script>
</body>
</html>
