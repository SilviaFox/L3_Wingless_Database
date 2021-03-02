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
                     ?>
            <!-- Results go here -->
            <div class="results">

                <!-- Heading and subtitle -->

                <div>
                    <span class="sub_heading">
                        <h2><?php echo $find_rs['Name']; ?></h2>
                        <h6>Faction: <?php echo $find_rs['Faction']; ?></h6>
                    </span>
                </div> <!-- Title -->
                

                <hr>
                
                <div class="description">
                <?php echo $find_rs['Description']; ?>
                </div>
            </div> <!-- /results -->





            <?php
                    
                } // end results do
            
                while
                    ($find_rs=mysqli_fetch_assoc($find_query));
                    
            } // end else
            
            ?>
