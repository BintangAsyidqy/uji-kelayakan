<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keluhan Form</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 20px;
            color: #1b6ca8;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #1b6ca8;
            box-shadow: 0 0 5px rgba(27, 108, 168, 0.5);
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            font-weight: bold;
            color: white;
            background: #1b6ca8;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #155a8c;
        }

        .note {
            font-size: 0.9rem;
            color: #999;
            margin-top: 10px;
        }

        .form-control.select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: #fff;
            background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"%3E%3Cpath d="M6 8L10 12L14 8" stroke="%23222" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/%3E%3C/svg%3E');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 12px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Form Keluhan</h1>
            <!-- Provinsi -->
            <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
            <div class="form-group">
                <label for="provinsi">Provinsi *</label>
                <select name="provinsi" id="provinsi" class="form-control select">
                    <option value="">Pilih Provinsi</option>
                    <!-- Province options will be dynamically populated -->
                </select>
            </div>

            <!-- Kota/Kabupaten -->
            <div class="form-group">
                <label for="kota">Kota/Kabupaten *</label>
                <select name="kota" id="kota" class="form-control select">
                    <option value="">Pilih Kota/Kabupaten</option>
                    <!-- City options will be dynamically populated -->
                </select>
            </div>

            <!-- Kecamatan -->
            <div class="form-group">
                <label for="kecamatan">Kecamatan *</label>
                <select name="kecamatan" id="kecamatan" class="form-control select">
                    <option value="">Pilih Kecamatan</option>
                    <!-- Kecamatan options will be dynamically populated -->
                </select>
            </div>

            <!-- Kelurahan -->
            <div class="form-group">
                <label for="kelurahan">Kelurahan *</label>
                <select name="kelurahan" id="kelurahan" class="form-control select">
                    <option value="">Pilih Kelurahan</option>
                    <!-- Kelurahan options will be dynamically populated -->
                </select>
            </div>

            <!-- Type -->
            <div class="form-group">
                <label for="type">Type Keluhan *</label>
                <select name="type" id="type" class="form-control select">
                    <option value="">Pilih Type Keluhan</option>
                    <option value="Kejahatan">Kejahatan</option>
                    <option value="Sosial">Sosial</option>
                    <option value="Pembangunan">Pembangunan</option>
                </select>
            </div>

            <!-- Keluhan -->
            <div class="form-group">
                <label for="keluhan">Keluhan *</label>
                <textarea name="keluhan" id="keluhan" rows="5" class="form-control" placeholder="Jelaskan keluhan Anda di sini"></textarea>
            </div>

            <div class="form-group">
                <label for="foto">Tambah Foto</label>
                <div class="file-input-container">
                    <input type="file" name="foto" id="foto" class="file-input" accept="image/*">
                    <div class="file-preview" id="file-preview"></div>
                </div>
            </div>
            <input type="hidden" name="statement" value="0">
            <input class="form-check-input" type="checkbox" id="statement" name="statement" value="1">
            <label class="form-check-label" for="statement">
                Laporan yang disampaikan sesuai dengan kebenaran.
            </label>
            <!-- Submit Button -->
            <button type="submit" class="btn">Kirim Keluhan</button>
        </form>
        <p class="note">* Wajib diisi</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Fetch provinces from API
            $.ajax({
                url: "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
                type: "GET",
                success: function (data) {
                    $('#provinsi').html('<option value="">Pilih Provinsi</option>');
                    data.forEach(province => {
                        $('#provinsi').append(`<option value="${province.id}">${province.name}</option>`);
                    });
                },
                error: function () {
                    alert("Gagal memuat data provinsi");
                }
            });

            // Fetch cities based on selected province
            $('#provinsi').change(function () {
                const provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        url: `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`,
                        type: "GET",
                        success: function (data) {
                            $('#kota').html('<option value="">Pilih Kota/Kabupaten</option>');
                            data.forEach(city => {
                                $('#kota').append(`<option value="${city.id}">${city.name}</option>`);
                            });
                        },
                        error: function () {
                            alert("Gagal memuat data kota/kabupaten");
                        }
                    });
                } else {
                    $('#kota').html('<option value="">Pilih Kota/Kabupaten</option>');
                }
            });

            // Fetch kecamatan based on selected city
            $('#kota').change(function () {
                const cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${cityId}.json`,
                        type: "GET",
                        success: function (data) {
                            $('#kecamatan').html('<option value="">Pilih Kecamatan</option>');
                            data.forEach(district => {
                                $('#kecamatan').append(`<option value="${district.id}">${district.name}</option>`);
                            });
                        },
                        error: function () {
                            alert("Gagal memuat data kecamatan");
                        }
                    });
                } else {
                    $('#kecamatan').html('<option value="">Pilih Kecamatan</option>');
                }
            });

            // Fetch kelurahan based on selected kecamatan
            $('#kecamatan').change(function () {
                const districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtId}.json`,
                        type: "GET",
                        success: function (data) {
                            $('#kelurahan').html('<option value="">Pilih Kelurahan</option>');
                            data.forEach(village => {
                                $('#kelurahan').append(`<option value="${village.id}">${village.name}</option>`);
                            });
                        },
                        error: function () {
                            alert("Gagal memuat data kelurahan");
                        }
                    });
                } else {
                    $('#kelurahan').html('<option value="">Pilih Kelurahan</option>');
                }
            });
        });
    </script>
</body>
</html>
