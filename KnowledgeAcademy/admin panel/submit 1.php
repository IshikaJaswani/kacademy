<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

  if(isset($_POST['func'])) {

    include 'db.php';

   // log Teacher Attendance verification func
     if($_POST['func'] == 'verify_log_Teacher_Attendance'){
      $teacher_id=$_POST['teacher_id'];
      $date=$_POST['date'];
      $sql="select * from teacher where id='".$teacher_id."'";
      $result=mysqli_query($conn,$sql);
      $num= mysqli_num_rows($result);
      if($num!=0){

        $sql="select * from teacher_attendance where teacher_id='".$teacher_id."'and attendance_date='".$date."'";
        $result=mysqli_query($conn,$sql);
        $num= mysqli_num_rows($result);
        if($num==0){
          echo 1;
        }
        else{
          echo "Attendance already logged";
        }
      }
      else{
        echo "Invalid Teached ID.";
      }
  }

// log Teacher Attendance submit func
    if($_POST['func'] == 'submit_log_Teacher_Attendance'){

      $teacher_id=$_POST['teacher_id'];
      $date=$_POST['date'];
      $status=$_POST['status'];
      $sql= "select max(attendance_id) as ID from teacher_attendance";
      $result= mysqli_query($conn,$sql);
      $n=0;
      while($row=mysqli_fetch_array($result)){
        $n=$row['ID'];
      }
      if($n==0){$id=10001;}
      else{$id=$n+1;}

      $sql="insert into teacher_attendance(attendance_id, teacher_id, status,attendance_date) values ('".$id."','".$teacher_id."','".$status."','".$date."')";
      if(mysqli_query($conn,$sql)){
        echo 1;
      }
      else {
        echo 0;
      }
    }
    // update admin;
    if($_POST['func'] == 'addadmin'){
      include('result_query.php');
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

$con = mysqli_connect('localhost','root');
mysqli_select_db($con, 'kacademy');
if(isset($_POST['update'])){

$id = $_POST['id'];
$name = $_POST['name'];
$files = $_FILES['file']['tmp_name'];
      $file_name= $_FILES['file']['name'];

$phone = $_POST['phone'];
$address = $_POST['address'];

$password = $_POST['password'];


$fileerror = $file['error'];
$filetmp = $file['tmp_name'];
$destination=$_SERVER['DOCUMENT_ROOT']."/kacademy/KnowledgeAcademy/images/".$id.".".$extension;
move_uploaded_file($files,$destination);

$q = " UPDATE `Admin1` SET `Name`='".$name."',`Phone`='".$phone."',`Address`='".$address."',`Photograph`='".$destination."',`Password`='".$password."' WHERE `ID` = '".$id."' ";
$result = mysqli_query($con,$q);
if($result){
    echo showResult( "File Upload Successfully.",true);
}
else{
    echo showResult( "Failed to upload file.", false);
}
}
        }
    }

// add admin;
if($_POST['func'] == 'addadmin'){

      // echo "Hello";
      $files = $_FILES['file']['tmp_name'];
      $file_name= $_FILES['file']['name'];

$name = $_POST['name'];
$role = $_POST['role'];

$phone = $_POST['phone'];
$address = $_POST['address'];

$password = $_POST['password'];




    $extension=pathinfo($file_name, PATHINFO_EXTENSION);

       if (!in_array($extension, ['jpg', 'jpeg', 'docx'])) {
           echo showResult("You file extension must be .jpg, .jpeg or .docx", 'info');
       } elseif ($_FILES['file']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte

           echo showResult("File too large!", 'warn');
       } else {
         $con = mysqli_connect('localhost','root');

         mysqli_select_db($con, 'kacademy');
         $sql="select max(Id) as 'ID' from Admin";
         $result=mysqli_query($con,$sql);
         while($row=mysqli_fetch_array($result)){
           $n=$row['ID'];
         }
         if($n==0){$id=200001;}
         else{$id=$n+1;}
         $destination=$_SERVER['DOCUMENT_ROOT']."/kacademy/KnowledgeAcademy/images/".$id.".".$extension;

           if (move_uploaded_file($files, $destination)) {
                  $sql="INSERT INTO `Admin1`(`Id`,`Role`,`Name`, `Phone`, `Address`, `Photograph`, `Password`) VALUES ('".$id."','".$role."','".$name."' , '".$phone."' , '".$address."' , '".$destination."' , '".$password."' )";
      if (mysqli_query($con, $sql)) {
                     echo showResult( "File Upload Successfully.",true);
                 }
             else {
                 echo showResult( "Failed to upload file.", false);
             }

    }
    }
    }


  // add class info;
