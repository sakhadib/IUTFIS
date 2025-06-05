{{-- resources/views/partials/footer.blade.php --}}
<footer class="footer-dark">
  <div class="overlay"></div>
  <div class="container py-5">
    <div class="row g-4">
      
      {{-- About Section --}}
      <div class="col-md-4">
        <img src="/rsx/logo.svg" alt="IUT Al-Fazari Interstellar Society" class="footer-logo mb-3">
        <p class="text-light mb-1">#LookUpToWonder</p>
        <p class="text-secondary small">
          The IUT Al-Fazari Interstellar Society propels students into the cosmos with inspiring events, workshops, and a vibrant community. Reach for the stars—literally.
        </p>
      </div>
      
      {{-- Quick Links --}}
      <div class="col-md-3">
        <h5 class="text-light mb-3">Quick Links</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="/workshops" class="text-secondary link-hover">Workshops</a></li>
          <li class="mb-2"><a href="/events" class="text-secondary link-hover">Events</a></li>
          <li class="mb-2"><a href="/about" class="text-secondary link-hover">About Us</a></li>
          <li><a href="/contact" class="text-secondary link-hover">Contact</a></li>
        </ul>
      </div>
      
      {{-- Contact Info --}}
      <div class="col-md-3">
        <h5 class="text-light mb-3">Contact</h5>
        <p class="text-secondary mb-2">
          <i class="fas fa-envelope me-2"></i>
          <a href="mailto:iutfis2061@gmail.com" class="text-secondary link-hover">iutfis2061@gmail.com</a>
        </p>
        <p class="text-secondary">
          <i class="fas fa-map-marker-alt me-2"></i>
          Dhaka, Bangladesh
        </p>
      </div>
      
      {{-- Social & Live Clock --}}
      <div class="col-md-2 text-center">
        <h5 class="text-light mb-3">Connect</h5>
        <div class="social-icons mb-4">
          <a href="https://www.facebook.com/IUTFIS/" target="_blank" class="text-light me-3">
            <i class="fab fa-facebook-f fs-4"></i>
          </a>
          <a href="mailto:iutfis2061@gmail.com" class="text-light me-3">
            <i class="fas fa-envelope fs-4"></i>
          </a>
          <a href="https://www.instagram.com/iut_interstellar_society/" target="_blank" class="text-light me-3">
            <i class="fab fa-instagram fs-4"></i>
          </a>
          <a href="https://www.youtube.com/@iutfis" target="_blank" class="text-light me-3">
            <i class="fab fa-youtube fs-4"></i>
          </a>
          <a href="https://www.linkedin.com/company/iut-al-fazari-interstellar-society" target="_blank" class="text-light">
            <i class="fab fa-linkedin fs-4"></i>
          </a>
        </div>
        <div class="live-clock text-light fs-5" id="footerClock">
          <!-- JS will inject local time -->
        </div>
      </div>
      
    </div>
    
    <hr class="border-secondary my-4">
    
    <div class="row">
      <div class="col text-center">
        <p class="text-secondary small mb-1">
          &copy; <span id="currentYear"></span> IUT Al-Fazari Interstellar Society. All rights reserved.
        </p>
        <p class="text-secondary small">
          Designed &amp; Crafted by <a href="https://portfolio.sakhawatadib.com" class="text-secondary link-hover">Adib Sakhawat</a>
        </p>
      </div>
    </div>
    
  </div>
</footer>

<style>
  /* ==================== Dark‐Mode Footer ==================== */
  
  .footer-dark {
    position: relative;
    background: #0d0d2b url('/images/space-bg-footer.jpg') center/cover no-repeat;
    color: var(--bs-light);
  }
  .footer-dark .overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.75);
  }
  .footer-dark .container {
    position: relative;
    z-index: 1;
  }
  .footer-dark .footer-logo {
    max-width: 180px;
  }
  .footer-dark h5 {
    color: var(--bs-light);
    font-weight: 600;
  }
  .footer-dark p {
    margin: 0;
  }
  .footer-dark .text-secondary {
    color: #a0a0a0 !important;
  }
  .footer-dark .link-hover:hover {
    color: var(--bs-white) !important;
  }
  .footer-dark .social-icons a {
    transition: transform 0.2s ease;
  }
  .footer-dark .social-icons a:hover {
    transform: translateY(-2px);
    color: var(--bs-white) !important;
  }
  .footer-dark .live-clock {
    font-family: 'Courier New', Courier, monospace;
  }
  .footer-dark hr.border-secondary {
    border-color: #2a2a3d !important;
  }
  
  /* Responsive tweaks */
  @media (max-width: 576px) {
    .footer-dark .social-icons {
      margin-bottom: 1rem;
    }
    .footer-dark .live-clock {
      font-size: 1rem;
    }
  }
