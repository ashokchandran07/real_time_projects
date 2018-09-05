<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enterprise";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
$name = $_POST['pro_title'];
$description=$_POST['pro_description'];
$skill=$_POST['skillset'];
$number = $_POST['team_mem'];
$startdate = $_POST['start_date'];
$enddate = $_POST['end_date'];
$count=0;

$sql = "INSERT INTO project_details (project_name,project_description,skillset,members,startdate,enddate)
VALUES ('$name', '$description', '$skill','$number','$startdate','$enddate')";
    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql4="select project_id from project_details";
$result = $conn->query($sql4);
    if ($result->num_rows >0) {
        
            while( ($row = $result->fetch_assoc())) 
            {          
                $projectid=$row['project_id'];
            }

    }
$sql2="SELECT project_id FROM project_details ";
$sql1="SELECT * FROM stu_skill GROUP BY name ASC ORDER BY skill_points DESC ";
$result = $conn->query($sql1);
$array_id=[];
$array_name=[""];
//$array_project=[];
$i=1;
    if ($result->num_rows >0) {
        
            while( ($row = $result->fetch_assoc()) && ($count!=$number)) 
            {                  
                
                 echo "id: " .$row["id"] ."<br>";
               $count=$count+1;
                $array_id[$i]= $row["id"];
                $array_name[$i]=$row["name"];
                $sql3="UPDATE stu_skill SET  project_id=$projectid where stu_id=$array_id[$i]";
                mysqli_query($conn, $sql3);
                $i=$i+1;
                    
            }
             
                        
            }
    echo "project is allocated students";
    for($x = 0; $x <=$number; $x++) {
    echo " student id : " .$array_id[$x]. "     Name :  ".$array_name[$x] ."  Project Id :  " .$projectid;
    echo "<br>"; 
    }

    


}
mysqli_close($conn);
?>