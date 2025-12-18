<?php
require_once 'db.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, password)
        VALUES (:username, :email, :password)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':username' => $username,
    ':email' => $email,
    ':password' => $password
]);

echo "Utilisateur ajouté avec succès";

$check = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$check->execute([$email]);

if ($check->rowCount() > 0) {
    echo "Cet email existe déjà";
    exit;
}
?>