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
$query = "SELECT project_id FROM stu_skill WHERE name='ashok'";
//$results = mysqli_query($db,$query) or die('Query failed: ' . mysql_error());
//$value = mysqli_fetch_assoc($results);
$value=4;
//echo $result."Result value";
$query1 = "SELECT * FROM registeru_table WHERE id='1'";
$results1 = mysqli_query($db,$query1) or die('Query failed: ' . mysql_error());
if ( ($c = mysqli_num_rows($results1)) > 0 ) {
   // echo "number of rows = ".$c;
		while($row = mysqli_fetch_assoc($results1)):
		{
            $p_name = $row['user_name'];
            $p_college = $row['college'];
            $p_city = $row['city'];
            $p_pincode = $row['pincode'];
            $p_skills = $row['skill_set'];
            $p_area = $row['area_of_interest'];
        }
    endwhile;
}
$record_count=count($p_name_array);
?>
<html>
    <body>
        <div>
            <h4 style='color:white'>
                Profile Details
            </h4>
            <h4 style='color:white'>
                Name :</h4><?php 
                echo "<p style='color:white'>".$p_name."</p>";
                ?>
            <h5 style='color:white'>
                College Name :</h5>
                <?php 
                echo "<p style='color:white'>".$p_college."</p>";
                ?>
            <h4 style='color:white'>
                City :</h4>
                <?php 
                echo "<p style='color:white'>".$p_city."</p>";
                ?>
                <h4 style='color:white'>
                Pin-Code :</h4>
                <?php 
                echo "<p style='color:white'>".$p_pincode."</p>";
                ?>
                <h4 style='color:white'>
                Area-Of-interest :</h4>
                <?php 
                echo "<p style='color:white'>".$p_area."</p>";
                ?>
                <h4 style='color:white'>
                Skill-set :</h4>
                <?php 
                echo "<p style='color:white'>".$p_skills."</p>";
                ?>
</div>
    </body>
</html>