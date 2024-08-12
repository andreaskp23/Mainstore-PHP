<?php
require_once "koneksiAdmin.php";
$connection = getConnection();

$sql = "select * from user";
$result = $connection->query($sql);
$user = $result->fetchAll();

$sql = "select * from genre";
$result = $connection->query($sql);
$genre = $result->fetchAll();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <table class="table table-bordered mt-4">
            <tr>
                <th>ID</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            <?php foreach ($user as $r): ?>
                <tr>
                    <td><?= $r['user_id']; ?></td>
                    <td><?= $r['user_name']; ?></td>
                    <td><?= $r['email']; ?></td>
                    <td><?= $r['password']; ?></td>
                    <td class="button-place">
                    <button>
                        <a href="editUser.php?user_id=<?= $r['user_id']; ?>" class="button-link">Edit</a>
                    </button>
                    <button>
                        <a href="deleteUser.php?user_id=<?= $r['user_id']; ?>" class="button-link" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                    </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>


        <table class="table table-bordered mt-4">
            <tr>
                <th>ID</th>
                <th>Genre Name</th>
                <th>Desc</th>
            </tr>
            <?php foreach ($genre as $r): ?>
                <tr>
                    <td><?= $r['genre_id']; ?></td>
                    <td><?= $r['genre_name']; ?></td>
                    <td><?= $r['genre_desc']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
</body>
</html>