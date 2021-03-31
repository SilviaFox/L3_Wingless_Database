<?php

    // Get variables
    $item_name = $_POST['item_name'];
    $item_faction = $_POST['item_faction'];

    // Find items
    $find_sql = "SELECT * FROM `item_details`
    WHERE `Name` LIKE '%$item_name%'
    AND `Faction_ID` LIKE '%$item_faction%'
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>


<div class="box side">
    <h2>Database</h2>
    <h4>Found <?php echo($count) ?> results</h4>
</div>

<div class="box main">

    <?php include ("results.php") ?>

</div>

<?php include("bottombit.php"); ?>
