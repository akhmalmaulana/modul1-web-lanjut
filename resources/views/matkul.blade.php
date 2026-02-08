<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $matkul ?? 'Data Mata Kuliah' }} - Laravel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #333;
        }
        
        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 800px;
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #ff9a9e 0%, #fad0c4 100%);
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        
        .header h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        
        .header::after {
            content: '';
            display: block;
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2ecc71);
            margin: 20px auto;
            border-radius: 2px;
        }
        
        .card {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            border-left: 6px solid #3498db;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }
        
        .data-row {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px dashed #ddd;
        }
        
        .data-row:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            color: white;
            font-size: 24px;
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }
        
        .data-content {
            flex: 1;
        }
        
        .label {
            font-size: 0.9rem;
            color: #7f8c8d;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .value {
            font-size: 1.4rem;
            color: #2c3e50;
            font-weight: 700;
        }
        
        .warning {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            border-left-color: #e74c3c;
            padding: 25px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            animation: pulse 2s infinite;
            margin-top: 30px;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }
        
        .warning-icon {
            width: 50px;
            height: 50px;
            background: #e74c3c;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            color: white;
            font-size: 22px;
            flex-shrink: 0;
        }
        
        .warning-content {
            flex: 1;
        }
        
        .warning-title {
            color: #c0392b;
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 5px;
        }
        
        .warning-text {
            color: #7f8c8d;
            font-size: 1rem;
        }
        
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #7f8c8d;
            font-size: 0.9rem;
        }
        
        .data-source {
            display: inline-block;
            background: #e8f4fc;
            padding: 8px 16px;
            border-radius: 20px;
            margin-top: 10px;
            font-size: 0.85rem;
            color: #3498db;
        }
        
        .highlight {
            background: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
            padding: 3px 8px;
            border-radius: 5px;
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 25px 20px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .data-row {
                flex-direction: column;
                text-align: center;
                padding: 20px 0;
            }
            
            .icon {
                margin-right: 0;
                margin-bottom: 15px;
            }
            
            .warning {
                flex-direction: column;
                text-align: center;
            }
            
            .warning-icon {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📚 Data Mata Kuliah</h1>
            <p>Informasi lengkap mata kuliah yang diambil</p>
        </div>
        
        <div class="card">
            <div class="data-row">
                <div class="icon">📖</div>
                <div class="data-content">
                    <div class="label">Nama Mata Kuliah</div>
                    <div class="value">{{ $matkul ?? 'Belum diisi' }}</div>
                </div>
            </div>
            
            <div class="data-row">
                <div class="icon">👨‍🏫</div>
                <div class="data-content">
                    <div class="label">Dosen Pengajar</div>
                    <div class="value">{{ $dosen_pengajar ?? 'Belum ditentukan' }}</div>
                </div>
            </div>
            
            <div class="data-row">
                <div class="icon">⚖️</div>
                <div class="data-content">
                    <div class="label">Jumlah SKS</div>
                    <div class="value">{{ $jumlah_sks ?? '0' }} SKS</div>
                </div>
            </div>
        </div>
        
        <!-- Data langsung bisa dipakai seperti variabel biasa -->
        @if(isset($jumlah_sks) && $jumlah_sks > 2)
        <div class="warning">
            <div class="warning-icon">⚠️</div>
            <div class="warning-content">
                <div class="warning-title">Perhatian! Mata Kuliah Ini Berat</div>
                <div class="warning-text">
                    Mata kuliah dengan <span class="highlight">{{ $jumlah_sks }} SKS</span> membutuhkan 
                    perhatian ekstra dan waktu belajar lebih banyak. 
                    Pastikan kamu mempersiapkan diri dengan baik!
                </div>
            </div>
        </div>
        @endif
        
        <div class="footer">
            <p>Data dikirim dari Controller Laravel ke View Blade</p>
            <div class="data-source">
                Sumber data: <strong>MataKuliahController</strong> → <strong>matkul.blade.php</strong>
            </div>
            @if(isset($matkul))
            <p style="margin-top: 15px; font-style: italic;">
                "{{ $matkul }}" siap dipelajari!
            </p>
            @endif
        </div>
    </div>
    
    <script>
        // Tambahkan efek interaktif sederhana
        document.addEventListener('DOMContentLoaded', function() {
            const card = document.querySelector('.card');
            const dataRows = document.querySelectorAll('.data-row');
            
            // Efek hover pada card
            if(card) {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            }
            
            // Efek pada setiap baris data
            dataRows.forEach((row, index) => {
                // Delay animation untuk efek berurutan
                row.style.opacity = '0';
                row.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    row.style.transition = 'all 0.5s ease';
                    row.style.opacity = '1';
                    row.style.transform = 'translateY(0)';
                }, index * 200);
                
                // Efek hover pada row
                row.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = '';
                });
            });
            
            // Log data ke console untuk debugging
            console.log('📊 Data dari Controller:');
            console.log('Mata Kuliah:', '{{ $matkul ?? "Tidak tersedia" }}');
            console.log('Dosen:', '{{ $dosen_pengajar ?? "Tidak tersedia" }}');
            console.log('SKS:', '{{ $jumlah_sks ?? "Tidak tersedia" }}');
        });
    </script>
</body>
</html>