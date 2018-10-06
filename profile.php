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
//$value = mysqli_fetch_assoc($results);
$value=4;
//echo $result."Result value";
$query1 = "SELECT * FROM registeru_table WHERE id='4'";
$results1 = mysqli_query($db,$query1) or die('Query failed: ' . mysql_error());
if ( ($c = mysqli_num_rows($results1)) > 0 ) {
   // echo "number of rows = ".$c;
		while($row = mysqli_fetch_assoc($results1)):
		{
            $p_name = $row['user_name'];
            $p_college = $row['college'];
            $p_city = $row['city'];
            $p_pincode = $row['pincode'];
            $p_skills = $row['skill-set'];
            $p_area = $row['area_of_interest'];
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
                Profile Details
            </h4>
            <h4>
                Name :</h4><?php 
//                echo $p_name_array[1];
                echo "<p>".$p_name."</p>";
                ?>
            <h5>
                College Name :</h5>
                <?php 
  //              echo $p_college[1];
                echo "<p>".$p_desc."</p>";
                ?>
            <h4>
                City :</h4>
                <?php 
    //            echo $p_skills_array[1];
                echo "<p>".$p_city."</p>";
                ?>
                <h4>
                Pin-Code :</h4>
                <?php 
    //            echo $p_skills_array[1];
                echo "<p>".$p_pin."</p>";
                ?>
                <h4>
                Area-Of-interest :</h4>
                <?php 
    //            echo $p_skills_array[1];
                echo "<p>".$p_area."</p>";
                ?>
                <h4>
                Skill-set :</h4>
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