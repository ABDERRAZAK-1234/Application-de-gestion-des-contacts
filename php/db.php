<?php

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=connect_flow;charset=utf8',
        'root',
        ''
        
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connection successful";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