</style>

{{-- ========== Footer Scripts ========== --}}
<script>
  // 1) Display current year:
  document.getElementById('currentYear').innerText = new Date().getFullYear();

  // 2) Simple live‐updating local time clock:
  function updateFooterClock() {
    const now = new Date();
    let h = now.getHours(), m = now.getMinutes(), s = now.getSeconds();
    const ampm = h >= 12 ? 'PM' : 'AM';
    h = h % 12 || 12;
    m = m < 10 ? '0'+m : m;
    s = s < 10 ? '0'+s : s;
    const timeString = `${h}:${m}:${s} ${ampm}`;
    document.getElementById('footerClock').innerText = timeString;
  }
  setInterval(updateFooterClock, 1000);
  updateFooterClock();
</script>



<style>
  :root {
  --bg-dark: #0a0a1f;
  --surface: #1f1f36;
  --text-light: #e0e0e0;
  --text-secondary: #a1a1b3;
  --text-accent: #a07bff;
  --border-subtle: #2c2c45;
  --card-radius: 1.25rem;
  --transition-speed: 0.2s;
  --glass-bg: rgba(31,31,54,0.85);
  --glass-blur: 12px;
}


</style>


<script>
    new DataTable('#stable');
</script>


<script>
    document.addEventListener('scroll', () => {
        const navbar = document.getElementById('boss_navbar');
        if (window.scrollY === 0) {
            navbar.className = 'navbar navbar-dark navbar-expand-lg bgd fixed-top bs';
        } else {
            navbar.className = 'navbar navbar-dark navbar-expand-lg bg-dark fixed-top bs';
        }
    });
</script>


<script>
    // Function to update MathJax rendering and display line breaks
    function updateMathPreview() {
        // Get references to the textarea and the preview element
        const typedMath = document.getElementById('content');
        const mathPreview = document.getElementById('the_content');

        // Replace newline characters with HTML line break elements
        const contentWithLineBreaks = typedMath.value.replace(/\n/g, '<br>');

        // Update the content of the preview element with the content of the textarea
        mathPreview.innerHTML = contentWithLineBreaks;

        // Update MathJax rendering
        MathJax.texReset();
        MathJax.typesetClear();
        MathJax.typesetPromise([mathPreview]);
    }

    // Call the function when the document is fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        updateMathPreview();
    });

    // Add event listener to the textarea for input event
    document.getElementById('content').addEventListener('input', updateMathPreview);
</script>



<style>
  
    .table-holder{
        background-color: white;
        padding: 35px;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
    }

    .ad-main-bg{
        background-color: rgba(0, 14, 24, .7);
        backdrop-filter: blur(4px);
        border-bottom: 15px solid rgba(255, 255, 255, 0.109);
    }

    .the-ad-section{
        min-height: 80vh;
    }

    .form-holder{
        background-color: white;
        padding: 35px;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
    }

    .custom_form_title{
        font-size: 40px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
    }

    .custom_form_title:focus{
        border: 0;
        box-shadow: 0 0 30px rgba(81, 191, 255, 0.5);
    }

    .custom_form_content{
        font-size: 20px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
    }

    .custom_form_content:focus{
        border: 0;
        box-shadow: 0 0 30px rgba(81, 191, 255, 0.5);
    }

    .custom_form_normal{
        font-size: 20px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .custom_form_normal:focus{
        border: 0;
        box-shadow: 0 0 30px rgba(81, 191, 255, 0.5);
    }

    .custom_form_btn{
        font-size: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
        width: 100%;
    }
</style>