if($_POST['func'] == 'addclassinfo'){
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    // echo "Hello";
    $files = $_FILES['file']['tmp_name'];
    $file_name= $_FILES['file']['name'];
    $files1 = $_FILES['file1']['tmp_name'];
    $file_name1= $_FILES['file1']['name'];

$classid = $_POST['classid'];

  $extension=pathinfo($file_name, PATHINFO_EXTENSION);
  $extension1=pathinfo($file_name1, PATHINFO_EXTENSION);

     if ((!in_array($extension, ['pdf', 'zip', 'docx'])) || (!in_array($extension1, ['pdf', 'zip', 'docx']))) {
         echo showResult("You file extension must be .zip, .pdf or .docx", 'info');
     } elseif (($_FILES['file']['size'] > 1000000) || ($_FILES['file1']['size'] > 1000000)) { // file shouldn't be larger than 1Megabyte

         echo showResult("File too large!", 'warn');
     } else {
       $con = mysqli_connect('localhost:3307','root');

       mysqli_select_db($con, 'kacademy');

       $destination=$_SERVER['DOCUMENT_ROOT']."/kacademy/KnowledgeAcademy/images/timetable".$classid.".".$extension;
       $destination1=$_SERVER['DOCUMENT_ROOT']."/kacademy/KnowledgeAcademy/images/syllabus".$classid.".".$extension1;
       $destinationfile="syllabus".$classid.".".$extension;
       $destinationfile1="timetable".$classid.".".$extension1;

         if (move_uploaded_file($files, $destination)) {
                $sql="INSERT INTO `ClassInfo1`(`ClassId`,`TimeTable`, `Syllabus`) VALUES ('".$classid."', '".$destinationfile."' , '".$destinationfile1."' )";
    if (mysqli_query($con, $sql)) {
                   echo showResult( "File Upload Successfully.",true);
               }
           else {
               echo showResult( "Failed to upload file.", false);
           }

  }
  }
  }
}


  // update class info;
  if($_POST['func'] == 'updateclassinfo'){
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      // echo "Hello";
      $files = $_FILES['file']['tmp_name'];
      $file_name= $_FILES['file']['name'];
      $files1 = $_FILES['file1']['tmp_name'];
      $file_name1= $_FILES['file1']['name'];

  $classid = $_POST['classid'];

    $extension=pathinfo($file_name, PATHINFO_EXTENSION);
    $extension1=pathinfo($file_name1, PATHINFO_EXTENSION);

       if ((!in_array($extension, ['pdf', 'zip', 'docx'])) || (!in_array($extension1, ['pdf', 'zip', 'docx']))) {
           echo showResult("You file extension must be .zip, .pdf or .docx", 'info');
       } elseif (($_FILES['file']['size'] > 1000000) || ($_FILES['file1']['size'] > 1000000)) { // file shouldn't be larger than 1Megabyte

           echo showResult("File too large!", 'warn');
       } else {
         $con = mysqli_connect('localhost:3307','root');

         mysqli_select_db($con, 'kacademy');

         $destination=$_SERVER['DOCUMENT_ROOT']."/kacademy/KnowledgeAcademy/images/timetable".$classid.".".$extension;
         $destination1=$_SERVER['DOCUMENT_ROOT']."/kacademy/KnowledgeAcademy/images/syllabus".$classid.".".$extension1;
         $destinationfile="syllabus".$classid.".".$extension;
         $destinationfile1="timetable".$classid.".".$extension1;

           if (move_uploaded_file($files, $destination)) {
                  $sql="UPDATE `ClassInfo1` SET `ClassId`='".$classid."',`TimeTable`='".$destinationfile."',`Syllabus`='".$destinationfile1."' ";
      if (mysqli_query($con, $sql)) {
                     echo showResult( "File Upload Successfully.",true);
                 }
             else {
                 echo showResult( "Failed to upload file.", false);
             }

    }
    }
    }
  }

 // edit log teacher func
    if($_POST['func'] == 'edit_log_Teacher_Attendance'){
     $status=$_POST['status'];
     $id=$_POST['attendance_id'];
     $sql="update teacher_attendance set Status='".$status."' where attendance_id='".$id."'";
     if(mysqli_query($conn,$sql)){
       echo "Edit Successfull";
     }
     else{
       echo "Edit Failed";
     }
    }

// delete teacher attendance
    if($_POST['func'] == 'delete_teacher_attendance'){
     $id=$_POST['attendance_id'];
     $sql="delete from teacher_attendance where attendance_id='".$id."'";
     if(mysqli_query($conn,$sql)){
       echo 1;
     }
     else{
       echo 0;
     }
    }


// contact form reply
  if($_POST['func'] == 'contact_support_reply'){
     $id=$_POST['id'];
     $reply=$_POST['reply'];
     $subject=$_POST['subject'];
     $sql="select * from feedback where Id=".$id;
     $result=mysqli_query($conn,$sql);
     while($row=mysqli_fetch_array($result)){
       $name=$row['Name'];
       $email=$row['Email'];
     }
     $headers = 'From: Knowledge Academy';

     function sanitize_my_email($field) {
         $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
           return true;
        } else {
           return false;
        }
       }
       $secure_check = sanitize_my_email($email);
       if ($secure_check == false) {
         echo "Invalid email";
       }
       else { //send email
         $reply="Dear ".$name.",\n".$reply;
         mail($email, $subject, $reply, $headers);
         echo "Replied Successfully";
       }

       $status='Inactive';
       $reply="Subject: ".$subject."\nReply:".$reply;
       $sql= "update feedback set Reply='".$reply."', Status='".$status."' where Id='".$id."'";
       mysqli_query($conn,$sql);
  }
  // upload gallery form
    if($_POST['func'] == 'gallery upload'){
      var_dump($_POST);
      var_dump($_FILES);
      echo $_FILES['file']['name'];
    }

    if($_POST['func'] == 'gallery upload'){
      var_dump($_POST);
      var_dump($_FILES);
      echo $_FILES['file']['name'];
    }
}}
 ?>
