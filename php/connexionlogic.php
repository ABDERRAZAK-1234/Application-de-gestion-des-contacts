<?php
require_once 'db.php';

session_start();

$login_error = "";

if (isset($_POST['submit'])) {
    if (empty($_POST['username'])) {
        $login_error = "Le nom d'utilisateur est requis";
    } elseif (empty($_POST['password'])) {
        $login_error = "Le mot de passe est requis";
        
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        try {
            $sql = "SELECT id, username, password FROM users WHERE username = :username";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username' => $username]);
            
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (password_verify($password, $user['password'])) {
                    // Connexion reusie
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];

                    header("Location: contact.php");
                    exit();
                } else {
                    $login_error = "Nom d'utilisateur ou mot de passe incorrect";
                }
            } else {
                $login_error = "Nom d'utilisateur ou mot de passe incorrect";
            }
        } catch (PDOException $e) {
            $login_error = "Erreur lors de la connexion: " . $e->getMessage();
        }
    }
}
// erreur dans la cnx
if ($login_error !== "") {
    $_SESSION['login_error'] = $login_error;
    header("Location: connexion.php");
    exit();
}
?>