<!DOCTYPE html>
<html lang="en">
<head>
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
            justify-content: space-between;
            height: 100vh;
            background: linear-gradient(90deg, #1b6ca8 60%, #f4f4f4 40%);
        }

        .hero-content {
            flex: 1;
            color: white;
            padding: 50px;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .hero-content p {
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .hero-content a {
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #fff;
            color: #1b6ca8;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .hero-content a:hover {
            background-color: #f4f4f4;
        }

        .hero-image {
            flex: 1;
            height: 100%;
            background: url('asset/image/gedung.jpeg') ;
            background-size: cover;
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
    </style>
</head>
<body>
    <div class="hero">
        <div class="hero-content">
            <h1>Pengaduan Masyarakat</h1>
            <p>
                Laporkan keluhan Anda dengan cepat dan mudah. Kami akan mendengarkan dan memberikan solusi terbaik.
            </p>

            <!-- Tombol menuju login -->
            <a href="{{ route('login') }}">Bergabung</a>
        </div>
        <div class="hero-image"></div>
    </div>

    <div class="fab-container">
        <div class="fab">👤</div>
        <div class="fab">❗</div>
        <div class="fab">✏️</div>
    </div>
</body>
</html>
