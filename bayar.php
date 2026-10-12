<?php
$no_parkir = $_POST['no_parkir'] ?? '';
$no_kendaraan = $_POST['no_kendaraan'] ?? '';
$jenis_kendaraan = $_POST['jenis_kendaraan'] ?? '';
$lama_parkir = $_POST['lama_parkir'] ?? '';
$nama_petugas = $_POST['nama_petugas'] ?? '';
$total = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lama = (int) $lama_parkir;

    if ($jenis_kendaraan == 'motor') {
        $harga_pertama = 3000;
        $harga_selanjutnya = 2000;
    } elseif ($jenis_kendaraan == 'mobil') {
        $harga_pertama = 5000;
        $harga_selanjutnya = 3000;
    } elseif ($jenis_kendaraan == 'truk') {
        $harga_pertama = 7000;
        $harga_selanjutnya = 3000;
    } else {
        $harga_pertama = 0;
        $harga_selanjutnya = 0;
    }

    if ($lama > 0) {
        $total = $harga_pertama + max(0, $lama - 1) * $harga_selanjutnya;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Parkir</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #1f3d2f 0%, #2e5c45 100%);
            color: #f5f5f5;
        }

        .page-shell {
            min-height: 100vh;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .form-wrap {
            width: 100%;
            max-width: 640px;
        }

        .info-box {
            margin-bottom: 24px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 20px 18px;
        }

        .info-box h3 {
            margin: 0 0 10px;
            font-size: 24px;
            color: #ffffff;
        }

        .info-box ol,
        .info-box ul {
            margin: 0;
            padding-left: 24px;
            color: #f0f0f0;
            line-height: 1.8;
        }

        .info-box strong {
            color: #b9fbb8;
        }

        .form-box {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 14px;
            padding: 26px 28px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.18);
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #f5f5f5;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border-radius: 8px;
            border: 1px solid #87a98e;
            background: #f7fff8;
            color: #1f1f1f;
            font-size: 15px;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #7fe286;
            box-shadow: 0 0 0 3px rgba(127, 226, 134, 0.18);
        }

        .btn-submit {
            width: 100%;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #7ddf8a, #4ba860);
            color: #ffffff;
            font-size: 16px;
            font-weight: 700;
            padding: 12px 16px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(75, 168, 96, 0.3);
        }

        .result {
            margin-top: 18px;
            padding: 12px 14px;
            border-radius: 8px;
            background: rgba(16, 32, 21, 0.7);
            color: #f4f4f4;
            border: 1px solid rgba(166, 243, 171, 0.18);
            font-size: 16px;
        }

        .result strong {
            color: #b9fbb8;
        }
    </style>
</head>
<body>
    <div class="page-shell">
        <div class="form-wrap">
            <div class="info-box">
                <h3>Keterangan :</h3>
                <ul>
                    <li>Harga parkir satu jam pertama untuk motor <strong>Rp. 3.000</strong>, jam selanjutnya <strong>Rp. 2.000</strong></li>
                    <li>Harga parkir satu jam pertama untuk mobil <strong>Rp. 5.000</strong>, jam selanjutnya <strong>Rp. 3.000</strong></li>
                    <li>Harga parkir satu jam pertama untuk truk <strong>Rp. 7.000</strong>, jam selanjutnya <strong>Rp. 3.000</strong></li>
                </ul>
            </div>

            <form method="POST" class="form-box">
                <div class="form-group">
                    <label for="no_parkir">No parkir</label>
                    <input type="text" id="no_parkir" name="no_parkir" value="<?php echo htmlspecialchars($no_parkir); ?>" required>
                </div>

                <div class="form-group">
                    <label for="no_kendaraan">No kendaraan</label>
                    <input type="text" id="no_kendaraan" name="no_kendaraan" value="<?php echo htmlspecialchars($no_kendaraan); ?>" required>
                </div>

                <div class="form-group">
                    <label for="jenis_kendaraan">Jenis kendaraan</label>
                    <select id="jenis_kendaraan" name="jenis_kendaraan" required>
                        <option value="">-- Pilih jenis kendaraan --</option>
                        <option value="motor" <?php echo ($jenis_kendaraan === 'motor') ? 'selected' : ''; ?>>Motor</option>
                        <option value="mobil" <?php echo ($jenis_kendaraan === 'mobil') ? 'selected' : ''; ?>>Mobil</option>
                        <option value="truk" <?php echo ($jenis_kendaraan === 'truk') ? 'selected' : ''; ?>>Truk</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="lama_parkir">Lama parkir (jam)</label>
                    <input type="number" id="lama_parkir" name="lama_parkir" min="1" value="<?php echo htmlspecialchars($lama_parkir); ?>" required>
                </div>

                <div class="form-group">
                    <label for="nama_petugas">Nama petugas</label>
                    <input type="text" id="nama_petugas" name="nama_petugas" value="<?php echo htmlspecialchars($nama_petugas); ?>" required>
                </div>

                <button type="submit" class="btn-submit">Submit</button>

                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $total > 0): ?>
                    <div class="result">
                        Total bayaran: <strong>Rp <?php echo number_format($total, 0, ',', '.'); ?></strong>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html>
