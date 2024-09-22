<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>

<body>

    <?php
    include('UsersModel.php');

    $model = new UsersModel;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $user = $model->getById($id)->fetch(PDO::FETCH_ASSOC);
    }


    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $id = $_POST['id'];



        $model->postUser($name, $tel, $id);
    }
    ?>

    <form method="POST">
        <div>
            <label>Name</label>
            <input name="name" value="<?php echo $user['name'] ?>"></input>
        </div>
        <div>
            <label>Tel</label>
            <input name="tel" value="<?php echo $user['tel'] ?>"></input>
        </div>
        <div style="display: none;">
            <label>id</label>
            <input name="id" value="<?php echo $user['id'] ?>"></input>
        </div>
        <button type="submit">Submit</button>

    </form>

</body>

</html>