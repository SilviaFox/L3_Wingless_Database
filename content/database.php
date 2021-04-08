<div class="box side">
    <h2>Database</h2>
    <p>Search the database for information about the wasteland.</p>

    <form class="searchform" method="post" action="index.php?page=advanced" enctype="multipart/form-data">

        <input class="search" type="text" name="item_name" size="30" value="" placeholder="Item Name..." />
        <br>

        <p>
            <select class="search" name="item_faction">

                <option value="" selected>Faction...</option>

                <!-- Get options from database -->
                <?php
                    // Select from the faction table, ordered by ID
                    $faction_sql="SELECT * FROM `faction` ORDER BY `Faction_ID` ASC";
                    $faction_query=mysqli_query($dbconnect, $faction_sql);
                    $faction_rs=mysqli_fetch_assoc($faction_query);
                
                    do{
                        ?>
                <!-- Value is the ID of the faction, echo out the name of the faction -->
                <option value="<?php echo $faction_rs['Faction_ID']; ?>"><?php echo $faction_rs['Faction']; ?></option>

                <?php
                    }   // end faction do loop
                
                while ($faction_rs=mysqli_fetch_assoc($faction_query))
                
                ?>

            </select>
            <br>
            <input class="submit advanced-button" type="submit" value="Submit" />
        </p>

    </form>
        <h3><a href="index.php?page=random">Random</a> | <a href="index.php?page=recent">Recent</a></h3>
    
</div> <!-- / side bar -->


<div class="box main">
    <div class="keyart">
        <img height="600px" src="images/Char_wingless.png">
    </div>
</div> <!-- / main -->