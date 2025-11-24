document.addEventListener("DOMContentLoaded", () => {
  // Ambil elemen yang dibutuhkan
  const hamburger = document.querySelector(".hamburger");
  const navLinks = document.querySelector(".nav-links");
  const links = document.querySelectorAll(".nav-links a");

  // Fungsi Toggle Menu saat Hamburger diklik
  hamburger.addEventListener("click", () => {
    navLinks.classList.toggle("active");

    // Ubah ikon hamburger menjadi X (opsional, menggunakan class fontawesome)
    const icon = hamburger.querySelector("i");
    if (navLinks.classList.contains("active")) {
      icon.classList.remove("fa-bars");
      icon.classList.add("fa-times");
    } else {
      icon.classList.remove("fa-times");
      icon.classList.add("fa-bars");
    }
  });

  // Fungsi menutup menu saat salah satu link diklik
  links.forEach((link) => {
    link.addEventListener("click", () => {
      navLinks.classList.remove("active");

      // Kembalikan ikon ke semula
      const icon = hamburger.querySelector("i");
      icon.classList.remove("fa-times");
      icon.classList.add("fa-bars");
    });
  });

  // Fungsi smooth scroll untuk browser lama (opsional, modern browser sudah handle via CSS)
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = this.getAttribute("href");
      const targetElement = document.querySelector(targetId);

      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop - 70, // 70px offset untuk header
          behavior: "smooth",
        });
      }
    });
  });
});
