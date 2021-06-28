<?php

    // check if user is logged in...
    if (isset($_SESSION['admin']))  {

        $faction_ID = $_SESSION['Add_Entry'];
        echo "FactionID: ".$faction_ID;

        $all_types_sql = "SELECT * FROM `type` ORDER BY `Type` ASC ";
        $all_types_query = mysqli_query($dbconnect, $all_types_sql);
        $all_types_rs = mysqli_fetch_assoc($all_types_query);

        $name = "Please type the item name here";
        $description = "Please type description here";
        $type = "";

        $type_ID = 0;

        $has_errors = "no";

        $name_error = $type_error = "no-error";
        $name_field = "form-ok";

        $description_error = $type_error = "no-error";
        $description_field = "form-ok";

        $type_field = "type-ok";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = mysqli_real_escape_string($dbconnect, $_POST['name']);
            $description = mysqli_real_escape_string($dbconnect, $_POST['description']);
            $type = mysqli_real_escape_string($dbconnect, $_POST['type']);

            if ($name == "") {
                $has_errors = "yes";
                $name_error = "error-text";
                $name_field = "form-error";
            }

            if ($description == "") {
                $has_errors = "yes";
                $description_error = "error-text";
                $description_field = "form-error";
            }

            if ($has_errors != "yes")
            {
                $addentry_sql = "INSERT INTO `item_details` (`ID`, `Name`, `Faction_ID`, `Image`, `Type_ID`, `Description`) VALUES (NULL, '$name', '$faction_ID', '', '$type', '$description');";
                $addentry_query = mysqli_query($dbconnect, $addentry_sql);

                $get_entry_sql = "SELECT * FROM `item_details` WHERE `Name` = '$name'";
                $get_entry_query = mysqli_query($dbconnect, $get_entry_sql);
                $get_entry_rs = mysqli_fetch_assoc($get_entry_query);

                $entry_ID = $get_entry_rs['ID'];
                $_SESSION['Entry Success']=$entry_ID;

                header('Location: index.php?page=entry_success');

            }
        }

    }

    else {
        $login_error = 'Please log in to access this page';
        header("Location: index.php?page=../admin/login&error=$login_error");
    }
?>

<div class="box side">
    <h1>Add Entry...</h1>

    <form autocomplete="off" method="post"
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?page=../admin/add_entry");?>"
    enctype="multipart/form-data">

        <div class="<?php echo $name_error ?>">
            This field can't be blank    
        </div>

        <input class="add-field <?php echo $name_field ?>" name="name" placeholder="Name"></input>
        <br/><br />

        <textarea class="add-field <?php echo $description_field ?>" name="description" placeholder="Description" rows="5"></textarea> 

        <select class="add-field <?php echo $type_field ?>" name="type">            
            <?php

                do {
                    $type_name = $all_types_rs['Type'];
            ?>
                <option value="<?php echo $all_types_rs['Type_ID']; ?>">
                    <?php echo $type_name; ?>
                </option>
            <?php
                }
                while($all_types_rs = mysqli_fetch_assoc($all_types_query))
            ?>
                
       
        </select>

        <p>
            <input type="submit" value="Submit"/>
        </p>

    </form>

</div>