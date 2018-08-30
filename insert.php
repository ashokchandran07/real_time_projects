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

$sql = "INSERT INTO project_details (project_name,project_description,skillset,members,startdate,enddate)
VALUES ('$name', '$description', '$skill','$number','$startdate','$enddate')";
$sql1="SELECT * FROM stu_skill GROUP BY name ASC ORDER BY skill_points DESC ";
$result = $conn->query($sql1);
    if ($result->$number >0) {
            while($row = $result->fetch_assoc() ) {
                echo "id: " . $row["id"] ."<br>";
            
                        
            }

    }

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>