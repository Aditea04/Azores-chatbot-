<?php
$pageTitle = "Partner With Us";
$metaDescription = "Collaborate with Azores Infrastructure Private Limited (AIPL). We partner with landowners, real estate developers, architects, and engineering consultants to deliver high-value construction projects.";
// Include the site header
require_once 'header.php';
?>

<style>

    
    .intro-text {
        text-align: center;
        max-width: 800px;
        margin: 0 auto 3rem auto;
        font-size: 1.1rem;
        color: #555;
        line-height: 1.6;
    }
    
    .partners-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }
    
    .partner-card {
        background: #fff;
        padding: 2.5rem 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        text-align: center;
        border-bottom: 4px solid #2a59c7;
        transition: transform 0.2s;
    }
    
    .partner-card:hover {
        transform: translateY(-5px);
    }
    
    .partner-card-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }
    
    .partner-card h3 {
        color: #2a59c7;
        margin-bottom: 1rem;
        font-size: 1.4rem;
    }
    
    .partner-card p {
        color: #666;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }
    
    .partner-card ul {
        text-align: left;
        padding-left: 1.5rem;
        color: #555;
        line-height: 1.6;
    }
    
    .contact-cta {
        background-color: #f8fcfb;
        border: 1px solid #e2e8f0;
        padding: 3rem 2rem;
        text-align: center;
        border-radius: 8px;
    }
    
    .contact-cta h2 {
        color: #2a59c7;
        margin-top: 0;
    }
    
    .btn {
        display: inline-block;
        padding: 1rem 2rem;
        background: linear-gradient(270deg, #02016A, #0434dc, #02016A);
        background-size: 300% 300%;
        animation: gradientRotate 15s ease infinite;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        border-radius: 8px;
        transition: transform 0.3s, box-shadow 0.3s;
        font-size: 1.1rem;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(4, 52, 220, 0.4);
    }

    @keyframes gradientRotate {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @media (max-width: 768px) {
        .contact-cta { padding: 2rem 1rem; }
        .partner-card { padding: 1.5rem 1rem; }
        .intro-text { font-size: 1rem; }
    }
    
    #partnersHero::before {
        background: rgba(0,0,0,0.5) !important;
    }
</style>

<div class="hero-slider" id="partnersHero" style="margin-bottom: 0;">
    <div class="hero-container">
        <div class="hero-content-left">
            <h1>Partner With Us</h1>
            <p>Partner for Exceptional Project Execution</p>
        </div>
        <div class="hero-form-container" id="callbackForm">
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
<p class="intro-text">At Azores Infrastructure Private Limited (AIPL), we believe in forging strong partnerships to drive growth and create value. We are actively looking to collaborate with:</p>

<div class="partners-grid">
    <div class="partner-card">
        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=600&h=360&fit=crop" alt="Landowners" class="partner-card-img">
        <h3>Landowners</h3>
        <p>We collaborate with landowners to construct and deliver high-value turnkey projects.</p>
        <ul>
            <li>Turnkey Execution Agreements</li>
            <li>Land Conversion</li>
            <li>Redevelopment Construction</li>
        </ul>
    </div>
    
    <div class="partner-card">
        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=600&h=360&fit=crop" alt="Turnkey Construction" class="partner-card-img">
        <h3>Turnkey Construction</h3>
        <p>Clients seeking end-to-end reliable project execution services.</p>
        <ul>
            <li>Concept &amp; Design</li>
            <li>Planning &amp; Approvals</li>
            <li>Construction &amp; Final Delivery</li>
        </ul>
    </div>
    
    <div class="partner-card">
        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=600&h=360&fit=crop" alt="Real Estate Developers" class="partner-card-img">
        <h3>Real Estate Developers</h3>
        <p>Developers looking for a reliable, high-capacity construction partner.</p>
        <ul>
            <li>Timely Project Delivery</li>
            <li>Uncompromising Quality Control</li>
            <li>Luxury Residential Construction</li>
            <li>Commercial Hub Execution</li>
        </ul>
    </div>
    
    <div class="partner-card">
        <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=600&h=360&fit=crop" alt="Architects & Consultants" class="partner-card-img">
        <h3>Architects &amp; Consultants</h3>
        <p>Professionals interested in long-term collaboration opportunities.</p>
        <ul>
            <li>Architects &amp; Designers</li>
            <li>Engineering Consultants</li>
            <li>Project Management Professionals</li>
        </ul>
    </div>
</div>

<div class="contact-cta">
    <h2>Ready to build the future together?</h2>
    <p>Get in touch with us to discuss potential synergies and upcoming construction projects.</p>
    <a href="#callbackForm" class="btn">Contact Us Today</a>
</div>

</div>

<?php
// Include the site footer
require_once 'footer.php';
?>
