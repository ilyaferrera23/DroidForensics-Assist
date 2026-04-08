CREATE DATABASE IF NOT EXISTS droid_forensics ;
USE droid_forensics ; 

CREATE TABLE IF NOT EXISTS evidencias (
    id INT AUTO INCREMENT PRIMARY KEY, 
    nombre_archivo VARCHAR (255) NOT NULL, 
    hash_sha256 CHAR (64) NOT NULL, 
    fecha_captura TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    dispositivo_id VARCHAR (100)
);
