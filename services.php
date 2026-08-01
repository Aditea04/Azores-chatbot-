<?php
$pageTitle = "Our Services";
$metaDescription = "Explore the engineering and construction services provided by Azores Infrastructure Private Limited (AIPL), including highway, bridge, turnkey, commercial, and residential projects.";
// Include the site header
require_once 'header.php';
?>

<style>

    
    .section-title {
        color: #2a59c7;
        border-bottom: 2px solid #0d1a56;
        padding-bottom: 0.5rem;
        margin-bottom: 1.5rem;
        margin-top: 2rem;
    }
    
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }
    
    .service-card {
        background: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        border-top: 4px solid #2a59c7;
        transition: transform 0.2s;
    }
    
    .service-card:hover {
        transform: translateY(-5px);
    }
    
    .service-card h3 {
        color: #2a59c7;
        margin-top: 0;
        margin-bottom: 1rem;
    }
    
    .service-card ul {
        padding-left: 1.2rem;
        color: #555;
        line-height: 1.6;
    }
    
    .service-card p {
        color: #555;
        line-height: 1.6;
    }
    
    .service-card-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 1rem;
    }

    .contact-link {
        display: inline-block;
        margin-top: 0.5rem;
        color: #2a59c7;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
    }
    .contact-link:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .service-card { padding: 1.5rem 1rem; }
        .section-title { font-size: 1.5rem; }
    }
    
    #servicesHero {
        background-image: url('img/pexels-kelly-2532029.jpg');
    }
    #servicesHero::before {
        background: rgba(0,0,0,0.5) !important;
    }

    /* ===== Discuss Project Modal ===== */
    .disc-overlay {
        display: none; position: fixed; inset: 0;
        background: rgba(0,0,0,0.82); z-index: 9999;
        align-items: center; justify-content: center; padding: 1rem;
    }
    .disc-overlay.open { display: flex; animation: discFadeIn 0.3s ease; }
    @keyframes discFadeIn { from{opacity:0} to{opacity:1} }
    .disc-modal {
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255,255,255,0.25); border-radius: 8px;
        width: 100%; max-width: 400px; padding: 2rem;
        position: relative; box-shadow: 0 8px 32px rgba(0,0,0,0.4);
        animation: discSlideUp 0.32s cubic-bezier(0.34,1.56,0.64,1);
        color: #fff; font-family: 'Inter','Segoe UI',Roboto,sans-serif;
    }
    @keyframes discSlideUp {
        from{opacity:0;transform:translateY(30px)}
        to{opacity:1;transform:translateY(0)}
    }
    .disc-close {
        position: absolute; top: 0.9rem; right: 1.1rem;
        font-size: 1.5rem; color: rgba(255,255,255,0.7);
        cursor: pointer; background: none; border: none; line-height: 1;
        transition: color 0.2s;
    }
    .disc-close:hover { color: #fff; }
    .disc-modal h3 { margin: 0 0 0.3rem; color: #fff; font-size: 1.25rem; font-weight: bold; }
    .disc-modal p { color: rgba(255,255,255,0.68); font-size: 0.88rem; margin: 0 0 1.5rem; }
    .disc-btn {
        display: flex; align-items: center; justify-content: center;
        gap: 0.7rem; width: 100%; padding: 1rem 1.5rem;
        border: none; border-radius: 8px; font-size: 1rem;
        font-weight: bold; color: #fff; cursor: pointer;
        margin-bottom: 1rem; font-family: inherit;
        text-decoration: none; box-sizing: border-box;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .disc-btn:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.35); }
    .disc-btn.disc-mail { background: linear-gradient(135deg, #08124a 0%, #1a3580 100%); }
    .disc-btn.disc-wa   { background: linear-gradient(135deg, #1a4db0 0%, #2a59c7 100%); }
    .disc-btn img { width:24px; height:24px; object-fit:contain; border-radius:3px; display:block; flex-shrink:0; vertical-align:middle; }
    .disc-btn span { vertical-align: middle; }
</style>

<div class="hero-slider" id="servicesHero" style="margin-bottom: 0;">
    <div class="hero-container">
        <div class="hero-content-left">
            <h1>Our Services</h1>
            <p>Comprehensive Infrastructure Solutions</p>
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

<div class="container" style="padding-top: 2rem; padding-bottom: 2rem;">
<h2 class="section-title">Construction Types &amp; Expertise</h2>
<div class="services-grid">
    <div class="service-card">
        <img src="img/National%20%26%20State%20Highways.jpg" alt="Highways" class="service-card-img">
        <h3>Highway Construction</h3>
        <p>We undertake highway construction projects designed to improve regional and national connectivity. Our work includes road development, widening, rehabilitation, pavement construction, drainage systems, and associated civil infrastructure while following approved engineering standards and project specifications.</p>
        <a href="#" class="contact-link" onclick="openDiscModal(event)">Discuss Your Highway Project &rarr;</a>
    </div>
    
    <div class="service-card">
        <img src="img/Turnkey%20Projects.jpg" alt="Turnkey Projects" class="service-card-img">
        <h3>End-to-End Project Execution</h3>
        <p>We deliver turnkey construction projects by managing every stage of development, from planning and engineering to procurement, construction, testing, and final handover. A single execution process helps maintain coordination, quality, and timely delivery throughout the project.</p>
        <a href="#" class="contact-link" onclick="openDiscModal(event)">Discuss Your Turnkey Project &rarr;</a>
    </div>
    
    <div class="service-card">
        <img src="img/Industrial%20Buildings.jpg" alt="Industrial Buildings" class="service-card-img">
        <h3>Commercial and Industrial Buildings</h3>
        <p>Our team constructs commercial buildings, industrial facilities, warehouses, factories, office spaces, and production units for businesses across different sectors. Every project is planned around operational needs, structural safety, and long-term functionality.</p>
        <a href="#" class="contact-link" onclick="openDiscModal(event)">Discuss Your Commercial Project &rarr;</a>
    </div>

    <div class="service-card">
        <img src="img/Institutional%20Buildings.jpg" alt="Institutional Buildings" class="service-card-img">
        <h3>Institutional Infrastructure</h3>
        <p>We build institutional facilities such as schools, colleges, hospitals, government offices, training centres, and public service buildings. Each project is completed in accordance with applicable construction standards and the specific requirements of the client.</p>
        <a href="#" class="contact-link" onclick="openDiscModal(event)">Discuss Your Institutional Project &rarr;</a>
    </div>

    <div class="service-card">
        <img src="img/Bridges.jpg" alt="Bridges" class="service-card-img">
        <h3>Bridge Construction</h3>
        <p>We execute bridge construction projects for highways, rural roads, urban developments, and public infrastructure. Our experience covers reinforced concrete and structural steel bridges, along with associated foundation and approach works designed for long-term performance.</p>
        <a href="#" class="contact-link" onclick="openDiscModal(event)">Discuss Your Bridge Project &rarr;</a>
    </div>

    <div class="service-card">
        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=600&h=360&fit=crop" alt="Residential" class="service-card-img">
        <h3>Residential Developments</h3>
        <p>We construct residential buildings ranging from independent housing projects to multi-storey apartment complexes. Our focus is on durable construction, efficient planning, and practical living spaces that meet modern residential requirements.</p>
        <a href="#" class="contact-link" onclick="openDiscModal(event)">Discuss Your Residential Project &rarr;</a>
    </div>
</div>
</div>


<!-- Discuss Project Modal -->
<div class="disc-overlay" id="discOverlay" onclick="discOverlayClick(event)">
    <div class="disc-modal">
        <button class="disc-close" onclick="closeDiscModal()">&times;</button>
        <h3>Let's Discuss Your Project</h3>
        <p>Choose how you'd like to connect with our team.</p>
        <a href="mailto:Azores.ranchi@gmail.com" class="disc-btn disc-mail">
            <img src="img/icon-gmail.png" alt="Gmail"> <span>Mail via Gmail</span>
        </a>
        <a href="https://wa.me/919031140000" target="_blank" class="disc-btn disc-wa">
            <img src="img/icon-whatsapp.png" alt="WhatsApp"> <span>WhatsApp</span>
        </a>
    </div>
</div>

<script>
function openDiscModal(e) {
    e.preventDefault();
    document.getElementById('discOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeDiscModal() {
    document.getElementById('discOverlay').classList.remove('open');
    document.body.style.overflow = '';
}
function discOverlayClick(e) {
    if (e.target === document.getElementById('discOverlay')) closeDiscModal();
}
document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeDiscModal(); });
</script>

<?php
// Include the site footer
require_once 'footer.php';
?>
