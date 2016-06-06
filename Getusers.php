<?php

//phpinfo();
ini_set('display_errors',1);
error_reporting(E_ALL);
$mysqli = new \mysqli("localhost", "root", "Change12!", "fostercare") or die(mysqli_error());

/* check connection */
if (mysqli_connect_errno($mysqli))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    return false;
}

//$parts = parse_url($url);
//parse_str($parts['query'], $query);

$typeid = $_GET['typeid'] ;//$query['typeid'];

$return_arr = array();

$query ="";
if($typeid=="1")
    $query = "SELECT fosterparentid as id, firstname, lastname FROM fosterparent ";
else
    $query = "SELECT Caseworkerid as id, firstname, lastname FROM caseworker ";

if ($result = mysqli_query( $mysqli, $query )){
    while ($row = mysqli_fetch_assoc($result)) {
        $row_array['id'] = $row['id'];
        $row_array['firstname'] = $row['firstname'];
        $row_array['lastname'] = $row['lastname'];

        array_push($return_arr,$row_array);
    }
}

/*
if ($result = $mysqli->query($query)) {

    while ($row = $result->fetch_row()) {
        $row_array['id'] = $row[0];
        $row_array['firstname'] = $row[1];
        $row_array['lastname'] = $row[2];

        array_push($return_arr,$row_array);
    }


    while($message = $result->fetch_assoc()){
        $return_arr[] = $message;
    }
    //$return_arr = mysqli_fetch_all ($result, MYSQLI_ASSOC);

    $result->close();
}*/

/* close connection */
$mysqli->close();
//print_r($return_arr);
echo json_encode($return_arr);

?>