<?php
// config/database.php
$host = 'localhost';
$port = '5433'; // pastiin ini bener!
$dbname = 'aplikasi_service_elektronik';
$username = 'postgres';
$password = 'sekiro25';

try {
    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
    // Optional: buat debugging
    // error_log("[DB] Koneksi berhasil ke $dbname di port $port");
} catch (PDOException $e) {
    $error_msg = "[DB ERROR] Failed to connect: " . $e->getMessage();
    error_log($error_msg); // catet di error log
    die($error_msg); // sekarang lo liat error-nya jelas!
}

return $pdo; // 🔑 WAJIB RETURN! jangan cuma define variabel
?>