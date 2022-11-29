<?php
if (empty($_GET['id'])) {
    die('you are trying to access this script directly');
}
include './includes/functions.php';
$animal_id = $_GET['id'];


$animals = json_decode(file_get_contents('./local_data/animals.json'));

$fav_animal = array_filter($animals, function ($item) use ($animal_id) {
    return $item->id == $animal_id;
});

if (empty($fav_animal))
    die('You are trying to access an animal that is not existed in our DataBase.');

$fav_animals = json_decode(file_get_contents('./local_data/fav_animals.json'));
$fav_animal = $fav_animal[array_key_first($fav_animal)];

foreach ($fav_animals as $animal) {
    if ($animal->id == $fav_animal->id) {
        die('You are trying to add the same animal');
    }
}



$fav_animals[] = $fav_animal;
file_put_contents('./local_data/fav_animals.json', json_encode($fav_animals));

ani_redirect("./fav_animals.php");