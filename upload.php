<?php

if ( isset($_POST["submit"]) ) {

  if ( isset($_FILES["file"])) {

           //if there was an error uploading the file
       if ($_FILES["file"]["error"] > 0) {
           echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

       }
       else {
                //Print file details
            echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            echo "Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

          
                   //Store file in directory "upload" with the name of "uploaded_file.txt"
           $storagename = "requirements.csv";
           move_uploaded_file($_FILES["file"]["tmp_name"], "generated_project/" . $storagename);
           echo "Stored in: " . "generated_project/uploads/" . $_FILES["file"]["name"] . "<br />";
           header("Location:./generate_project.php");
       }
    } else {
            echo "No file selected <br />";
    }
}


?>