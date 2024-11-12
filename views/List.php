<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        <?php foreach ($products as $key => $value) { ?>
            <tr>
                <td><?php echo $value['product_id']; ?></td>
                <td><?php echo $value['product_name']; ?></td>
                <td><?php echo $value['product_price']; ?></td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>