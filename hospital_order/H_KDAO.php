<?php

/**
 * Created by PhpStorm.
 * User: admi
 * Date: 2015/12/29
 * Time: 6:03
 */
class H_KDAO
{
    public function getKeshiNumsByHid($hid){
        @ $db = new mysqli("localhost","root","1235869470","hospital");
        $num_result = -2;

        if(mysqli_connect_errno()){
            echo'Error: could not connect database, please try again later! ';
            exit;
        }

        $query = "select Kid from h_k where Hid='".$hid."'";
        $result = $db->query($query);
        $num_result = $result->num_rows;

        $db->close();

        return $num_result;
    }

    public function getKidByIndexAndHid($index,$hid){
        @ $db = new mysqli("localhost","root","1235869470","hospital");
        $re = -2;

        if(mysqli_connect_errno()){
            echo'Error: could not connect database, please try again later! ';
            exit;
        }

        $query = "select Kid from h_k where Hid='".$hid."'";
        $result = $db->query($query);
        $num_result = $result->num_rows;
        for($i = 0;$i<$num_result;$i++){
            $row = $result->fetch_assoc();
            if($i == $index) $re = $row["Kid"];
        }

        $db->close();

        return $re;
    }
}