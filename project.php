<?php
$company_name = "";
$email    = "";
$errors = array(); 
//$_SESSION['success'] = "";

$p_name_array = [""];
$p_desc_array = [""];
$p_skills_array=[""];


// connect to database
$db = mysqli_connect('localhost', 'root', '', 'ucproject');
//$query = "SELECT project_id FROM stu_skill WHERE name='ashok'";
//$results = mysqli_query($db,$query) or die('Query failed: ' . mysql_error());
//$value = mysqli_fetch_assoc($results);
$value=4;
//echo $result."Result value";
$query1 = "SELECT * FROM project_details WHERE project_id='$value'";
$results1 = mysqli_query($db,$query1) or die('Query failed: ' . mysql_error());
if ( ($c = mysqli_num_rows($results1)) > 0 ) {
   // echo "number of rows = ".$c;
		while($row = mysqli_fetch_assoc($results1)):
		{
            $p_name = $row['project_name'];
            $p_desc = $row['project_description'];
            $p_skill = $row['skillset'];
            //array_push($p_name_array,$row['project_name']);
            //array_push($p_desc_array,$row['project_description']);
            //array_push($p_skills_array,$row['skillset']);
        }
    endwhile;
}
$record_count=count($p_name_array);
/*while($record_count!=0):
    {
        if($p_name_array[$record_count]=='ashok'){

        }
        $record_count--;
    }
endwhile;*/
?>
<html>
    <body>
        <div>
            <h4>
                Project Details
            </h4>
            <h4>
                Name:</h4><?php 
//                echo $p_name_array[1];
                echo "<p>".$p_name."</p>";
                ?>
            <h5>
                Project description:</h5>
                <?php 
  //              echo $p_desc_array[1];
                echo "<p>".$p_desc."</p>";
                ?>
            <h4></h4>
                Prerequisites:</h4>
                <?php 
    //            echo $p_skills_array[1];
                echo "<p>".$p_skill."</p>";
                ?>
<!--            <h5>
                Python Scripting , DBMS
            </h5>
-->    </div>
    </body>
</html>