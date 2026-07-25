<?php
$pageTitle = "About Us";
$metaDescription = "Learn more about Azores Infrastructure Private Limited (AIPL), our history, core values, leadership, and why we are a trusted Class 1A contracting partner.";
// Include the site header
require_once 'header.php';
?>

<style>

    
    .section-title {
        color: #2a59c7;
        border-bottom: 2px solid #0d1a56;
        padding-bottom: 0.5rem;
        margin-bottom: 1.5rem;
    }
    
    .content-box {
        background: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        margin-bottom: 3rem;
        border: 1px solid #e2e8f0;
    }
    
    .content-box p {
        line-height: 1.6;
        color: #555;
        margin-bottom: 1rem;
    }
    
    .leadership-profile {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        align-items: flex-start;
    }
    
    .profile-info {
        flex: 1;
        min-width: 300px;
    }
    
    .profile-info h3 {
        color: #2a59c7;
        margin-top: 0;
        font-size: 1.8rem;
    }
    
    .profile-info h4 {
        color: #777;
        font-weight: 500;
        margin-bottom: 1rem;
        font-size: 1.2rem;
    }
    
    .profile-info ul {
        line-height: 1.8;
        color: #555;
    }
    
    .profile-image-wrapper {
        position: relative;
        flex: 0 0 350px;
        height: 450px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    
    .profile-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .profile-overlay {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        background: rgba(13, 26, 86, 0.75);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        padding: 1.5rem;
        color: #fff;
    }
    
    .profile-overlay h4 {
        margin: 0;
        color: #ffffff;
        font-size: 1.3rem;
        text-shadow: 0 1px 3px rgba(0,0,0,0.3);
    }
    
    .profile-overlay p {
        margin: 5px 0 0;
        font-size: 1rem;
        color: rgba(255,255,255,0.9);
        text-shadow: 0 1px 2px rgba(0,0,0,0.3);
        font-weight: 500;
    }
    
    .why-choose-list {
        list-style: none;
        padding: 0;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }
    
    .why-choose-list li {
        background: #f8fcfb;
        padding: 1.5rem;
        border-radius: 8px;
        border-left: 4px solid #0d1a56;
        font-weight: 500;
        color: #333;
    }

    @media (max-width: 768px) {
        .content-box { padding: 1.5rem 1rem; }
        .section-title { font-size: 1.5rem; }
        .profile-info h3 { font-size: 1.4rem; }
        .profile-image-wrapper { flex: 1 1 100%; height: 350px; }
    }
    
    #aboutHero {
        background-image: url('img/pexels-introspectivedsgn-4692089.jpg');
    }
    #aboutHero::before {
        background: rgba(0,0,0,0.5) !important;
    }
</style>

<div class="hero-slider" id="aboutHero" style="margin-bottom: 0;">
    <div class="hero-container">
        <div class="hero-content-left">
            <h1>About AIPL</h1>
            <p>Leading The Future of Infrastructure</p>
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
<div class="content-box">
    <h2 class="section-title">About the Company</h2>
    <p><strong>Azores Infrastructure Private Limited (AIPL)</strong> is a leading infrastructure, construction company with extensive experience in executing government, industrial, institutional, and residential projects across India.</p>
    <p>AIPL is a <strong>Class 1A Contractor</strong> registered with various State Government Departments, Central Government Agencies, Public Sector Undertakings (PSUs), Private Organizations, and State Universities.</p>
    <p>With a strong foundation in engineering excellence, project management, and quality execution, AIPL has successfully delivered numerous infrastructure projects while partnering with developers to construct state-of-the-art commercial and residential spaces.</p>
</div>

<div class="content-box">
    <h2 class="section-title">Leadership</h2>
    <div class="leadership-profile">
        <div class="profile-info">
            <h3>Mr. Ranvijay Pradhan</h3>
            <h4>Founder &amp; Managing Director</h4>
            <ul>
                <li>B.Tech in Mechanical Engineering</li>
                <li>29+ years of experience in the construction industry</li>
                <li>Served as Director in a family-owned construction business for 13 years</li>
                <li>Founder and Managing Director of AIPL for the last 16 years</li>
                <li>Former State Chairman, Builders Association of India (BAI), Jharkhand</li>
                <li>Currently serving as State Vice President, JCDA</li>
                <li>Successfully executed 120+ government infrastructure projects</li>
            </ul>
            <p style="margin-top: 1rem;">His extensive expertise in infrastructure development, project execution, and business leadership has established AIPL as a trusted name in the industry.</p>
        </div>
        <div class="profile-image-wrapper">
            <img src="img/Mr.%20Ranvijay%20Pradhan.png" alt="Mr. Ranvijay Pradhan">
            <div class="profile-overlay">
                <h4>Mr. Ranvijay Pradhan</h4>
                <p>Founder &amp; Managing Director</p>
            </div>
        </div>
    </div>
</div>

<div class="content-box">
    <h2 class="section-title">Why Choose AIPL?</h2>
    <ul class="why-choose-list">
        <li>&#10003; 29+ Years of Industry Experience</li>
        <li>&#10003; 120+ Successfully Completed Government Projects</li>
        <li>&#10003; Class 1A Contractor Certification</li>
        <li>&#10003; Expertise in Infrastructure &amp; Commercial Construction</li>
        <li>&#10003; Strong Government &amp; Institutional Project Portfolio</li>
        <li>&#10003; End-to-End Project Execution Capability</li>
        <li>&#10003; Trusted Construction Partner for India's Leading Developers</li>
        <li>&#10003; Trusted Name in Construction, Infrastructure &amp; Turnkey Solutions</li>
    </ul>
</div>

</div>

<?php
// Include the site footer
require_once 'footer.php';
?>
