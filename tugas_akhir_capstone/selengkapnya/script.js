document.addEventListener("DOMContentLoaded", () => {
  // Ambil elemen
  const modal = document.getElementById("videoModal");
  const btn = document.getElementById("openVideoBtn");
  const closeBtn = document.querySelector(".close-btn");
  const iframe = document.getElementById("youtubeFrame");

  // Simpan URL asli untuk fitur stop video
  const iframeSrc = iframe.src;

  // Buka Modal saat tombol diklik
  btn.addEventListener("click", () => {
    modal.style.display = "flex"; // Ubah css display jadi flex agar di tengah
  });

  // Tutup Modal saat tombol X diklik
  closeBtn.addEventListener("click", () => {
    modal.style.display = "none";
    stopVideo();
  });

  // Tutup Modal saat klik di area gelap (luar video)
  window.addEventListener("click", (e) => {
    if (e.target == modal) {
      modal.style.display = "none";
      stopVideo();
    }
  });

  // Fungsi untuk menghentikan video saat modal ditutup
  function stopVideo() {
    iframe.src = ""; // Hapus source
    iframe.src = iframeSrc; // Kembalikan source (reset video)
  }
});
