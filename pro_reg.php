<!DOCTYPE html>
<html>

<head>
    <title>project registration</title>
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Project Registration</h2>
                    <form method="post" action="insert.php">
                        <div class="row row-space">
                        <div class="input-group">
                            <label><h4>Project Name:</h4></label><br>
                            <input class="input--style-13" type="text" name="pro_title">
                        </div>
                        </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label><h4>Project Description</h4></label>
                                    <input class="input--style-1 js-datepicker" type="text"  name="pro_description">
        
                                </div>
                            </div>
                            <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <label><h4>Skill set:</h4></label>
                                        <input class="input--style-1 js-datepicker" type="text"  name="skillset">
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-2">
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <label><h4>Maximum team members:</h4></label>
                                <br>
                                <select name="team_mem" style="width: 220px">
                                    <option disabled="disabled" selected="selected">0 person</option>
                                    <option value="1">1 person</option>
                                    <option value="2">2 person</option>
                                    <option value="3">3 person</option>
                                    <option value="4">4 person</option>
                                </select>
                                </div>
                        </div>
                        </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label><h4>Start date:</h4></label>
                                    <input class="input--style-1" type="date" placeholder="REGISTRATION CODE" name="start_date">
                                </div>
                            </div>
                        <div class="col-2">
                                <div class="input-group">
                                    <label><h4>End date:</h4></label>
                                    <input class="input--style-1" type="date" placeholder="REGISTRATION CODE" name="end_date">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" name="reg_user" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>

