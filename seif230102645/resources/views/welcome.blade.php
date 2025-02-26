<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MyApp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            /* Default theme (Purple Blue) */
            --primary-gradient: linear-gradient(135deg, #4158D0, #C850C0, #FFCC70);
            --card-bg: rgba(255, 255, 255, 0.1);
            --card-border: rgba(255, 255, 255, 0.2);
            --button-hover: rgba(255, 255, 255, 0.25);
            --text-primary: #ffffff;
            --text-secondary: #e0e0e0;
            --theme-transition: 0.5s ease-in-out;
        }
        
        /* Ocean theme */
        .theme-ocean {
            --primary-gradient: linear-gradient(135deg, #0093E9, #36C7D0, #80D0C7);
        }
        
        /* Sunset theme */
        .theme-sunset {
            --primary-gradient: linear-gradient(135deg, #FF512F, #DD2476, #FF8C42);
        }
        
        /* Forest theme */
        .theme-forest {
            --primary-gradient: linear-gradient(135deg, #2E7D32, #388E3C, #8BC34A);
        }
        
        /* Dark theme */
        .theme-dark {
            --primary-gradient: linear-gradient(135deg, #131313, #2D2D2D, #474747);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: background var(--theme-transition), background-color var(--theme-transition);
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--primary-gradient);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--text-primary);
            overflow-x: hidden;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .container {
            max-width: 900px;
            width: 90%;
            text-align: center;
            padding: 3rem;
            background: var(--card-bg);
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.2);
            border-radius: 24px;
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
            z-index: -1;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .logo i {
            font-size: 2.5rem;
            color: white;
        }
        
        h1 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            color: var(--text-primary);
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            position: relative;
            display: inline-block;
        }
        
        h1::after {
            content: '';
            position: absolute;
            width: 60%;
            height: 4px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.8), transparent);
            bottom: -10px;
            left: 20%;
            border-radius: 2px;
        }
        
        p {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }
        
        .button-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
            margin-top: 1.5rem;
            width: 100%;
        }
        
        .btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1.5rem 1rem;
            background: rgba(255, 255, 255, 0.15);
            color: var(--text-primary);
            text-decoration: none;
            border-radius: 16px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            height: 100%;
            backdrop-filter: blur(5px);
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
            z-index: -1;
        }
        
        .btn:hover {
            transform: translateY(-5px) scale(1.03);
            background: var(--button-hover);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        .btn i {
            font-size: 2rem;
            margin-bottom: 0.7rem;
        }
        
        .btn span {
            font-weight: 500;
            font-size: 1.1rem;
        }
        
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            pointer-events: none;
        }
        
        /* Theme selector styles */
        .theme-selector {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
            z-index: 10;
        }
        
        .theme-btn {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        
        .theme-btn:hover, .theme-btn.active {
            transform: scale(1.2);
            border-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        
        .theme-btn-default {
            background: linear-gradient(135deg, #4158D0, #C850C0);
        }
        
        .theme-btn-ocean {
            background: linear-gradient(135deg, #0093E9, #36C7D0);
        }
        
        .theme-btn-sunset {
            background: linear-gradient(135deg, #FF512F, #DD2476);
        }
        
        .theme-btn-forest {
            background: linear-gradient(135deg, #2E7D32, #8BC34A);
        }
        
        .theme-btn-dark {
            background: linear-gradient(135deg, #131313, #474747);
        }
        
        .theme-tooltip {
            position: absolute;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.8rem;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            white-space: nowrap;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .theme-btn:hover .theme-tooltip {
            opacity: 1;
        }
        
        /* Toggle theme panel button */
        .theme-panel-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            z-index: 15;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .theme-panel-toggle:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(30deg);
        }
        
        .theme-panel {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            padding: 15px;
            border-radius: 15px;
            z-index: 10;
            display: flex;
            flex-direction: column;
            gap: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transform: translateX(150%);
            transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            max-width: 300px;
        }
        
        .theme-panel.active {
            transform: translateX(0);
        }
        
        .theme-panel h4 {
            color: white;
            margin-bottom: 10px;
            font-size: 1rem;
            text-align: center;
        }
        
        .color-options {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 2rem;
            }
            
            h1 {
                font-size: 2.2rem;
            }
            
            p {
                font-size: 1.1rem;
            }
            
            .button-grid {
                grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
                gap: 15px;
            }
            
            .btn {
                padding: 1.2rem 0.8rem;
            }
            
            .btn i {
                font-size: 1.5rem;
            }
            
            .btn span {
                font-size: 0.9rem;
            }
            
            .theme-panel {
                max-width: 80%;
                right: 10px;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 1.5rem;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .button-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }
        }
        
        footer {
            position: absolute;
            bottom: 1rem;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.6);
        }
    </style>
</head>
<body>
    <div class="particles" id="particles"></div>
    
    <!-- Theme control button -->
    <button class="theme-panel-toggle" id="themeToggle">
        <i class="fas fa-palette"></i>
    </button>
    
    <!-- Theme selection panel -->
    <div class="theme-panel" id="themePanel">
        <h4>Choose Theme</h4>
        <div class="color-options">
            <div class="theme-btn theme-btn-default active" data-theme="default">
                <div class="theme-tooltip">Default</div>
            </div>
            <div class="theme-btn theme-btn-ocean" data-theme="ocean">
                <div class="theme-tooltip">Ocean</div>
            </div>
            <div class="theme-btn theme-btn-sunset" data-theme="sunset">
                <div class="theme-tooltip">Sunset</div>
            </div>
            <div class="theme-btn theme-btn-forest" data-theme="forest">
                <div class="theme-tooltip">Forest</div>
            </div>
            <div class="theme-btn theme-btn-dark" data-theme="dark">
                <div class="theme-tooltip">Dark</div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="logo">
            <i class="fas fa-cube"></i>
        </div>
        <h1>Welcome to MyApp</h1>
        <p>Explore our comprehensive suite of tools and features designed to enhance your learning experience</p>
        
        <div class="button-grid">
            <a href="{{ route('evennum') }}" class="btn">
                <i class="fas fa-sort-numeric-up-alt"></i>
                <span>Even & Odd</span>
            </a>
            <a href="{{ route('multiplication') }}" class="btn">
                <i class="fas fa-times"></i>
                <span>Multiplication</span>
            </a>
            <a href="{{ route('prime') }}" class="btn">
                <i class="fas fa-calculator"></i>
                <span>Prime Numbers</span>
            </a>
            <a href="{{ route('minitest') }}" class="btn">
                <i class="fas fa-vial"></i>
                <span>Mini Test</span>
            </a>
            <a href="{{ route('transcript') }}" class="btn">
                <i class="fas fa-file-alt"></i>
                <span>Transcript</span>
            </a>
            <a href="{{ route('products_list') }}" class="btn">
                <i class="fas fa-box-open"></i>
                <span>Product List</span>
            </a>
            <a href="{{ route('products_add') }}" class="btn">
                <i class="fas fa-plus-circle"></i>
                <span>Add Product</span>
            </a>
        </div>
    </div>
    
    <footer>© 2025 MyApp | All Rights Reserved</footer>

    <script>
        // Theme selection functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Theme toggle button
            const themeToggle = document.getElementById('themeToggle');
            const themePanel = document.getElementById('themePanel');
            const themeButtons = document.querySelectorAll('.theme-btn');
            
            // Toggle theme panel
            themeToggle.addEventListener('click', function() {
                themePanel.classList.toggle('active');
            });
            
            // Close panel when clicking outside
            document.addEventListener('click', function(event) {
                if (!themePanel.contains(event.target) && event.target !== themeToggle) {
                    themePanel.classList.remove('active');
                }
            });
            
            // Theme selection
            themeButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const theme = this.getAttribute('data-theme');
                    
                    // Remove active class from all buttons
                    themeButtons.forEach(b => b.classList.remove('active'));
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Apply theme
                    document.body.className = theme !== 'default' ? `theme-${theme}` : '';
                    
                    // Save theme preference in localStorage
                    localStorage.setItem('appTheme', theme);
                });
            });
            
            // Load saved theme preference
            const savedTheme = localStorage.getItem('appTheme');
            if (savedTheme) {
                document.body.className = savedTheme !== 'default' ? `theme-${savedTheme}` : '';
                
                // Set active class on saved theme button
                themeButtons.forEach(btn => {
                    if (btn.getAttribute('data-theme') === savedTheme) {
                        btn.classList.add('active');
                    } else {
                        btn.classList.remove('active');
                    }
                });
            }
            
            // Create animated background particles
            const particlesContainer = document.getElementById('particles');
            const particleCount = 50;
            
            for (let i = 0; i < particleCount; i++) {
                createParticle(particlesContainer);
            }
            
            function createParticle(container) {
                const particle = document.createElement('div');
                
                // Set size (smaller particles)
                const size = Math.random() * 5 + 1;
                
                // Set styles
                particle.style.position = 'absolute';
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.background = 'rgba(255, 255, 255, 0.5)';
                particle.style.borderRadius = '50%';
                particle.style.pointerEvents = 'none';
                
                // Random starting position
                const posX = Math.random() * window.innerWidth;
                const posY = Math.random() * window.innerHeight;
                particle.style.left = `${posX}px`;
                particle.style.top = `${posY}px`;
                
                // Animation
                const duration = Math.random() * 20 + 10;
                particle.style.animation = `float ${duration}s infinite`;
                
                // Add animation keyframes once
                if (i === 0) {
                    const style = document.createElement('style');
                    style.textContent = `
                        @keyframes float {
                            0%, 100% {
                                transform: translateY(0) translateX(0);
                                opacity: 0;
                            }
                            25% {
                                opacity: 0.5;
                            }
                            50% {
                                transform: translateY(-${Math.random() * 70 + 30}px) translateX(${Math.random() * 40 - 20}px);
                                opacity: 1;
                            }
                            75% {
                                opacity: 0.5;
                            }
                        }
                    `;
                    document.head.appendChild(style);
                }
                
                // Add particle to container
                container.appendChild(particle);
                
                // Apply different animation delays
                setTimeout(() => {
                    particle.style.animationDelay = `-${Math.random() * duration}s`;
                }, 10);
            }
        });
    </script>
</body>
</html>