<?php
require('functions.php');
$db = connect_to_db('wine_collection');
$brands = extract_brands_from_db($db);
$regions = extract_regions_from_db($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Wine to Collection</title>
    <link href="normalise.css" type="text/css" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body class = "pageContainer">
<div class = "formContainer">
    <h1>
        Add another wine to your collection!
    </h1>
    <form method="POST" action="addToDB.php">
        <label for="variety">Variety:</label>
        <br>
        <input type="text" id="variety" name="variety" placeholder="e.g. Shiraz" required>
        <br>
        <label for="tones">Tones:</label>
        <br>
        <input type="text" id="tones" name="tones" placeholder="e.g. light bodied" required>
        <br>
        <label for="brand">Brand:</label>
        <br>
        <select id="brand" name="brand" required>
            <?php
            foreach($brands as $brand){
                echo '<option value="' . $brand['id'] . '">' . $brand['nameOfBrand'] . '</option>';
            }; ?>
        </select>
        <br>
        <label for="cost">Cost £:</label>
        <br>
        <input type="number" step="0.01"  id="cost" name="cost" placeholder="e.g. 7.99"required>
        <br>
        <label for="region">Region Of Origin:</label>
        <br>
        <select id="region" name="region" required>
            <?php
            foreach($regions as $region){
                echo '<option value="' . $region['id'] . '">' . $region['region'] . '</option>';
            }; ?>
        </select>
        <br>
        <input type="submit">
    </form>

</div>
</body>
</html>