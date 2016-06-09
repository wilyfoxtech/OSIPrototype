<?php

include "database.php";

//phpinfo();
ini_set('display_errors', 1);
error_reporting(E_ALL);

$db = new database();

$typeid = $_GET['typeid'];//$query['typeid'];

$return_arr = array();

$query = "";
if ($typeid == "1")
    $query = "SELECT fosterparentid as id, firstname, lastname FROM fosterparent ";
else
    $query = "SELECT Caseworkerid as id, firstname, lastname FROM caseworker ";

if ($result = $db->query($query)) { //mysqli_query( $mysqli, $query )){
    while ($row = mysqli_fetch_assoc($result)) {
        $row_array['id'] = $row['id'];
        $row_array['firstname'] = $row['firstname'];
        $row_array['lastname'] = $row['lastname'];

        array_push($return_arr, $row_array);
    }
}

echo json_encode($return_arr);

?>