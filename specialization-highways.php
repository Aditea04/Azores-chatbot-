<?php
$pageTitle = "Infrastructure & Highways Construction | Specialization";
$metaDescription = "Azores Infrastructure Private Limited specializes in national & state highway construction, flexible and rigid pavements, earthworks, and modern road networks.";
require_once 'header.php';
?>

<style>
    .spec-detail-hero {
        background: url('img/National%20%26%20State%20Highways.jpg') center/cover no-repeat;
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
</style>

<div class="spec-detail-hero">
    <div class="spec-hero-container">
        <div class="spec-hero-text">
            <div class="breadcrumb-nav">
                <a href="index.php">Home</a> <span>&gt;</span> <a href="specialization.php">Specialization</a> <span>&gt;</span> Infrastructure &amp; Highways
            </div>
            <span class="badge">Class 1A Infrastructure</span>
            <h1>Infrastructure &amp; Highways Construction</h1>
            <p>Building high-capacity, resilient arterial road networks, national highways, and state transportation corridors engineered for longevity and seamless mobility.</p>
        </div>
        <div class="hero-form-container">
            <h3>Consult Highway Engineers</h3>
            <form class="hero-form">
                <input type="text" placeholder="Your Name" required>
                <input type="text" placeholder="Phone Number" required>
                <input type="email" placeholder="Email Address (Optional)">
                <textarea placeholder="Highway Project Requirements" rows="2"></textarea>
                <button type="submit">Submit Request</button>
            </form>
        </div>
    </div>
</div>

<div class="spec-body-container">
    <div class="spec-layout">
        <!-- Main Content Area -->
        <div class="main-spec-content">
            
            <div class="spec-content-section">
                <h2>Strategic Highway Network Development</h2>
                <p>Azores Infrastructure Private Limited (AIPL) stands at the forefront of transportation infrastructure, delivering state-of-the-art highway engineering solutions designed to support national connectivity, economic growth, and regional mobility. Our comprehensive expertise covers every dimension of highway development—from initial topographic and geotechnical investigations to heavy subgrade earthworks, multi-layer pavement construction, specialized asphalt mix application, and integrated drainage network implementation.</p>
                <p>Highways form the economic arteries of any developing region. Recognizing this imperative, our engineering teams adhere strictly to the stringent specifications mandated by the Ministry of Road Transport and Highways (MoRTH) and Indian Roads Congress (IRC) codes. Whether constructing new expressways, widening existing two-lane arterial roads into four/six-lane high-speed corridors, or rehabilitating heavily trafficked state highways, Azores Infrastructure ensures superior pavement structural capacity and smooth rideability.</p>
            </div>

            <div class="spec-content-section">
                <h2>Core Engineering Capabilities &amp; Pavement Types</h2>
                <p>Our highway division brings deep technical mastery across both flexible and rigid pavement methodologies, tailoring engineering parameters to subgrade soil properties, axle load demands, and local hydrological conditions.</p>
                
                <div class="spec-feature-grid">
                    <div class="spec-feature-box">
                        <i class="fa-solid fa-road"></i>
                        <h4>Flexible Pavements</h4>
                        <p>Execution of Bituminous Concrete (BC), Dense Bituminous Macadam (DBM), and Stone Matrix Asphalt (SMA) engineered for high fatigue resistance and superior skid resistance.</p>
                    </div>

                    <div class="spec-feature-box">
                        <i class="fa-solid fa-layer-group"></i>
                        <h4>Rigid Pavements (PQC)</h4>
                        <p>Pavement Quality Concrete (PQC) and Dry Lean Concrete (DLC) construction with automated slipform pavers ensuring high flexural strength and low maintenance lifespans.</p>
                    </div>

                    <div class="spec-feature-box">
                        <i class="fa-solid fa-water"></i>
                        <h4>Integrated Drainage Networks</h4>
                        <p>Designing and constructing longitudinal concrete drains, box culverts, and slope stabilization structures to safeguard pavement layers from water ingress.</p>
                    </div>

                    <div class="spec-feature-box">
                        <i class="fa-solid fa-truck-monster"></i>
                        <h4>Heavy Earthworks &amp; Subgrade</h4>
                        <p>Precision cut-and-fill operations, subgrade soil stabilization using cement and lime treatment, and embankment construction over complex terrain.</p>
                    </div>
                </div>

                <p>By deploying high-capacity automated batching plants, sensor-equipped bituminous pavers, and multi-stage vibratory compactors, we achieve exact density metrics and uniform surface smoothness, reducing rolling resistance and vehicle operating costs for commuters.</p>
            </div>

            <div class="spec-content-section">
                <h2>Structured Project Execution Lifecycle</h2>
                <p>Every highway project undertaken by Azores Infrastructure follows a meticulously planned stage-gate methodology to eliminate delays, optimize resource allocation, and ensure flawless compliance with design benchmarks.</p>

                <div class="lifecycle-steps">
                    <div class="step-item">
                        <div class="step-num">1</div>
                        <div class="step-text">
                            <h4>Geotechnical Survey &amp; Alignment Planning</h4>
                            <p>Total station and drone-assisted terrain mapping, soil California Bearing Ratio (CBR) testing, and traffic volume forecasting to determine optimal structural thickness.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">2</div>
                        <div class="step-text">
                            <h4>Subgrade Preparation &amp; Granular Layers</h4>
                            <p>Excavation, embankment consolidation, and placement of Granular Sub-Base (GSB) and Wet Mix Macadam (WMM) compacted to maximum dry density.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">3</div>
                        <div class="step-text">
                            <h4>Bituminous / Concrete Paving Operations</h4>
                            <p>High-precision laydown using electronic sensor pavers with continuous temperature control, achieving seamless longitudinal and transverse joints.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">4</div>
                        <div class="step-text">
                            <h4>Road Safety Infrastructure &amp; Quality Handover</h4>
                            <p>Installation of crash barriers, retro-reflective signage, thermoplastic lane markings, solar studs, and final core-drilling structural audit before commissioning.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="spec-content-section">
                <h2>Quality Control &amp; Environmental Sustainability</h2>
                <p>Quality assurance is embedded in our operational DNA. Azores Infrastructure maintains accredited field testing laboratories at all major highway construction sites. Our quality engineers continuously monitor aggregate gradation, bitumen penetration index, compaction percentages, and concrete flexural strengths at every stage of construction.</p>
                <p>In line with sustainable engineering practices, we actively integrate warm-mix asphalt technologies, reclaimed asphalt pavement (RAP) recycling, and eco-friendly soil stabilization methods. These initiatives significantly lower carbon emissions during production while preserving vital natural aggregate resources. Furthermore, dedicated green belt plantations along highway shoulders are executed to restore ecological balance and suppress ambient dust.</p>
            </div>

        </div>

        <!-- Sidebar Area -->
        <div class="spec-sidebar">
            <div class="sidebar-widget">
                <h3>All Specializations</h3>
                <ul class="sidebar-list">
                    <li><a href="specialization-highways.php" class="active"><i class="fa-solid fa-road"></i> Infrastructure &amp; Highways</a></li>
                    <li><a href="specialization-turnkey.php"><i class="fa-solid fa-key"></i> Turnkey Projects</a></li>
                    <li><a href="specialization-commercial.php"><i class="fa-solid fa-city"></i> Commercial &amp; Industrial</a></li>
                    <li><a href="specialization-institutional.php"><i class="fa-solid fa-building-columns"></i> Institutional Buildings</a></li>
                    <li><a href="specialization-bridges.php"><i class="fa-solid fa-bridge"></i> Bridges</a></li>
                    <li><a href="specialization-residential.php"><i class="fa-solid fa-house-chimney"></i> Residential Complexes</a></li>
                </ul>
            </div>

            <div class="cta-card">
                <i class="fa-solid fa-headset" style="font-size:2.5rem; margin-bottom:1rem;"></i>
                <h3>Need Highway Engineering Expertise?</h3>
                <p>Partner with Class 1A registered infrastructure contractors for your state or national highway development projects.</p>
                <a href="mailto:Azores.ranchi@gmail.com" class="cta-btn">Get In Touch</a>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>
