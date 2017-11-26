<?php

/**
 * Created by PhpStorm.
 * User: admi
 * Date: 2015/12/29
 * Time: 13:09
 */
class DoctorDAO
{
    public function getDoctorNumsByHidAndKid($hid,$kid){
        @ $db = new mysqli("localhost","root","1235869470","hospital");
        $num_result = -2;

        if(mysqli_connect_errno()){
            echo'Error: could not connect database, please try again later! ';
            exit;
        }

        $query = "select Did from doctor where Hid='".$hid."' and Kid='".$kid."'";
        $result = $db->query($query);
        $num_result = $result->num_rows;

        $db->close();

        return $num_result;
    }
    public function getDtimeNumsByDname($dname){
        @ $db = new mysqli("localhost","root","1235869470","hospital");
        $num_result = -2;

        if(mysqli_connect_errno()){
            echo'Error: could not connect database, please try again later! ';
            exit;
        }

        $query = "select Did from doctor where Dname='".$dname."'";
        $result = $db->query($query);
        $num_result = $result->num_rows;

        $db->close();

        return $num_result;
    }

    public function getDidByHidAndKid($hid,$kid){
        @ $db = new mysqli("localhost","root","1235869470","hospital");
        $re = "";

        if(mysqli_connect_errno()){
            echo'Error: could not connect database, please try again later! ';
            exit;
        }

        $query = "select Did from doctor where Hid='".$hid."' and Kid='".$kid."'";
        $result = $db->query($query);
        $num_result = $result->num_rows;
        for($i = 0;$i<$num_result;$i++){
            $row = $result->fetch_assoc();
            $re = $row["Did"];
        }

        $db->close();

        return $re;
    }

    public function getDnameByDid($did){
        @ $db = new mysqli("localhost","root","1235869470","hospital");
        $re = "";

        if(mysqli_connect_errno()){
            echo'Error: could not connect database, please try again later! ';
            exit;
        }

        $query = "select Dname from Doctor where Did='".$did."'";
        $result = $db->query($query);
        $num_result = $result->num_rows;
        for($i = 0;$i<$num_result;$i++){
            $row = $result->fetch_assoc();
            $re = $row["Dname"];
        }

        $db->close();

        return $re;
    }

    public function getDnameByIndexAndHidAndDid($index,$hid,$kid){
        @ $db = new mysqli("localhost","root","1235869470","hospital");
        $re = "";

        if(mysqli_connect_errno()){
            echo'Error: could not connect database, please try again later! ';
            exit;
        }

        $query = "select Dname from doctor where Hid='".$hid."' and Kid='".$kid."'";
        $result = $db->query($query);
        $num_result = $result->num_rows;
        for($i = 0;$i<$num_result;$i++){
            $row = $result->fetch_assoc();
            if($i == $index) $re = $row["Dname"];
        }

        $db->close();

        return $re;
    }

    public function _getDtimeByIndexAndDname($index,$dname){
        @ $db = new mysqli("localhost","root","1235869470","hospital");
        $re = "";

        if(mysqli_connect_errno()){
            echo'Error: could not connect database, please try again later! ';
            exit;
        }

        $query = "select Dtime from doctor where Dname='".$dname."'";
        $result = $db->query($query);
        $num_result = $result->num_rows;
        for($i = 0;$i<$num_result;$i++){
            $row = $result->fetch_assoc();
            if($i == $index) $re = $row["Dtime"];
        }

        $db->close();

        return $re;
    }

    public function getDheadByHidAndDid($index,$hid,$kid){
        @ $db = new mysqli("localhost","root","1235869470","hospital");
        $re = "";

        if(mysqli_connect_errno()){
            echo'Error: could not connect database, please try again later! ';
            exit;
        }

        $query = "select Dhead from doctor where Hid='".$hid."' and Kid='".$kid."'";
        $result = $db->query($query);
        $num_result = $result->num_rows;
        for($i = 0;$i<$num_result;$i++){
            $row = $result->fetch_assoc();
            if($i == $index)$re = $row["Dhead"];
        }

        $db->close();

        return $re;
    }

    public function getDsexByHidAndDid($index,$hid,$kid){
        @ $db = new mysqli("localhost","root","1235869470","hospital");
        $re = "";

        if(mysqli_connect_errno()){
            echo'Error: could not connect database, please try again later! ';
            exit;
        }

        $query = "select Dsex from doctor where Hid='".$hid."' and Kid='".$kid."'";
        $result = $db->query($query);
        $num_result = $result->num_rows;
        for($i = 0;$i<$num_result;$i++){
            $row = $result->fetch_assoc();
            if($i == $index)$re = $row["Dsex"];
        }

        $db->close();

        return $re;
    }

    public function getDtimeByHidAndDid($index,$hid,$kid){
        @ $db = new mysqli("localhost","root","1235869470","hospital");
        $re = "";

        if(mysqli_connect_errno()){
            echo'Error: could not connect database, please try again later! ';
            exit;
        }

        $query = "select Dtime from doctor where Hid='".$hid."' and Kid='".$kid."'";
        $result = $db->query($query);
        $num_result = $result->num_rows;
        for($i = 0;$i<$num_result;$i++){
            $row = $result->fetch_assoc();
            if($i == $index)$re = $row["Dtime"];
        }

        $db->close();

        return $re;
    }
    public function getDsummaryByHidAndDid($index,$hid,$kid){
        @ $db = new mysqli("localhost","root","1235869470","hospital");
        $re = "";

        if(mysqli_connect_errno()){
            echo'Error: could not connect database, please try again later! ';
            exit;
        }

        $query = "select Dsummary from doctor where Hid='".$hid."' and Kid='".$kid."'";
        $result = $db->query($query);
        $num_result = $result->num_rows;
        for($i = 0;$i<$num_result;$i++){
            $row = $result->fetch_assoc();
            if($i == $index)$re = $row["Dsummary"];
        }

        $db->close();

        return $re;
    }
}