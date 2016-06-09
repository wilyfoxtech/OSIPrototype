<?php
/**
 * Created by PhpStorm.
 * User: Ramachandra
 * Date: 6/5/2016
 * Time: 4:24 PM
 */

$config = parse_ini_file('./config.ini');
$mysqli = new mysqli($config['host'],$config['user'],$config['password'],$config['dbname']);

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

$errors = array(); //To store errors
$form_data = array(); //Pass back the data to `form.php`

if (empty($_POST['ddlCaseWorker'])) {
    $errors['ddlCaseWorker'] = 'Please select case worker';
}

if (empty($_POST['txtMessage'])) {
    $errors['txtMessage'] = 'Message cannot be blank';
}

if (!empty($errors)) { //If errors in validation
    $form_data['success'] = false;
    $form_data['errors'] = $errors;
} else { //If not, process the form, and return true on success


    /* check connection */
    if (mysqli_connect_errno($mysqli)){
        $errors['MysqlConnectError'] = "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {

        $caseworkerid = $_POST['ddlCaseWorker'];
        $fosterparentid = $_SESSION['LoginUserID'];
        $newdate = date("y-m-d");

        $typeid = $_POST['txttype'];

        if ($typeid == 'p') {
            $sql = "INSERT INTO fosterparentcaseworkermessage (CaseWorkerID, FosterParentID, MessageText,MessageDate)" .
                "VALUES (" . $caseworkerid . "," . $fosterparentid . ",'" . $mysqli->real_escape_string($_POST['txtMessage']) . "','" . $newdate . "')";
        } else {
            $sql = "INSERT INTO fosterparentcaseworkermessage (CaseWorkerID, FosterParentID, MessageText,MessageDate)" .
                "VALUES (" . $fosterparentid . "," . $caseworkerid . ",'" . $mysqli->real_escape_string( $_POST['txtMessage']) . "','" . $newdate . "')";
        }
        //echo $sql;
        if ($mysqli->query($sql) === TRUE) {
            $form_data['savesuccess'] = "New record created successfully";
        } else {
            $form_data['saveerror'] = "Error: " . $sql . "<br>" . $mysqli->error;
        }

        $form_data['success'] = true;
        $form_data['posted'] = 'Data Was Posted Successfully';
    }

}

//Return the data back to form.php
echo json_encode($form_data);

?>