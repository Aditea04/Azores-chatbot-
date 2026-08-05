<?php
$pageTitle = "Home";
$metaDescription = "Welcome to Azores Infrastructure Private Limited (AIPL). We are a leading infrastructure, construction, and turnkey project development company with over 29 years of experience.";
// Include the site header
require_once 'header.php';
?>

<style>
/* Reset and base styles for index */
.index-main {
    font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
    color: #333;
}

.section {
    padding: 4rem 2rem;
    max-width: 1400px;
    margin: 0 auto;
}
.section-white {
    background-color: #fff;
    color: #333;
    padding: 4rem 2rem;
}
.section-gray {
    background-color: #f4f7f6;
    color: #333;
    padding: 4rem 2rem;
}
.section-green {
    background-color: #2a59c7;
    color: #fff;
    padding: 4rem 2rem;
}

.text-center { text-align: center; }
.text-yellow { color: #0d1a56; }
.text-green { color: #2a59c7; }



/* 2. Intro Split */
.intro-container {
    display: flex;
    flex-wrap: wrap;
    gap: 3rem;
    align-items: stretch;
}
.intro-left {
    flex: 1;
    min-width: 300px;
}
.intro-right {
    flex: 1;
    min-width: 300px;
    display: flex;
    flex-direction: column;
}
.intro-left h2 {
    color: #2a59c7;
    font-size: 2rem;
    margin-bottom: 1rem;
    text-transform: uppercase;
}
.intro-left h3 {
    color: #333;
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
}
.intro-left p {
    line-height: 1.8;
    color: #555;
    margin-bottom: 2rem;
}
.stats-row {
    display: flex;
    gap: 2rem;
    margin-top: 2rem;
    border-top: 1px solid #e2e8f0;
    padding-top: 2rem;
}
.stat-box {
    text-align: left;
}
.stat-box .num {
    font-size: 2.5rem;
    font-weight: bold;
    color: #2a59c7;
}
.stat-box .num span { color: #0d1a56; }
.stat-box .label {
    font-size: 0.8rem;
    color: #777;
    text-transform: uppercase;
    letter-spacing: 1px;
}
.main-img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    margin-bottom: 10px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    cursor: pointer;
    transition: opacity 0.2s ease;
}
.thumb-row {
    display: flex;
    gap: 10px;
}
.thumb-wrapper {
    flex: 1;
    position: relative;
    height: 100px;
    border-radius: 8px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.thumb-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.5;
    transition: all 0.3s ease;
}
.thumb-wrapper:hover img {
    opacity: 0.8;
}
.thumb-wrapper.active {
    box-shadow: 0 0 0 3px #2a59c7;
    transform: translateY(-2px);
}
.thumb-wrapper.active img {
    opacity: 1;
}
.thumb-wrapper .progress-bar {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 6px;
    background: #0d1a56;
    width: 0%;
}
.thumb-wrapper.active .progress-bar {
    animation: loadProgress 3s linear forwards;
}
@keyframes loadProgress {
    0% { width: 0%; }
    100% { width: 100%; }
}

/* Lightbox */
.lightbox {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0; width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.85);
    align-items: center;
    justify-content: center;
}
.lightbox img {
    max-width: 90%;
    max-height: 90%;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
}
.lightbox-close {
    position: absolute;
    top: 20px;
    right: 40px;
    color: #fff;
    font-size: 50px;
    font-weight: bold;
    cursor: pointer;
    transition: color 0.3s;
}
.lightbox-close:hover { color: #2a59c7; }

/* 4. Projects Grid */
.projects-header {
    text-align: center;
    margin-bottom: 3rem;
}
.projects-header h2 {
    color: #2a59c7;
    font-size: 2rem;
    text-transform: uppercase;
}
.projects-header p {
    color: #555;
    max-width: 800px;
    margin: 1rem auto;
}
.nav-tabs {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}
.nav-tabs a {
    color: #2a59c7;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 0.9rem;
    font-weight: bold;
    letter-spacing: 1px;
    padding: 10px 24px;
    border-radius: 30px;
    background: #e2e8f0;
    transition: all 0.3s ease;
}
.nav-tabs a:hover, .nav-tabs a.active {
    background: #0d1a56;
    color: #fff;
    box-shadow: 0 4px 10px rgba(13, 26, 86, 0.3);
}
.project-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 1.5rem;
}
.project-item {
    position: relative;
    height: 300px;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}
.project-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}
.project-item:hover img {
    transform: scale(1.1);
}
.project-overlay {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    background: rgba(13, 26, 86, 0.75);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    padding: 1.5rem;
    color: #fff;
}
.project-overlay h4 { margin: 0; color: #ffffff; font-size: 1.2rem; text-shadow: 0 1px 3px rgba(0,0,0,0.3); }
.project-overlay p { margin: 5px 0 0; font-size: 0.95rem; color: rgba(255,255,255,0.9); text-shadow: 0 1px 2px rgba(0,0,0,0.3); font-weight: 500; }

.specialized-sec {
    background-color: #f4f7f6;
    padding: 4rem 0 2rem 0;
    overflow: hidden;
}
.specialized-sec .projects-header {
    margin-bottom: 1rem;
}
.marquee-wrapper {
    width: 100%;
    overflow: hidden;
    position: relative;
    display: flex;
    align-items: center;
    min-height: 360px;
    padding: 1rem 0;
    -webkit-mask-image: linear-gradient(to right, transparent 0%, black 15%, black 85%, transparent 100%);
    mask-image: linear-gradient(to right, transparent 0%, black 15%, black 85%, transparent 100%);
    cursor: grab;
}
.marquee-wrapper:active {
    cursor: grabbing;
}
.marquee-track {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    will-change: transform;
}
.spec-item {
    width: 280px;
    height: 320px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    position: relative;
}
.spec-content {
    position: relative;
    background: linear-gradient(270deg, #02016A, #0434dc, #02016A);
    background-size: 300% 300%;
    animation: gradientRotate 15s ease infinite;
    color: #fff;
    border-radius: 30px;
    height: 60px;
    padding: 0 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.05rem;
    font-weight: bold;
    text-transform: uppercase;
    white-space: nowrap;
    transition: width 0.4s ease, height 0.4s ease, border-radius 0.4s ease, padding 0.4s ease, background-color 0.4s ease;
    box-shadow: 0 4px 10px rgba(13, 26, 86, 0.3);
    overflow: hidden;
    will-change: width, height;
    text-decoration: none;
}
.spec-content .spec-text {
    position: relative;
    z-index: 2;
    transition: all 0.4s ease;
}
.spec-content .spec-img {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    object-fit: cover;
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: 1;
    pointer-events: none;
}
.spec-content::before {
    content: '';
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: linear-gradient(to top, rgba(13,26,86,0.95) 0%, rgba(13,26,86,0.2) 100%);
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: 1;
    pointer-events: none;
}
/* ACTIVE STATE — triggered by center detection OR hover */
.spec-item.active .spec-content,
.spec-item:hover .spec-content {
    height: 100%;
    width: 100% !important;
    border-radius: 16px;
    padding: 0;
    align-items: flex-end;
    box-shadow: 0 15px 30px rgba(0,0,0,0.3);
    background: #fff;
}
.spec-item.active .spec-content .spec-img,
.spec-item.active .spec-content::before,
.spec-item:hover .spec-content .spec-img,
.spec-item:hover .spec-content::before {
    opacity: 1;
}
.spec-item.active .spec-content .spec-text,
.spec-item:hover .spec-content .spec-text {
    width: 100%;
    text-align: center;
    padding: 1.5rem 1rem;
    white-space: normal;
    line-height: 1.3;
    font-size: 1.2rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
}
/* Subtle lift on hovered expanded card */
.spec-item:hover .spec-content {
    transform: scale(1.03);
    box-shadow: 0 20px 40px rgba(0,0,0,0.35);
}

/* 6. Clients/Partners */
.partners-sec {
    background-color: #fff;
}
.partners-sec h2 {
    color: #2a59c7;
    margin-bottom: 3rem;
    text-transform: uppercase;
}
.partner-logos {
    overflow: hidden;
    white-space: nowrap;
    position: relative;
    width: 100%;
    padding: 1rem 0;
    -webkit-mask-image: linear-gradient(to right, transparent 0%, black 10%, black 90%, transparent 100%);
    mask-image: linear-gradient(to right, transparent 0%, black 10%, black 90%, transparent 100%);
}
.partner-logos-track {
    display: inline-flex;
    gap: 2rem;
    animation: partnerScroll 20s linear infinite;
}
.partner-logos-track:hover {
    animation-play-state: paused;
}
.partner-logo {
    width: 200px;
    height: 120px;
    min-width: 200px;
    border: 1px solid #eaeaea;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    font-weight: bold;
    color: #2a59c7;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    padding: 15px;
    transition: transform 0.3s, box-shadow 0.3s;
}
.partner-logo:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.1);
}
.partner-logo img {
    max-width: 100%;
    max-height: 100%;
    width: auto;
    height: auto;
    object-fit: contain;
}
@keyframes partnerScroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}



