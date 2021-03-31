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
                    // Get name, type and description
                    $name = preg_replace('/[^A-Za-z0-9.,\s\'\-]/', ' ', $find_rs['Name']);
                    $type_rs = searchID($dbconnect, $find_rs, 'Type_ID', 'type');
                    $description = preg_replace('/[^A-Za-z0-9.,\s\'\-]/', ' ', $find_rs['Description']);
                    
                ?>
            <!-- Results go here -->
            <div class="results">

                <!-- Echo out info-->

                <?php include("get_faction.php"); ?>
                <?php echo $type_rs['Type']; ?>
                
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
