<?php

    if(!isset($_REQUEST['factionID']))
    {
        header('Location: index.php');
    }

    // Get the faction to find from what the user clicked
    $faction_to_find = $_REQUEST['factionID'];

    // Search for that faction ID
    $find_sql = "SELECT * FROM `item_details`
    JOIN faction ON (`faction`.`Faction_ID` = `item_details`.`Faction_ID`)
    WHERE `item_details`.`Faction_ID` = $faction_to_find";

    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>

<div class="box main">

    <?php include ("results.php") ?>

</div>

<div class="box side">
    <!-- Include the faction name -->
    <h2><?php echo $faction_rs['Faction']; ?></h2>
    <h4>Found <?php echo $count ?> results</h4>
    <br>
    <p><?php echo $faction_rs['Faction_Description'] ?></p>
</div>

<?php include("bottombit.php"); ?>
