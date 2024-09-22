<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Tel</th>
                <th>Manage</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include_once('UsersModel.php');

            $model = new UsersModel;
            $users = $model->getUsers();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $model->delete($id);
                echo '<script>alert("Successfully deleted!");</script>';
            }

            while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['tel'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                        <form method="POST">
                            <input name="id" style="display: none;" value="<?php echo $row['id'] ?>">
                            <button type="submit" id="deleteButton">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>

</body>

</html>