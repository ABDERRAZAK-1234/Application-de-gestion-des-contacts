<?php
require_once 'db.php';

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $sqlSELECT = "SELECT id FROM users WHERE username = :username OR email = :email";
        $stmt = $pdo->prepare($sqlSELECT);

        $stmt->execute([
            'username' => $username,
            'email' => $email
        ]);
        if ($stmt->rowCount() > 0) {
            $error_msg = "Cet email ou nom d'utilisateur existe déjà!";
            header("Location: connexion.php");
                exit();
        } else {
            $insert_query = "INSERT INTO users (username, email, password)
        VALUES (:username, :email, :password)";
            $insert_stmt = $pdo->prepare($insert_query);
            $insert_stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => $password_hash
            ]);

            $success_msg = "Inscription réussie";
            header("Location: contact.php");

        }
    } catch (PDOException $e) {
        $error_msg = "Erreur lors de l'inscription: " . $e->getMessage();
    }
}