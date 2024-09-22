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


    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name = $_POST['name'];
        $tel = $_POST['tel'];

        $model = new UsersModel;

        $model->postUser($name, $tel);
    }
    ?>

    <form method="POST">
        <div>
            <label>Name</label>
            <input name="name"></input>
        </div>
        <div>
            <label>Tel</label>
            <input name="tel"></input>
        </div>
        <button type="submit">Submit</button>

    </form>

</body>

</html>