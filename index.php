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
.spec-content:hover {
    background: #2a59c7;
}

/* ACTIVE STATE */
.spec-item.active .spec-content {
    height: 100%;
    width: 100% !important;
    border-radius: 16px;
    padding: 0;
    align-items: flex-end;
    box-shadow: 0 15px 30px rgba(0,0,0,0.3);
    background: #fff;
}
.spec-item.active .spec-content .spec-img,
.spec-item.active .spec-content::before {
    opacity: 1;
}
.spec-item.active .spec-content .spec-text {
    width: 100%;
    text-align: center;
    padding: 1.5rem 1rem;
    white-space: normal;
    line-height: 1.3;
    font-size: 1.2rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
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
}
#homeHeroSlider::before {
    background: rgba(0,0,0,0.65) !important;
}
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
                <a href="partners.php" class="cta-btn">Join Our Team</a>
            </div>
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
    
    setInterval(() => {
        currentHeroBgIndex = (currentHeroBgIndex + 1) % heroBgImages.length;
        heroSliderElem.style.backgroundImage = `url('${heroBgImages[currentHeroBgIndex]}')`;
    }, 5000);

    // Specialized Marquee Logic
    const specTrack = document.getElementById('specMarqueeTrack');
    const specWrapper = document.getElementById('specMarqueeWrapper');
    if (specTrack && specWrapper) {
        const originalSpecItems = Array.from(specTrack.children);
        
        // Freeze the initial computed widths of the pills so they can transition smoothly to 100%
        originalSpecItems.forEach(item => {
            const content = item.querySelector('.spec-content');
            if (content) {
                const baseWidth = content.offsetWidth;
                content.style.width = baseWidth + 'px';
            }
        });

        // Clone items to fill screen and allow continuous scroll (total 3 sets)
        for (let i = 0; i < 2; i++) {
            originalSpecItems.forEach(item => {
                specTrack.appendChild(item.cloneNode(true));
            });
        }

        const cycleWidth = 1824; // (280px width + 24px gap) * 6 items
        let specTrackX = -cycleWidth; // Start at the second cycle for bidirectional buffer
        let specSpeed = window.innerWidth <= 768 ? 0.5 : 1.0; 
        let isSpecHovered = false;

        // Swipe / Drag Logic
        let isMouseDown = false;
        let startX = 0;
        let startY = 0;
        let startTrackX = 0;
        let isDragging = false;
        const dragThreshold = 6;

        function getX(e) {
            return e.touches ? e.touches[0].clientX : e.clientX;
        }

        function onStart(e) {
            isMouseDown = true;
            isDragging = false;
            startX = getX(e);
            startY = e.touches ? e.touches[0].clientY : e.clientY;
            startTrackX = specTrackX;
            isSpecHovered = true; // Pause auto-scroll
        }

        function onMove(e) {
            if (!isMouseDown) return;
            const currentX = getX(e);
            const currentY = e.touches ? e.touches[0].clientY : e.clientY;
            const deltaX = currentX - startX;
            const deltaY = currentY - startY;

            // Handle vertical scroll prevention for touch devices
            if (e.touches) {
                if (Math.abs(deltaX) > Math.abs(deltaY)) {
                    if (e.cancelable) e.preventDefault();
                } else {
                    isMouseDown = false;
                    isSpecHovered = false;
                    return;
                }
            }

            if (Math.abs(deltaX) > dragThreshold) {
                isDragging = true;
            }
            specTrackX = startTrackX + deltaX;
        }

        function onEnd() {
            if (!isMouseDown) return;
            isMouseDown = false;
            setTimeout(() => {
                isSpecHovered = false;
            }, 50);
        }

        // Mouse Listeners
        specWrapper.addEventListener('mousedown', onStart);
        window.addEventListener('mousemove', onMove);
        window.addEventListener('mouseup', onEnd);

        // Touch Listeners
        specWrapper.addEventListener('touchstart', onStart, { passive: true });
        specWrapper.addEventListener('touchmove', onMove, { passive: false });
        specWrapper.addEventListener('touchend', onEnd);

        // Prevent links navigation while dragging
        specTrack.addEventListener('click', (e) => {
            if (isDragging) {
                e.preventDefault();
                e.stopPropagation();
            }
        }, true);

        // Hover Pauses (Desktop only)
        specTrack.addEventListener('mouseenter', () => { if (!isMouseDown) isSpecHovered = true; });
        specTrack.addEventListener('mouseleave', () => { if (!isMouseDown) isSpecHovered = false; });

        // Use IntersectionObserver to optimally detect the center items
        const centerObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                } else {
                    entry.target.classList.remove('active');
                }
            });
        }, {
            root: specWrapper,
            rootMargin: '0px -30% 0px -30%', // Trigger for items in the middle 40% of the container
            threshold: 0
        });

        Array.from(specTrack.children).forEach(item => {
            centerObserver.observe(item);
        });

        // Smooth Animation & Bidirectional Wrapping Loop
        function animateSpecMarquee() {
            if (!isSpecHovered) {
                specTrackX -= specSpeed;
            }
            
            // Seamless Bidirectional Wrapping
            if (specTrackX <= -cycleWidth * 2) {
                specTrackX += cycleWidth;
            } else if (specTrackX >= 0) {
                specTrackX -= cycleWidth;
            }
            
            specTrack.style.transform = `translateX(${specTrackX}px)`;
            requestAnimationFrame(animateSpecMarquee);
        }
        
        animateSpecMarquee();
    }
});
</script>
<?php
// Include the site footer
require_once 'footer.php';
?>
