<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Tel</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include('DbConnect.php');
            $singleton = DbConnect::getInstance();
            
            $stmt = $singleton->prepare("SELECT * FROM users");
            $stmt->execute();  
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['tel']; ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
