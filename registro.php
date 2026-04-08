<?php
$host = 'localhost';
$db = 'droid_forensics';
$user = 'root';
$pass = ''; 
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     

     $nombre = $_POST['nombre_archivo'];
     $hash = $_POST['hash_sha256'];
     $id_dev = $_POST['dispositivo_id'];

     
     $stmt = $pdo->prepare("INSERT INTO evidencias (nombre_archivo, hash_sha256, dispositivo_id) VALUES (?, ?, ?)");
     $stmt->execute([$nombre, $hash, $id_dev]);

     echo json_encode(["resultado" => "Evidencia guardada con éxito"]);

} catch (\PDOException $e) {
     echo json_encode(["error" => "Error de conexión: " . $e->getMessage()]);
}
?>
