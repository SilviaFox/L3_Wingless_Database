<?php include("topbit.php");

    $item_name = mysqli_real_escape_string($dbconnect, $_POST['item_name']);
    $item_faction = mysqli_real_escape_string($dbconnect, $_POST['item_faction']);
    

    $find_sql = "SELECT * FROM `item_details` 
    WHERE `Name` LIKE '%$item_name%'
    WHERE `Faction` LIKE '%$item_faction%'
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>

        <div class="box main">
            <h2>Advanced Results</h2>
            
            <?php 
            include ("results.php")
            ?>
            
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>