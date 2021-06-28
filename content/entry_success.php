<?php

    // Get variables
    $entry_ID=$_SESSION['Quote_Success'];

    // Find items
    $find_sql = "SELECT * FROM `item_details` WHERE `ID` = $entry_ID";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>


<div class="box side">
    <h2>Your entry has been added to the Database.</h2>
    <h4>You have archived this entry into the library:</h4>
</div>

<div class="box main">

    <?php include ("results.php") ?>

</div>

<?php include("bottombit.php"); ?>
