<?php
    $row = 1;
    $login = [];
    $display = [];
    $field ='';
    $type ='';
    $length ='';
    $is_pk ='';
    $name ='';
    $is_secure ='';
    $is_input ='';

    $field_display ='';
    $type_display ='';
    $length_display ='';
    $is_pk_display ='';
    $name_display ='';
    $is_secure_display ='';
    $is_input_display ='';
    if (($handle = fopen("requirements.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
            if($data[0]=='login'){
                $field = $data[1];
                $type = $data[2];
                $length = $data[3];
                $is_pk = $data[4];
                $name = $data[5];
                $is_secure = $data[6];
                $is_input = $data[7];
                array_push($login,array("field"=>$field, "type"=>$type, "length"=>$length, "is_pk"=>$is_pk, "name"=>$name, "is_secure"=>$is_secure, "is_input"=>$is_input));
            }else if($data[0]=="display"){
              $field_display = $data[1];
              $type_display = $data[2];
              $length_display = $data[3];
              $is_pk_display = $data[4];
              $name_display = $data[5];
              $is_secure_display = $data[6];
              $is_input_display = $data[7]; 
              array_push($display,array("field"=>$field_display, "type"=>$type_display, "length"=>$length_display, "is_pk"=>$is_pk_display, "name"=>$name_display, "is_secure"=>$is_secure_display, "is_input"=>$is_input_display));
            }
        
        // echo "<br />";
    }
        
    
      // print_r($login);
      fclose($handle);
    }
?>