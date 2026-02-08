<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 1 Laravel 12</title>
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
            max-width: 600px;
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
            margin-bottom: 20px;
            line-height: 1.3;
        }
        
        .highlight {
            display: inline-block;
            color: var(--accent-color);
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 8px;
            background-color: rgba(231, 76, 60, 0.1);
            margin-top: 8px;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .course {
            background: var(--gradient-secondary);
            color: white;
            padding: 18px;
            border-radius: 12px;
            margin: 25px 0;
            font-size: 1.3rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(46, 204, 113, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .course::after {
            content: '';
            position: absolute;
            top: -10px;
            right: -10px;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
        }
        
        .course::before {
            content: '';
            position: absolute;
            bottom: -15px;
            left: -15px;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .description {
            font-size: 1.1rem;
            line-height: 1.6;
            margin: 25px 0;
            color: #555;
            padding: 0 10px;
        }
        
        .ai-badge {
            display: inline-flex;
            align-items: center;
            background-color: #f1f8ff;
            border-radius: 50px;
            padding: 8px 18px;
            margin-top: 15px;
            font-size: 0.9rem;
            color: #0366d6;
            border: 1px solid #d1e6ff;
        }
        
        .ai-badge::before {
            content: '🤖';
            margin-right: 8px;
            font-size: 1.1rem;
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
        
        .tech-stack {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .tech-item {
            background-color: #f8f9fa;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            border: 1px solid #e9ecef;
        }
        
        .laravel-badge {
            background-color: #ff2d20;
            color: white;
            font-weight: bold;
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
        
        @media (max-width: 600px) {
            .container {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .course {
                font-size: 1.1rem;
                padding: 15px;
            }
            
            .footer {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="module-badge">Modul 1</div>
        
        <h1>Selamat Datang, <br><span class="highlight">Mahasiswa STMIK IKMI CIREBON</span>!</h1>
        
        <div class="course">
            Mata Kuliah: Pemprograman Web Lanjut
        </div>
        
        <p class="description">Ini adalah halaman pertama saya di Laravel 12 yang dikembangkan dengan bantuan kecerdasan artifisial sebagai bagian dari praktikum pengembangan web lanjutan.</p>
        
        <div class="ai-badge">Dikembangkan dengan bantuan AI</div>
        
        <div class="tech-stack">
            <div class="tech-item laravel-badge">Laravel 12</div>
            <div class="tech-item">PHP</div>
            <div class="tech-item">HTML5</div>
            <div class="tech-item">CSS3</div>
            <div class="tech-item">JavaScript</div>
        </div>
        
        <div class="footer">
            <div class="institution">STMIK IKMI Cirebon</div>
            <div>Dibuat untuk praktikum Modul 1 - Web Lanjut</div>
        </div>
    </div>
    
    <script>
        // Menambahkan efek interaktif sederhana
        document.addEventListener('DOMContentLoaded', function() {
            const courseElement = document.querySelector('.course');
            
            courseElement.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            courseElement.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
            
            // Efek ketik untuk highlight (jika ingin dinamis)
            const highlightElement = document.querySelector('.highlight');
            const originalText = highlightElement.textContent;
            
            // Simulasi efek loading kecil
            setTimeout(() => {
                highlightElement.style.animation = 'pulse 2s infinite';
            }, 500);
        });
    </script>
</body>
</html>