<?php
require_once 'db.php';
// require '../config/quieries.php';
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
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        .container {
            background: white;
            width: 500px;
            padding: 20px;
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
        }

        .delete {
            background: #b00020;
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
            width: 300px;
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
</head>

<body>

    <div class="container">
        <h2>Contacts</h2>

        <button class="add-btn" onclick="openAdd()">Add Contact</button>

        <table>
            <thead>
                <tr>
                    <th>First</th>
                    <th>Last</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result): ?>
                    <?php while ($row = $result->fetch()): ?>
                        <tr>
                            <td><?php echo $row["firstname"]; ?></td>
                            <td><?php echo $row["lastname"]; ?></td>
                            <td><?php echo $row["telephone"]; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td class="actions">
                                <button class="edit" onclick="openEdit()">Edit</button>
                                <button class="delete">Delete</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">No contacts found</td>
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
            <input type="text" name="telephone" placeholder="Phone number">
            <input type="email" name="email" placeholder="Email">

            <button type="submit" name="submit">Add</button>
            <button class="close" onclick="closeAdd()">Cancel</button>
        </form>
        <?php
        var_dump($_POST['submit']);
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

</body>

</html>