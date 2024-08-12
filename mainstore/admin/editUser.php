<?php
require_once "koneksiAdmin.php";
$connection = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $connection->prepare("UPDATE user SET user_name = ?, email = ?, password = ? WHERE user_id = ?");
    $stmt->execute([$user_name, $email, $password, $user_id]);

    header('Location: admin.php');
}

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $stmt = $connection->prepare("SELECT * FROM user WHERE user_id = ? ");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

} else {
    header('Location: admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="../admin/edituser.css">
</head>
<body>
    <div class="edit-div">
        <div class="kiri">
            <h2>User (OLD)</h2><br>
            <form method="post" action="">
                <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>" readonly>

                <label for="name">User Name:</label><br>
                <input type="text" name="user_name" value="<?= $user['user_name']; ?>" readonly><br><br>

                <label for="harga">Email:</label><br>
                <input type="text" name="email" value="<?= $user['email']; ?>" readonly><br><br>

                <label for="ket">Password:</label><br>
                <input type="text" name="password" value="<?= $user['password']; ?>" readonly><br><br>

                <button onclick="history.back()">Go Back</button>
            </form>
        </div>
        <div class="kanan">
            <h2>Edit User (New)</h2><br>
            <form method="post" action="">
                <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">

                <label for="name">User Name:</label><br>
                <input type="text" name="user_name" value="<?= $user['user_name']; ?>" required><br><br>

                <label for="harga">Email:</label><br>
                <input type="text" name="email" value="<?= $user['email']; ?>" required><br><br>

                <label for="ket">Password:</label><br>
                <input type="text" name="password" value="<?= $user['password']; ?>" required><br><br>

                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>