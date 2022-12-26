 <?php
 function get_result($mark){
    if($mark > 33){
        $result = "Passed";
    }else{
        $result = "Failed";
    }
    return $result;
 }