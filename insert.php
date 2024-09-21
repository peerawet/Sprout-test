<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>

<body>

    <?php
    include('DbConnect.php');


    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name = $_POST['name'];
        $tel = $_POST['tel'];

        $singleton = DbConnect::getInstance();

        $stmt = $singleton->prepare("INSERT INTO users (name, tel) VALUES (:name, :tel)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':tel', $tel);

        // Execute the statement
        if ($stmt->execute()) {
            echo '<script>alert("Data inserted successfully")</script>';
        } else {
            echo '<script>alert("Failed to insert data")</script>';
        }
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