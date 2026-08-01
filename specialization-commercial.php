<?php
$pageTitle = "Commercial & Industrial Construction | Specialization";
$metaDescription = "Azores Infrastructure Private Limited constructs state-of-the-art commercial complexes, industrial plants, logistics warehouses, and PEB structures.";
require_once 'header.php';
?>

<style>
    .spec-detail-hero {
        background: url('img/Industrial%20Buildings.jpg') center/cover no-repeat;
        position: relative;
        min-height: 420px;
        display: flex;
        align-items: center;
        color: white;
    }
    .spec-detail-hero::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.65), rgba(15, 23, 42, 0.45));
    }
    .spec-hero-container {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        padding: 2.5rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 2rem;
    }
    .spec-hero-text {
        flex: 1;
        min-width: 300px;
    }
    .spec-hero-text .badge {
        display: inline-block;
        background: #2a59c7;
        color: #fff;
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 1rem;
        letter-spacing: 1px;
    }
    .spec-hero-text h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
        line-height: 1.2;
    }
    .spec-hero-text p {
        font-size: 1.25rem;
        opacity: 0.95;
        max-width: 650px;
        line-height: 1.6;
    }
    .breadcrumb-nav {
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }
    .breadcrumb-nav a {
        color: #8bb2ff;
        text-decoration: none;
    }
    .breadcrumb-nav a:hover {
        text-decoration: underline;
    }
    .breadcrumb-nav span {
        color: #ffffff;
        margin: 0 0.5rem;
    }

    .spec-body-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }
    
    .spec-layout {
        display: grid;
        grid-template-columns: 2.8fr 1.2fr;
        gap: 3rem;
    }

    .spec-content-section {
        background: #ffffff;
        padding: 2.5rem;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        margin-bottom: 2.5rem;
    }

    .spec-content-section h2 {
        color: #02016A;
        font-size: 1.8rem;
        margin-top: 0;
        margin-bottom: 1.2rem;
        padding-bottom: 0.5rem;
        border-bottom: 3px solid #2a59c7;
    }

    .spec-content-section h3 {
        color: #2a59c7;
        font-size: 1.3rem;
        margin-top: 1.8rem;
        margin-bottom: 0.8rem;
    }

    .spec-content-section p {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #444;
        margin-bottom: 1.2rem;
    }

    .spec-feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin: 2rem 0;
    }

    .spec-feature-box {
        background: #f8fafc;
        border-left: 4px solid #2a59c7;
        padding: 1.5rem;
        border-radius: 6px;
        transition: transform 0.2s;
    }
    .spec-feature-box:hover {
        transform: translateY(-3px);
    }
    .spec-feature-box i {
        font-size: 2rem;
        color: #2a59c7;
        margin-bottom: 0.8rem;
    }
    .spec-feature-box h4 {
        margin: 0 0 0.5rem 0;
        color: #02016A;
        font-size: 1.1rem;
    }
    .spec-feature-box p {
        font-size: 0.95rem;
        margin: 0;
        color: #666;
        line-height: 1.6;
    }

    .spec-sidebar {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .sidebar-widget {
        background: #ffffff;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border-top: 4px solid #02016A;
    }

    .sidebar-widget h3 {
        color: #02016A;
        font-size: 1.3rem;
        margin-top: 0;
        margin-bottom: 1.2rem;
    }

    .sidebar-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-list li {
        margin-bottom: 1rem;
        padding-bottom: 0.8rem;
        border-bottom: 1px solid #edf2f7;
    }

    .sidebar-list a {
        color: #2a59c7;
        text-decoration: none;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: color 0.2s;
    }
    .sidebar-list a:hover {
        color: #02016A;
    }

    .cta-card {
        background: linear-gradient(135deg, #02016A, #0434dc);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        text-align: center;
    }
    .cta-card h3 {
        color: white;
        margin-top: 0;
        font-size: 1.4rem;
    }
    .cta-card p {
        font-size: 0.95rem;
        line-height: 1.6;
        opacity: 0.9;
        margin-bottom: 1.5rem;
    }
    .cta-btn {
        display: inline-block;
        background: #ffffff;
        color: #02016A;
        padding: 0.8rem 1.8rem;
        border-radius: 6px;
        font-weight: bold;
        text-decoration: none;
        transition: background 0.2s, transform 0.2s;
    }
    .cta-btn:hover {
        background: #e6edff;
        transform: translateY(-2px);
    }

    .lifecycle-steps {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
        margin: 1.5rem 0;
    }
    .step-item {
        display: flex;
        gap: 1.2rem;
        align-items: flex-start;
    }
    .step-num {
        background: #02016A;
        color: white;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        flex-shrink: 0;
    }
    .step-text h4 {
        margin: 0 0 0.3rem 0;
        color: #02016A;
        font-size: 1.1rem;
    }
    .step-text p {
        margin: 0;
        font-size: 0.95rem;
    }

    @media (max-width: 992px) {
        .spec-layout {
            grid-template-columns: 1fr;
        }
        .spec-hero-text h1 {
            font-size: 2.2rem;
        }
    }
    /* ===== Contact Modal ===== */
    .disc-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.82); z-index:9999; align-items:center; justify-content:center; padding:1rem; }
    .disc-overlay.open { display:flex; animation:discFadeIn 0.3s ease; }
    @keyframes discFadeIn { from{opacity:0} to{opacity:1} }
    .disc-modal { background:rgba(255,255,255,0.12); backdrop-filter:blur(14px); -webkit-backdrop-filter:blur(14px); border:1px solid rgba(255,255,255,0.25); border-radius:8px; width:100%; max-width:400px; padding:2rem; position:relative; box-shadow:0 8px 32px rgba(0,0,0,0.4); animation:discSlideUp 0.32s cubic-bezier(0.34,1.56,0.64,1); color:#fff; font-family:'Inter','Segoe UI',Roboto,sans-serif; }
    @keyframes discSlideUp { from{opacity:0;transform:translateY(30px)} to{opacity:1;transform:translateY(0)} }
    .disc-close { position:absolute; top:0.9rem; right:1.1rem; font-size:1.5rem; color:rgba(255,255,255,0.7); cursor:pointer; background:none; border:none; line-height:1; transition:color 0.2s; }
    .disc-close:hover { color:#fff; }
    .disc-modal h3 { margin:0 0 0.3rem; color:#fff; font-size:1.25rem; font-weight:bold; }
    .disc-modal p { color:rgba(255,255,255,0.68); font-size:0.88rem; margin:0 0 1.5rem; }
    .disc-contact-btn { display:flex; align-items:center; justify-content:center; gap:0.7rem; width:100%; padding:1rem 1.5rem; border:none; border-radius:8px; font-size:1rem; font-weight:bold; color:#fff; cursor:pointer; margin-bottom:1rem; font-family:inherit; text-decoration:none; box-sizing:border-box; transition:transform 0.3s,box-shadow 0.3s; }
    .disc-contact-btn:hover { transform:translateY(-2px); box-shadow:0 4px 12px rgba(0,0,0,0.35); }
    .disc-contact-btn.disc-mail { background: linear-gradient(135deg, #08124a 0%, #1a3580 100%); }
    .disc-contact-btn.disc-wa { background: linear-gradient(135deg, #1a4db0 0%, #2a59c7 100%); }
    .disc-contact-btn img { width:24px; height:24px; object-fit:contain; border-radius:3px; display:block; flex-shrink:0; }
</style>

<div class="spec-detail-hero">
    <div class="spec-hero-container">
        <div class="spec-hero-text">
            <div class="breadcrumb-nav">
                <a href="index.php">Home</a> <span>&gt;</span> <a href="specialization.php">Specialization</a> <span>&gt;</span> Commercial &amp; Industrial
            </div>
            <span class="badge">Industrial Excellence</span>
            <h1>Commercial &amp; Industrial Construction</h1>
            <p>Designing and erecting high-durability manufacturing facilities, heavy industrial structures, logistics warehouses, and commercial corporate parks.</p>
        </div>
        <div class="hero-form-container">
            <h3>Industrial Construction Inquiry</h3>
            <form class="hero-form">
                <input type="text" placeholder="Your Name" required>
                <input type="text" placeholder="Phone Number" required>
                <input type="email" placeholder="Email Address (Optional)">
                <textarea placeholder="Facility Dimensions & Specifications" rows="2"></textarea>
                <button type="submit">Submit Inquiry</button>
            </form>
        </div>
    </div>
</div>

<div class="spec-body-container">
    <div class="spec-layout">
        <!-- Main Content Area -->
        <div class="main-spec-content">
            
            <div class="spec-content-section">
                <h2>Modern Commercial &amp; Industrial Infrastructure</h2>
                <p>Azores Infrastructure Private Limited (AIPL) delivers high-grade commercial and industrial construction solutions engineered to withstand demanding operational conditions, heavy mechanical loads, and rigorous industrial workflows. Commercial real estate and manufacturing complexes demand structural efficiency, rapid deployment, spatial versatility, and strict compliance with national safety and environmental codes.</p>
                <p>Our engineering division leverages state-of-the-art construction methodologies—ranging from heavy pre-engineered steel buildings (PEB) and post-tensioned RCC frames to laser-screed industrial floorings and insulated sandwich panel facades. Whether constructing large-scale logistics distribution hubs, automated manufacturing plants, heavy machinery foundations, or corporate office towers, Azores Infrastructure ensures optimal space utilization and operational longevity.</p>
            </div>

            <div class="spec-content-section">
                <h2>Core Building Solutions &amp; Engineering Disciplines</h2>
                <p>Industrial and commercial facilities require dedicated structural treatments depending on their operational classification. Our team executes specialized civil and structural works tailored to industrial demands.</p>
                
                <div class="spec-feature-grid">
                    <div class="spec-feature-box">
                        <i class="fa-solid fa-warehouse"></i>
                        <h4>Pre-Engineered Buildings (PEB)</h4>
                        <p>High-span structural steel framing systems with clear spans up to 60 meters, offering rapid erection, low dead-weight, and thermal efficiency.</p>
                    </div>

                    <div class="spec-feature-box">
                        <i class="fa-solid fa-industry"></i>
                        <h4>Heavy Industrial Plants</h4>
                        <p>Vibration-isolated heavy equipment foundations, gantry crane beam supports, reinforced machine pits, and chemical-resistant flooring solutions.</p>
                    </div>

                    <div class="spec-feature-box">
                        <i class="fa-solid fa-city"></i>
                        <h4>Commercial Office Parks</h4>
                        <p>Multi-story RCC frame construction with curtain wall glass facades, energy-efficient HVAC ducting, and modern multi-tier underground parking basements.</p>
                    </div>

                    <div class="spec-feature-box">
                        <i class="fa-solid fa-box-open"></i>
                        <h4>Logistics &amp; Warehousing Hubs</h4>
                        <p>High-bay logistics centers featuring jointless super-flat concrete floors (FM2 standard), automated dock levelers, and fire suppression systems.</p>
                    </div>
                </div>

                <p>Every industrial project incorporates specialized structural calculations for wind loads, seismic forces, crane dynamic loads, and roof live loads, guaranteeing structural integrity under extreme working conditions.</p>
            </div>

            <div class="spec-content-section">
                <h2>Project Execution Lifecycle for Industrial Facilities</h2>
                <p>We implement a phased project execution schedule designed to meet strict commercial commissioning deadlines.</p>

                <div class="lifecycle-steps">
                    <div class="step-item">
                        <div class="step-num">1</div>
                        <div class="step-text">
                            <h4>Industrial Layout &amp; Foundation Engineering</h4>
                            <p>Soil bearing capacity tests, pile foundation installation for heavy loads, and deep foundation pit excavation with shoring systems.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">2</div>
                        <div class="step-text">
                            <h4>Structural Framing &amp; Superstructure Erection</h4>
                            <p>Erection of structural steel columns, rafters, or RCC columns with high-strength bolt connections and torque-controlled tightening.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">3</div>
                        <div class="step-text">
                            <h4>Specialized Industrial Flooring</h4>
                            <p>Laser-screed pour of SFRC (Steel Fiber Reinforced Concrete) floor slabs with abrasion-resistant hardener toppings and epoxy coatings.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">4</div>
                        <div class="step-text">
                            <h4>MEP &amp; Heavy Utility Integration</h4>
                            <p>Installation of high-voltage electrical transformers, industrial ventilation systems, compressed air piping, and automatic fire sprinkler grids.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">5</div>
                        <div class="step-text">
                            <h4>Safety Audits &amp; Statutory Clearances</h4>
                            <p>Conducting structural stability audits, factory inspectorate sign-offs, fire safety NOC, and commissioning tests prior to production handover.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="spec-content-section">
                <h2>Safety Standards, Durability &amp; Energy Efficiency</h2>
                <p>Industrial construction environments carry significant operational risks. Azores Infrastructure implements zero-harm safety policies in compliance with ISO 45001 standards. Daily toolbox meetings, mandatory personal protective equipment (PPE), heavy crane lift plans, and fall protection systems are strictly enforced at all job sites.</p>
                <p>Additionally, we emphasize sustainable industrial design by incorporating solar-ready roof profiles, rainwater harvesting pits, translucent skylight sheets for day-lighting, and energy-efficient thermal insulation cladding. This holistic approach minimizes operational lifecycle costs for factory owners and commercial tenants.</p>
            </div>

        </div>

        <!-- Sidebar Area -->
        <div class="spec-sidebar">
            <div class="sidebar-widget">
                <h3>All Specializations</h3>
                <ul class="sidebar-list">
                    <li><a href="specialization-highways.php"><i class="fa-solid fa-road"></i> Infrastructure &amp; Highways</a></li>
                    <li><a href="specialization-turnkey.php"><i class="fa-solid fa-key"></i> Turnkey Projects</a></li>
                    <li><a href="specialization-commercial.php" class="active"><i class="fa-solid fa-city"></i> Commercial &amp; Industrial</a></li>
                    <li><a href="specialization-institutional.php"><i class="fa-solid fa-building-columns"></i> Institutional Buildings</a></li>
                    <li><a href="specialization-bridges.php"><i class="fa-solid fa-bridge"></i> Bridges</a></li>
                    <li><a href="specialization-residential.php"><i class="fa-solid fa-house-chimney"></i> Residential Complexes</a></li>
                </ul>
            </div>

            <div class="cta-card">
                <i class="fa-solid fa-industry" style="font-size:2.5rem; margin-bottom:1rem;"></i>
                <h3>Build Your Next Facility</h3>
                <p>Consult with Class 1A industrial contractors for manufacturing plant, warehouse, or commercial office tower projects.</p>
                <a href="#" class="cta-btn" onclick="openDiscModal(event)">Connect With Experts</a>
            </div>
        </div>
    </div>
</div>


<!-- Contact Modal -->
<div class="disc-overlay" id="discOverlay" onclick="discOverlayClick(event)">
    <div class="disc-modal">
        <button class="disc-close" onclick="closeDiscModal()">&times;</button>
        <h3>Get In Touch</h3>
        <p>Choose how you'd like to connect with our team.</p>
        <a href="mailto:Azores.ranchi@gmail.com" class="disc-contact-btn disc-mail">
            <img src="img/icon-gmail.png" alt="Gmail"> <span>Mail via Gmail</span>
        </a>
        <a href="https://wa.me/919031140000" target="_blank" class="disc-contact-btn disc-wa">
            <img src="img/icon-whatsapp.png" alt="WhatsApp"> <span>WhatsApp</span>
        </a>
    </div>
</div>
<script>
function openDiscModal(e) { e.preventDefault(); document.getElementById('discOverlay').classList.add('open'); document.body.style.overflow='hidden'; }
function closeDiscModal() { document.getElementById('discOverlay').classList.remove('open'); document.body.style.overflow=''; }
function discOverlayClick(e) { if(e.target===document.getElementById('discOverlay')) closeDiscModal(); }
document.addEventListener('keydown',function(e){ if(e.key==='Escape') closeDiscModal(); });
</script>

<?php
require_once 'footer.php';
?>
