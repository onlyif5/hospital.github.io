<?php

/**
 * Created by PhpStorm.
 * User: admi
 * Date: 2015/12/29
 * Time: 6:11
 */
class KeshiDAO
{
    public function getKnameByKid($kid){
        @ $db = new mysqli("localhost","root","1235869470","hospital");
        $re = "";

        if(mysqli_connect_errno()){
            echo'Error: could not connect database, please try again later! ';
            exit;
        }

        $query = "select Kname from keshi where Kid='".$kid."'";
        $result = $db->query($query);
        $num_result = $result->num_rows;
        for($i = 0;$i<$num_result;$i++){
            $row = $result->fetch_assoc();
            $re = $row["Kname"];
        }

        $db->close();

        return $re;
    }

    public function getKsummaryByKid($kid){
        @ $db = new mysqli("localhost","root","1235869470","hospital");
        $re = "";

        if(mysqli_connect_errno()){
            echo'Error: could not connect database, please try again later! ';
            exit;
        }

        $query = "select Ksummary from keshi where Kid='".$kid."'";
        $result = $db->query($query);
        $num_result = $result->num_rows;
        for($i = 0;$i<$num_result;$i++){
            $row = $result->fetch_assoc();
            $re = $row["Ksummary"];
        }

        $db->close();

        return $re;
    }
}