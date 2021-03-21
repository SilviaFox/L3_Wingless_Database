            <?php
            
            if($count < 1) {
                
                ?>

            <div class="error">

                Sorry! There are no results that match your search.
                Please use the search bar in the side bar to try again

            </div> <!-- end error -->

            <?php
            }
            
            else {
                do {
                    $name = preg_replace('/[^A-Za-z0-9.,\s\'\-]/', ' ', $find_rs['Name']);
                    $description = preg_replace('/[^A-Za-z0-9.,\s\'\-]/', ' ', $find_rs['Description']);
                ?>
            <!-- Results go here -->
            <div class="results">

                <!-- Heading and subtitle -->

                <div>
                    <!-- Get faction ID and find correstponding faction -->
                    <?php $factionID = $find_rs['Faction_ID'];
                        $faction_sql = "SELECT * FROM `faction` WHERE `Faction_ID` = $factionID";
                        $faction_query = mysqli_query($dbconnect, $faction_sql);
                        $faction_rs = mysqli_fetch_assoc($faction_query);
                    ?>
                    <span class="sub_heading">
                        <h2><?php echo $name?></h2>
                        <!-- Substitute out factionID for the corresponding faction -->
                        <h6><a href="index.php?page=author&authorID=<?php echo $factionID; ?>"><?php echo $faction_rs['Faction']; ?></a></h6>
                    </span>
                </div> <!-- Title -->
                

                <hr>
                
                <div class="description">
                    <?php echo $description; ?>
                </div>
                <hr>
            </div> <!-- /results -->





            <?php
                    
                } // end results do
            
                while
                    ($find_rs=mysqli_fetch_assoc($find_query));
                    
            } // end else
            
            ?>
