<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'db.php'; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <title>Marks info</title>


    <style>
    #reset {
    background: blue;
    color: white;
    margin-right: 8px; }
    #reset:hover {
    background: red;
    color: white; }

    #submit {
    background: blue;
    color: white; }
    #submit:hover {
    background-color: red; }
    .submit {
    width: 140px;
    height: 40px;
    display: inline-block;
    font-family: 'Poppins';
    font-weight: 400;
    font-size: 13px;
    padding: 10px;
    border: none;
    cursor: pointer; }
    .form-submit {
    text-align: right;
    padding-top: 27px; }



    body {
    font-size: 16px;
    line-height: 1.8;
    color: white;
    font-weight: 400;
    background: #29a8a6;
    padding: 90px 0; }

    .container {
    color:black;
    position: relative;
    padding-bottom: 50px;
    margin: 0 auto;
    background: #fff;
    border-radius:40px;
    box-shadow:  5px 5px 13px #238f8d,
             -5px -5px 13px #2fc1bf;
    }
    .register-form {
    padding: 50px 100px 50px 70px; }

    h2 {
    line-height: 1.66;
    margin: 0;
    padding: 0;
    font-weight: 700;
    color: #222;
    font-family: 'Montserrat';
    font-size: xx-large;
    text-transform: uppercase;
    margin-bottom: 32px; }
    </style>


</head>
<body>
<?php
$ClassID = $_GET['c_id'];
$StudentID = $_GET['s_id'];
$examid = $_GET['e_id'];
$Year = $_GET['y'];

$sql="select * from marks1 where ClassID='".$ClassID."' and StudentID='".$StudentID."' and examid='".$examid."' and Year='".$Year."'";
$result=mysqli_fetch_assoc(mysqli_query($conn,$sql));
 ?>

    <div class="main">
        <div class="container">
            <div class="signup-content">

                <div class="signup-form">
                    <div class="col-lg-12">

                    <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data" >
                        <h2 class="text-center">Update Marks form</h2>


                            <div class="form-group">
                            <label for="EngLang">EngLang :</label>
                            <input type="text" value="<?php echo $result['EngLang'] ?>" name="EngLang" id="EngLang" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label for="EngLit">EngLit :</label>
                            <input type="text" value="<?php echo $result['EngLit'] ?>" name="EngLit" id="EngLit" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label for="HindiLang">HindiLang :</label>
                            <input type="text" value="<?php echo $result['HindiLang'] ?>" name="HindiLang" id="HindiLang" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="HindiLit">HindiLit :</label>
                            <input type="text" value="<?php echo $result['HindiLit'] ?>" name="HindiLit" id="HindiLit" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Maths">Maths :</label>
                            <input type="text" value="<?php echo $result['Maths'] ?>" name="Maths" id="Maths" class="form-control" required>
                        </div>

                        <div class="form-row">
                            <label for="Science">Science :</label>
                            <input type="text" value="<?php echo $result['Science'] ?>" name="Science" id="Science" class="form-control" required/>
                        </div>
                        <div class="form-row">
                            <label for="SocialScience">SocialScience :</label>
                            <input type="text" value="<?php echo $result['SocialScience'] ?>" name="SocialScience" id="SocialScience" class="form-control" required/>
                        </div>
                        <div class="form-row">
                            <label for="Computer">Computer :</label>
                            <input type="text" value="<?php echo $result['Computer'] ?>" name="Computer" id="Computer" class="form-control" required/>
                        </div>
                        <div class="form-row">
                            <label for="GeneralKnowledge">GeneralKnowledge :</label>
                            <input type="text" value="<?php echo $result['GeneralKnowledge'] ?>" name="GeneralKnowledge" id="GeneralKnowledge" class="form-control" required/>
                        </div>
                        <div class="form-row">
                            <label for="Art">Art :</label>
                            <input type="text" value="<?php echo $result['Art'] ?>" name="Art" id="Art" class="form-control" required/>
                        </div>
                        <input type="hidden"  name="ClassID" value="<?php echo $result['ClassID'] ?>">
                        <input type="hidden"  name="StudentID" value="<?php echo $result['StudentID'] ?>">
                        <input type="hidden"  name="examid" value="<?php echo $result['examid'] ?>">
                        <input type="hidden"  name="Year" value="<?php echo $result['Year'] ?>">
                        <div class="form-submit">
                        <a href="showmarks.php"><input type="button" value="SHOW ALL" class="submit" name="update" id="update" class="btn btn-success" /> </a> </td>

                            <input type="submit" value="Submit Form" class="submit" name="submit" id="submit" class="btn btn-success"/>
                        </div>
                    </form>
  </div>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
      var m=0;
    function checkt(){
      var englang=document.getElementById('EngLang').value;
      var englit=document.getElementById('EngLit').value;
      var hindilang=document.getElementById('HindiLang').value;
      var hindilit=document.getElementById('HindiLit').value;
      var maths=document.getElementById('Maths').value;
      var science=document.getElementById('Science').value;
      var socialscience=document.getElementById('SocialScience').value;
      var comp=document.getElementById('Computer').value;
      var gk=document.getElementById('GeneralKnowledge').value;
      var art=document.getElementById('Art').value;
      var exam=<?php echo $_GET['e_id'] ?>;

      $.ajax({
        type: "POST",
        url: 'submit.php',
        data:{func:'find_max_marks',examid:exam},
        success: function(data){
          data=JSON.parse(data);
          m=parseInt(data["max_marks"]);
        
        }
      });
      if(englang<=0 || englang>m || englit<=0 || englit>m || hindilit<=0 || hindilit>m || maths<=0 || maths>m ||hindilang<=0 || hindilang>m ||science<=0 || science>m ||socialscience<=0 || socialscience>m ||comp<=0 || comp>m ||gk<=0 || gk>m ||art<=0 || art>m){
       alert("Marks should range between 0 and "+m);
        return false;
      }
      else{

        return true;
      }
    }
      $(document).ready(function(){

          $('#register-form').on('submit', function(e){
            e.preventDefault();

            if(checkt()){
              var class_id=<?php echo $_GET['c_id'] ?>;
              var s_id=<?php echo $_GET['s_id'] ?>;
              var exam=<?php echo $_GET['e_id'] ?>;
              var year=<?php echo $_GET['y'] ?>;
              var englang=document.getElementById('EngLang').value;
              var englit=document.getElementById('EngLit').value;
              var hindilang=document.getElementById('HindiLang').value;
              var hindilit=document.getElementById('HindiLit').value;
              var maths=document.getElementById('Maths').value;
              var science=document.getElementById('Science').value;
              var socialscience=document.getElementById('SocialScience').value;
              var comp=document.getElementById('Computer').value;
              var gk=document.getElementById('GeneralKnowledge').value;
              var art=document.getElementById('Art').value;
              $.ajax({
                type: "POST",
                url: 'submit.php',
                data:{func:'update_marks',ClassID:class_id,examid:exam,StudentID:s_id,Year:year,EngLang:englang,EngLit:englit,HindiLang:hindilang,HindiLit:hindilit,Maths:maths,Science:science,SocialScience:socialscience,Computer:comp,GeneralKnowledge:gk,Art:art},
                success: function(data){
                  alert(data);
                }
            });
    }

    });
    });
    </script>

</body>
</html>
