<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php include 'css_jslinks.php' ?>
   <style media="screen">
   /* head styling */

   .fa-scroll{
     color:#ff8838;
   }
   .navbar-brand{
     font-family: 'Titillium Web', sans-serif;
     height:20%;
   }
   .navbar-brand .fa-scroll{
     padding-right: 3%;
     font-size: 450%;
   }
   .notice_heading{
     font-size:250%;
   }
   .container-fluid{
     padding-top: 5%;
     -webkit-box-shadow: 0 12px 12px -12px black;
   	   -moz-box-shadow: 0 8px 6px -6px black;
   	        box-shadow: 0 12px 12px -12px black;
   }
   .row{
     width:40%;
   }
   @media only screen and (max-width: 990px) {
     .row{
       width:100% !important;
       margin-bottom: 3% !important;
     }
     .add_event{
       width:20% !important;
     }
   }
   .icon_text{
     font-size: 50%;
     font-family: 'Noto Sans JP', sans-serif !important;
   }
   .add_event{
     width:80%;
   }
/* table styling */
   .container{
     width: 80%;
     font-family: 'Noto Sans JP', sans-serif;
     padding-top: 5%;
   }
   .icon{
     color: black;
   }

   thead{
       font-family: 'Noto Sans JP', sans-serif;
       font-size: 1.2rem;
     }
/* result if none found */
  .res{
    font-family: 'Noto Sans JP', sans-serif;
    font-size: 1.2rem;
  }
   </style>

  </head>
  <body>
    <!-- head bar -->
    <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand">
        <i class="fas fa-scroll"></i><span class="notice_heading">NOTICES</span>
      </a>
      <div class="row d-flex justify-content-end">
        <a class="col-lg-4  btn btn-light add_event justify-content-end" href="upload_notice.php"><i class="fa fa-plus-square fa-2x"><span class="align-self-center icon_text"> Add Event</span></i> </a>
        <form class="col-lg-8 col-md-6 d-flex justify-content-end" action="notice_search.php" method="post">
          <input class="form-control me-2 notice_text" type="text" name="Notice_Search" placeholder="Enter Title" aria-label="Search">
          <button class="btn btn-outline-success add_notice" type="submit" id="btn_search" name="notice_search_enter" value="Search">Search</button>
        </form>
      </div>

    </div>
  </nav>
    <!-- php for writing search -->
    <?php

      if(isset($_POST['notice_search_enter'])){

        $name=$_POST['Notice_Search'];
        if($name!=""){
          include "db.php";
          $sql="select * from notice where Title='".$name."'";
          $result=mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)>0){
          ?>
          <center>
        <div class="container">

          <table class="table table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Filename</th>
            <th>Upload Date</th>
            <th>Action</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
          <?php
          foreach ($result as $file): ?>
            <tr>
              <td><?php echo $file['Id']; ?></td>
              <td><?php echo $file['Title']; ?></td>
              <td><?php echo $file['Date']; ?></td>
              <td><a href="Downloads.php?name=<?php echo $file['Title'] ?>.pdf">Download</a></td>
              <td><a class="icon" href="notice_edit.php?id=<?php echo $file['Id'] ?>"><i class="fa fa-edit "></i></a></td>
              <td><a class="icon delete" data-id='<?php echo $file['Id'] ?>' data-name='<?php echo $file['Title'] ?>.pdf' ><i class="fa fa-trash"></i></a></td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </center>
  <?php
          }
          else{
            ?>
            <center>
              <p class="res">No record found.</p>
            </center>
            <?php
          }
        }
        else{
          header("Location:notice portal.php");
        }
      }
     ?>

  </body>
</html>
