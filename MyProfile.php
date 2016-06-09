<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="IE=11.0000" http-equiv="X-UA-Compatible">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Child Welfare Services: Case Management & Residential Licensing System">
    <meta name="author" content="Wily Fox Technologies">

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>

    <title>Child Welfare Services: Case Management & Residential Licensing System</title>
    <link href="images/CWDS.png" rel="shortcut icon"/>

    <link rel="stylesheet" href="Content/custom.css"/>
    <link href="Content/Portal.css" rel="stylesheet"/>
    <link rel="stylesheet" href="Content/bootstrap.min.css"/>
    <link href="Content/jquery-ui.min.css" rel="stylesheet"/>
    <link href="css/font-awesome.min.css" rel="stylesheet"/>

    <script type="text/javascript" src="Scripts/jquery-1.10.2.min.js"></script>
    <script src="Scripts/jquery.mask.js" type="text/javascript"></script>
    <script src="Scripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="Scripts/jquery-ui-1.11.4.min.js" type="text/javascript"></script>
    <script src="Scripts/portal.custom.js" type="text/javascript"></script>
    <script src="Scripts/Global.js" type="text/javascript"></script>
    <script src="Scripts/_extensions.js" type="text/javascript"></script>
    <script src="Scripts/jquery.validate.min.js" type="text/javascript"></script>
    <script src="Scripts/jquery.validate-vsdoc.js" type="text/javascript"></script>
    <script src="Scripts/jquery.validate.unobtrusive.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {

            $("#txtZip").mask("99999?-99999");
            $("#txtDOB").datepicker();
            //$("#txtDOB").mask('0000-00-00');


            $("#fmrRegisterParent").validate({
                submitHandler: function () {

                    var $form = $("#fmrRegisterParent");

                    var $inputs = $form.find("input, select, button, textarea");

                    var serializedData = $form.serialize();

                    $inputs.prop("disabled", true);

                    // your function if, validate is success
                    $.ajax({
                        type: "POST",
                        url: "UpdateProfile.php",
                        data: serializedData,
                        success: function (data) {
                            setFormStatusMessage('fmrRegisterParent', 'divmanageRegistration', true, 'Profile saved successfully!');

                            $inputs.prop("disabled", false);
                        }
                    });
                }
            });
        });

        function ResetRegistration() {
            window.location = "MyProfile.php";
            return false;
        }

    </script>
</head>
<body class="body-blue">
<?php

include "database.php";
$db = new database();

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);


$fosterparentid = $_SESSION['LoginUserID'];
//echo $fosterparentid;

$FirstName = "";
$LastName = "";
$EmailID = "";
$DateOfBirth = "";
$AddressLine1 = "";
$AddressLine2 = "";
$CityName = "";
$StateCode = "";
$PostalCode = "";

$query = "select a.FirstName, a.LastName, a.EmailID, a.DateOfBirth, b.AddressLine1,b.AddressLine2, b.CityName, b.StateCode, b.PostalCode " .
    "From fosterparent a inner join address b on a.AddressID = b.AddressID Where a.Fosterparentid=" . $fosterparentid . ";";

//echo $query;

if ($result = $db->query($query)) {

    $row = mysqli_fetch_assoc($result);
    $FirstName = $row["FirstName"];
    $LastName = $row["LastName"];
    $EmailID = $row["EmailID"];
    $DateOfBirth = $row["DateOfBirth"];
    $AddressLine1 = $row["AddressLine1"];
    $AddressLine2 = $row["AddressLine2"];
    $CityName = $row["CityName"];
    $StateCode = $row["StateCode"];
    $PostalCode = $row["PostalCode"];
}


