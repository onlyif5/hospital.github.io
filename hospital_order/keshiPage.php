<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>浙江省诊疗服务平台</title>
</head>
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
<?php
    require_once("head.php");
    require_once("HospitalDAO.php");
    require_once("H_KDAO.php");
    require_once("KeshiDAO.php");
    require_once("UserDAO.php");
    require_once("DoctorDAO.php");
    require_once("OrderDAO.php");
    if(!isset($_SESSION["Uname"]) || $_SESSION["Uname"] == null) $uname = ""; else $uname = $_SESSION["Uname"];
    if(!isset($_GET["Hid"])) $Hid = "";
    else $Hid = $_GET["Hid"];
    if(!isset($_GET["Kid"])) $Kid = "";
    else $Kid = $_GET["Kid"];
    $hdao = new HospitalDAO();
    $kdao = new KeshiDAO();
    $ddao = new DoctorDAO();
    $hname = $hdao->getHnameByHid($Hid);
    $harea = $hdao->getHareaByHname($hname);
    $kname = $kdao->getKnameByKid($Kid);
    $ksummary = $kdao->getKsummaryByKid($Kid);
    $num_doc = $ddao->getDoctorNumsByHidAndKid($Hid,$Kid);
    $udao = new UserDAO();
    $odao = new OrderDAO();
    $usex = $udao->getUsexByUname($uname);
    $uphone = $udao->getUphoneByUname($uname);
    $uid = $udao->getUidByUname($uname);
    $num_or = $odao->getOrderNumsByUid($uid);
?>
<body>
    <img src="bg.jpg" style="width:100%;height:140%;position:absolute;left:0;top:29.3%" >
    <img src="bgw.jpg" style="width:42%;height:27%;position:absolute;left:20%;top:35%" >
    <hr color="#efefef" style="width:39.5%;height:0.001%;position:absolute;left:21%;top:41%"/>
    <img src="bgw.jpg" style="width:42%;height:85%;position:absolute;left:20%;top:65%" >
    <?php
        echo "<a href='home_page.php' style=\"color:#aeaeae;position:absolute;left:20%;top:31.5%;font-size:15px;\">首页&nbsp;></a>";
        echo "<a href='getHospitalList.php' style=\"color:#aeaeae;position:absolute;left:24.5%;top:31.5%;font-size:15px;\">$harea&nbsp;></a>";
        echo "<a href='hospitalPage.php?Hname=$hname' style=\"color:#aeaeae;position:absolute;left:29%;top:31.5%;font-size:15px;\">$hname&nbsp;></a>";
        echo "<font style=\"color:#3dafa7;position:absolute;left:39%;top:31%;font-size:18px;\">$kname</font>";
        echo "<font style=\"color:#000000;position:absolute;left:21%;top:37%;font-size:30px;\">$kname</font>";
        $yiyuan = "医院：".$hname;
        echo "<font style=\"color:#3dafa7;position:absolute;left:41.5%;top:38.5%;font-size:18px;\">$yiyuan</font>";
        echo "<textarea disabled=\"disabled\" name=\"content\" cols=\"50\" rows=\"20\" style=\"position:absolute;left:21%;top:44%;font-size:15px;background:#ffffff;width:39.2%;height:13.8%;border:none;\">$ksummary</textarea>";
        echo "<font style=\"color:#000000;position:absolute;left:21%;top:70%;font-size:18px;\">
            <strong>共&nbsp;<font color='red'><strong>$num_doc</strong></font>&nbsp;名医生</strong></font>";
        echo "<hr color=\"#efefef\" style=\"border:1px dashed #dbdbdb;width:39.5%;height:0.001%;position:absolute;left:21%;top:72.8%\"/>";
        for($i = 0;$i < $num_doc;$i++){
            $ps7 = 75 + $i * 20;
            $ps8 = 78 + $i * 20;
            $ps9 = 81 + $i * 20;
            $ps10 = 90 + $i * 20;
            $dnameo = $ddao->getDnameByIndexAndHidAndDid($i,$Hid,$Kid);
            $dheado = $ddao->getDheadByHidAndDid($i,$Hid,$Kid);
            $dsexo = $ddao->getDsexByHidAndDid($i,$Hid,$Kid);
            $dtimeo = $ddao->getDtimeByHidAndDid($i,$Hid,$Kid);
            $dsummaryo = $ddao->getDsummaryByHidAndDid($i,$Hid,$Kid);
            $dido = $ddao->getDidByHidAndKid($Hid,$Kid);
            echo"
            <img src='$dheado'style=\"position:absolute;width:4%;height:10%;left:21.3%;top:$ps7%;\">
            <font style=\"position:absolute;left:26%;top:$ps7%;\">$dnameo</font>
            <font style=\"position:absolute;font-size:10px;left:26%;top:$ps8%;\">性别：$dsexo</font>
            <font style=\"position:absolute;font-size:10px;left:26%;top:$ps9%;\">预约时间：$dtimeo</font>
            <textarea disabled=\"disabled\" name=\"content\" cols=\"50\" rows=\"20\"
            style=\"position:absolute;left:35%;top:$ps7%;font - size:15px;background:#ffffff;width:20%;
            height:13.8%;border:none;\">$dsummaryo</textarea>
            <hr color=\"#efefef\" style=\"border:1px dashed #dbdbdb;width:39.5%;height:0.001%;position:absolute;left:21%;top:$ps10%\"/>
            <input type=\"button\" value=\"预约\" onClick=\"window . location . href = 'insertDO.php?uid=$uid&hid=$Hid&did=$dido&ordertime=$dtimeo'\"
                style=\"cursor:pointer;position:absolute;width:4%;height:6%;left:56%;top:$ps9%;color:#ffffff;
                font - size:10px;border:none;background:#02A8AF;\">
            ";


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
                <input type=\"button\" value=\"更改\" onClick=\"window . location . href = 'keshiPage.php?Hid=$Hid&Kid=$Kid&dnameop=$dname_or&xiugai=true'\"
                style=\"cursor:pointer;position:absolute;width:20%;height:30%;left:75%;top:$ps1235%;color:#ffffff;
                font - size:10px;border:none;background:#02A8AF;\">
              </div >";
        }
        if(!isset($_GET["xiugai"]) || $_GET["xiugai"] == null) $xiugai = false; else $xiugai = $_GET["xiugai"];
        if($xiugai){
            if(!isset($_GET["dnameop"])||$_GET["dnameop"]==null) $dnameot = ""; else $dnameot = $_GET["dnameop"];
            echo "<img src=\"bgw.jpg\" style=\"width:10%;height:30%;position:absolute;left:82%;top:60%\" >
                <input type=\"button\" value=\"X\" onClick=\"window . location . href = 'keshiPage.php?Hid=$Hid&Kid=$Kid'\"
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