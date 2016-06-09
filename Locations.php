<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="IE=11.0000" http-equiv="X-UA-Compatible">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Child Welfare Services: Case Management & Residential Licensing System">
    <meta name="author" content="Wily Fox Technologies">

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

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

        });

    </script>
</head>
<body class="body-blue">
<?php
session_start();
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
                            <a class="bg-hover-color" href="login.php" id="lnkBHISAppLogout">Log
                                out</a>
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
                            <h3 class="panel-title"><i class="fa fa-location-arrow">&nbsp;</i>Children Residential facilities around current parent</h3>
                        </div>
                        <div style="padding: 20px;">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Facility Name</th>
                                    <th>Licensee</th>
                                    <th>Administrator</th>
                                    <th>Address</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                include "database.php";
                                $db = new database();

                                session_start();

                                ini_set('display_errors', 1);
                                error_reporting(E_ALL);

                                $fosterparentid = $_SESSION['LoginUserID'];

                                //echo $fosterparentid;

                                $query = "select a.FacilityID, a.FacilityName, a.Licensee, a.FacilityAdministrator, ".
                                            "concat(trim(c.AddressLine1), ' ',trim(c.AddressLine2), ', ',c.CityName,', ',c.StateCode,', ',c.PostalCode) As Address ".
                                            "from facility a inner join facilitytype b on a.facilitytypeid = b.facilitytypeid " .
                                            "inner join Address c on a.AddressID = c.AddressID where b.facilitytypeid =1  And c.postalcode = ".
	                                        " (select ad.PostalCode from fosterparent f inner join Address ad on f.Addressid	=ad.AddressID where f.FosterParentID= " . $fosterparentid . ");";

                                //echo $query;

                                if ($result = $db->query($query)) {

                                    while ($row = mysqli_fetch_assoc($result)) {

                                        echo "<tr>";
                                        echo "<th scope=\"row\">" . $row["FacilityID"] . "</th>";
                                        echo "<td>" . $row['FacilityName'] . "</td>";
                                        echo "<td>" . $row['Licensee'] . "</td>";
                                        echo "<td>" . $row['FacilityAdministrator'] . "</td>";
                                        echo "<td>" . $row['Address'] . "</td>";
                                        echo "</tr>";
                                    }
                                }

                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default" style="margin-left:15px;margin-right:20px;padding-bottom:10px;"
                         id="divManageRegistrationPanel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-location-arrow">&nbsp;</i>Foster family agency locations around current parent</h3>
                        </div>
                        <div style="padding: 20px;">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Facility Name</th>
                                    <th>Licensee</th>
                                    <th>Administrator</th>
                                    <th>Address</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php


                                ini_set('display_errors', 1);
                                error_reporting(E_ALL);

                                $fosterparentid = $_SESSION['LoginUserID'];

                                //echo $fosterparentid;

                                $query = "select a.FacilityID, a.FacilityName, a.Licensee, a.FacilityAdministrator, ".
                                    "concat(trim(c.AddressLine1), ' ',trim(c.AddressLine2), ', ',c.CityName,', ',c.StateCode,', ',c.PostalCode) As Address ".
                                    "from facility a inner join facilitytype b on a.facilitytypeid = b.facilitytypeid " .
                                    "inner join Address c on a.AddressID = c.AddressID where b.facilitytypeid =2  And c.postalcode = ".
                                    " (select ad.PostalCode from fosterparent f inner join Address ad on f.Addressid	=ad.AddressID where f.FosterParentID= " . $fosterparentid . ");";

                                //echo $query;

                                if ($result = $db->query($query)) {

                                    while ($row = mysqli_fetch_assoc($result)) {

                                        echo "<tr>";
                                        echo "<th scope=\"row\">" . $row["FacilityID"] . "</th>";
                                        echo "<td>" . $row['FacilityName'] . "</td>";
                                        echo "<td>" . $row['Licensee'] . "</td>";
                                        echo "<td>" . $row['FacilityAdministrator'] . "</td>";
                                        echo "<td>" . $row['Address'] . "</td>";
                                        echo "</tr>";
                                    }
                                }



                                ?>

                                </tbody>
                            </table>
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