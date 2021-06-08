<?php

    // check if user is logged in...
    if (isset($_SESSION['admin']))  {

        $faction_ID = $_SESSION['Add_Entry'];
        echo "FactionID: ".$faction_ID;

        $all_types_sql = "SELECT * FROM `type` ORDER BY `Type` ASC ";
        $all_types = autocomplete_list($dbconnect, $all_types_sql, 'Type');

        $name = "Please type the item name here";
        $description = "";
        $type = "";

        $type_ID = 0;

        $has_errors = "no";

        $name_error = $type_error = "no-error";
        $name_field = "form-ok";
        $type_field = "type-ok";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = mysqli_real_escape_string($dbconnect, $_POST['name']);

            if ($name == "Please type your quote here") {
                $has_errors = "yes";
                $name_error = "error-text";
                $name_field = "form-error";
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
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."../admin/add_entry");?>"
    enctype="multipart/form-data">

        <div class="<?php echo $name_error ?>">
            This field can't be blank    
        </div>

        <textarea class="add-field <?php echo $name_field ?>" name="name" rows="1"><?php echo $name; ?></textarea>
        <br/><br />

        <p>
            <input type="submit" value="Submit"/>
        </p>

    </form>
</div>