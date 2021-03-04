<?php include("head.php") ?>


<div class="wrapper">
    
    <?php include("top.php") ?>

        <div class="box main">
            <div class="keyart">
                <img height="600px" src="images/Char_wingless.png">
            </div>
        </div> <!-- / main -->
    
        <div class="box side">
            <h2>Database</h2>
            <p>Search the database for information about the wasteland.</p>
            
            <form class="searchform" method="post" action="search_name.php" enctype="multipart/form-data">
            
                <input class="search" type="text" name="item_name" size="30" value="" placeholder="Item Name..."/>
                <br>
                <input class="search" type="text" name="item_faction" size="30" value="" placeholder="Faction"/>
                
                <p>
                <input class="submit advanced-button" type="submit" value="Submit" />
                </p>
                
            </form>
        </div> <!-- / side bar -->
        
        <?php include("bottombit.php") ?>

</div> <!-- / wrapper -->

</body>