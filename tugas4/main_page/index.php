<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wisata Bandung City</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="logo">BandungJourney<span class="accent-dot">.</span></div>
        <ul class="nav-links">
          <li><a href="#home">Beranda</a></li>
          <li><a href="#armada">Wisata</a></li>
          <li><a href="#sewa-alat">Sewa Alat</a></li>
          <li><a href="#layanan">Layanan</a></li>
          <li><a href="#kontak" class="cta-btn">Hubungi Kami</a></li>
        </ul>
        <div class="hamburger"><i class="fas fa-bars"></i></div>
      </nav>
    </header>

    <section id="home" class="hero">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1>Jelajahi Keindahan Bandung</h1>
        <p>“Bandung, kota yang selalu membuat rindu dengan udara sejuk dan pesona alamnya.”</p>
        <button class="btn-primary" onclick="location.href='#armada'">Lihat Wisata</button>
      </div>
    </section>

    <section id="sewa-alat" class="section">
      <div class="section-title">
        <h2>Sewa Peralatan Outdoor</h2>
        <p>“Kami menyewakan alat camping berkualitas untuk kenyamanan petualangan Anda.”</p>
      </div>
      <div class="grid-container">
        <div class="card">
          <div class="card-img-wrapper"><img src="../image/tenda.jpg" alt="Tenda Dome" /></div>
          <div class="card-body">
            <h3>Tenda Dome 4P</h3>
            <span>Kapasitas 4-5 Orang, Double Layer.</span>
            <span class="price">Rp 50.000 / malam</span>
            <a href="pesanan.php" class="btn-card">Sewa Sekarang</a>
          </div>
        </div>
        <div class="card">
          <div class="card-img-wrapper"><img src="../image/sleeping bag.jpg" alt="Sleeping Bag" /></div>
          <div class="card-body">
            <h3>Sleeping Bag (SB)</h3>
            <span>Bahan Polar hangat.</span>
            <span class="price">Rp 15.000 / malam</span>
            <a href="pesanan.php" class="btn-card">Sewa Sekarang</a>
          </div>
        </div>
        <div class="card">
          <div class="card-img-wrapper"><img src="../image/kompor portable 1set.png" alt="Alat Masak" /></div>
          <div class="card-body">
            <h3>Paket Masak</h3>
            <span>Kompor Portabel + Nesting set.</span>
            <span class="price">Rp 25.000 / malam</span>
            <a href="pesanan.php" class="btn-card">Sewa Sekarang</a>
          </div>
        </div>
      </div>
    </section>

    <section id="armada" class="section">
      <div class="section-title">
        <h2>Pilihan Wisata</h2>
        <p>“Bandung adalah definisi lain dari keindahan.”</p>
      </div>
      <div class="grid-container">
        <div class="card">
          <div class="card-img-wrapper"><img src="../image/Kawah Putih-image.jpg" alt="Kawah Putih" /></div>
          <div class="card-body">
            <h3>Kawah Putih</h3>
            <span class="price">Rp 31.000 / orang</span>
            <div class="specs"><span><i class="fa-solid fa-users"></i> Tiket Masuk</span></div>
            <a href="../selengkapnya/ciwidey.html" class="btn-details">Lihat Selengkapnya</a>
            <a href="pesanan.php" class="btn-card">Pesan Sekarang</a>
          </div>
        </div>
        <div class="card">
          <div class="card-img-wrapper"><img src="../image/Orchid Forest Cikole.jpg" alt="Orchid Forest" /></div>
          <div class="card-body">
            <h3>Orchid Forest Cikole</h3>
            <span class="price">Rp 40.000 / orang</span>
            <div class="specs"><span><i class="fa-solid fa-users"></i> Tiket Masuk</span></div>
            <a href="../selengkapnya/cikole.html" class="btn-details">Lihat Selengkapnya</a>
            <a href="pesanan.php" class="btn-card">Pesan Sekarang</a>
          </div>
        </div>
        <div class="card">
          <div class="card-img-wrapper"><img src="../image/Sunrise Point Cukul.jpg" alt="Cukul" /></div>
          <div class="card-body">
            <h3>Sunrise Point Cukul</h3>
            <span class="price">Rp 15.000 / orang</span>
            <div class="specs"><span><i class="fa-solid fa-users"></i> Tiket Masuk</span></div>
            <a href="../selengkapnya/cukul.html" class="btn-details">Lihat Selengkapnya</a>
            <a href="pesanan.php" class="btn-card">Pesan Sekarang</a>
          </div>
        </div>
      </div>
    </section>

    <footer id="kontak">
      <div class="footer-container">
        <div class="footer-col">
          <h3>BandungJourney.</h3>
          <p>Bandung, kota dengan sejuta pesona.</p>
        </div>
        <div class="footer-col">
          <h3>Kontak</h3>
          <p><i class="fas fa-map-marker-alt"></i> Bandung, Jawa Barat</p>
          <p><i class="fas fa-phone"></i> 0831-0803-9509</p>
        </div>
      </div>
      <div class="footer-bottom"><p>&copy; 2025 Bandung Journey.</p></div>
    </footer>

    <a href="https://wa.me/6283108039509" class="wa-float" target="_blank"><i class="fab fa-whatsapp"></i></a>
    <script src="script.js"></script>
  </body>
</html>