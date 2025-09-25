<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Mahasiswa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 20px;
      max-width: 350px;
      width: 100%;
      text-align: center;
    }
    .card img {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
      border: 3px solid #eee;
    }
    .info {
      display: flex;
      flex-direction: column;
      gap: 12px;
      text-align: left;
    }
    .row {
      display: flex;
      justify-content: space-between;
      background: #f9f9f9;
      padding: 8px 12px;
      border-radius: 8px;
    }
    .label {
      font-weight: bold;
      color: #444;
    }
    .value {
      color: #333;
    }
  </style>
</head>
<body>
  <div class="card">
    <!-- Ganti src sesuai foto profil -->
    <img src="https://wallpapers.com/images/hd/messi-pictures-3kvmyrml9igafqq1.jpg" alt="Foto Profil">
    <div class="info">
      <div class="row">
        <span class="label">Nama</span>
        <span class="value">{{ $nama }}</span>
      </div>
      <div class="row">
        <span class="label">NPM</span>
        <span class="value">{{ $npm }}</span>
      </div>
      <div class="row">
        <span class="label">Kelas</span>
        <span class="value">{{ $kelas }}</span>
      </div>
    </div>
  </div>
</body>
</html>
