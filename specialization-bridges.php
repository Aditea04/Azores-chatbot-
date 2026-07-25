<?php
$pageTitle = "Bridge Engineering & Structural Flyovers | Specialization";
$metaDescription = "Azores Infrastructure Private Limited constructs high-level river bridges, flyovers, prestressed concrete viaducts, and deep pile foundations.";
require_once 'header.php';
?>

<style>
    .spec-detail-hero {
        background: url('img/Bridges.jpg') center/cover no-repeat;
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
                <a href="index.php">Home</a> <span>&gt;</span> <a href="specialization.php">Specialization</a> <span>&gt;</span> Bridges
            </div>
            <span class="badge">Heavy Structural Infrastructure</span>
            <h1>Bridge &amp; Elevated Flyover Construction</h1>
            <p>Engineering robust river crossings, prestressed concrete viaducts, urban grade separators, and high-capacity transportation bridges.</p>
        </div>
        <div class="hero-form-container">
            <h3>Bridge Project Consultation</h3>
            <form class="hero-form">
                <input type="text" placeholder="Your Name" required>
                <input type="text" placeholder="Phone Number" required>
                <input type="email" placeholder="Email Address (Optional)">
                <textarea placeholder="Bridge Span & Location Scope" rows="2"></textarea>
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
                <h2>Precision Bridge Engineering &amp; Hydrological Design</h2>
                <p>Azores Infrastructure Private Limited (AIPL) delivers high-performance bridge construction and elevated viaduct solutions engineered to conquer complex geographical terrain, major river bodies, and congested urban intersections. Bridge structures demand uncompromising structural calculation, flawless deep-foundation engineering, and advanced materials capable of supporting heavy dynamic loads, hydraulic scour forces, and thermal expansion cycles.</p>
                <p>As a Class 1A registered infrastructure firm, Azores Infrastructure has built a stellar track record in executing both sub-structure and super-structure bridge works. Our experienced bridge engineering teams combine advanced hydrological modeling, deep pile/well foundation sinking techniques, post-tensioned prestressed concrete (PSC) girder casting, and automated launcher operations to erect durable bridges that withstand peak flood velocities and extreme seismic activity.</p>
            </div>

            <div class="spec-content-section">
                <h2>Bridge Structural Types &amp; Engineering Solutions</h2>
                <p>Our bridge engineering portfolio spans a diverse spectrum of structural configurations tailored to specific site hydrology, soil conditions, and traffic demands.</p>
                
                <div class="spec-feature-grid">
                    <div class="spec-feature-box">
                        <i class="fa-solid fa-archway"></i>
                        <h4>Prestressed Concrete (PSC) Girders</h4>
                        <p>Fabrication and erection of post-tensioned I-girders and box girders for long-span river crossings and highway overpasses.</p>
                    </div>

                    <div class="spec-feature-box">
                        <i class="fa-solid fa-water"></i>
                        <h4>Submersible &amp; High-Level River Bridges</h4>
                        <p>Constructing high-level bridges elevated above maximum flood levels (HFL) and reinforced low-level causeways for seasonal river crossings.</p>
                    </div>

                    <div class="spec-feature-box">
                        <i class="fa-solid fa-bridge-water"></i>
                        <h4>Urban Flyovers &amp; Grade Separators</h4>
                        <p>Elevated viaduct structures and curved ramp flyovers engineered to alleviate traffic congestion in dense urban corridors.</p>
                    </div>

                    <div class="spec-feature-box">
                        <i class="fa-solid fa-cubes"></i>
                        <h4>Deep Well &amp; Pile Foundations</h4>
                        <p>Sinking RCC caissons/wells in deep riverbeds and drilling large-diameter bored cast-in-situ concrete piles into solid bedrock.</p>
                    </div>
                </div>

                <p>All structural designs adhere strictly to Indian Roads Congress bridge codes (IRC:6 for loads, IRC:78 for foundations, IRC:112 for concrete bridges) and Ministry of Road Transport and Highways (MoRTH) standards.</p>
            </div>

            <div class="spec-content-section">
                <h2>Step-by-Step Bridge Construction Lifecycle</h2>
                <p>Bridge construction involves intricate underwater engineering, heavy lifting operations, and strict quality verification protocols.</p>

                <div class="lifecycle-steps">
                    <div class="step-item">
                        <div class="step-num">1</div>
                        <div class="step-text">
                            <h4>Hydrological &amp; Sub-surface Geotechnical Investigation</h4>
                            <p>Calculating high flood levels (HFL), scour depth predictions, riverbed bathymetry, and deep core drilling to determine rock socketing depths.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">2</div>
                        <div class="step-text">
                            <h4>Deep Foundation Construction</h4>
                            <p>Executing bentonite mud slurry drilling for bored pile foundations or pneumatic sinking of heavy reinforced concrete well caissons.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">3</div>
                        <div class="step-text">
                            <h4>Substructure Pier &amp; Cap Casting</h4>
                            <p>Casting pile caps, solid RCC piers, abutment walls, and heavy pier caps using self-compacting concrete (SCC) and steel formwork.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">4</div>
                        <div class="step-text">
                            <h4>Girder Launching &amp; Deck Slab Placement</h4>
                            <p>Erecting precast PSC girders using heavy hydraulic launching trusses, placing neoprene/POT-PTFE bearings, and pouring monolithic deck slabs.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">5</div>
                        <div class="step-text">
                            <h4>Expansion Joints, Bituminous Wear &amp; Load Testing</h4>
                            <p>Installing strip seal expansion joints, mastic asphalt wearing coats, crash barriers, followed by mandatory static and dynamic load testing.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="spec-content-section">
                <h2>Quality Assurance, Structural Safety &amp; Load Testing</h2>
                <p>Safety and structural integrity are paramount in bridge engineering. Azores Infrastructure conducts non-destructive testing (NDT) including Ultrasonic Pulse Velocity (UPV), pile integrity testing (PIT), and high-strain dynamic load testing on all foundation piles.</p>
                <p>Prior to public commissioning, every completed bridge undergoes rigorous full-scale static load testing. Loaded heavy vehicles are stationed across bridge spans for 24-hour periods while digital dial gauges measure deflection and recovery rates, guaranteeing structural safety under maximum design loadings.</p>
            </div>

        </div>

        <!-- Sidebar Area -->
        <div class="spec-sidebar">
            <div class="sidebar-widget">
                <h3>All Specializations</h3>
                <ul class="sidebar-list">
                    <li><a href="specialization-highways.php"><i class="fa-solid fa-road"></i> Infrastructure &amp; Highways</a></li>
                    <li><a href="specialization-turnkey.php"><i class="fa-solid fa-key"></i> Turnkey Projects</a></li>
                    <li><a href="specialization-commercial.php"><i class="fa-solid fa-city"></i> Commercial &amp; Industrial</a></li>
                    <li><a href="specialization-institutional.php"><i class="fa-solid fa-building-columns"></i> Institutional Buildings</a></li>
                    <li><a href="specialization-bridges.php" class="active"><i class="fa-solid fa-bridge"></i> Bridges</a></li>
                    <li><a href="specialization-residential.php"><i class="fa-solid fa-house-chimney"></i> Residential Complexes</a></li>
                </ul>
            </div>

            <div class="cta-card">
                <i class="fa-solid fa-bridge" style="font-size:2.5rem; margin-bottom:1rem;"></i>
                <h3>Need Bridge Engineering Capabilities?</h3>
                <p>Partner with Class 1A bridge contractors for river crossings, urban flyovers, and elevated viaduct projects.</p>
                <a href="mailto:Azores.ranchi@gmail.com" class="cta-btn">Consult Bridge Engineers</a>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>
