<?php
$pageTitle = "Turnkey EPC Projects & Engineering Solutions | Specialization";
$metaDescription = "Azores Infrastructure Private Limited delivers complete turnkey engineering, procurement, and construction (EPC) projects with single-point accountability.";
require_once 'header.php';
?>

<style>
    .spec-detail-hero {
        background: url('img/Turnkey%20Projects.jpg') center/cover no-repeat;
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
                <a href="index.php">Home</a> <span>&gt;</span> <a href="specialization.php">Specialization</a> <span>&gt;</span> Turnkey Projects
            </div>
            <span class="badge">End-To-End EPC Contracting</span>
            <h1>Turnkey Construction &amp; Engineering Solutions</h1>
            <p>From architectural conceptualization and engineering design to procurement, construction, and final key handover under unified contract management.</p>
        </div>
        <div class="hero-form-container">
            <h3>Request EPC Consultation</h3>
            <form class="hero-form">
                <input type="text" placeholder="Your Name" required>
                <input type="text" placeholder="Phone Number" required>
                <input type="email" placeholder="Email Address (Optional)">
                <textarea placeholder="Turnkey Scope & Budget Overview" rows="2"></textarea>
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
                <h2>Unified Turnkey &amp; EPC Project Management</h2>
                <p>Azores Infrastructure Private Limited (AIPL) specializes in turnkey infrastructure and industrial contracting, delivering complete, ready-to-operate facility solutions under Engineering, Procurement, and Construction (EPC) delivery models. In complex infrastructural undertakings, clients often face the administrative burden of managing disjointed architectural, structural, procurement, and MEP (Mechanical, Electrical, Plumbing) sub-contractors. Azores Infrastructure eliminates these operational bottlenecks by serving as the single-point accountable entity.</p>
                <p>Our turnkey contract approach assumes comprehensive responsibility for project performance, cost predictability, schedule adherence, and quality compliance. From initial site feasibility studies, land grading, and structural modeling to equipment integration, utility installation, and regulatory approvals, our multidisciplinary team handles every phase until the physical key is handed over to the client for immediate operational use.</p>
            </div>

            <div class="spec-content-section">
                <h2>The 5 Pillars of Azores Turnkey Delivery</h2>
                <p>Our turnkey project execution methodology relies on five interconnected pillars designed to mitigate financial risks and compress baseline project schedules.</p>
                
                <div class="spec-feature-grid">
                    <div class="spec-feature-box">
                        <i class="fa-solid fa-compass-drafting"></i>
                        <h4>1. Detailed Engineering Design</h4>
                        <p>In-house structural, civil, and architectural engineering teams utilize Building Information Modeling (BIM) to generate zero-clash 3D designs.</p>
                    </div>

                    <div class="spec-feature-box">
                        <i class="fa-solid fa-truck-ramp-box"></i>
                        <h4>2. Strategic Global Procurement</h4>
                        <p>Direct sourcing of high-grade steel, cement, specialized machinery, and MEP equipment to secure cost efficiencies and guaranteed supply timelines.</p>
                    </div>

                    <div class="spec-feature-box">
                        <i class="fa-solid fa-hard-hat"></i>
                        <h4>3. On-Site Construction Mastery</h4>
                        <p>Deploying dedicated project managers, Class 1A site engineers, and skilled trade labor to execute civil, structural, and architectural works.</p>
                    </div>

                    <div class="spec-feature-box">
                        <i class="fa-solid fa-clipboard-check"></i>
                        <h4>4. Rigorous Quality &amp; Safety</h4>
                        <p>Adherence to ISO 9001 and ISO 45001 standards with daily quality audits, non-destructive testing, and stringent site safety enforcement.</p>
                    </div>
                </div>

                <p>By streamlining communication under one single contract framework, Azores Infrastructure drastically reduces change orders, design misalignments, and timeline slippages that frequently affect traditional design-bid-build delivery contracts.</p>
            </div>

            <div class="spec-content-section">
                <h2>Step-by-Step Turnkey Execution Process</h2>
                <p>Our structured engineering methodology ensures complete transparency and real-time project tracking across all operational phases.</p>

                <div class="lifecycle-steps">
                    <div class="step-item">
                        <div class="step-num">1</div>
                        <div class="step-text">
                            <h4>Feasibility Study &amp; Conceptual Design</h4>
                            <p>Detailed soil testing, topographical surveys, environmental impact assessments, and preliminary budget modeling to define project parameters.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">2</div>
                        <div class="step-text">
                            <h4>Detailed Engineering &amp; Approval Clearances</h4>
                            <p>Development of structural calculations, MEP schematics, 3D BIM coordination, and securing statutory municipal and environmental permissions.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">3</div>
                        <div class="step-text">
                            <h4>Civil Construction &amp; Structural Assembly</h4>
                            <p>Execution of foundation works, superstructures, pre-engineered steel buildings (PEB), reinforced concrete frameworks, and envelope construction.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">4</div>
                        <div class="step-text">
                            <h4>Services Integration &amp; Testing</h4>
                            <p>Installation of electrical substations, HVAC systems, fire fighting networks, water treatment systems, followed by rigorous pre-commissioning tests.</p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-num">5</div>
                        <div class="step-text">
                            <h4>Final Handover &amp; Operational Onboarding</h4>
                            <p>Delivery of as-built drawings, operations and maintenance (O&amp;M) manuals, client staff training, and handover of fully functional premises.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="spec-content-section">
                <h2>Advanced Controls &amp; Financial Risk Mitigation</h2>
                <p>Managing large-scale turnkey infrastructure projects requires cutting-edge project control software. Azores Infrastructure employs Primavera P6 and advanced Enterprise Resource Planning (ERP) systems to monitor project milestones, cash flow projections, and material inventory levels in real time.</p>
                <p>Under our EPC contracts, clients enjoy price certainty through lump-sum or guaranteed maximum price (GMP) agreements. Azores absorbs risk related to supply chain fluctuations and trade coordination, giving project stakeholders complete peace of mind from project inception through final occupancy.</p>
            </div>

        </div>

        <!-- Sidebar Area -->
        <div class="spec-sidebar">
            <div class="sidebar-widget">
                <h3>All Specializations</h3>
                <ul class="sidebar-list">
                    <li><a href="specialization-highways.php"><i class="fa-solid fa-road"></i> Infrastructure &amp; Highways</a></li>
                    <li><a href="specialization-turnkey.php" class="active"><i class="fa-solid fa-key"></i> Turnkey Projects</a></li>
                    <li><a href="specialization-commercial.php"><i class="fa-solid fa-city"></i> Commercial &amp; Industrial</a></li>
                    <li><a href="specialization-institutional.php"><i class="fa-solid fa-building-columns"></i> Institutional Buildings</a></li>
                    <li><a href="specialization-bridges.php"><i class="fa-solid fa-bridge"></i> Bridges</a></li>
                    <li><a href="specialization-residential.php"><i class="fa-solid fa-house-chimney"></i> Residential Complexes</a></li>
                </ul>
            </div>

            <div class="cta-card">
                <i class="fa-solid fa-key" style="font-size:2.5rem; margin-bottom:1rem;"></i>
                <h3>Planning a Turnkey Development?</h3>
                <p>Partner with Azores Infrastructure for unified EPC contracting, guaranteed delivery timelines, and budget precision.</p>
                <a href="mailto:Azores.ranchi@gmail.com" class="cta-btn">Initiate EPC Discussion</a>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>
