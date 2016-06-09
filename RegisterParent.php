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

            $("#txtZip").mask("99999?-99999");
            $("#txtDOB").datepicker();
            $("#txtDOB").mask('00/00/0000');
/*
            $('#txtEmailID').val('ram@r.com');
            $('#txtFirstName').val('ram');
            $('#txtLastName').val('mala');
            $('#txtDOB').val('01/01/1982');
            $('#txtAddressLine1').val('1615');
            $('#txtCity').val('folsom');
            $('#txtState').val('CA');
            $('#txtZip').val('95630');
*/
            $("#fmrRegisterParent").validate({
                submitHandler : function () {

                    var $form = $("#fmrRegisterParent");

                    var $inputs = $form.find("input, select, button, textarea");

                    var serializedData = $form.serialize();

                    $inputs.prop("disabled", true);

                    // your function if, validate is success
                    $.ajax({
                        type : "POST",
                        url : "SaveRegistration.php",
                        data : serializedData,
                        success : function (data) {//alert(data);
                                setFormStatusMessage('fmrRegisterParent','divmanageRegistration', true, 'Foster parent registered successfully! Click on Back button to navigate back to login page now.');
                                $('#btnbackFromRegistration').prop("disabled", false);
                        }
                    });
                }
            });
        });

        function ResetRegistration() {
            Clear_Form('fmrRegisterParent');
            return false;
        }

        function BackFromRegistration() {

            window.location.href='login.php';

            return false;
        }
    </script>
</head>
<body class="body-blue">
<div id="container">
    <div class="mini-navbar mini-navbar-dark hidden-xs" id="header">
        <div class="customheader">
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
                </div>
            </div>
        </div>
    </div>
    <div class="shadow" style="padding-top:0px"><img src="images/null.png"/></div>
    <div id="body">
        <div class="wrapper">
            <form method="post" class="form-horizontal" autocomplete="off" id="fmrRegisterParent" name="fmrRegisterParent"
                  role="form" action="SaveRegistration.php">
                <div id="divRegisterRegistration">
                    <div class="panel panel-default" style="margin-left:15px;margin-right:20px;padding-bottom:10px;"
                         id="divManageRegistrationPanel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user-plus">&nbsp;</i>Register new foster parent</h3>
                        </div>
                        <div class="row" style="padding-top:10px;padding-left: 10px;">
                            <div class="col-xs-8">
                                <div class="alert alert-info" role="alert">
                                    * Your email-id will be used as your user-name.<br/>
                                    * Once your registration is successful, you will receive an email with temporary
                                    password which you can reset after login.
                                </div>
                            </div>
                        </div>
                        <div class="row AppFormError" style="display:none  ;padding-left: 10px;" id="divmanageRegistration">
                            <div class="col-xs-8">
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
                                    <input class="form-control input-sm" name="txtEmailID" id="txtEmailID" type="email" maxlength="100" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-3">
                                    <label class="control-label">First Name</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtFirstName" id="txtFirstName" maxlength="50" required/>
                                </div>
                                <div class="col-xs-3">
                                    <label class="control-label">Last Name</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtLastName" id="txtLastName" maxlength="50" required/>
                                </div>
                                <div class="col-xs-3">
                                    <label class="control-label">Date Of Birth</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtDOB" id="txtDOB" maxlength="50" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-3">
                                    <label class="control-label">Address Line 1</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtAddressLine1" id="txtAddressLine1" required
                                           maxlength="100"/>
                                </div>
                                <div class="col-xs-3">
                                    <label class="control-label">Address Line 2</label>
                                    <input class="form-control input-sm" name="txtAddressLine2" id="txtAddressLine2"
                                           maxlength="100"/>
                                </div>
                                <div class="col-xs-3">
                                    <label class="control-label">City</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtCity" id="txtCity" maxlength="100" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-3">
                                    <label class="control-label">State Code</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtState" id="txtState" maxlength="2" required/>
                                </div>
                                <div class="col-xs-3">
                                    <label class="control-label">Zip Code</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <input class="form-control input-sm" name="txtZip" id="txtZip" maxlength="50" required/>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top:20px;margin-bottom:20px;">
                                <div class=" col-xs-4">
                                    <button type="submit"  class="btn btn-primary btn-sm"
                                            id="btnSaveregistration" name="btnSaveregistration">Save
                                    </button>
                                    &nbsp;&nbsp;
                                    <button type="reset" onclick="return ResetRegistration(this.form);"
                                            class="btn btn-primary btn-sm" id="btnCancelRegistration" name="btnCancelRegistration">Reset
                                    </button>
                                    &nbsp;&nbsp;
                                    <button type="button" onclick="return BackFromRegistration(this.form);"
                                            class="btn btn-primary btn-sm" id="btnbackFromRegistration" name="btnbackFromRegistration">Back
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