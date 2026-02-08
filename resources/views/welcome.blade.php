=<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 1 Laravel 12 - {{ $mataKuliah ?? 'Web Lanjut' }}</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --accent-color: #e74c3c;
            --dark-color: #2c3e50;
            --light-color: #f8f9fa;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --gradient-primary: linear-gradient(135deg, #3498db, #2c3e50);
            --gradient-secondary: linear-gradient(135deg, #2ecc71, #27ae60);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            color: var(--dark-color);
        }
        
        .container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            text-align: center;
            max-width: 700px;
            width: 100%;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .container:hover {
            transform: translateY(-5px);
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-primary);
        }
        
        h1 {
            color: var(--primary-color);
            font-size: 2.2rem;
            margin-bottom: 10px;
            line-height: 1.3;
        }
        
        .subtitle {
            color: #7f8c8d;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }
        
        .highlight {
            display: inline-block;
            color: var(--accent-color);
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 8px;
            background-color: rgba(231, 76, 60, 0.1);
            margin: 10px 0;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .course-card {
            background: var(--gradient-secondary);
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin: 25px 0;
            box-shadow: 0 4px 15px rgba(46, 204, 113, 0.3);
            text-align: left;
            position: relative;
            overflow: hidden;
        }
        
        .course-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .course-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 10px;
        }
        
        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .detail-label {
            font-weight: 600;
        }
        
        .detail-value {
            font-weight: 400;
        }
        
        .info-box {
            background-color: #f8f9fa;
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin: 25px 0;
            border-radius: 8px;
            text-align: left;
        }
        
        .info-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }
        
        .info-content {
            color: #555;
            line-height: 1.6;
        }
        
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 0.95rem;
            color: #7f8c8d;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .institution {
            display: flex;
            align-items: center;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .institution::before {
            content: '🏛️';
            margin-right: 8px;
        }
        
        .module-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: var(--primary-color);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .data-source {
            background-color: #e3f2fd;
            padding: 10px 15px;
            border-radius: 8px;
            margin-top: 15px;
            font-size: 0.9rem;
            color: #1565c0;
            border: 1px solid #bbdefb;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .course-details {
                grid-template-columns: 1fr;
            }
            
            .footer {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="module-badge">Modul 1 - Passing Data</div>
        
        <h1>Selamat Datang di Laravel 12</h1>
        <p class="subtitle">Implementasi Pengiriman Data Controller → View</p>
        
        <div class="highlight">
            <!-- Data dari Controller: $namaMahasiswa -->
            {{ $namaMahasiswa ?? 'Mahasiswa' }}
        </div>
        
        <!-- Data Mata Kuliah dari Controller -->
        <div class="course-card">
            <div class="course-title">
                <!-- Data dari Controller: $mataKuliah -->
                📚 {{ $mataKuliah ?? 'Mata Kuliah' }}
            </div>
            
            <!-- Cek jika ada data detail -->
            @if(isset($kodeMK) || isset($sks) || isset($dosen))
            <div class="course-details">
                @isset($kodeMK)
                <div class="detail-item">
                    <span class="detail-label">Kode MK:</span>
                    <span class="detail-value">{{ $kodeMK }}</span>
                </div>
                @endisset
                
                @isset($sks)
                <div class="detail-item">
                    <span class="detail-label">SKS:</span>
                    <span class="detail-value">{{ $sks }} SKS</span>
                </div>
                @endisset
                
                @isset($dosen)
                <div class="detail-item">
                    <span class="detail-label">Dosen Pengampu:</span>
                    <span class="detail-value">{{ $dosen }}</span>
                </div>
                @endisset
                
                @isset($semester)
                <div class="detail-item">
                    <span class="detail-label">Semester:</span>
                    <span class="detail-value">{{ $semester }}</span>
                </div>
                @endisset
                
                @isset($hari)
                <div class="detail-item">
                    <span class="detail-label">Hari:</span>
                    <span class="detail-value">{{ $hari }}</span>
                </div>
                @endisset
                
                @isset($jam)
                <div class="detail-item">
                    <span class="detail-label">Jam:</span>
                    <span class="detail-value">{{ $jam }}</span>
                </div>
                @endisset
                
                @isset($ruangan)
                <div class="detail-item">
                    <span class="detail-label">Ruangan:</span>
                    <span class="detail-value">{{ $ruangan }}</span>
                </div>
                @endisset
            </div>
            @endif
        </div>
        
        <div class="info-box">
            <div class="info-title">💡 Informasi Data Flow</div>
            <div class="info-content">
                <p>Data pada halaman ini dikirim dari <strong>Controller</strong> ke <strong>View</strong> menggunakan beberapa metode:</p>
                <ul style="margin-top: 10px; padding-left: 20px;">
                    <li><code>compact()</code> - Mengirim variabel sebagai parameter</li>
                    <li><code>with()</code> - Method chaining untuk mengirim data</li>
                    <li><code>Array</code> - Langsung mengirim array data</li>
                </ul>
                <p style="margin-top: 10px;">Data yang tampil diambil langsung dari variabel PHP yang dikirim controller.</p>
            </div>
        </div>
        
        <div class="data-source">
            🔍 <strong>Sumber Data:</strong> WelcomeController.php → welcome.blade.php
        </div>
        
        <div class="footer">
            <div class="institution">STMIK IKMI Cirebon</div>
            <div>Dibuat untuk praktikum Modul 1 - Pemrograman Web Lanjut</div>
            <div>Data dikirim dari Controller pada: {{ date('d-m-Y H:i:s') }}</div>
        </div>
    </div>
    
    <script>
        // Menambahkan efek interaktif
        document.addEventListener('DOMContentLoaded', function() {
            const courseCard = document.querySelector('.course-card');
            const highlight = document.querySelector('.highlight');
            
            // Efek hover pada card mata kuliah
            if(courseCard) {
                courseCard.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.boxShadow = '0 8px 25px rgba(46, 204, 113, 0.4)';
                });
                
                courseCard.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '0 4px 15px rgba(46, 204, 113, 0.3)';
                });
            }
            
            // Efek pada highlight
            if(highlight) {
                setInterval(() => {
                    highlight.style.animation = 'none';
                    setTimeout(() => {
                        highlight.style.animation = 'pulse 2s infinite';
                    }, 10);
                }, 4000);
            }
            
            // Menampilkan alert informasi data
            console.log('Data dari Controller:');
            console.log('- Mata Kuliah:', '{{ $mataKuliah ?? "Tidak tersedia" }}');
            console.log('- Dosen:', '{{ $dosen ?? "Tidak tersedia" }}');
            console.log('- Semester:', '{{ $semester ?? "Tidak tersedia" }}');
        });
    </script>
</body>
</html>