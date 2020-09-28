
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wine</title>

</head>
<body>
<div class="titleBar">
    <h1>Let's make some pour decisions!</h1>
</div>

<div class="container">
    <?php
    $db = new PDO('mysql:host=db;dbname=wineCollection', 'root', 'password'); //initialise the db connection
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $query = $db->prepare('SELECT `variety`, `tones`, `cost`, `nameOfBrand`, `country`, `wine`.`img_location` FROM `wine` JOIN `brands` ON `wine`.`brand_id` = `brands`.`id` JOIN `country` ON `wine`.`country_of_origin`=`country`.`id`;');
    $query->execute();
    $wines=$query->fetchAll();

    foreach($wines as $wine){
        $variety = $wine['variety'];
        $tones = $wine['tones'];
        $cost = $wine['cost'];
        $brand = $wine['nameOfBrand'];
        $country = $wine['country'];
        $img_location = $wine['img_location'];
        ?>
        <div class = "itemContainer">
            <h2>Variety: <?php echo $variety?></h2>
            <p>Brand: <?php echo $brand?></p>
            <p>Cost: <?php echo $cost?></p>
            <p>Country of Origin: <?php echo $country?></p>
            <p>Tones: <?php echo $tones?></p>
            <div class="itemImg">
                <img src="<?php echo $img_location?>" alt="image of wine">
            </div>
        </div>



        <?php
    }
    ?>
</div>
</body>


</html>