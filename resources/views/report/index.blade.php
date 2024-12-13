<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
        }

        /* Hero Section */
        .hero {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            background: linear-gradient(90deg, #1b6ca8 60%, #f4f4f4 40%);
            position: relative;
        }

        /* Search Container */
        .search-container {
            position: absolute;
            top: 10px;  /* Menaikkan ke atas */
            margin-left: 10%;
            transform: translateX(-50%);
            width: 50%;
            text-align: center;
        }

        .search-container label {
            font-size: 1.2rem;
            color: white;
            margin-bottom: 10px;
            display: block;
        }

        .search-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        
        /* Floating Action Buttons */
        .fab-container {
            position: fixed;
            right: 20px;
            bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .fab {
            width: 50px;
            height: 50px;
            background-color: #1b6ca8;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .fab:hover {
            transform: scale(1.1);
        }
        /* Card Styling */
        .card {
      display: flex;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      margin: 10px;
      margin-right: 40%;
    }
    .card-image {
      width: 200px;
      height: 150px;
      object-fit: cover;
      margin-right: 10px;
    }
    .card-content {
      display: flex;
      flex-direction: column;
    }
    .card-title {
      font-size: 1.2em;
      font-weight: bold;
    }
    .card-stats {
      display: flex;
      align-items: center;
      margin-bottom: 5px;
    }
    .card-stats i { 
      margin-right: 5px;
    }
    .card-author {
      margin-bottom: 5px;
    }
    .card-time {
      color: #777;
      font-size: 0.9em;
    }

    </style>
</head>
<body>
    <div class="hero">
        <!-- Search Container -->
        <div class="search-container">
            <label for="province-dropdown">Pilih Provinsi:</label>
            <select id="province-dropdown">
                <option value="">Loading...</option>
            </select>
        </div>

        <div class="card">
            <img class="card-image" src="https://www.detik.com/images/detikcom/media/visual/2023/03/07/130_1214_1524_1452.jpg" alt="Card Image">
            <div class="card-content">
              <div class="card-title">Immy Menuturkan Ruas Jalan Sedayu Tergolong K...</div>
              <div class="card-stats">
                <i class="fas fa-eye"></i> 38
                <i class="fas fa-heart"></i> 1
              </div>
              <div class="card-author">putri@gmail.com</div>
              <div class="card-time">13 hours ago</div>
            </div>
            <div class="card-vote">
    </div>
    <!-- Floating Action Buttons -->
    <div class="fab-container">
        <div class="fab">👤</div>
        <div class="fab">❗</div>
        <a href="{{ route('report.create') }}" class="fab">✏️</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Ambil data provinsi dari API saat halaman dimuat
            $.ajax({
                url: "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
                type: "GET",
                success: function (data) {
                    // Kosongkan isi dropdown
                    $('#province-dropdown').html('<option value="">Pilih Provinsi</option>');

                    // Tambahkan setiap provinsi ke dropdown
                    data.forEach(province => {
                        $('#province-dropdown').append(`<option value="${province.id}">${province.name}</option>`);
                    });
                },
                error: function () {
                    alert("Gagal memuat data provinsi");
                    $('#province-dropdown').html('<option value="">Gagal memuat data</option>');
                }
            });
        });
    </script>
</body>
</html>
