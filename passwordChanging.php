<?php
$company_name = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'ucproject');

// REGISTER USER
if (isset($_POST['pass_change'])) {
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $new_password = mysqli_real_escape_string($db, $_POST['new_password']);
    if (count($errors) == 0) {
                    $Password = md5($password);
                    $New_password = md5($new_password);
                    $query = "SELECT * FROM registeru_table WHERE password='$Password'";
                    $results = mysqli_query($db, $query);
                    $row = mysqli_num_rows($results);
                    echo "<script type='text/javascript'>alert($Password);</script>";
                    if($row==1)
                    {
                        echo "<script type='text/javascript'>alert('Confirm to Save the change');</script>";
                        $pcquery = "UPDATE registeru_table SET password='$New_password' WHERE password='$Password'";
                        if(mysqli_query($db,$pcquery))
                        {
                            echo "<script type='text/javascript'>alert('Password changed successfully');</script>";
                        }
                    }

                }
}

?>