<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) . " | Azores Infrastructure Private Limited" : "Azores Infrastructure Private Limited"; ?></title>
    <meta name="description" content="<?php echo isset($metaDescription) ? htmlspecialchars($metaDescription) : "Azores Infrastructure Private Limited is a leading class 1A infrastructure, construction, and turnkey engineering solutions provider."; ?>">
    <style>
        html {
            scroll-behavior: smooth;
        }
        /* Basic reset and styling for a modern look */
        body {
            font-family: 'Inter', 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* Utility class to keep content within bounds */
        .container {
            max-width: 1400px; /* Matching the 1400px from index.php section */
            margin: 0 auto;
            padding: 0 2rem;
            width: 100%;
            box-sizing: border-box;
        }
        
        /* New Header Styles based on mockup */
        /* Header & Navigation Styles */
        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            background: transparent;
            padding: 0;
            margin: 0;
        }
        
        /* Crisp solid 1px white border stroke icon (Zero CSS blur fading effect) */
        .logo-icon-img {
            height: 52px;
            width: auto;
            display: block;
            filter: none;
            transition: transform 0.3s ease;
        }
        
        /* Written text matching font family & tracking from reference picture (NO border/aura) */
        .logo-text-block {
            display: flex;
            flex-direction: column;
            justify-content: center;
            line-height: 1;
        }
        
        .logo-text-title {
            font-family: 'Montserrat', 'Century Gothic', 'Inter', sans-serif;
            font-size: 1.65rem;
            font-weight: 500;
            color: #ffffff;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }
        
        .logo-text-sub {
            font-family: 'Montserrat', 'Century Gothic', 'Inter', sans-serif;
            font-size: 0.58rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.92);
            letter-spacing: 0.22em;
            text-transform: uppercase;
            margin-top: 4px;
        }

        .nav-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1000;
            width: 100%;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .nav-wrapper.scrolled {
            position: fixed;
            background: linear-gradient(90deg, rgba(2, 1, 106, 0.95), rgba(4, 52, 220, 0.95));
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .main-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.2rem 2rem;
            max-width: 1400px;
            margin: 0 auto;
            transition: padding 0.3s ease;
        }
        
        .nav-links-wrapper {
            display: flex;
            align-items: center;
        }
        
        .nav-wrapper.scrolled .main-nav {
            padding: 0.8rem 2rem;
        }
        
        .main-nav a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 1rem;
            font-size: 0.95rem;
            font-weight: 500;
            padding-bottom: 0.1rem;
            border-bottom: 3px solid transparent;
            transition: color 0.2s, border-bottom-color 0.2s;
            box-sizing: border-box;
        }
        
        .main-nav a:hover {
            color: #ffffff;
            border-bottom-color: #2a59c7;
        }

        /* Premium Dropdown Navigation Styles */
        .nav-dropdown {
            position: relative;
            display: inline-block;
        }
        
        .nav-dropdown > a {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding-right: 0.5rem;
        }

        .nav-dropdown > a .dropdown-caret {
            font-size: 0.75rem;
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            color: rgba(255, 255, 255, 0.85);
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(12px) scale(0.96);
            background: linear-gradient(145deg, rgba(2, 1, 90, 0.98), rgba(6, 26, 115, 0.98));
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            min-width: 290px;
            border-radius: 12px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.45), 0 0 0 1px rgba(255, 255, 255, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.2);
            border-top: 3px solid #3b82f6;
            padding: 0.6rem;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.25s cubic-bezier(0.16, 1, 0.3, 1), transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.25s;
            z-index: 1100;
        }

        .nav-dropdown:hover .dropdown-menu,
        .nav-dropdown:focus-within .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(4px) scale(1);
        }

        .nav-dropdown:hover > a .dropdown-caret {
            transform: rotate(180deg);
            color: #ffffff;
        }

        .dropdown-menu a {
            display: flex !important;
            align-items: center;
            gap: 0.85rem;
            padding: 0.75rem 1rem !important;
            margin: 0.2rem 0 !important;
            color: #f1f5f9 !important;
            font-size: 0.92rem !important;
            font-weight: 500 !important;
            border-radius: 8px !important;
            border-bottom: none !important;
            border-left: 3px solid transparent !important;
            transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1) !important;
            white-space: nowrap;
            text-align: left;
        }

        .dropdown-menu a .dropdown-icon-wrapper {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 6px;
            color: #60a5fa;
            font-size: 0.9rem;
            flex-shrink: 0;
            transition: all 0.22s ease;
        }

        .dropdown-menu a:hover {
            background: linear-gradient(90deg, rgba(37, 99, 235, 0.35), rgba(59, 130, 246, 0.12)) !important;
            color: #ffffff !important;
            padding-left: 1.25rem !important;
            border-left-color: #3b82f6 !important;
            transform: translateX(4px) !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
        }

        .dropdown-menu a:hover .dropdown-icon-wrapper {
            background: #2563eb;
            border-color: #60a5fa;
            color: #ffffff;
            transform: scale(1.08);
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
        }

        /* Global Sidebar Styling for Specializations */
        .sidebar-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
        }

        .sidebar-list li {
            margin: 0;
            padding: 0;
            border-bottom: none;
        }

        .sidebar-list a {
            color: #334155;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1);
            font-size: 0.95rem;
        }

        .sidebar-list a i {
            color: #2563eb;
            font-size: 0.95rem;
            width: 20px;
            text-align: center;
            transition: color 0.22s ease, transform 0.22s ease;
        }

        .sidebar-list a:hover,
        .sidebar-list a.active {
            background: linear-gradient(135deg, #02016A, #0434dc) !important;
            color: #ffffff !important;
            border-color: #02016A !important;
            transform: translateX(4px);
            box-shadow: 0 4px 14px rgba(2, 1, 106, 0.25);
        }

        .sidebar-list a:hover i,
        .sidebar-list a.active i {
            color: #60a5fa !important;
            transform: scale(1.1);
        }

        main {
            flex: 1;
            width: 100%;
            box-sizing: border-box;
        }
        /* Enhanced Footer */
        .site-footer {
            background: linear-gradient(135deg, #0d1a56, #2a59c7);
            color: #fff;
            padding: 4rem 2rem 1rem;
            margin-top: auto;
            border-top: 4px solid #2a59c7;
        }
        
        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
            text-align: left;
        }
        
        .footer-col h4 {
            color: #ffffff;
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
        }
        
        .footer-col p {
            line-height: 1.6;
            margin-bottom: 1rem;
        }
        
        .footer-logo {
            max-width: 100%;
            max-height: 80px;
            height: auto;
            object-fit: contain;
            margin-bottom: 1rem;
            background-color: transparent;
            padding: 10px;
            border-radius: 8px;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: #fff;
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .footer-links a:hover {
            color: #8bb2ff;
        }
        
        .footer-contact i {
            color: #8bb2ff;
            margin-right: 10px;
            width: 16px;
            min-width: 16px;
            flex-shrink: 0;
            text-align: center;
            margin-top: 3px;
        }
        
        .footer-contact li {
            margin-bottom: 1rem;
            display: flex;
            align-items: flex-start;
            line-height: 1.5;
        }

        .footer-contact li > a {
            display: flex;
            align-items: flex-start;
            color: #fff;
            text-decoration: none;
            width: 100%;
            word-break: break-word;
        }
        
        .footer-bottom {
            max-width: 1400px;
            margin: 0 auto;
            text-align: center;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 0.9rem;
        }
        
        /* Global Hero Styles */
        .hero-slider {
            width: 100%;
            min-height: 100vh;
            height: 100vh;
            padding: 100px 0 3rem 0;
            background: url('img/hero_bg.png') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-sizing: border-box;
        }
        .hero-slider::before {
            content: '';
            position: absolute;
            top:0; left:0; right:0; bottom:0;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.65), rgba(15, 23, 42, 0.45));
        }
        .hero-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 3rem;
        }
        .hero-content-left {
            flex: 1;
            min-width: 300px;
            text-align: left;
            color: white;
        }
        .hero-content-left h1 { 
            font-size: 3.8rem; 
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: 1rem; 
            color: #ffffff; 
            letter-spacing: -0.5px;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
        }
        .hero-content-left p { 
            font-size: 1.4rem; 
            font-weight: 400;
            color: rgba(255, 255, 255, 0.95);
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
        }

        .hero-form-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 2rem;
            border-radius: 8px;
            width: 100%;
            max-width: 380px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
        }
        .hero-form-container h3 {
            margin-top: 0;
            color: #ffffff;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
        }
        .hero-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .hero-form input, .hero-form textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            font-family: inherit;
        }
        .hero-form input:focus, .hero-form textarea:focus {
            outline: none;
            border-color: #2a59c7;
        }
        @keyframes gradientRotate {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .hero-form button {
            background: linear-gradient(270deg, #02016A, #0434dc, #02016A);
            background-size: 300% 300%;
            animation: gradientRotate 15s ease infinite;
            color: #fff;
            border: none;
            padding: 1rem;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .hero-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(4, 52, 220, 0.4);
        }

        /* Mobile Responsiveness */
        .mobile-menu-toggle {
            display: none;
        }
        
        .nav-drawer-header {
            display: none;
        }

        .nav-backdrop {
            display: none;
        }

        @media (max-width: 768px) {
            /* Header & Nav Overlay */
            .logo-img { max-height: 48px; }
            
            .mobile-menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
                color: #ffffff;
                font-size: 1.6rem;
                cursor: pointer;
                width: 44px;
                height: 44px;
                border-radius: 8px;
                background: rgba(255, 255, 255, 0.15);
                backdrop-filter: blur(5px);
                transition: background 0.2s, color 0.2s;
                box-sizing: border-box;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            
            .mobile-menu-toggle:hover {
                background: rgba(255, 255, 255, 0.3);
                color: #ffffff;
            }
            
            .nav-wrapper, .nav-wrapper.scrolled {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 2000;
                background: transparent;
                border: none;
                box-shadow: none;
                backdrop-filter: none;
                -webkit-backdrop-filter: none;
                transition: none;
                pointer-events: none;
            }

            .nav-backdrop {
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                opacity: 0;
                pointer-events: none;
                transition: opacity 0.3s ease;
                z-index: 1;
            }
            
            .nav-backdrop.active {
                opacity: 1;
                pointer-events: auto;
            }

            .main-nav {
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                width: 300px;
                max-width: 80vw;
                background: linear-gradient(135deg, #02016A, #0434dc);
                box-shadow: -5px 0 25px rgba(0,0,0,0.25);
                z-index: 2;
                transform: translateX(100%);
                transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                pointer-events: auto;
                overflow-y: auto;
                -webkit-overflow-scrolling: touch;
            }
            
            .main-nav.active {
                transform: translateX(0);
            }
            
            .nav-drawer-header {
                display: flex;
                justify-content: flex-end;
                width: 100%;
                padding: 1.5rem 1.5rem 1rem;
                box-sizing: border-box;
            }
            
            .nav-close {
                color: #ffffff;
                font-size: 1.8rem;
                cursor: pointer;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.1);
                transition: background 0.2s, transform 0.2s;
            }
            
            .nav-close:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: rotate(90deg);
            }

            .nav-links-wrapper {
                display: flex;
                flex-direction: column;
                width: 100%;
            }

            .main-nav a {
                display: block;
                width: 100%;
                margin: 0;
                padding: 1.2rem 2rem;
                font-size: 1.1rem;
                font-weight: 500;
                color: #ffffff;
                border-bottom: 1px solid rgba(255, 255, 255, 0.08);
                box-sizing: border-box;
                text-align: left;
                transition: background 0.2s, padding-left 0.2s;
            }
            
            .main-nav a:hover {
                background: rgba(255, 255, 255, 0.05);
                padding-left: 2.3rem;
                border-bottom-color: rgba(255, 255, 255, 0.08);
            }
            .nav-wrapper.scrolled .main-nav { padding: 0; }

            /* Mobile Dropdown Styling */
            .nav-dropdown {
                width: 100%;
                display: block;
            }
            .nav-dropdown > a {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                margin: 0;
                padding: 1.2rem 2rem;
                font-size: 1.1rem;
                font-weight: 500;
                color: #ffffff;
                border-bottom: 1px solid rgba(255, 255, 255, 0.08);
                box-sizing: border-box;
            }
            .dropdown-menu {
                position: static;
                transform: none !important;
                opacity: 1;
                visibility: visible;
                display: none;
                box-shadow: none;
                border: none;
                border-top: none;
                background: rgba(0, 0, 0, 0.35);
                border-left: 3px solid #3b82f6;
                border-radius: 0;
                min-width: 100%;
                padding: 0.4rem 0;
            }
            .nav-dropdown.open .dropdown-menu {
                display: block;
            }
            .nav-dropdown.open > a .dropdown-caret {
                transform: rotate(180deg);
                color: #60a5fa;
            }
            .dropdown-menu a {
                padding: 0.75rem 1.5rem 0.75rem 2rem !important;
                font-size: 0.95rem !important;
                border-radius: 0 !important;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
                white-space: normal !important;
                margin: 0 !important;
                color: #ffffff !important;
            }
            .dropdown-menu a:hover {
                background: rgba(255, 255, 255, 0.12) !important;
                padding-left: 2.3rem !important;
                transform: none !important;
            }

            /* Hero Section */
            .hero-slider { padding: 3.5rem 0; min-height: auto; }
            .hero-container { flex-direction: column; gap: 3.5rem; padding: 0 1.5rem; text-align: center; }
            .hero-content-left { text-align: center; min-width: 100%; }
            .hero-content-left h1 { font-size: 2.2rem; margin-bottom: 0.8rem; }
            .hero-content-left p { font-size: 1.1rem; }
            .hero-form-container { max-width: 100%; padding: 2rem 1.5rem; box-sizing: border-box; }

            /* Footer 2x2 Grid for Mobile View */
            .footer-container {
                display: grid !important;
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 2rem 1rem !important;
                padding: 0 0.5rem !important;
                text-align: left !important;
            }
            .footer-col {
                min-width: 0;
                overflow: hidden;
            }
            .footer-col:first-child {
                grid-column: 1 / -1 !important;
            }
            .footer-col h4 {
                font-size: 1.05rem !important;
                margin-bottom: 0.8rem !important;
                letter-spacing: 0.5px;
            }
            .footer-col p {
                font-size: 0.85rem !important;
                line-height: 1.5 !important;
            }
            .footer-logo {
                max-width: 100% !important;
                max-height: 55px !important;
                width: auto !important;
                height: auto !important;
                object-fit: contain !important;
                margin-bottom: 0.6rem !important;
                padding: 4px 0 !important;
            }
            .footer-links li {
                margin-bottom: 0.5rem !important;
            }
            .footer-links a {
                font-size: 0.88rem !important;
            }
            .footer-contact li {
                justify-content: flex-start !important;
                font-size: 0.82rem !important;
                margin-bottom: 0.6rem !important;
            }
            .footer-contact li > a {
                display: flex !important;
                align-items: flex-start !important;
                font-size: 0.82rem !important;
                word-break: break-all !important;
            }
            .footer-contact i {
                margin-right: 8px !important;
                font-size: 0.85rem !important;
                flex-shrink: 0 !important;
                margin-top: 2px !important;
            }
            .site-footer {
                padding: 2.5rem 1rem 1rem !important;
            }
        }
    </style>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="nav-wrapper" id="navWrapper">
        <div class="nav-backdrop" id="navBackdrop"></div>
        <nav class="main-nav" id="mainNav">
            <a href="index.php" class="logo-container">
                <img src="img/Azores_icon_bordered.png" alt="Azores" class="logo-icon-img">
                <div class="logo-text-block">
                    <span class="logo-text-title">AZORES</span>
                    <span class="logo-text-sub">INFRASTRUCTURE PVT. LTD.</span>
                </div>
            </a>
            <div class="nav-drawer-header">
                <div class="nav-close" id="navClose">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
            <div class="nav-links-wrapper">
                <a href="index.php">Home</a>
                <a href="about.php">About Us</a>
                <a href="services.php">Services</a>
                <div class="nav-dropdown" id="specDropdown">
                    <a href="specialization.php" id="specDropdownLink">
                        Specialization <i class="fa-solid fa-chevron-down dropdown-caret" id="specCaret"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="specialization.php">
                            <span class="dropdown-icon-wrapper"><i class="fa-solid fa-layer-group"></i></span>
                            <span>All Specializations</span>
                        </a>
                        <a href="specialization-highways.php">
                            <span class="dropdown-icon-wrapper"><i class="fa-solid fa-road"></i></span>
                            <span>Infrastructure &amp; Highways</span>
                        </a>
                        <a href="specialization-turnkey.php">
                            <span class="dropdown-icon-wrapper"><i class="fa-solid fa-key"></i></span>
                            <span>Turnkey Projects</span>
                        </a>
                        <a href="specialization-commercial.php">
                            <span class="dropdown-icon-wrapper"><i class="fa-solid fa-city"></i></span>
                            <span>Commercial &amp; Industrial</span>
                        </a>
                        <a href="specialization-institutional.php">
                            <span class="dropdown-icon-wrapper"><i class="fa-solid fa-building-columns"></i></span>
                            <span>Institutional Buildings</span>
                        </a>
                        <a href="specialization-bridges.php">
                            <span class="dropdown-icon-wrapper"><i class="fa-solid fa-bridge"></i></span>
                            <span>Bridges</span>
                        </a>
                        <a href="specialization-residential.php">
                            <span class="dropdown-icon-wrapper"><i class="fa-solid fa-house-chimney"></i></span>
                            <span>Residential Complexes</span>
                        </a>
                    </div>
                </div>
                <a href="partners.php">Partner With Us</a>
            </div>
            <div class="mobile-menu-toggle" id="mobileMenuToggle">
                <i class="fa-solid fa-bars"></i>
            </div>
        </nav>
    </div>
        </nav>
    </div>
    
    <script>
        // Add scroll event listener to toggle 'scrolled' class on nav
        window.addEventListener('scroll', function() {
            var nav = document.getElementById('navWrapper');
            if (nav && window.scrollY > 20) {
                nav.classList.add('scrolled');
            } else if (nav) {
                nav.classList.remove('scrolled');
            }
        });

        // Mobile drawer menu logic
        var mobileMenuToggle = document.getElementById('mobileMenuToggle');
        var mainNav = document.getElementById('mainNav');
        var navBackdrop = document.getElementById('navBackdrop');
        var navClose = document.getElementById('navClose');
        var specDropdown = document.getElementById('specDropdown');
        var specDropdownLink = document.getElementById('specDropdownLink');

        function openMenu() {
            if (mainNav) mainNav.classList.add('active');
            if (navBackdrop) navBackdrop.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        }

        function closeMenu() {
            if (mainNav) mainNav.classList.remove('active');
            if (navBackdrop) navBackdrop.classList.remove('active');
            if (specDropdown) specDropdown.classList.remove('open');
            document.body.style.overflow = ''; // Restore background scrolling
        }

        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', openMenu);
        }
        if (navClose) {
            navClose.addEventListener('click', closeMenu);
        }
        if (navBackdrop) {
            navBackdrop.addEventListener('click', closeMenu);
        }

        // Toggle mobile dropdown when Specialization is tapped on mobile view
        if (specDropdownLink && specDropdown) {
            specDropdownLink.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    e.stopPropagation();
                    specDropdown.classList.toggle('open');
                }
            });
        }

        /* =====================================================
           SCROLL-DRIVEN LIFECYCLE CONNECTOR LINE
           Draws an SVG line connecting all .step-num circles
           as the user scrolls through .lifecycle-steps
        ===================================================== */
        (function() {
            var styleEl = document.createElement('style');
            styleEl.textContent = [
                '.lifecycle-steps { position: relative; }',
                '.lc-svg-track { position: absolute; left: 17px; top: 0; width: 2px; pointer-events: none; overflow: visible; z-index: 0; }',
                '.lc-track-bg { stroke: rgba(2,1,106,0.12); stroke-width: 2; fill: none; }',
                '.lc-track-fill { stroke: url(#lcGrad); stroke-width: 2.5; fill: none; stroke-linecap: round; transition: stroke-dashoffset 0.05s linear; }',
                '.step-num { position: relative; z-index: 1; transition: box-shadow 0.4s ease, transform 0.4s ease; }',
                '.step-num.lc-active { box-shadow: 0 0 0 6px rgba(42,89,199,0.25), 0 0 0 12px rgba(42,89,199,0.10); transform: scale(1.08); }',
                '@keyframes lcPulse { 0%,100%{box-shadow:0 0 0 4px rgba(42,89,199,0.3)} 50%{box-shadow:0 0 0 10px rgba(42,89,199,0.08)} }',
                '.step-num.lc-active { animation: lcPulse 1.8s ease infinite; }'
            ].join('\n');
            document.head.appendChild(styleEl);

            function initLifecycleLine() {
                var container = document.querySelector('.lifecycle-steps');
                if (!container) return;

                var steps = Array.from(container.querySelectorAll('.step-item'));
                var nums  = steps.map(function(s){ return s.querySelector('.step-num'); });
                if (nums.length < 2) return;

                /* Build the SVG */
                var svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                svg.setAttribute('class', 'lc-svg-track');
                svg.style.position = 'absolute';

                /* Gradient def */
                var defs = document.createElementNS('http://www.w3.org/2000/svg', 'defs');
                var grad = document.createElementNS('http://www.w3.org/2000/svg', 'linearGradient');
                grad.setAttribute('id', 'lcGrad');
                grad.setAttribute('x1','0'); grad.setAttribute('y1','0');
                grad.setAttribute('x2','0'); grad.setAttribute('y2','1');
                var s1 = document.createElementNS('http://www.w3.org/2000/svg','stop');
                s1.setAttribute('offset','0%'); s1.setAttribute('stop-color','#2a59c7');
                var s2 = document.createElementNS('http://www.w3.org/2000/svg','stop');
                s2.setAttribute('offset','100%'); s2.setAttribute('stop-color','#08124a');
                grad.appendChild(s1); grad.appendChild(s2);
                defs.appendChild(grad);
                svg.appendChild(defs);

                var bgPath  = document.createElementNS('http://www.w3.org/2000/svg','line');
                bgPath.setAttribute('class','lc-track-bg');
                var fillPath = document.createElementNS('http://www.w3.org/2000/svg','line');
                fillPath.setAttribute('class','lc-track-fill');

                svg.appendChild(bgPath);
                svg.appendChild(fillPath);
                container.insertBefore(svg, container.firstChild);

                function getY(el) {
                    var cr = el.getBoundingClientRect();
                    var pr = container.getBoundingClientRect();
                    return (cr.top - pr.top) + cr.height / 2;
                }

                function layout() {
                    var y1 = getY(nums[0]);
                    var y2 = getY(nums[nums.length - 1]);
                    var totalH = container.offsetHeight;

                    svg.setAttribute('height', totalH);
                    svg.style.height = totalH + 'px';

                    bgPath.setAttribute('x1','1');  bgPath.setAttribute('y1', y1);
                    bgPath.setAttribute('x2','1');  bgPath.setAttribute('y2', y2);
                    fillPath.setAttribute('x1','1'); fillPath.setAttribute('y1', y1);
                    fillPath.setAttribute('x2','1'); fillPath.setAttribute('y2', y2);

                    var len = y2 - y1;
                    fillPath.style.strokeDasharray  = len;
                    fillPath.style.strokeDashoffset = len; /* starts hidden */
                }

                layout();
                window.addEventListener('resize', layout);

                /* Scroll-driven draw */
                function onScroll() {
                    var rect = container.getBoundingClientRect();
                    var wh   = window.innerHeight;

                    /* progress: 0 when top of container enters bottom of viewport
                                 1 when bottom of container leaves top of viewport */
                    var start  = rect.top  - wh * 0.85;
                    var end    = rect.bottom - wh * 0.15;
                    var range  = end - start;
                    var prog   = Math.min(1, Math.max(0, -start / range));

                    var y1  = getY(nums[0]);
                    var y2  = getY(nums[nums.length - 1]);
                    var len = y2 - y1;
                    fillPath.style.strokeDashoffset = len * (1 - prog);

                    /* Activate individual circles */
                    nums.forEach(function(num, i) {
                        var threshold = i / (nums.length - 1);
                        if (prog >= threshold) {
                            num.classList.add('lc-active');
                        } else {
                            num.classList.remove('lc-active');
                        }
                    });
                }

                window.addEventListener('scroll', onScroll, { passive: true });
                onScroll(); /* run once on load */
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initLifecycleLine);
            } else {
                initLifecycleLine();
            }
        })();
    </script>
    <main>
