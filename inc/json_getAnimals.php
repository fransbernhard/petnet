<?php

$search_query = isset($_GET['s']) ? $_GET['s'] : '';
$esc_like = '%' . $search_query . '%';


try{
// anslut
	$dbh = new PDO(
		"mysql:host=127.0.0.1;dbname=wp_animals",
		"root",
		"root"
	);
	// set errormode (här kan vi välja annan felhantering om vi vill)
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// vi ser till att vi MySQL använder UTF-8 vid läsning av queries (betänk "SELECT * FROM table WHERE namn = 'Östen'")
	$dbh->exec("SET CHARACTER SET utf8");
	// om något går fel i anslutningen
}catch(PDOException $e) {
	// fångar vi felet här, och kan skriva ut info om vi vill
	echo $e->getMessage();
	exit();
}


$preparedQuery = $dbh -> prepare(
	"SELECT
	*
	FROM animals
	ORDER BY post_date;"
);
$preparedImgsQuery = $dbh -> prepare(
	"SELECT
	*
	FROM animals_images
	ORDER BY post_id;"
);

$animals = [];
$images = [];

$preparedQuery->execute();
$preparedImgsQuery->execute();

$animalResult = $preparedQuery->fetchAll(PDO::FETCH_ASSOC);
$imgsResult = $preparedImgsQuery->fetchAll(PDO::FETCH_ASSOC);

// var_dump($animalResult);
// exit();

foreach($animalResult as $animal) {

	$excl = array('description', 'birthdate', 'price', 'city');

    $meta = $animal['meta_key'];
    $meta_value = $animal['meta_value'];

    $animal_id = $animal['post_id'];
    $animals[$animal_id]['id'] = $animal['post_id'];
    $animals[$animal_id]['title'] = $animal['post_title'];
    $animals[$animal_id]['date'] = $animal['post_date'];
    $animals[$animal_id]['user'] = $animal['user_nicename'];



    if( !in_array($meta, $excl) ) {
    	$value = $meta_value;
    	if( $meta == 'catbreed' || $meta == 'dogbreed') {
			$value = unserialize($meta_value);
		}

    	$tags = array(
    		'name' => $meta,
    		'value' => $value,
    	);
    	$animals[$animal_id]['tags'][] = $tags;

    } else {
    	if( $meta == 'city' ) {
			$meta_value = unserialize($animal['meta_value']);
		}

    	$animals[$animal_id][$meta] = $meta_value;

    }

}
// var_dump($animals);
// exit();

foreach ($animals as $animal) {
    foreach($imgsResult as $image) {
        //$image = get_object_vars($image);
        $image_parent_id = $image['post_id'];
        $animal_id = $animal['id'];

        if ($animal_id === $image_parent_id) {
            $animals[$animal_id]['img'][] = $image['image_url'];
        }
    }
}


ob_clean();

header('Content-type:application/json;charset=utf-8');

echo(json_encode(array_values($animals)));


if( json_last_error() !== 0 ){
	ob_clean();
	echo json_encode(
		array(
			'error' => json_last_error_msg() )
		);
}
