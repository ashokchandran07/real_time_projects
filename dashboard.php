<?php
$company_name = "";
$email    = "";
$errors = array(); 
//$_SESSION['success'] = "";

$p_name_array = [""];
$p_desc_array = [""];
$p_skills_array=[""];


// connect to database
$db = mysqli_connect('localhost', 'root', '', 'enterprise');
$query = "SELECT project_id FROM stu_skill WHERE name='ashok'";
$results = mysqli_query($db,$query) or die('Query failed: ' . mysql_error());
$query1 = "SELECT * FROM project_details WHERE project_id='$results'";
$results1 = mysqli_query($db,$query) or die('Query failed: ' . mysql_error());
if ( mysqli_num_rows($results1) > 0 ) {
		while($row = mysqli_fetch_assoc($results1)):
		{
            array_push($p_name_array,$row['project_name']);
            array_push($p_desc_array,$row['project_description']);
            array_push($p_skills_array,$row['skillset']);
        }
    endwhile;
}
$record_count=count($p_name_array);
while($record_count!=0):
    {

    }
endwhile;
?>
<html>
    <body>
        <div>
            <h4>
                Project Details
            </h4>
            <h4>
                Name:<?php 
                
                ?>
            </h4>
            <h5>
                Python project
            </h5>
            <h4>
                Prerequisites:
            </h4>
            <h5>
                Python Scripting , DBMS
            </h5>
        </div>
    </body>
</html>