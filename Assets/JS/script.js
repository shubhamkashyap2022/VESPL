// Mobile nav toggle
const navToggle = document.querySelector('.nav-toggle');
const nav = document.getElementById('primaryNav');
if (navToggle) {
  navToggle.addEventListener('click', () => {
    nav.classList.toggle('open');
    navToggle.classList.toggle('open');
  });
}

// Smooth scroll for menu links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
      // close menu on mobile after click
      nav.classList.remove('open');
      navToggle.classList.remove('open');
    }
  });
});

// Auto year update in footer
const footerYear = document.querySelector('.site-footer p');
if (footerYear) {
  footerYear.innerHTML = `©${new Date().getFullYear()} <strong>VITASTA ENVIRO SERVICES PVT. LTD.</strong> All Rights Reserved`;
}

// Scroll to top button
const scrollBtn = document.createElement("button");
scrollBtn.innerText = "↑";
scrollBtn.setAttribute("id", "scrollTopBtn");
scrollBtn.style.cssText = `
  position: fixed; bottom: 20px; right: 20px;
  display: none; padding: 10px 14px;
  border: none; border-radius: 50%;
  background: #2c3e50; color: white; font-size: 18px;
  cursor: pointer; z-index: 999;
`;
document.body.appendChild(scrollBtn);

window.addEventListener("scroll", () => {
  scrollBtn.style.display = window.scrollY > 300 ? "block" : "none";
});
scrollBtn.addEventListener("click", () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
});
