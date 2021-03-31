<div>
    <!-- Get faction ID and find correstponding faction -->
    <?php
        $faction_rs = searchID($dbconnect, $find_rs, 'Faction_ID', 'faction')
    ?>
    <span class="sub_heading">
        <h2><?php echo $name?></h2>
        <!-- Substitute out factionID for the corresponding faction -->
        <h6><a href="index.php?page=faction&factionID=<?php echo $find_rs['Faction_ID']; ?>"><?php echo $faction_rs['Faction']; ?></a></h6>
        
    </span>
</div> <!-- Faction -->