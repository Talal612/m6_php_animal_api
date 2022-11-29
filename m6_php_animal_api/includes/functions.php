<?php
define('ANIMALS_API_URL', 'https://zoo-animal-api.herokuapp.com/animals/rand');
function ani_redirect($path)
{
    header("location:$path");
    exit();
}


function create_animals($num)
{
    for ($i = 0; $i < $num; $i++) {
        $animals_array[] = json_decode(file_get_contents(ANIMALS_API_URL));
    }
    file_put_contents('./local_data/animals.json', json_encode($animals_array));
    return $animals_array = json_decode(file_get_contents('./local_data/animals.json'));
}

function get_animals()
{
    if (file_exists('./local_data/animals.json') && !empty('./local_data/animals.json'))
        return $animals_array = json_decode(file_get_contents('./local_data/animals.json'));
    else
        return  create_animals(20);
}


function echo_page_title()
{
    foreach (json_decode(file_get_contents('./local_data/menu.json')) as $item) {
        if (strpos($_SERVER['SCRIPT_FILENAME'], $item->script_name)) {
            $page_title = $item->title;
            return $page_title;
        }
    }
}