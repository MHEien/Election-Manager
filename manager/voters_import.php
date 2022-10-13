<?php
include 'includes/session.php';

 if(isset($_POST["import"])){
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ";")) !== FALSE)
           {
			   		//Generated data
		$set = '123456789abcdefghijklmnopqrstuvwxyz';
		$voter = substr(str_shuffle($set), 0, 6);
		$password = (substr(str_shuffle($set), 0, 8));

    
             $sql = "INSERT INTO voters (firstname,lastname,email,voters_key,campus,max_vote,password,voters_id,election_id) 
                    values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$password."','".$voter."','".$election_id."')";
                   $result = mysqli_query($conn, $sql);
        if(!isset($result))
        {
          echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"index.php\"
              </script>";    
        }
        else {
            echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"index.php\"
          </script>";
        }
           }
      
           fclose($file);  
     }
  }   
  header('location: voters.php');
 ?>