<?php
require('functions.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wine</title>
    <link href="normalise.css" type="text/css" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="titleBar">
    <div>
        <h1>Wine Collection</h1>
        <p>Let's make some pour decisions!</p>
    </div>
    <a href="addNewWine.php">Add more Wine</a>
</div>

<div class="container">
    <?php
    $db = connect_to_db('wine_collection');
    $wines = extract_from_db($db);
    echo addItemToHTML($wines);
    ?>


</div>
</body>


</html>