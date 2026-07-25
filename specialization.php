<?php
$pageTitle = "Our Specialization";
$metaDescription = "Discover the construction types and technical expertise of Azores Infrastructure Private Limited (AIPL), specializing in highways, turnkey solutions, bridges, and commercial structures.";
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
    
    #specializationHero {
        background-image: url('img/pexels-kelly-2532029.jpg');
    }
    #specializationHero::before {
        background: rgba(0,0,0,0.5) !important;
    }
</style>

<div class="hero-slider" id="specializationHero" style="margin-bottom: 0;">
    <div class="hero-container">
        <div class="hero-content-left">
            <h1>Our Specialization</h1>
            <p>Excellence in Construction & Infrastructure</p>
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
    <h2 class="section-title">Construction Types & Expertise</h2>
    <div class="services-grid">
        <div class="service-card">
            <a href="specialization-highways.php"><img src="img/National%20%26%20State%20Highways.jpg" alt="Highways" class="service-card-img"></a>
            <h3>Infrastructure & Highways</h3>
            <p>We undertake highway infrastructure projects covering the construction and development of road networks for national and state connectivity.</p>
            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:0.5rem; margin-top:1rem;">
                <a href="specialization-highways.php" class="contact-link" style="color:#02016A; font-weight:700;">Explore Details &rarr;</a>
                <a href="mailto:Azores.ranchi@gmail.com" class="contact-link">Contact Us &rarr;</a>
            </div>
        </div>
        
        <div class="service-card">
            <a href="specialization-turnkey.php"><img src="img/Turnkey%20Projects.jpg" alt="Turnkey Projects" class="service-card-img"></a>
            <h3>Turnkey Projects</h3>
            <p>Complete project responsibility is managed by our team, covering every phase from initial design through execution and final handover under EPC contracts.</p>
            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:0.5rem; margin-top:1rem;">
                <a href="specialization-turnkey.php" class="contact-link" style="color:#02016A; font-weight:700;">Explore Details &rarr;</a>
                <a href="mailto:Azores.ranchi@gmail.com" class="contact-link">Contact Us &rarr;</a>
            </div>
        </div>
        
        <div class="service-card">
            <a href="specialization-commercial.php"><img src="img/Industrial%20Buildings.jpg" alt="Industrial Buildings" class="service-card-img"></a>
            <h3>Commercial & Industrial</h3>
            <p>Our construction services include commercial properties, warehouse facilities, and industrial buildings developed for modern business and production needs.</p>
            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:0.5rem; margin-top:1rem;">
                <a href="specialization-commercial.php" class="contact-link" style="color:#02016A; font-weight:700;">Explore Details &rarr;</a>
                <a href="mailto:Azores.ranchi@gmail.com" class="contact-link">Contact Us &rarr;</a>
            </div>
        </div>
 
        <div class="service-card">
            <a href="specialization-institutional.php"><img src="img/Institutional%20Buildings.jpg" alt="Institutional Buildings" class="service-card-img"></a>
            <h3>Institutional Buildings</h3>
            <p>We deliver construction solutions for schools, hospitals, and administrative buildings, ensuring every project aligns with required standards and guidelines.</p>
            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:0.5rem; margin-top:1rem;">
                <a href="specialization-institutional.php" class="contact-link" style="color:#02016A; font-weight:700;">Explore Details &rarr;</a>
                <a href="mailto:Azores.ranchi@gmail.com" class="contact-link">Contact Us &rarr;</a>
            </div>
        </div>
        
        <div class="service-card">
            <a href="specialization-bridges.php"><img src="img/Bridges.jpg" alt="Bridges" class="service-card-img"></a>
            <h3>Bridges</h3>
            <p>Our experience includes the construction of bridge structures that support local and regional transportation, including both low-level and high-level bridges.</p>
            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:0.5rem; margin-top:1rem;">
                <a href="specialization-bridges.php" class="contact-link" style="color:#02016A; font-weight:700;">Explore Details &rarr;</a>
                <a href="mailto:Azores.ranchi@gmail.com" class="contact-link">Contact Us &rarr;</a>
            </div>
        </div>
        
        <div class="service-card">
            <a href="specialization-residential.php"><img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=600&h=360&fit=crop" alt="Residential" class="service-card-img"></a>
            <h3>Residential Complexes</h3>
            <p>Residential construction services include apartment buildings and housing developments designed to provide durable and well-planned living spaces.</p>
            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:0.5rem; margin-top:1rem;">
                <a href="specialization-residential.php" class="contact-link" style="color:#02016A; font-weight:700;">Explore Details &rarr;</a>
                <a href="mailto:Azores.ranchi@gmail.com" class="contact-link">Contact Us &rarr;</a>
            </div>
        </div>
    </div>
</div>

<?php
// Include the site footer
require_once 'footer.php';
?>
