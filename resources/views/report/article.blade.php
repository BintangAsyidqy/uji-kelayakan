<!-- Hapus FastBootstrap CSS dan pastikan hanya menggunakan Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <i class="fas fa-globe"></i>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
        data-bs-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample">
        <ul class="navbar-nav me-auto mb-0">
          <li class="nav-item">
            <h7>Pengaduan Masyarakat</h7>
          </li>
        </ul>
        <div class="d-flex">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-secondary ms-auto">Logout</button>
            </form>
          </div>          
      </div>
    </div>
</nav>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #ff7f00; color: white;">
      <span>Pengaduan 06 Desember 2024</span>
      <button class="btn btn-sm btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#pengaduanDetail" aria-expanded="false" aria-controls="pengaduanDetail">
        <i class="bi bi-chevron-down"></i>
      </button>
    </div>
    <div class="collapse" id="pengaduanDetail">
      <div class="card-body" style="background-color: #ff9f40; color: white;">
        <div class="d-flex justify-content-around">
          <!-- Tombol Data -->
          <button class="btn btn-outline-light btn-lg" onclick="showData()">
            Data
          </button>
          <!-- Tombol Gambar -->
          <button class="btn btn-outline-light btn-lg" onclick="showImage()">
            Gambar
          </button>
          <!-- Tombol Status -->
          <button class="btn btn-outline-light btn-lg" onclick="checkStatus()">
            Status
          </button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modals for Display -->
  <div id="modalData" class="modal fade" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDataLabel">Detail Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="dataContent">Deskripsi data akan ditampilkan di sini.</p>
        </div>
      </div>
    </div>
  </div>
  
  <div id="modalImage" class="modal fade" tabindex="-1" aria-labelledby="modalImageLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalImageLabel">Gambar Keluhan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img id="imageContent" src="" alt="Gambar tidak tersedia" class="img-fluid" />
        </div>
      </div>
    </div>
  </div>
  
  <div id="modalStatus" class="modal fade" tabindex="-1" aria-labelledby="modalStatusLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalStatusLabel">Status Keluhan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="statusContent">Status akan ditampilkan di sini.</p>
        </div>
      </div>
    </div>
  </div>
  
  <!-- JavaScript untuk Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function showData() {
      const dataContent = "Deskripsi: Keluhan terkait infrastruktur yang rusak.";
      document.getElementById("dataContent").textContent = dataContent;
      new bootstrap.Modal(document.getElementById("modalData")).show();
    }
  
    function showImage() {
      const imageUrl = "path/to/your/image.jpg"; // Ganti dengan URL gambar
      document.getElementById("imageContent").src = imageUrl;
      new bootstrap.Modal(document.getElementById("modalImage")).show();
    }
  
    function checkStatus() {
      const statusContent = "Status: Dalam proses pemeriksaan.";
      document.getElementById("statusContent").textContent = statusContent;
      new bootstrap.Modal(document.getElementById("modalStatus")).show();
    }
  </script>
