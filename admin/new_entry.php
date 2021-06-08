<div class="box side">
<?php

if (isset($_SESSION['admin'])) {
    echo "you are logged in";

    // get factions from database
    $all_factions_sql = "SELECT * FROM `faction` ORDER BY `Faction` ASC";
    $all_factions_query = mysqli_query($dbconnect, $all_factions_sql);
    $all_factions_rs = mysqli_fetch_assoc($all_factions_query);

    // initialise faction form
    $faction_name = "";
    $faction_description = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $faction_ID = mysqli_real_escape_string($dbconnect, $_POST['faction']);
        $_SESSION['Add_Entry']=$faction_ID;
        header('Location: index.php?page=../admin/add_entry');
    }
}

else {
    
    $login_error = 'Please log in to access this page';
    header("Location: index.php?page=../admin/login&error=$login_error");

}

?>

<h1>Add an Entry</h1>
<p><i>
    To add an entry, first select the faction, then press the 'next' button.
    If the faction is not in the list, please choose the 'New Faction' option.
</i></p>

<form method="post" enctype="mulipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?page=../admin/new_entry");?>">

    <div>
        <b>Faction:</b> &nbsp;

        <select name="faction">
            <option value="unknown" selected>New Faction</option>


            <?php

                do {
                    $faction_name = $all_factions_rs['Faction'];
                

            ?>
                <option value="<?php echo $all_factions_rs['Faction_ID']; ?>">
                    <?php echo $faction_name; ?>
                </option>
            <?php
                }
                
                while($all_factions_rs = mysqli_fetch_assoc($all_factions_query))

            ?>
        </select>

            &nbsp;
        
        <input class="short" type="submit" value="Next..." />
    </div>

</form>
</div>