<?php include("head.php") ?>

    <div class="wrapper">
    
        <?php include("top.php") ?>
    
        <?php 
            if(!isset($_REQUEST['page'])) { //Checks if page is null
                include("content/main.php"); // Include main page if null
            } // End of if statement that include home page
            else {
                $page = preg_replace('/[^0-9a-zA-Z]-/','',$_REQUEST['page']); 
                include("content/$page.php"); // Include page
            } // End of else that includes requested content

        ?>
        
        <?php include("bottombit.php") ?>

    </div> <!-- / wrapper -->
    
</body>