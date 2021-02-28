<?php include("topbit.php");

// Get month list from database
$month_sql="SELECT * FROM `month` ORDER BY `month`.`MonthID` ASC ";
$month_query=mysqli_query($dbconnect, $month_sql);
$month_rs=mysqli_fetch_assoc($month_query);

// Initialise form variables

$art_name = "";
$monthID = "";
$day = "";
$description = "";
$image = "";
$has_errors = "no";

// set up error field colours / visibility (no errors at first)
$art_error = $month_error = $day_error = $description_error = "no-error";

$art_field = $month_field = $day_field = $description_field = "form-ok";

// Code below executes when the form is submitted...
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get values from form...
    $art_name = mysqli_real_escape_string($dbconnect, $_POST['art_name']);
    $monthID = mysqli_real_escape_string($dbconnect, $_POST['month']);
    $day = mysqli_real_escape_string($dbconnect, $_POST['day']);
    $description = mysqli_real_escape_string($dbconnect, $_POST['description']);

    // if monthID, is not blank, get month so that month box does not lose its value if there are errors
    if ($monthID != "") {
        $monthitem_sql = "SELECT * FROM `month` WHERE `MonthID` = $monthID" ;
        $monthitem_query=mysqli_query($dbconnect, $monthitem_sql);
        $monthitem_rs=mysqli_fetch_assoc($monthitem_query);
        
        $month = $monthitem_rs['Month'];
        
    } // End monthID if
    
    $description = mysqli_real_escape_string($dbconnect, $_POST['description']);

    // error checking will go here...
    
    // Check Image
    

    
    // Check Art     Name is not blank...
        
    if ($art_name == "") {
        $has_errors = "yes";
        $art_error = "error-text";
        $art_field = "form-error";
    }
    
   if ($monthID == "") {
        $has_errors = "yes";
        $month_error = "error-text";
        $month_field = "form-error";
    }
    
    // Make sure day is less than 1 and is a number
    
    if (!is_numeric($day) || $day < 1) {
        $day_message = "Please enter a number that is 1 or more";
        $has_errors = "yes";
        $day_error = "error-text";
        $day_field = "form-error";
    }
 
    // check description is not blank / 'Description required
    
    if ($description == "") {
        $has_errors = "yes";
        $description_error = "error-text";
        $description_field = "form-error";
        $description = "";
    }

    
    
    // After post, make sure upload is valid
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submitimage"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $has_errors = "yes";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists. ";
      $has_errors = "yes";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $has_errors = "yes";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    $image = basename( $_FILES["fileToUpload"]["name"]);

    }   

    if ($image == "") {
    $has_errors = "yes";}
    // if there are no errors...
    if ($has_errors == "no") {    
       

        
    // Go to success page...
    header('Location: add_success.php');
    
    // Add entry to database
    $addentry_sql = "INSERT INTO `art_details` (`ID`, `Name`, `Image`, `MonthID`, `Day`, `Description`) VALUES (NULL, '$art_name', '$image', $monthID, $day, '$description');";
    $addentry_query=mysqli_query($dbconnect,$addentry_sql);
    
        
    // Get ID for next page
    $getid_sql = "SELECT * FROM `art_details` WHERE `Name` = '$art_name' AND `Image` = '$image'";
    $getid_query=mysqli_query($dbconnect, $getid_sql);
    $getid_rs=mysqli_fetch_assoc($getid_query);
        
    $ID = $getid_rs['ID'];
    $_SESSION['ID']=$ID;
        
    } // end of 'no errors' if
    
    

?>

<div class="box main">
    <div class="add-entry">
        <h2>Add An Entry</h2>

        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

            <!-- Art Name (Required) -->

            <div class="<?php echo $art_error; ?>">
                Please fill in the 'Art Name' field
            </div>

            <input class="add-field <?php echo $art_field; ?>" type="text" name="art_name" value="<?php echo $art_name; ?>" placeholder="Name (required)..." />

            <!-- month dropdown (required) -->

            <div class="<?php echo $month_error; ?> ">
                Please choose a month
            </div>

            <div class="<?php echo $day_error; ?>">
                <?php echo $day_message; ?>
            </div>
            <div class="flex-container">

                <select class="adv <?php echo $month_field; ?>" name="month">
                    <!-- first / selected option -->

                    <?php
                if($monthID=="") {
                    ?>
                    <option value="" selected>Month (Choose something)...</option>
                    <?php
                }
                
                else {
                    ?>
                    <option value="<?php echo $monthID?>" selected><?php echo $month; ?></option>
                    <?php
                }
                ?>


                    <!-- get options from database -->
                    <?php
                
                do {
                    ?>
                    <option value="<?php echo $month_rs['MonthID']; ?>"><?php echo $month_rs['Month']; ?></option>
                    }

                    <?php
                } // end month do loop
                while ($month_rs=mysqli_fetch_assoc($month_query))
                ?>
                </select>

                <!-- Day -->

                <input class="add-field <?php echo $day_field; ?>" type="text" name="day" value="<?php echo $day; ?>" placeholder="Day" />

            </div>

            <br />

            <!-- Description text area -->
            <div class="<?php echo $description_error; ?>">
                Please enter a valid description
            </div>

            <textarea class="add-field <?php echo $description_field; ?>" name="description" placeholder="Description..." rows="6"><?php echo $description; ?></textarea>

            <!-- File Uploader -->
            <div>
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>


            <!-- Submit Button -->
            <p>
                <input class="submit advanced-button" type="submit" value="Submit" />
            </p>
        </form>

    </div> <!-- / add-entry -->
</div> <!-- / main -->

<?php include("bottombit.php") ?>
