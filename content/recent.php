<?php

    $find_sql = "SELECT * FROM `item_details`
    ORDER BY `item_details`.`ID` DESC
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>


<div class="box side">
    <h2>Recent Additions</h2>
    <h4>Found <?php echo($count) ?> results</h4>
</div>

<div class="box main">

    <?php include ("results.php") ?>

</div>

<?php include("bottombit.php"); ?>
