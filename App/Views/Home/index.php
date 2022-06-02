<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
    </head>
    <body>
        <h1>Welcome <?php echo htmlspecialchars($name) ?></h1>
        <p>Hello from the view!</p>

        <ul>
            <?php foreach($colours as $colour): ?>
            <li><?php echo htmlspecialchars($colour)?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>
