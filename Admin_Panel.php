<?php
// ===== 1. PROTEKSI ADMIN =====
session_start();

// Jika belum login, tendang kembali ke halaman login.php
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

// ===== 2. KONEKSI DATABASE =====
$conn = new mysqli("localhost", "root", "", "aetherionmessages_db");
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// ===== 3. AMBIL DATA PESAN (Diurutkan dari yang terbaru) =====
$result = $conn->query(
    "SELECT id, message, created_at FROM messages ORDER BY created_at DESC"
);

// Variabel bantu untuk melacak perubahan tanggal saat looping
$current_date = "";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Aetherion Messages</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f4f7f9; /* Warna abu-abu muda yang bersih */
            color: #333;
            padding: 20px;
        }

        .admin-container {
            max-width: 900px;
            margin: 0 auto;
        }

        /* Header Styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        .header h2 {
            font-weight: 700;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-logout {
            background: #ff4757;
            color: white;
            text-decoration: none;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background: #ff6b81;
            box-shadow: 0 4px 10px rgba(255, 71, 87, 0.3);
        }

        /* Tanggal / Folder Divider */
        .date-group {
            margin: 30px 0 15px 0;
            display: flex;
            align-items: center;
        }

        .date-badge {
            background: #2575fc;
            color: white;
            padding: 5px 20px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            box-shadow: 0 4px 8px rgba(37, 117, 252, 0.2);
        }

        .date-line {
            flex: 1;
            height: 1px;
            background: #dcdde1;
            margin-left: 15px;
        }

        /* Pesan Card */
        .message-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 12px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
            border-left: 4px solid #dcdde1;
            transition: 0.2s;
        }

        .message-card:hover {
            border-left: 4px solid #2575fc;
            transform: translateX(5px);
        }

        .message-content {
            font-size: 1rem;
            line-height: 1.6;
            color: #2f3542;
            margin-bottom: 15px;
            white-space: pre-wrap; /* Menjaga enter/spasi dari user */
        }

        .message-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #f1f2f6;
            padding-top: 10px;
        }

        .time {
            font-size: 0.8rem;
            color: #a4b0be;
        }

        .delete-link {
            color: #ced4da;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            transition: 0.2s;
        }

        .delete-link:hover {
            color: #ff4757;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 50px;
            color: #a4b0be;
        }
    </style>
</head>
<body>

<div class="admin-container">
    
    <div class="header">
        <h2>📩 Pesan Masuk <span>Aetherion</span></h2>
        <a href="logout.php" class="btn-logout" onclick="return confirm('Apakah Anda ingin keluar?')">🚪 Logout</a>
    </div>

    <?php if ($result->num_rows === 0): ?>
        <div class="empty-state">
            <p>Belum ada pesan yang masuk untuk saat ini.</p>
        </div>
    <?php endif; ?>

    <?php while ($row = $result->fetch_assoc()): 
        // Logika sortir tanggal
        $date_formatted = date("d F Y", strtotime($row['created_at']));
        
        if ($date_formatted !== $current_date): 
            $current_date = $date_formatted;
    ?>
        <div class="date-group">
            <div class="date-badge">📅 <?= $current_date ?></div>
            <div class="date-line"></div>
        </div>
    <?php endif; ?>

    <div class="message-card">
        <div class="message-content"><?= htmlspecialchars($row['message']) ?></div>
        
        <div class="message-footer">
            <div class="time">🕒 Pukul <?= date("H:i", strtotime($row['created_at'])) ?> WIB</div>
            
            <a href="delete.php?id=<?= $row['id'] ?>" 
               class="delete-link" 
               onclick="return confirm('Hapus pesan ini secara permanen?')">
               🗑️ Hapus Pesan
            </a>
        </div>
    </div>

    <?php endwhile; ?>

</div>

</body>
</html>
