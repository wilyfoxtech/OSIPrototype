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
    <link href="/images/CWDS.png" rel="shortcut icon"/>

    <link rel="stylesheet" href="Content/custom.css"/>
    <link href="Content/Portal.css" rel="stylesheet"/>
    <link rel="stylesheet" href="Content/bootstrap.min.css"/>
    <link href="Content/jquery-ui.min.css" rel="stylesheet"/>
    <link href="css/font-awesome.min.css" rel="stylesheet"/>

    <script src="Scripts/jquery-1.10.2.min.js" crossorigin="anonymous"></script>
    <script src="Scripts/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="Scripts/jquery-ui-1.11.4.min.js"></script>
    <script src="Scripts/portal.custom.js"></script>
    <script src="Scripts/Global.js"></script>

    <script>

        $(document).ready(function () {
            LoadUserTypes();
        })

        function setsession()
        {
            $('#btnLogin').prop("disabled", true);

            $.ajax({
                type: "GET",
                    url: "SetSession.php?typeid=" + $('#ddlLoginType').val() + '&userid=' + $('#ddlLoginUsers').val() + '&name=' + $("#ddlLoginUsers option:selected").text(),
                dataType: "JSON",
                success: function (jsondata) {

                    if($('#ddlLoginType').val()==1)
                        window.location='landing.php';
                    else
                        window.location='caseworkerlanding.php';

                    $('#btnLogin').prop("disabled", false);
                }
            });


            return false;
        }

        function LoadUserTypes() {
            $('#btnLogin').prop("disabled", true);

            $.ajax({
                type: "GET",
                url: "Getusers.php?typeid=" + $('#ddlLoginType').val(),
                dataType: "JSON",
                success: function (jsondata) {

                    // AppAdminFillDefaultEntryForDropdown($('#ddlLoginUsers'));

                    if ($('#ddlLoginUsers') != null) {
                        $('#ddlLoginUsers').html('');
                    }

                    for (var i = 0; i < jsondata.length; i++) {
                        var newOption = "<option value='" + jsondata[i].id + "'>" + jsondata[i].firstname + ' ' + jsondata[i].lastname
                            + "</option>";
                        $("#ddlLoginUsers").append(newOption);
                    }

                    $('#btnLogin').prop("disabled", false);
                }
            });
        }

    </script>

</head>

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
        <div class="wrapper" style="min-height:400px;">
            <div class="form-group col-xs-4 AppNoNewRow" style="min-height:inherit;">
                <div class="panel panel-default" id="divmessagepanel" style="min-height:inherit;">
                    <div class="panel-heading">
                        <h3 class="panel-title">What's new</h3>
                    </div>
                    <div class="panel-body">
                        <p>Welcome to Case Management & Residential Licensing System hosted by California Helath & Human
                            Services</p>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="form-group col-xs-4 AppNoNewRow" style="min-height:inherit;">
                <div class="panel panel-default" id="divlinkpanel" style="min-height:inherit;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Links</h3>
                    </div>
                    <div class="panel-body">
                        <p><a href="http://www.chhs.ca.gov/" target="_blank">CHHS</a></p>
                    </div>
                </div>
            </div>
            <div class="form-group col-xs-4 AppNoNewRow" style="min-height:inherit;" style="min-height:400px;">
                <div class="panel panel-default" id="divloginpanel" style="min-height:inherit;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Log in</h3>
                    </div>
                    <div class="panel-body" style="float:none;">
                        <form method="post" autocomplete="off" id="frmLogin" name="frmLogin" role="form"
                              action="SetSession.php">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <p class="help-block">
                                        For demonstration purpose and ease of use, user-name and passwords have been
                                        replaced
                                        with user-types
                                    </p>
                                </div>
                                <div class="col-xs-12">
                                    <label class="control-label">User Type</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <select name="ddlLoginType" id="ddlLoginType" class="form-control input-sm" onchange="LoadUserTypes();">
                                        <option value="1">Foster Parent</option>
                                        <option value="2">Case Worker</option>
                                    </select>
                                </div>
                                <div class="col-xs-12" style="margin-top: 5px;margin-bottom: 20px;">
                                    <label class="control-label">Select user</label><span
                                        style="color:red;font-weight:bold">&nbsp;*</span>
                                    <select id="ddlLoginUsers" name="ddlLoginUsers" class="form-control input-sm"></select>
                                </div>
                            </div>
                            <div class="form-group" style="padding-bottom:5px;">
                                <div class="col-xs-7 col-xs-offset-5">
                                    <button type="submit" class="btn btn-primary" onclick="return setsession();"
                                            id="btnLogin" name="btnLogin">Log In
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="form-group" style="margin-top:5px;">
                            <div class="col-xs-11 col-xs-offset-1" style="padding-top: 10px;">
                                <div style="width:100%;text-align:center;">
                                    <a href="#" target="_parent" style="cursor: not-allowed;"
                                       id="lnkForgotPassword">Forgot Password or Username?</a><br>
                                    <a href="RegisterParent.php" target="_parent"
                                       id="lnkForgotPassword">New foster parent? Register here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

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
<script type="text/javascript">

    $(document).ready(function () {

    });


</script>