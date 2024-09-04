<?php
function hide_name($name, $id) {
    $name_length = strlen($name);
    $num_to_replace = ceil($name_length * 0.33);  // Calculate 33% of the name length
//first and _ should not conveted 
    // Seed the random number generator with the ID to ensure consistency
    mt_srand($id);
    
    // Create an array of the indexes of the name
    $indexes = range(0, $name_length - 1);
    
    // Shuffle the indexes to get random positions
    shuffle($indexes);
    
    // Select the first 'n' indexes to replace with '*'
    $indexes_to_replace = array_slice($indexes, 1, $num_to_replace);
    
    // Replace the selected indexes with '*'
    foreach ($indexes_to_replace as $index) {
       
        if ($name[$index]=="_")
        {
            continue;
        }
        $name[$index] = '*';
    }
    
    // Reset the random number generator to prevent side effects
    mt_srand();
    
    return $name;
}


echo hide_name("Ru_shikesh", 3) . "<br>";    
echo hide_name("Rushikesh", 4) . "<br>";    
echo hide_name("Rushikesh", 5) . "<br>";    
echo hide_name("Rushikesh", 6) . "<br>";    
echo hide_name("Rushikesh", 4524) . "<br>"; 
echo hide_name("Rushikesh", 5465) . "<br>"; 



?>
