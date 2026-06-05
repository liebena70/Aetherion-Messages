<?php
// ===== 1. INISIALISASI SESSION =====
session_start();

// Jika admin sudah login sebelumnya, langsung arahkan ke admin.php
if (isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit;
}

// ===== 2. KONFIGURASI PASSWORD =====
// Silakan ganti "Aetherion13" dengan password rahasia pilihan Anda
$password_admin = "A3th3r10n13"; 

$error = "";

// ===== 3. LOGIKA LOGIN =====
if (isset($_POST['login'])) {
    $password_input = $_POST['password'];

    if ($password_input === $password_admin) {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Akses Ditolak: Password Salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Aetherion</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            /* Samakan gambar latar belakang dengan index.html untuk kesan menyatu */
            background-image: url('ibadah_padang.jpg'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* Overlay gelap agar fokus ke form */
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            z-index: 0;
        }

        .login-card {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 50px 40px;
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 100%;
            max-width: 420px;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo-area {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        h2 {
            color: white;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        p.desc {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.85rem;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        input[type="password"] {
            width: 100%;
            padding: 15px 25px;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
            outline: none;
            text-align: center;
            transition: 0.3s;
        }

        input[type="password"]:focus {
            border-color: #2575fc;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 15px rgba(37, 117, 252, 0.3);
        }

        button {
            width: 100%;
            padding: 15px;
            border-radius: 50px;
            border: none;
            background: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(37, 117, 252, 0.4);
        }

        button:active {
            transform: translateY(-1px);
        }

        .error-msg {
            background: rgba(255, 71, 87, 0.2);
            color: #ff6b81;
            padding: 10px;
            border-radius: 10px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 71, 87, 0.3);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="logo-area">🛡️</div>
        <h2>Admin Access</h2>
        <p class="desc">Silakan masukkan kunci akses Aetherion</p>

        <?php if ($error): ?>
            <div class="error-msg"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="input-group">
                <input type="password" name="password" placeholder="Password Rahasia" required autofocus>
            </div>
            <button type="submit" name="login">Buka Panel Admin</button>
        </form>
    </div>

</body>
</html>