/* 8. Dual CTA */
.dual-cta {
    display: flex;
    flex-wrap: wrap;
}
.cta-box {
    flex: 1;
    min-width: 300px;
    padding: 5rem 2rem;
    color: #fff;
    position: relative;
}
.cta-1 { background: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=960&h=400&fit=crop') center/cover; }
.cta-2 { background: url('https://images.unsplash.com/photo-1578575437130-527eed3abbec?w=960&h=400&fit=crop') center/cover; }
.cta-box::before {
    content: '';
    position: absolute;
    top:0; left:0; right:0; bottom:0;
    background: rgba(42, 89, 199, 0.85); /* Accent overlay */
}
.cta-2::before {
    background: rgba(13, 26, 86, 0.85); /* Button color overlay */
}
.cta-content {
    position: relative;
    z-index: 2;
    max-width: 400px;
    margin: 0 auto;
}
.cta-content h3 { font-size: 2rem; color: #fff; margin-bottom: 1rem; }
.cta-content p { margin-bottom: 2rem; line-height: 1.6; }
.cta-btn {
    display: inline-block;
    padding: 0.8rem 2rem;
    background: linear-gradient(270deg, #02016A, #0434dc, #02016A);
    background-size: 300% 300%;
    animation: gradientRotate 15s ease infinite;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    border-radius: 8px;
    transition: transform 0.3s, box-shadow 0.3s;
}
.cta-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(4, 52, 220, 0.4);
}
button.cta-btn {
    border: none;
    cursor: pointer;
    font-family: inherit;
    font-size: inherit;
    letter-spacing: inherit;
}



/* Mobile Responsiveness */
@media (max-width: 768px) {
    .section, .section-white, .section-gray, .section-green {
        padding: 2rem 1rem;
    }
    .stats-row {
        display: flex;
        flex-wrap: nowrap !important;
        gap: 0.5rem;
        background-color: #f4f7f6;
        padding: 1.2rem 0.8rem;
        border-radius: 8px;
        border-top: none;
        justify-content: space-between;
        margin-top: 1.5rem;
    }
    .stat-box {
        flex: 1;
        text-align: center;
    }
    .stat-box .num {
        font-size: 1.8rem;
    }
    .stat-box .label {
        font-size: 0.65rem;
        white-space: normal;
        line-height: 1.2;
    }
    .nav-tabs {
        flex-wrap: wrap;
        gap: 1rem;
    }
    .spec-title { font-size: 2.5rem; letter-spacing: 2px; }
    .spec-text { font-size: 1.2rem; }
    .dual-cta .cta-box { padding: 3rem 1.5rem; }
    .cta-content h3 { font-size: 1.5rem; }
    .contact-container { gap: 2rem; }
    .intro-left h2 { font-size: 1.6rem; }
    .intro-left h3 { font-size: 1.3rem; }
    .main-img { height: 250px; }
}
#homeHeroSlider {
    transition: background-image 1s ease-in-out;
    background-image: url('img/pexels-vitthal-dikonda-1417433-31684126.jpg');
    background-size: cover;
    background-position: center;
    height: 100vh;
    min-height: 100vh;
}
#homeHeroSlider::before {
    background: rgba(0,0,0,0.65) !important;
}
/* ===== Career Modal ===== */
.career-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.82);
    z-index: 9999;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}