?>
<div id="container">
    <div id="header">
        <div class="mini-navbar mini-navbar-dark hidden-xs ">
            <div class="customheader ">
                <div class="container-fluid" style="padding-left:5px;">
                    <div class="row no-gutters">
                        <div class="col-lg-9 col-sm-6 col-md-8 text-left">
                            <div class="apptitle">
                                <div style="width:70px;float: left;">
                                    <img style="max-height: 70px;padding-top: 5px;" src="images/cwds.png"/>
                                </div>
                                <div style="max-width: 400px;padding-top: 20px;text-align: center;">
                                <span
                                    style="font-weight: bold;font-size:16px; ;">CHILD WELFARE DIGITAL SERVICES</span><br>
                                <span
                                    style="font-weight: bold;font-size:10px; ;">CALIFORNIA HEALTH & HUMAN SERVICES</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-md-4 text-left">
                            <div class="pull-right" style="width:250px;">
                                <div class="row">
                                    <div class="col-xs-12" style="margin-top:15px;">
                                        <div style="float:right;margin-top:4px;">
                                            <div class="dropdown" style="text-align:center;font-size: medium;">
                                                Welcome:&nbsp;<span
                                                    id="spnMasterPageLoginName"><?php echo $_SESSION['LoginUserName'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark navbar-static-top .navmenu-fixed-left " role="navigation">
            <div class="container-fluid" style="padding-left:0px;">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                            <a class="bg-hover-color" href="Landing.php" id="MenuColor">Home</a>
                        </li>
                        <li class="dropdown" style="display:none;">
                            <a class="dropdown-toggle bg-hover-color" href="#" id="MenuColor" data-toggle="dropdown">Applications<b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu" id="ulApplications"></ul>
                        </li>
                        <li class="dropdown">
                            <a class="bg-hover-color" href="MyProfile.php"
                               id="MenuColor">My Profile</a>
                        </li>
                        <li class="dropdown">
                            <a class="bg-hover-color" href="Locations.php" target="_parent" id="lnkChangePassword">Locations</a>
                        </li>
                        <li class="dropdown">
                            <a class="bg-hover-color" href="Communications.php" target="_parent" id="lnkChangePassword">Communication</a>
                        </li>
                        <li class="dropdown">
                            <a class="bg-hover-color" href="login.php" id="lnkAppLogout">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="shadow" style="padding-top:0px"><img src="images/null.png"/></div>
    <div id="body">
        <div class="wrapper">
            <form method="post" class="form-horizontal" autocomplete="off" id="fmrRegisterParent"
                  name="fmrRegisterParent"
                  role="form" action="">
                <div id="divRegisterRegistration">
                    <div class="panel panel-default" style="margin-left:15px;margin-right:20px;padding-bottom:10px;"
                         id="divManageRegistrationPanel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user">&nbsp;</i>My Profile</h3>
                        </div>
                        <div class="row AppFormError" style="display:none  ;padding-left: 10px;margin-top: 10px;"
                             id="divmanageRegistration">
                            <div class="col-xs-10">
                                <div class="alert alert-success" role="alert" style="display:none;">
                                </div>
                                <div class="alert alert-danger" role="alert" style="display:none;">
                                </div>
                            </div>
                        </div>
                        <div id="dvRegistrationDetails" style="margin-left:15px;margin-right:25px;">
                            <div class="form-group">
                                <div class="col-xs-3">
                                    <label class="control-label">Email ID</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtEmailID" id="txtEmailID" type="email"
                                           value="<?php echo $EmailID; ?>"
                                           maxlength="100" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-3">
                                    <label class="control-label">First Name</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtFirstName" id="txtFirstName"
                                           value="<?php echo $FirstName; ?>"
                                           maxlength="50" required/>
                                </div>
                                <div class="col-xs-3">
                                    <label class="control-label">Last Name</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtLastName" id="txtLastName"
                                           value="<?php echo $LastName; ?>"
                                           maxlength="50" required/>
                                </div>
                                <div class="col-xs-3">
                                    <label class="control-label">Date Of Birth</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtDOB" id="txtDOB" maxlength="50"
                                           value="<?php echo $DateOfBirth; ?>"
                                           required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-3">
                                    <label class="control-label">Address Line 1</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtAddressLine1" id="txtAddressLine1"
                                           value="<?php echo $AddressLine1; ?>"
                                           required
                                           maxlength="100"/>
                                </div>
                                <div class="col-xs-3">
                                    <label class="control-label">Address Line 2</label>
                                    <input class="form-control input-sm" name="txtAddressLine2" id="txtAddressLine2"
                                           value="<?php echo $AddressLine2; ?>"
                                           maxlength="100"/>
                                </div>
                                <div class="col-xs-3">
                                    <label class="control-label">City</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtCity" id="txtCity" maxlength="100"
                                           value="<?php echo $CityName; ?>"
                                           required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-3">
                                    <label class="control-label">State Code</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtState" id="txtState" maxlength="2"
                                           value="<?php echo $StateCode; ?>"
                                           required/>
                                </div>
                                <div class="col-xs-3">
                                    <label class="control-label">Zip Code</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtZip" id="txtZip" maxlength="50"
                                           value="<?php echo $PostalCode; ?>"
                                           required/>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top:20px;margin-bottom:20px;">
                                <div class=" col-xs-4">
                                    <button type="submit" class="btn btn-primary btn-sm"
                                            id="btnSaveregistration" name="btnSaveregistration">Save
                                    </button>
                                    &nbsp;&nbsp;
                                    <button type="reset" onclick="return ResetRegistration(this.form);"
                                            class="btn btn-primary btn-sm" id="btnCancelRegistration"
                                            name="btnCancelRegistration">Reset
                                    </button>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top:20px;margin-bottom:10px;margin-left: 5px;">
                                <span
                                    style="color:red;font-weight:bold">&nbsp;*</span> Indicates required field
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="footer">
        <footer>
            <div class="row-fluid">
                <div class="col-sm-12 footer">
                    <p class="footercolor">
                        © CHHS 2016 | Version <span id="spnVersion">1.0.0.0</span>
                    </p>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
</html>