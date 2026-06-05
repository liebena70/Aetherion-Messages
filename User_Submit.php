<?php
session_start();

// Anti-Spam: Jeda 30 detik
if (isset($_SESSION['last_submit_time']) && (time() - $_SESSION['last_submit_time'] < 5)) {
    die("Sabar ya! Mohon tunggu 30 detik sebelum mengirim pesan lagi.");
}

$status = ""; 
$status_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Proteksi Honeypot
    if (!empty($_POST['honeypot'])) {
        die("Spam detected!");
    }

    // Koneksi Database (Sesuaikan nama DB jika berbeda)
    $conn = new mysqli("localhost", "root", "", "aetherionmessages_db");

    if ($conn->connect_error) {
        $status = "error";
        $status_message = "Koneksi database gagal.";
    } else {
        $message = isset($_POST['message']) ? trim($_POST['message']) : "";

        if ($message === "") {
            $status = "error";
            $status_message = "Pesan tidak boleh kosong.";
        } elseif (strlen($message) > 500) {
            $status = "error";
            $status_message = "Pesan terlalu panjang (maksimal 500 karakter).";
        } else {
            // Memasukkan pesan ke tabel 'messages'
            $stmt = $conn->prepare("INSERT INTO messages (message, created_at) VALUES (?, NOW())");
            
            if ($stmt) {
                $stmt->bind_param("s", $message);
                if ($stmt->execute()) {
                    $status = "success";
                    $_SESSION['last_submit_time'] = time();
                } else {
                    $status = "error";
                    $status_message = "Gagal menyimpan pesan ke sistem.";
                }
                $stmt->close();
            }
        }
        $conn->close();
    }
} else {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AETHERION - Status</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body {
            background-image: url('ibadah_padang.jpg'); 
            background-size: cover; background-position: center; background-attachment: fixed;
            height: 100vh; display: flex; justify-content: center; align-items: center; color: white;
        }
        body::before { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); z-index: 0; }
        .container { position: relative; z-index: 1; background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.2); padding: 40px; border-radius: 20px; text-align: center; max-width: 500px; width: 90%; box-shadow: 0 15px 35px rgba(0,0,0,0.5); }
        h1 { font-weight: 700; background: linear-gradient(to right, #ffffff, #a0c4ff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 20px; }
        .message-box { background: rgba(0, 0, 0, 0.3); padding: 20px; border-radius: 12px; margin-bottom: 25px; border-left: 5px solid #4ade80; }
        .btn-back { display: inline-block; text-decoration: none; background: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%); color: white; padding: 12px 35px; border-radius: 50px; font-weight: 600; transition: 0.3s; }
        .btn-back:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(37, 117, 252, 0.4); }
    </style>
</head>
<body>
    <div class="container">
        <h1>STATUS KIRIM</h1>
        <?php if ($status === "success"): ?>
            <div class="message-box">
                <div style="font-size: 1.2rem; font-weight: 600;">Berhasil Terkirim! 🚀</div>
                <div style="font-size: 0.85rem; opacity: 0.8; margin-top: 8px;">Pesan Anda telah masuk ke database Admin secara anonymous.</div>
            </div>
            <a href="index.html" class="btn-back">Kembali</a>
        <?php else: ?>
            <div class="message-box" style="border-color: #f87171;">
                <div style="font-size: 1.2rem; font-weight: 600;">Gagal Mengirim</div>
                <div style="font-size: 0.85rem; opacity: 0.8;"><?= $status_message ?></div>
            </div>
            <a href="index.html" class="btn-back">Coba Lagi</a>
        <?php endif; ?>
    </div>
</body>
</html>
