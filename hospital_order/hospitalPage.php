<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>浙江省诊疗服务平台</title>
</head>
<?php
require_once("head.php");
require_once("HospitalDAO.php");
require_once("H_KDAO.php");
require_once("KeshiDAO.php");
require_once("UserDAO.php");
require_once("DoctorDAO.php");
require_once("OrderDAO.php");
?>

<style>
    .keleyi
    {
        height: 10%;
        width: 11.8%;
        border: none;
    }
    .keleyi:hover
    {
        background-color: #d9f5ff;
    }
    a
    {
        color: Blue;
    }
</style>

<body>
    <img src="bg.jpg" style="width:100%;height:140%;position:absolute;left:0;top:29.3%" >
    <img src="bgw.jpg" style="width:42%;height:27%;position:absolute;left:20%;top:35%" >
    <hr color="#efefef" style="width:39.5%;height:0.001%;position:absolute;left:21%;top:41%"/>
    <img src="biaoqian.jpg" style="width:5%;height:4.3%;position:absolute;left:36.8%;top:37.2%" >
    <img src="bgw.jpg" style="width:42%;height:85%;position:absolute;left:20%;top:65%" >
    <?php
        if(!isset($_GET["Hname"])) $Hname = "";
        else $Hname = $_GET["Hname"];

        if(!isset($_SESSION["Uname"]) || $_SESSION["Uname"] == null) $uname = "";
        else $uname = $_SESSION["Uname"];

        $hdao = new HospitalDAO();
        $h_kdao = new H_KDAO();
        $kdao = new KeshiDAO();
        $area = $hdao->getHareaByHname($Hname);
        $grade = $hdao->getHgradeByHname($Hname);
        $head = $hdao->getHheadByHname($Hname);
        $summary = $hdao->getHsummaryByHname($Hname);
        $Hid = $hdao->getHidByHname($Hname);
        $nums = $h_kdao->getKeshiNumsByHid($Hid);

        $udao = new UserDAO();
        $odao = new OrderDAO();
        $ddao = new DoctorDAO();
        $usex = $udao->getUsexByUname($uname);
        $uphone = $udao->getUphoneByUname($uname);
        $uid = $udao->getUidByUname($uname);
        $num_or = $odao->getOrderNumsByUid($uid);

        echo "<a href='home_page.php' style=\"color:#aeaeae;position:absolute;left:20%;top:31.5%;font-size:15px;\">首页&nbsp;></a>";
        echo "<a href='getHospitalList.php' style=\"color:#aeaeae;position:absolute;left:24.5%;top:31.5%;font-size:15px;\">$area&nbsp;></a>";
        echo "<font style=\"color:#3dafa7;position:absolute;left:29%;top:31.5%;font-size:18px;\">$Hname</font>";
        echo "<font style=\"color:#000000;position:absolute;left:21%;top:37%;font-size:30px;\">$Hname</font>";
        echo "<font style=\"color:#e87404;position:absolute;left:37.5%;top:38.3%;font-size:15px;\">$grade</font>";
        echo "<img src=\"$head\" style=\"width:9%;height:15%;position:absolute;left:21%;top:43.4%\" >";
        echo "<textarea disabled=\"disabled\" name=\"content\" cols=\"50\" rows=\"20\" style=\"position:absolute;left:33%;top:44%;font-size:15px;background:#ffffff;width:27.2%;height:13.8%;border:none;\">$summary</textarea>";
        $tempHname = $Hname."所有科室";
        echo "<font style=\"color:#000000;position:absolute;left:21%;top:66.6%;font-size:20px;\">$tempHname</font>";
        for($i = 0;$i < $nums;$i++){
            $temp = $h_kdao->getKidByIndexAndHid($i,$Hid);
            $temp2 = $kdao->getKnameByKid($temp);
            $ps = 70 + $i * 10;
            $ps2 = $ps + 5;
            $ps3 = $ps2 + 5;
            echo "<hr color=\"#efefef\" style=\"border:1px dashed #dbdbdb;width:39.5%;height:0.001%;position:absolute;left:21%;top:$ps%\"/>";
            echo "<a href='keshiPage.php?Hid=$Hid&Kid=$temp' style=\"color:#000000;position:absolute;left:21%;top:$ps2%;font-size:15px;\">$temp2</a>";
            if($i == $nums - 1) echo "<hr color=\"#efefef\" style=\"border:1px dashed #efefef;width:39.5%;height:0.001%;position:absolute;left:21%;top:$ps3%\"/>";
        }

        if(isset($_SESSION["Uname"]) && $_SESSION["Uname"] != null){
            echo "<img src=\"bgw.jpg\" style=\"width:15%;height:70%;position:absolute;left:65%;top:35%\" >
                <font style=\"color:#02A8AF;position:absolute;left:65.8%;top:38%;font-size:18px;\">用户信息</font>;
                <hr color=\"#02A8AF\" style=\"border:1px dashed #dbdbdb;width:11.5%;height:0.001%;position:absolute;left:65.8%;top:40.5%\"/>
                <font style=\"color:#000000;position:absolute;left:65.8%;top:45%;font-size:16px;\">$uname</font>;
                <font style=\"color:#02A8AF;position:absolute;left:65.8%;top:49%;font-size:12px\">性别 : <font color='#bcbcbc'>$usex</font></font>
                <font style = \"color:#02A8AF;position:absolute;left:65.8%;top:53%;font-size:12px\" >电话 : <font color = '#bcbcbc' >$uphone</font ></font>
                <hr color=\"#02A8AF\" style=\"border:1px dashed #dbdbdb;width:11.5%;height:0.001%;position:absolute;left:65.8%;top:56.5%\"/>
                <font style=\"color:#02A8AF;position:absolute;left:65.8%;top:60%;font-size:18px;\">用户预约信息</font>;
                <hr color=\"#02A8AF\" style=\"border:1px dashed #dbdbdb;width:11.5%;height:0.001%;position:absolute;left:65.8%;top:63.5%\"/>";
            for($i = 0;$i<$num_or;$i++){
                $ps123 = 65 + 10 * $i;
                $ps_123 = $ps123 - 5;
                $ps1234 = 80 + 10 * $i;
                $ps1235 = 10 + 10 * $i;
                $hid_or = $odao->getHidByIndexAndUid($i,$uid);
                $did_or = $odao->getDidByIndexAndUid($i,$uid);
                $hname_or = $hdao->getHnameByHid($hid_or);
                $dname_or = $ddao->getDnameByDid($did_or);
                $ortime = $odao->getOrderTimeByUidAndIndex($i,$uid);
                echo" <div class=\"keleyi\" style=\"cursor:pointer;position:absolute;left:65.8%;top:$ps123%;\">
                <font style=\"position:absolute;left:2%;top:13%;font-size:15px;\">$hname_or</font>
                <font style=\"color:#02A8AF;position:absolute;left:3%;top:38%;font-size:12px\">医生 : <font color='#bcbcbc'>$dname_or</font></font>
                <font style = \"color:#02A8AF;position:absolute;left:3%;top:63%;font-size:12px\" >日期 : <font color = '#bcbcbc' >$ortime</font ></font >
                <hr color=\"#efefef\" style=\"border:1px dashed #dbdbdb;width:100%;height:0.001%;position:absolute;left:0;top:$ps1234%\"/>
                <input type=\"button\" value=\"删除\" onClick=\"window . location . href = 'shanchu.php?uid=$uid&did=$did_or'\"
                style=\"cursor:pointer;position:absolute;width:20%;height:30%;left:75%;top:$ps_123%;color:#ffffff;
                font - size:10px;border:none;background:#02A8AF;\">
                <input type=\"button\" value=\"更改\" onClick=\"window . location . href = 'hospitalPage.php?Hname=$Hname&dnameop=$dname_or&xiugai=true'\"
                style=\"cursor:pointer;position:absolute;width:20%;height:30%;left:75%;top:$ps1235%;color:#ffffff;
                font - size:10px;border:none;background:#02A8AF;\">
              </div >";
           }
            if(!isset($_GET["xiugai"]) || $_GET["xiugai"] == null) $xiugai = false; else $xiugai = $_GET["xiugai"];
            if($xiugai){
                if(!isset($_GET["dnameop"])||$_GET["dnameop"]==null) $dnameot = ""; else $dnameot = $_GET["dnameop"];
                echo "<img src=\"bgw.jpg\" style=\"width:10%;height:30%;position:absolute;left:82%;top:60%\" >
                <input type=\"button\" value=\"X\" onClick=\"window . location . href = 'hospitalPage.php?Hname=$Hname'\"
                class=\"bbb\" onMouseOut=\"this.style.backgroundColor=''\"
                                                          onMouseOver=\"this.style.backgroundColor='#729CE3'\"
                style=\"height:3.6%;width:1.8%;position:absolute;left:91%;top:58%;cursor:pointer;color:#ffffff;

                font-size:15px;border-style:dashed;border-width:0;border-radius:150px;background:#02A8AF;\"
                >
                ";
                $numd = $ddao->getDtimeNumsByDname($dnameot);
                for($k = 0;$k<$numd;$k++){
                    $ps12 = 80 + 5 * $k;
                    $temp_dtime = $ddao->_getDtimeByIndexAndDname($k,$dnameot);
                    echo "<a href='home_page.php' style=\"position:absolute;left:90%;top:$ps12%;font-size:15px;\">$temp_dtime</a>
                    ";
                }
            }
        }else{
            echo "<img src=\"bgw.jpg\" style=\"width:15%;height:70%;position:absolute;left:65%;top:35%\" >
                <font style=\"color:#000000;position:absolute;left:65.8%;top:38%;font-size:18px;\">用户未登录</font>;
                ";
        }

    ?>
    <img src="web_bottom.png" style="width:100%;height:40%;position:absolute;left:0;top:153%">
</body>
</html>