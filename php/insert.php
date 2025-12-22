<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    die("User not logged in");
}

$user_id = $_SESSION['user_id'];


if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];



    $sqlINSERT = 'INSERT INTO contacts (firstname, lastname, telephone, email, user_id) 
            VALUES (:firstname, :lastname, :telephone, :email, :user_id)';
    try {
        $stmt = $pdo->prepare($sqlINSERT);
        $stmt->execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':telephone' => $telephone,
            ':email' => $email,
            ':user_id' => $user_id
        ]);

        echo "Contact ajouté avec succès!";
        header("Location: contact.php");
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
} else if (isset($_POST["annuler"])) {
    header("Location: contact.php");
}


try {
   
    $sqlSELECT = "SELECT * FROM contacts WHERE user_id = ?";
    $stmt = $pdo->prepare($sqlSELECT);
    $stmt->execute([$user_id]);
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    var_dump($contacts);
    $_SESSION['contacts'] = $contacts;
    var_dump($_SESSION['contacts']);
    header("location: contact.php");
    exit;

} catch (PDOException $e) {
    $error = "Error loading contacts: " . $e->getMessage();
    $contacts = [];
}
