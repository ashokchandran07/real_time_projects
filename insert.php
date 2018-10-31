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
if(isset($_POST['reg_user']))
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
// $array_skill[]=[""];  
$project_skill=explode(',', $skill);
//echo array_skill[0];
    for($i = 0; $i < count($project_skill); $i++) 
    {
        //echo    $project_skill[$i].'<br>';
}
$sql4="SELECT project_id from project_details";
$result = $conn->query($sql4);
    if ($result->num_rows >0) {
        
            while( ($row = $result->fetch_assoc())) 
            {          
                $projectid=$row['project_id'];
            }

    }
$sql1="SELECT * FROM stu_skill WHERE project_id=0 ";
$result = $conn->query($sql1);
$array_id=[];
$array_name=[""];
$array_point=[];
$i=0;
$j;
$tol=20;
$three=3;
$seven=7;
/*
    if ($result->num_rows >0) {
        
            while( ($row = $result->fetch_assoc()) && ($count!=$number)) 
            {        
                for($j=0;$j<$tol;$i++)
                {
    
    
                }
            }
    }*/
    if ($result->num_rows >0) {
            while( ($row = $result->fetch_assoc()) ) 
            {                  
                 
               $count=$count+1;
                $array_id[$i]= $row["id"];
                $array_name[$i]=$row["name"];
               
                $temp_skill[$i]=$row["skill_set"];
                $student_skill=explode(",",$temp_skill[$i]);
                 for($j = 0; $j < count($student_skill); $j++) 
                 {
                     echo "-->".$student_skill[$j].'<br>';
                 }
                //echo ".....".count($student_skill)."<br>";
                $point=0;
                for($j=0;$j<10;$j++)
                {
                    //echo count($project_skill)."<br>";
                    if(count($project_skill)==$three && count($student_skill)<=2)
                    {
                      //  echo "===".$j."<br>";
                        if($project_skill[0]==$student_skill[$j])
                        {
                            $point++;
                        }
                        if($project_skill[1]==$student_skill[$j])
                        {
                            $point++;
                        }
                        if($project_skill[2]==$student_skill[$j])
                        {
                            $point++;
                        }
                        
                    }
                    if(count($project_skill)==2 && count($student_skill)<=1)
                    {
                        //echo count($student_skill);
                        if($project_skill[0]==$student_skill[$j])
                        {
                            $point++;
                        }
                        if($project_skill[1]==$student_skill[$j])
                        {
                            $point++;
                        }
                                
                    }
                    if(count($project_skill)==1 && count($student_skill)<=0)
                    {
                        //echo count($student_skill);
                        if($project_skill[0]==$student_skill[$j])
                        {
                            $point++;
                        }
                        
                                
                    }
                }
                $array_point[$i]=$point;
                echo $array_point[$i];
                
              
                $i++;
               // $student_skill=[NULL];
                
             }
             
                        
            }
    
    for($k=0;$k<count($array_id);$k++)
    {
        for($l=$k+1;$l<count($array_id);$l++)
        {

            if($array_point[$k]<$array_point[$l])
            {
                $temp=$array_point[$k];
                $array_point[$k]=$array_point[$l];
                $array_point[$l]=$temp;
                
                $temp1=$array_id[$k];
                $array_id[$k]=$array_id[$l];
                $array_id[$l]=$temp1;
                $temp2=$array_name[$k];
                $array_name[$k]=$array_name[$l];
                $array_name[$l]=$temp2;
                
            }
        }
        
    }
        echo "project  allocated students\n";
        echo "<br>"; 
        //echo "<br>".count($array_id)."===".count($array_name)."===".count($projectid)."<br>";
    for($x =0; $x<=$number; $x++) {
    echo " \nstudent id : " .$array_id[$x]. "     Name :  ".$array_name[$x] ."Project Id :  " .$projectid ."   Skills_known:    ".$array_point[$x];
         $sql3="UPDATE stu_skill SET  project_id='$projectid' where id= '$array_id[$x]'";
         $res = mysqli_query($conn,$sql3) or trigger_error(mysqli_error($conn)." in ".$sql3);

            mysqli_query($conn, $sql3);
        
    echo "<br>"; 
    }
 //
    


}
mysqli_close($conn);
?>