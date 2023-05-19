
<?php
include "../db.php";

$que=$_GET['que'];
$email=$_GET['id'];
$stmt = $db->prepare("select * from ans where QID=?");
$stmt->bind_param("i",$email);
$stmt->execute();
$stmt_result=$stmt->get_result();
if($stmt_result->num_rows>0){

    $data=$stmt_result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <title>FIXITECHIE</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />

  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <style>
      * {
          padding: 0;
          margin: 0;
          font-family: 'Josefin Sans', sans-serif;
          box-sizing: border-box;
      }

      body {
          background-image: url('background.png');
          background-repeat: no-repeat;
          background-attachment: fixed;
          height: 100vh;
          color: white;
          display: flex;
          justify-content: center;
          padding: 10px;
          align-items: center;
      }
      .login {
          max-width: 650px;
          width: 100%;
          padding: 25px 30px;
          border-radius: 35px;
          background-color: rgba(0,0,0,0.2);
      }

      .login .heading {
              font-size: 35px;
              font-weight: bold;
              position: relative;
              text-align: center;
              padding: 0 0 20px 0;
              color: #b300ff;
      }

      .login .heading::before {
                  content: '';
                  position: absolute;
                  height: 3px;
                  left: 0;
                  bottom: 0;
                  width: 100%;
                  background: linear-gradient(135deg, rgb(225, 255, 0), rgb(255, 123, 0) );
      }

      .login form .carddetails {
              margin-top: 35px;
      }

      form .carddetails .cardbox {
          padding: 10px;
          margin-bottom: 15px;
          width: 60px;
      }

      .carddetails .cardbox .details {
          display: block;
          font-weight: bold;
          font-size: 20px;
          margin-bottom: 5px;
          font-family: Arial;
      }

      .carddetails .cardbox input {
          height: 40px;
          width: 250px;
          outline: none;
          border-radius: 10px;
          border: 1px solid white;
          padding-left: 15px;
          font-size: 16px;
          font-weight: bold;
          border-bottom-width: 2px;
          transition: all 0.3s ease;
          font-family: Arial;
      }

      form .loginbtn {
          text-align: center;
      }

      form .loginbtn input {
              padding: 10px 0;
              margin-top: 30px;
              height: 100%;
              width: 30%;
              outline: none;
              color: black;
              border: none;
              font-size: 25px;
              font-weight: bold;
              border-radius: 20px;
              letter-spacing: 1px;
              background: #b300ff;
              cursor: pointer;
              font-family: Arial;
      }
      img {
          height: 150px;
          padding-left: 200px;
      }


</style>
 </head> 

  <body>





      <div class="login">
          <div class="heading">Answers</div>
          <form action="" method="POST" enctype="multipart/form-data">
              <div class="carddetails">
                  <div class="cardbox"> 
                      <img src="login.png" />
                      
                  </div> 
                  <span class="details">Question</span><br>
                      <?php echo $que ?><br><br>
                  
                      <span class="details">Answer</span><br><br>
                      <?php echo $data['Ans'] ?><br><br>
                  
                  
                      <span class="details">Image</span><br>
                      <img src="../Addans/uploads/<?php echo $data['img'] ?>" alt="" srcset=""><br><br>
                  

                  <div class="loginbtn">
                      <a href="../Search/search.php">Back</a><br><br>
                      
                  </div>

              </div>
          </form>
      </div>


  </body>
</html>