.career-overlay.open { display: flex; animation: fadeInOverlay 0.3s ease; }
@keyframes fadeInOverlay { from { opacity: 0; } to { opacity: 1; } }
.career-modal {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.25);
    border-radius: 8px;
    width: 100%;
    max-width: 460px;
    padding: 2.5rem 2rem 2rem;
    position: relative;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
    animation: slideUp 0.32s cubic-bezier(0.34, 1.56, 0.64, 1);
    max-height: 90vh;
    overflow-y: auto;
    color: #fff;
    font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
}
@keyframes slideUp {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
}
.career-modal-close {
    position: absolute; top: 1rem; right: 1.2rem;
    font-size: 1.6rem; color: rgba(255,255,255,0.7);
    cursor: pointer; background: none; border: none; line-height: 1;
    transition: color 0.2s;
}
.career-modal-close:hover { color: #fff; }
.career-modal h2 {
    color: #ffffff;
    font-size: 1.4rem;
    font-weight: bold;
    margin-bottom: 0.4rem;
    margin-top: 0;
    text-align: left;
}
.career-modal .modal-subtitle {
    color: rgba(255, 255, 255, 0.68);
    font-size: 0.88rem;
    text-align: left;
    margin-bottom: 1.8rem;
}
.career-screen { display: none; }
.career-screen.active { display: block; animation: fadeInScreen 0.22s ease; }
@keyframes fadeInScreen {
    from { opacity: 0; transform: translateY(8px); }
    to   { opacity: 1; transform: translateY(0); }
}
.career-choice-btn {
    display: flex; align-items: center; gap: 0.8rem;
    width: 100%; padding: 0.9rem 1.2rem; margin-bottom: 1rem;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.25);
    border-radius: 8px;
    color: #fff; font-size: 1rem; font-weight: 600;
    text-align: left; cursor: pointer; font-family: inherit;
    transition: background 0.25s, border-color 0.25s, transform 0.25s, box-shadow 0.25s;
}
.career-choice-btn:hover {
    background: linear-gradient(270deg, #02016A, #0434dc, #02016A);
    background-size: 300% 300%;
    animation: gradientRotate 15s ease infinite;
    border-color: transparent;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(4, 52, 220, 0.4);
}
.career-choice-btn .btn-icon { font-size: 1.2rem; }
.career-form-group { margin-bottom: 1rem; }
.career-form-group label {
    display: block; font-size: 0.82rem; font-weight: 600;
    color: rgba(255, 255, 255, 0.85); margin-bottom: 0.35rem;
    text-transform: uppercase; letter-spacing: 0.5px;
}
.career-form-group input[type=text],
.career-form-group input[type=email],
.career-form-group input[type=number],
.career-form-group input[type=tel],
.career-form-group input[type=file] {
    width: 100%; padding: 0.8rem; border: 1px solid #ddd;
    border-radius: 8px; font-size: 0.95rem;
    font-family: inherit; color: #333;
    background: #fff; box-sizing: border-box;
    transition: border-color 0.2s;
}
.career-form-group input:focus { outline: none; border-color: #2a59c7; }
.career-form-group input.error { border-color: #e74c3c; }
.field-error { color: #ffaaaa; font-size: 0.75rem; margin-top: 0.25rem; display: none; }
.gender-group { display: flex; gap: 1.2rem; flex-wrap: wrap; margin-top: 0.35rem; }
.gender-option { display: flex; align-items: center; gap: 0.4rem; cursor: pointer; color: #fff; font-size: 0.95rem; }
.gender-option input[type=radio] { accent-color: #0434dc; }
.career-submit-btn {
    width: 100%; padding: 1rem;
    background: linear-gradient(270deg, #02016A, #0434dc, #02016A);
    background-size: 300% 300%;
    animation: gradientRotate 15s ease infinite;
    color: #fff; border: none; border-radius: 8px;
    font-size: 1rem; font-weight: bold; font-family: inherit;
    cursor: pointer; margin-top: 0.5rem;
    transition: transform 0.3s, box-shadow 0.3s;
}
.career-submit-btn:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(4, 52, 220, 0.4); }
.career-back-link {
    display: inline-block; color: rgba(255,255,255,0.72);
    font-size: 0.85rem; cursor: pointer;
    margin-bottom: 1.2rem; text-decoration: underline;
    background: none; border: none; padding: 0; font-family: inherit;
    transition: color 0.2s;
}
.career-back-link:hover { color: #fff; }
.connect-note { color: rgba(255,255,255,0.68); font-size: 0.85rem; margin-bottom: 1.5rem; }
.connect-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    padding: 1rem 1.5rem;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: bold;
    color: #fff;
    cursor: pointer;
    margin-bottom: 1rem;
    font-family: inherit;
    text-decoration: none;
    box-sizing: border-box;
    gap: 0.7rem;
    transition: transform 0.3s, box-shadow 0.3s;
    letter-spacing: 0.3px;
}
.connect-btn:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.35); }
.connect-btn.mail-btn { background: linear-gradient(135deg, #08124a 0%, #1a3580 100%); }
.connect-btn.whatsapp-btn { background: linear-gradient(135deg, #1a4db0 0%, #2a59c7 100%); }
.connect-icon {
    width: 24px;
    height: 24px;
    object-fit: contain;
    flex-shrink: 0;
    border-radius: 3px;
    display: block;
}
.btn-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 26px;
    height: 26px;
}
.btn-icon svg { display: block; }
.upload-success { text-align: center; padding: 1.5rem 0 0.5rem; display: none; }
.upload-success .success-icon { font-size: 3rem; }
.upload-success p { color: #aaffcc; font-weight: 600; margin-top: 0.5rem; }
</style>

<div class="index-main">
    
    <!-- 1. Hero -->
    <div class="hero-slider" id="homeHeroSlider">
        <div class="hero-container">
            <div class="hero-content-left">
                <h1>Azores Infrastructure Private Limited</h1>
                <p>Building The Future of Infrastructure</p>
            </div>
            <div class="hero-form-container">
                <h3>Request A Callback</h3>
                <form class="hero-form">
                    <input type="text" placeholder="Your Name" required>
                    <input type="text" placeholder="Phone Number" required>
                    <input type="email" placeholder="Email Address (Optional)">
                    <textarea placeholder="Message (Optional)" rows="2"></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- 2. Intro Split -->
    <div class="section-white">
        <div class="section intro-container" style="padding: 0;">
            <div class="intro-left">
                <h2>About the Company</h2>
                <h3>Azores Infrastructure Private Limited</h3>
                <p>A leading infrastructure, construction, and real estate company with extensive experience in executing government, industrial, institutional, and residential projects across India.</p>
                <p>AIPL is a <strong>Class 1A Contractor</strong> registered with various State Government Departments, Central Government Agencies, Public Sector Undertakings (PSUs), Private Organizations, and State Universities.</p>
                
                <div class="stats-row">
                    <div class="stat-box">
                        <div class="num">29<span>+</span></div>
                        <div class="label">Years Experience</div>
                    </div>
                    <div class="stat-box">
                        <div class="num">120<span>+</span></div>
                        <div class="label">Govt Projects</div>
                    </div>
                    <div class="stat-box">
                        <div class="num">1A</div>
                        <div class="label">Class Contractor</div>
                    </div>
                </div>
            </div>
            <div class="intro-right">
                <img src="img/3.jpg" class="main-img" id="mainCarouselImg" alt="Project">
                <div class="thumb-row" id="thumbRow">
                    <div class="thumb-wrapper active">
                        <img src="img/3.jpg" alt="T1">
                        <div class="progress-bar"></div>
                    </div>
                    <div class="thumb-wrapper">
                        <img src="img/4.jpg" alt="T2">
                        <div class="progress-bar"></div>
                    </div>
                    <div class="thumb-wrapper">
                        <img src="img/5.jpg" alt="T3">
                        <div class="progress-bar"></div>
                    </div>
                    <div class="thumb-wrapper">
                        <img src="img/6.jpg" alt="T4">
                        <div class="progress-bar"></div>
                    </div>
                    <div class="thumb-wrapper">
                        <img src="img/7.jpg" alt="T5">
                        <div class="progress-bar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- 5. Specialized -->
    <div class="specialized-sec">
        <div class="projects-header">
            <h2>Our Specialization</h2>
            <p>We deliver excellence across various core sectors of development.</p>
        </div>
        
        <div class="marquee-wrapper" id="specMarqueeWrapper">
            <div class="marquee-track" id="specMarqueeTrack">
                <div class="spec-item">
                    <a href="specialization-highways.php" class="spec-content">
                        <img src="img/National%20%26%20State%20Highways.jpg" alt="Infrastructure" class="spec-img">
                        <span class="spec-text">Infrastructure &amp; Highways</span>
                    </a>
                </div>
                <div class="spec-item">
                    <a href="specialization-bridges.php" class="spec-content">
                        <img src="img/Bridges.jpg" alt="Bridges" class="spec-img">
                        <span class="spec-text">Bridges</span>
                    </a>
                </div>
                <div class="spec-item">
                    <a href="specialization-turnkey.php" class="spec-content">
                        <img src="img/Turnkey%20Projects.jpg" alt="Turnkey" class="spec-img">
                        <span class="spec-text">Turnkey Projects</span>
                    </a>
                </div>
                <div class="spec-item">
                    <a href="specialization-commercial.php" class="spec-content">
                        <img src="img/Industrial%20Buildings.jpg" alt="Commercial" class="spec-img">
                        <span class="spec-text">Commercial Buildings</span>
                    </a>
                </div>
                <div class="spec-item">
                    <a href="specialization-institutional.php" class="spec-content">
                        <img src="img/Institutional%20Buildings.jpg" alt="Institutional" class="spec-img">
                        <span class="spec-text">Institutional Buildings</span>
                    </a>
                </div>
                <div class="spec-item">
                    <a href="specialization-residential.php" class="spec-content">
                        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=600&h=360&fit=crop" alt="Residential" class="spec-img">
                        <span class="spec-text">Residential Complexes</span>
                    </a>
                </div>
            </div>
        </div>
    </div>





    <!-- 8. Dual CTA -->
    <div class="dual-cta">
        <div class="cta-box cta-1">
            <div class="cta-content">
                <h3>Partner With Us</h3>
                <p>We partner with developers and landowners to execute large-scale turnkey construction projects.</p>
                <a href="partners.php" class="cta-btn">Learn More</a>
            </div>
        </div>
        <div class="cta-box cta-2">
            <div class="cta-content">
                <h3>Careers</h3>
                <p>Join a leading infrastructure and construction company. We are looking for talented architects and consultants.</p>
                <button class="cta-btn" id="careerBtn" onclick="openCareerModal()">Join Our Team</button>
            </div>
        </div>
    </div>



</div>

<!-- Career Modal -->
<div class="career-overlay" id="careerOverlay" onclick="handleOverlayClick(event)">
    <div class="career-modal" id="careerModal">
        <button class="career-modal-close" onclick="closeCareerModal()">&times;</button>

        <!-- Screen 0: Main choice -->
        <div class="career-screen active" id="careerScreen0">
            <h2>Join Our Team</h2>
            <p class="modal-subtitle">How would you like to get in touch?</p>
            <button class="career-choice-btn" onclick="showCareerScreen(1)">
                <span class="btn-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><polyline points="14,2 14,8 20,8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><line x1="16" y1="13" x2="8" y2="13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><line x1="16" y1="17" x2="8" y2="17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><polyline points="10,9 9,9 8,9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span> Send in your Resume
            </button>
            <button class="career-choice-btn" onclick="showCareerScreen(3)">
                <span class="btn-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Connect directly with us
            </button>
        </div>

        <!-- Screen 1: Resume sub-options -->
        <div class="career-screen" id="careerScreen1">
            <button class="career-back-link" onclick="showCareerScreen(0)">&#8592; Back</button>
            <h2>Send Your Resume</h2>
            <p class="modal-subtitle">Choose how you'd like to submit</p>
            <button class="career-choice-btn" onclick="showCareerScreen(2)">
                <span class="btn-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><polyline points="16,16 12,12 8,16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><line x1="12" y1="12" x2="12" y2="21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Upload your Resume
            </button>
            <button class="career-choice-btn" onclick="careerMailResume()">
                <span class="btn-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Mail your Resume
            </button>
        </div>

        <!-- Screen 2: File upload -->
        <div class="career-screen" id="careerScreen2">
            <button class="career-back-link" onclick="showCareerScreen(1)">&#8592; Back</button>
            <h2>Upload Your Resume</h2>
            <p class="modal-subtitle">Accepted: PDF, DOC, DOCX</p>
            <div id="uploadFormArea">
                <div class="career-form-group">
                    <label>Select File</label>
                    <input type="file" id="resumeFileInput" accept=".pdf,.doc,.docx">
                </div>
                <button class="career-submit-btn" onclick="careerSubmitUpload()">Submit Resume</button>
            </div>
            <div class="upload-success" id="uploadSuccess">
                <div class="success-icon">&#9989;</div>
                <p>Thank you! We'll be in touch soon.</p>
            </div>
        </div>

        <!-- Screen 3: Contact form -->
        <div class="career-screen" id="careerScreen3">
            <button class="career-back-link" onclick="showCareerScreen(0)">&#8592; Back</button>
            <h2>Tell Us About Yourself</h2>
            <div class="career-form-group">
                <label>Full Name *</label>
                <input type="text" id="cf_name" placeholder="Your full name">
                <div class="field-error" id="err_name">Please enter your name</div>
            </div>
            <div class="career-form-group">
                <label>Age *</label>
                <input type="number" id="cf_age" placeholder="Your age" min="18" max="65">
                <div class="field-error" id="err_age">Please enter a valid age (18&ndash;65)</div>
            </div>
            <div class="career-form-group">
                <label>Phone Number *</label>
                <input type="tel" id="cf_phone" placeholder="+91 XXXXX XXXXX">
                <div class="field-error" id="err_phone">Please enter your phone number</div>
            </div>
            <div class="career-form-group">
                <label>Email *</label>
                <input type="email" id="cf_email" placeholder="you@example.com">
                <div class="field-error" id="err_email">Please enter a valid email</div>
            </div>
            <div class="career-form-group">
                <label>Gender *</label>
                <div class="gender-group">
                    <label class="gender-option"><input type="radio" name="cf_gender" value="Male"> Male</label>
                    <label class="gender-option"><input type="radio" name="cf_gender" value="Female"> Female</label>
                    <label class="gender-option"><input type="radio" name="cf_gender" value="Other"> Other</label>
                </div>
                <div class="field-error" id="err_gender">Please select a gender</div>
            </div>
            <div class="career-form-group">
                <label>Highest Education Qualification *</label>
                <input type="text" id="cf_edu" placeholder="e.g. B.Tech, MBA, Diploma">
                <div class="field-error" id="err_edu">Please enter your qualification</div>
            </div>
            <div class="career-form-group">
                <label>Upload Resume <span style="color:#aaa;font-weight:400">(Optional)</span></label>
                <input type="file" id="cf_resume" accept=".pdf,.doc,.docx">
            </div>
            <button class="career-submit-btn" onclick="careerSubmitForm()">Submit</button>
        </div>

        <!-- Screen 4: Thank you popup -->
        <div class="career-screen" id="careerScreen4" style="text-align:center; padding: 20px 10px;">
            <div style="font-size: 42px; margin-bottom: 10px;">🎉</div>
            <h2 style="text-align:center; font-size: 26px; font-weight: 800; color: #ffffff; margin-bottom: 12px; letter-spacing: -0.02em;">Thank you !!</h2>
            <p class="connect-note" style="text-align:center; font-size: 15px; line-height: 1.5; color: rgba(255,255,255,0.85); max-width: 320px; margin: 0 auto 20px;">We have received your request for contact, someone from our behalf will be reaching you soon.</p>
            <button class="career-submit-btn" onclick="closeCareerModal()" style="margin-top: 10px; width: 100%;">Done</button>
        </div>
    </div>
</div>

<!-- Lightbox HTML -->
<div class="lightbox" id="lightboxModal">
    <span class="lightbox-close" id="lightboxClose">&times;</span>
    <img id="lightboxImg" src="" alt="Enlarged Image">
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {


    // Carousel & Lightbox Logic
    const mainImg = document.getElementById('mainCarouselImg');
    const thumbWrappers = document.querySelectorAll('#thumbRow .thumb-wrapper');
    const lightboxModal = document.getElementById('lightboxModal');
    const lightboxImg = document.getElementById('lightboxImg');
    const lightboxClose = document.getElementById('lightboxClose');
    let currentIndex = 0;
    let carouselInterval;

    function setMainImage(index) {
        thumbWrappers.forEach(t => t.classList.remove('active'));
        
        // Trigger reflow to restart animation
        void thumbWrappers[index].offsetWidth;
        
        thumbWrappers[index].classList.add('active');
        
        mainImg.style.opacity = '0';
        setTimeout(() => {
            const img = thumbWrappers[index].querySelector('img');
            mainImg.src = img.src;
            mainImg.style.opacity = '1';
        }, 150);
        currentIndex = index;
    }

    function startCarousel() {
        carouselInterval = setInterval(() => {
            let nextIndex = (currentIndex + 1) % thumbWrappers.length;
            setMainImage(nextIndex);
        }, 3000);
    }

    function stopCarousel() {
        clearInterval(carouselInterval);
    }

    thumbWrappers.forEach((wrapper, index) => {
        wrapper.addEventListener('click', () => {
            stopCarousel();
            setMainImage(index);
            startCarousel();
        });
    });

    mainImg.addEventListener('click', () => {
        lightboxImg.src = mainImg.src;
        lightboxModal.style.display = 'flex';
        stopCarousel();
    });

    lightboxClose.addEventListener('click', () => {
        lightboxModal.style.display = 'none';
        startCarousel();
    });

    lightboxModal.addEventListener('click', (e) => {
        if(e.target === lightboxModal) {
            lightboxModal.style.display = 'none';
            startCarousel();
        }
    });

    startCarousel();

    // Hero Slider Background Rotation
    const heroBgImages = [
        'img/pexels-vitthal-dikonda-1417433-31684126.jpg',
        'img/pexels-phil-s-423397-27018689.jpg',
        'img/pexels-soloman-soh-674993-3124995.jpg'
    ];
    let currentHeroBgIndex = 0;
    const heroSliderElem = document.getElementById('homeHeroSlider');

    setInterval(function() {
        currentHeroBgIndex = (currentHeroBgIndex + 1) % heroBgImages.length;
        heroSliderElem.style.backgroundImage = "url('" + heroBgImages[currentHeroBgIndex] + "')";
    }, 5000);

    // Specialized Marquee Logic
    var specTrack = document.getElementById('specMarqueeTrack');
    var specWrapper = document.getElementById('specMarqueeWrapper');
    if (specTrack && specWrapper) {
        // Freeze pill widths before cloning
        Array.from(specTrack.children).forEach(function(item) {
            var c = item.querySelector('.spec-content');
            if (c) c.style.width = c.offsetWidth + 'px';
        });

        // Clone items twice for infinite loop buffer (3 sets total)
        var origItems = Array.from(specTrack.children);
        for (var i = 0; i < 2; i++) {
            origItems.forEach(function(item) { specTrack.appendChild(item.cloneNode(true)); });
        }

        var cycleWidth = 1824;
        var pos = -cycleWidth;
        var AUTO_SPEED = 1.4;
        var momentum = 0;
        var FRICTION = 0.90;
        var MIN_VEL = 0.3;

        var isDown = false, isDragging = false;
        var startX = 0, startPos = 0, prevX = 0, dragVel = 0;

        function getX(e) { return e.touches ? e.touches[0].clientX : e.clientX; }

        function onStart(e) {
            isDown = true; isDragging = false; momentum = 0;
            startX = getX(e); prevX = startX; startPos = pos;
        }
        function onMove(e) {
            if (!isDown) return;
            var cx = getX(e);
            var dx = cx - startX;
            if (e.touches) {
                var dy = e.touches[0].clientY - (startPos);
                if (Math.abs(dx) > 6 && e.cancelable) e.preventDefault();
            }
            if (Math.abs(dx) > 6) isDragging = true;
            if (isDragging) { dragVel = cx - prevX; prevX = cx; pos = startPos + dx; }
        }
        function onEnd() {
            if (!isDown) return; isDown = false;
            if (isDragging) momentum = dragVel;
            setTimeout(function() { isDragging = false; }, 50);
        }

        specWrapper.addEventListener('mousedown', onStart);
        window.addEventListener('mousemove', onMove);
        window.addEventListener('mouseup', onEnd);
        specWrapper.addEventListener('touchstart', onStart, { passive: true });
        specWrapper.addEventListener('touchmove', onMove, { passive: false });
        specWrapper.addEventListener('touchend', onEnd);
        specTrack.addEventListener('click', function(e) {
            if (isDragging) { e.preventDefault(); e.stopPropagation(); }
        }, true);

        function updateActive() {
            var wc = specWrapper.getBoundingClientRect().left + specWrapper.offsetWidth / 2;
            var all = Array.from(specTrack.children);
            var ranked = all.map(function(el) {
                return { el: el, d: Math.abs(el.getBoundingClientRect().left + el.offsetWidth / 2 - wc) };
            }).sort(function(a, b) { return a.d - b.d; });
            all.forEach(function(el) { el.classList.remove('active'); });
            ranked.slice(0, 3).forEach(function(x) { x.el.classList.add('active'); });
        }

        function animate() {
            if (!isDragging) {
                if (Math.abs(momentum) > MIN_VEL) {
                    pos += momentum;
                    momentum *= FRICTION;
                } else {
                    momentum = 0;
                    pos -= AUTO_SPEED;
                }
            }
            if (pos <= -cycleWidth * 2) pos += cycleWidth;
            else if (pos >= 0) pos -= cycleWidth;
            specTrack.style.transform = 'translateX(' + pos + 'px)';
            updateActive();
            requestAnimationFrame(animate);
        }
        animate();
    }
});
</script>

<script>
/* Career Modal — global scope so onclick attributes work */
function openCareerModal() {
    document.getElementById('careerOverlay').classList.add('open');
    showCareerScreen(0);
    document.body.style.overflow = 'hidden';
}
function closeCareerModal() {
    document.getElementById('careerOverlay').classList.remove('open');
    document.body.style.overflow = '';
    document.getElementById('uploadFormArea').style.display = 'block';
    document.getElementById('uploadSuccess').style.display = 'none';
}
function handleOverlayClick(e) {
    if (e.target === document.getElementById('careerOverlay')) closeCareerModal();
}
function showCareerScreen(n) {
    document.querySelectorAll('.career-screen').forEach(function(s) { s.classList.remove('active'); });
    document.getElementById('careerScreen' + n).classList.add('active');
}
function careerMailResume() {
    window.location.href = 'mailto:hr@azoresinfra.com?subject=Resume%20Submission&body=Please%20find%20my%20resume%20attached.';
    closeCareerModal();
}
function careerSubmitUpload() {
    var f = document.getElementById('resumeFileInput');
    if (!f.files || f.files.length === 0) { alert('Please select a file first.'); return; }
    document.getElementById('uploadFormArea').style.display = 'none';
    document.getElementById('uploadSuccess').style.display = 'block';
    setTimeout(function() { closeCareerModal(); }, 3000);
}
function careerSubmitForm() {
    var valid = true;
    function chk(id, errId, condFn) {
        var el = document.getElementById(id);
        var err = document.getElementById(errId);
        if (!condFn(el)) { el.classList.add('error'); err.style.display = 'block'; valid = false; }
        else { el.classList.remove('error'); err.style.display = 'none'; }
    }
    chk('cf_name',  'err_name',  function(el) { return el.value.trim() !== ''; });
    chk('cf_age',   'err_age',   function(el) { var v = parseInt(el.value); return v >= 18 && v <= 65; });
    chk('cf_phone', 'err_phone', function(el) { return el.value.trim().length >= 7; });
    chk('cf_email', 'err_email', function(el) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(el.value); });
    chk('cf_edu',   'err_edu',   function(el) { return el.value.trim() !== ''; });
    var gender = document.querySelector('input[name="cf_gender"]:checked');
    var errG = document.getElementById('err_gender');
    if (!gender) { errG.style.display = 'block'; valid = false; } else { errG.style.display = 'none'; }
    if (valid) showCareerScreen(4);
}
document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeCareerModal(); });
</script>
<?php
// Include the site footer
require_once 'footer.php';
?>
