<?php
require_once 'db.php';

session_start(); // This should be at the top

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    
    // Add this check for user_id
    if (!isset($_SESSION['user_id'])) {
        die("User not logged in");
    }
    
    $user_id = $_SESSION['user_id']; // Get user_id from session

    $sql = 'INSERT INTO contacts (firstname, lastname, telephone, email, user_id) 
            VALUES (:firstname, :lastname, :telephone, :email, :user_id)';
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':telephone' => $telephone,
            ':email' => $email,
            ':user_id' => $user_id
        ]);
        
        echo "Contact ajouté avec succès!";
        header("Location: contact.php");
        exit();
        
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

try {
    $sql2 = 'SELECT id, firstname, lastname, telephone, email FROM contacts WHERE user_id = :user_id';
    $stmt = $pdo->prepare($sql2);
    $stmt->execute([':user_id' => $user_id]);
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Error loading contacts: " . $e->getMessage();
    $contacts = [];
}



// $sql2 = 'SELECT firstname, lastname, telephone , email FROM contacts';
// $result = $pdo->query($sql2);
// print_r($result);



// while ($row = $result->fetch()) {
//     echo "<br>";
//     echo " - Name: " . $row["firstname"] . " " . $row["lastname"] .  "<br>";
//     echo " - Tel: " . $row["telephone"] . "<br>";
//     echo " - Email: " . $row["email"] . "<br>";
// }




// header("location:contact.php");
