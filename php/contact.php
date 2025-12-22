<?php
session_start();
require_once 'db.php';
// require_once 'select.php';

    $contacts = (isset($_SESSION['contacts']) ? $_SESSION['contacts'] : []);
   

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simple Contact Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }

        .container {
            background: white;
            width: 500px;
            margin: 50px 0;
            /* padding: 20px; */
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-top: 0;
        }

        button {
            padding: 6px 10px;
            background: #000;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
        }

        .add-btn {
            width: 100%;
            margin-bottom: 10px;
        }

        .edit {
            background: #555;
            border-radius: 5px;
            width: 50px;
        }

        .delete {
            background: #b00020;
            border-radius: 5px;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th,
        td {
            padding: 8px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background: #f9f9f9;
        }

        /* ===== MODAL ===== */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            margin: 0 25%;
            padding: 20px;
            border-radius: 6px;
        }

        .modal-content input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .close {
            background: #ccc;
            color: black;
            margin-top: 5px;
            width: 100%;
        }

        .actions {
            display: flex;
            gap: 5px;

        }
    </style>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand text-primary fs-3 fw-bold">CONNECT FLOW</a>
      <form class="d-flex justify-content-between">
        <a class="btn btn-outline-danger" href="index.php" type="submit">Deconnecter</a>
      </form>
    </div>
  </nav>

    <div class="container ">
        <h2>Contacts</h2>

        <button class="add-btn" onclick="openAdd()">Add Contact</button>

        <table>
            <thead>
                <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($contacts)): ?>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><?php echo $contact['firstname']; ?></td>
                            <td><?php echo $contact['lastname']; ?></td>
                            <td><?php echo $contact['telephone']; ?></td>
                            <td><?php echo $contact['email']; ?></td>
                            <td class="actions">
                                <button class="edit" onclick="openEdit(<?php echo $contact['id']; ?>)">Edit</button>
                                <button class="delete" onclick="deleteContact(<?php echo $contact['id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">No contacts found. Add your first contact!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- ADD MODAL -->
    <div class="modal" id="addModal">
        <form method="post" action="insert.php" class="modal-content">
            <h3>Add Contact</h3>

            <input type="text" name="firstname" placeholder="First name">
            <input type="text" name="lastname" placeholder="Last name">
            <input type="tel" name="telephone" placeholder="Phone number">
            <input type="email" name="email" placeholder="Email">

            <button type="submit" name="submit" >Add</button>
            <button class="close" name="annuler" onclick="closeAdd()">Cancel</button>
        </form>
        <?php
        // var_dump($_POST['submit']);
        ?>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <h3>Edit Contact</h3>

            <input type="text" value="John">
            <input type="text" value="Doe">
            <input type="text" value="0612345678">
            <input type="email" value="john@example.com">

            <button>Update</button>
            <button class="close" onclick="closeEdit()">Cancel</button>
        </div>
    </div>

    <script>
        function openAdd() {
            document.getElementById('addModal').style.display = 'flex';
        }

        function closeAdd() {
            document.getElementById('addModal').style.display = 'none';
        }

        function openEdit() {
            document.getElementById('editModal').style.display = 'flex';
        }

        function closeEdit() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>