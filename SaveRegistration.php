<?php
/**
 * Created by PhpStorm.
 * User: Ramachandra
 * Date: 6/5/2016
 * Time: 4:24 PM
 */
/*
ini_set('display_errors',1);
error_reporting(E_ALL);
*/
$errors = array(); //To store errors
$form_data = array(); //Pass back the data to `form.php`

if (empty($_POST['txtEmailID'])) {
    $errors['txtEmailID'] = 'EmailID cannot be blank';
}

if (empty($_POST['txtFirstName'])) {
    $errors['txtFirstName'] = 'First name cannot be blank';
}

if (empty($_POST['txtLastName'])) {
    $errors['txtLastName'] = 'Last name cannot be blank';
}

if (empty($_POST['txtDOB'])) {
    $errors['txtDOB'] = 'Date of birth cannot be blank';
}

if (!empty($errors)) { //If errors in validation
    $form_data['success'] = false;
    $form_data['errors']  = $errors;
}
else { //If not, process the form, and return true on success

    $mysqli = new \mysqli("localhost", "root", "Change12!", "fostercare") or die(mysqli_error());

    /* check connection */
    if (mysqli_connect_errno($mysqli))
    {
        $errors['MysqlConnectError'] =  "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else {

        $stmt = $mysqli->prepare("call AddUpdateFosterparent(?,?,?,?,?,?,?,?,?,@Status,@NewID)");
        $FosterParentID = 0;
        $txtFirstName = $_POST['txtFirstName'];
        $LastName = $_POST['txtLastName'];
        $DOB = $_POST['txtDOB'];
        $txtAddressLine1 = $_POST['txtAddressLine1'];
        $txtAddressLine2 = $_POST['txtAddressLine2'];
        $txtCity = $_POST['txtCity'];
        $txtState = $_POST['txtState'];
        $txtZip = $_POST['txtZip'];

        $stmt->bind_param("issssssss", $FosterParentID, $txtFirstName, $LastName, date ("Y-m-d H:i:s", $DOB) , $txtAddressLine1, $txtAddressLine2, $txtCity, $txtState, $txtZip);
        $stmt->execute();

        $select = $mysqli->query('SELECT @Status, @NewID');
        $result = $select->fetch_assoc();
        $procOutput_status = $result['@Status'];
        $procOutput_NewID = $result['@NewID'];
        /*
        $form_data['FPID'] = $FosterParentID;
        $form_data['FN'] = $txtFirstName;
        $form_data['LN'] = $LastName;
        $form_data['DOB'] = $DOB;
        $form_data['AL1'] = $txtAddressLine1;
        $form_data['Al2'] = $txtAddressLine2;
        $form_data['City'] = $txtCity;
        $form_data['State'] = $txtState;
        $form_data['Zip'] = $txtZip;
        $form_data['Status'] = $procOutput_status;
        $form_data['newID'] = $procOutput_NewID;
        */

        $form_data['success'] = true;
        $form_data['posted'] = 'Data Was Posted Successfully';
        $form_data['newID'] = $procOutput_NewID;
    }

}

//Return the data back to form.php
echo json_encode($form_data);

?>