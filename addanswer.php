<?php
include "../db.php";
if(isset($_POST['submit'])){
        $id=$_GET['id'];
        $output_dir = "uploads";/* Path for file upload */
                $RandomNum   = time();
                $ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
                $ImageType      = $_FILES['image']['type'][0];
         
                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                $ImageExt       = str_replace('.','',$ImageExt);
                $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            $ret[$NewImageName]= $output_dir.$NewImageName;
                
                
                if (!file_exists($output_dir))
                {
                        @mkdir($output_dir, 0777);
                }               
                move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );
            
           
           $answer=$_POST['ans'];
           
                     $sql = "INSERT INTO `ans`(QID,Ans,img) VALUES ('$id','$answer','$NewImageName')";
                        if (mysqli_query($db, $sql)) {
                                header("location:add.php");
                        }
                
            }
?>