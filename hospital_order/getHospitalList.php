<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>浙江省诊疗服务平台</title>
    <base target="_blank" />
    <style>
        .keleyi
        {
            height: 13%;
            width: 43%;
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
</head>
<?php
    require_once("head.php");
    require_once("HospitalDAO.php");
    $areas = array("全部","杭州","宁波","温州","嘉兴","湖州","绍兴","金华","衢州","舟山","台州","丽水","义乌","省直");
    $grades = array("全部","三级甲等","三级乙等","二级甲等","二级乙等");
    $hdao = new HospitalDAO();
    if(!isset($_GET["area"])) $area = "全部"; else $area = $_GET["area"];
    if(!isset($_GET["grade"])) $grade = "全部"; else $grade = $_GET["grade"];
    if(!isset($_GET["pn"])) $pn = 1; else $pn = $_GET["pn"];
    $num_h = $hdao->getHospitalNumsByHareaAndHgrade($area,$grade);
    $nrOfPages=0;
    if($num_h % 4 != 0) $nrOfPages = floor($num_h / 4) + 1; else $nrOfPages = $num_h / 4;
?>
<body>
    <img src="bg.jpg" style="width:100%;height:140%;position:absolute;left:0;top:29.3%" >
    <img src="bgw.jpg" style="width:59.5%;height:115%;position:absolute;left:20%;top:35%" >
    <hr color="#efefef" style="border:1px dashed #dbdbdb;width:57.5%;height:0.001%;position:absolute;left:21%;top:41%"/>
    <hr color="#efefef" style="border:1px dashed #dbdbdb;width:57.5%;height:0.001%;position:absolute;left:21%;top:47%"/>
    <hr color="#efefef" style="color:#dbdbdb;width:42.8%;height:0.001%;position:absolute;left:21%;top:55%"/>
    <hr color="#efefef" style="color:#dbdbdb;width:45.5%;height:0.001%;position:absolute;left:21%;top:109.5%"/>
    <?php
        echo "<a href='home_page.php' style=\"color:#aeaeae;position:absolute;left:20%;top:31.5%;font-size:15px;\">首页&nbsp;></a>";
        echo "<font style=\"color:#3dafa7;position:absolute;left:24.5%;top:31%;font-size:18px;\">医院汇总页</font>";
        echo "<font style=\"color:#000000;position:absolute;left:24.5%;top:38%;font-size:18px;\">地区：</font>";
        echo "<font style=\"color:#000000;position:absolute;left:24.5%;top:44%;font-size:18px;\">等级：</font>";
        for($i = 0;$i < 14;$i++) {
            $position = 28.1 + $i * 3.1;
            if($area == $areas[$i]){
                echo "<input type=\"button\" value=\"$areas[$i]\" onClick=\"window.location.href='getHospitalList.php?grade=$grade&area=$areas[$i]'\"
                style=\"text-align:center;height:4.5%;position:absolute;left:$position%;top:37%;cursor:pointer;color:#ffffff;font-size:15px;border:none;background:#02A8AF;\"
                >";
            }else{
                echo "<input type=\"button\" value=\"$areas[$i]\" onClick=\"window.location.href='getHospitalList.php?grade=$grade&area=$areas[$i]'\"
                style=\"text-align:center;height:4.5%;position:absolute;left:$position%;top:37%;cursor:pointer;color:#000000;font-size:15px;border:none;background:none;\"
                >";
            }
        }
        for($i = 0;$i < 5;$i++) {
            if($i <= 1) $position = 28.1 + $i * 3.1; else $position = 31.2 + ($i - 1) * 5;
            if($grade == $grades[$i]){
                echo "<input type=\"button\" value=\"$grades[$i]\" onClick=\"window.location.href='getHospitalList.php?grade=$grades[$i]&area=$area'\"
                style=\"text-align:center;height:4.5%;position:absolute;left:$position%;top:43%;cursor:pointer;color:#ffffff;font-size:15px;border:none;background:#02A8AF;\"
                >";
            }else{
                echo "<input type=\"button\" value=\"$grades[$i]\" onClick=\"window.location.href='getHospitalList.php?grade=$grades[$i]&area=$area'\"
                style=\"text-align:center;height:4.5%;position:absolute;left:$position%;top:43%;cursor:pointer;color:#000000;font-size:15px;border:none;background:none;\"
                >";
            }
        }
        echo "<font style=\"color:#000000;position:absolute;left:21%;top:51%;font-size:18px;\"><strong>共&nbsp;<font color='red'><strong>$num_h</strong></font>&nbsp;家医院</strong></font>";
        if($num_h !=0 && $pn != $nrOfPages) {
            $i2 = 0;
            for ($i = 0 + 4 * ($pn - 1); $i < $pn * 4; $i++) {
                $ps1 = 56.2 + 13 * $i2;
                $i2 = $i2 + 1;
                $h_name = $hdao->getHnameByHareaAndHgradeAndIndex($area, $grade, $i);
                $h_head = $hdao->getHheadByHname($h_name);
                $h_area = $hdao->getHareaByHname($h_name);
                $h_grade = $hdao->getHgradeByHname($h_name);
                $h_numoforder = $hdao->getHnumOfOrderByHname($h_name);
                echo "<div onclick=\"document.location='hospitalPage.php?Hname=$h_name';\" class=\"keleyi\" style=\"cursor:pointer;position:absolute;left:21%;top:$ps1%;\">
                    <img src='$h_head'style=\"position:absolute;width:10%;height:65%;left:3%;top:16%;\">
                    <font style=\"position:absolute;left:15%;top:13%;\">$h_name</font>
                    <font style=\"color:#02A8AF;position:absolute;left:15%;top:38%;font-size:12px\">地区 : <font color='#bcbcbc'>$h_area</font></font>
                    <font style=\"color:#02A8AF;position:absolute;left:15%;top:63%;font-size:12px\">等级 : <font color='#bcbcbc'>$h_grade</font></font>
                    <hr color=\"#efefef\" style=\"border:1px dashed #dbdbdb;width:100%;height:0.001%;position:absolute;left:0;top:89%\"/>
                    <input type=\"button\" value=\"已成功预约&#13;&#10;$h_numoforder 人次\" style=\"cursor:pointer;position:absolute;width:14.5%;height:42%;left:84%;top:12%;color:#ffffff;font-size:15px;border:none;background:#02A8AF;\">
                </div>";
            }
        }else {
            $i2 = 0;
            for ($i = 0 + 4 * ($pn - 1); $i < $num_h; $i++) {
                $ps1 = 56.2 + 13 * $i2;
                $i2++;
                $h_name = $hdao->getHnameByHareaAndHgradeAndIndex($area, $grade, $i);
                $h_head = $hdao->getHheadByHname($h_name);
                $h_area = $hdao->getHareaByHname($h_name);
                $h_grade = $hdao->getHgradeByHname($h_name);
                $h_numoforder = $hdao->getHnumOfOrderByHname($h_name);
                echo "<div onclick=\"document . location = 'hospitalPage.php?Hname=$h_name';\" class=\"keleyi\" style=\"cursor:pointer;position:absolute;left:21%;top:$ps1%;\">
                    <img src='$h_head'style=\"position:absolute;width:10%;height:65%;left:3%;top:16%;\">
                    <font style=\"position:absolute;left:15%;top:13%;\">$h_name</font>
                    <font style=\"color:#02A8AF;position:absolute;left:15%;top:38%;font-size:12px\">地区 : <font color='#bcbcbc'>$h_area</font></font>
                    <font style=\"color:#02A8AF;position:absolute;left:15%;top:63%;font-size:12px\">等级 : <font color='#bcbcbc'>$h_grade</font></font>
                    <hr color=\"#efefef\" style=\"border:1px dashed #dbdbdb;width:100%;height:0.001%;position:absolute;left:0;top:89%\"/>
                    <input type=\"button\" value=\"已成功预约&#13;&#10;$h_numoforder 人次\" style=\"cursor:pointer;position:absolute;width:14.5%;height:42%;left:84%;top:12%;color:#ffffff;font-size:15px;border:none;background:#02A8AF;\">
                </div>";
            }
        }
        for($j = 0;$j < $nrOfPages;$j++){
            $temp = $j + 1;
            $position_2 = 40 + 3 * $j;
            if($pn == $temp) {
                echo "<input type=\"button\" value=\"$temp\" onClick=\"window.location.href='getHospitalList.php?pn=$temp'\"
                style=\"height:4%;width:2%;position:absolute;left:$position_2%;top:128%;cursor:pointer;color:#ffffff;font-size:15px;border-style:dashed;border-width:1px;border-radius:150px;background:#02A8AF;\"
                >";
            }else{
                echo "<input type=\"button\" value=\"$temp\" onClick=\"window.location.href='getHospitalList.php?pn=$temp'\"
                style=\"height:4%;width:2%;position:absolute;left:$position_2%;top:128%;cursor:pointer;color:#02A8AF;font-size:15px;border-style:dashed;border-width:2px;border-radius:150px;background:#ffffff;\"
                >";
            }
        }
    ?>
    <img src="web_bottom.png" style="width:100%;height:40%;position:absolute;left:0;top:153%">
</body>
</html>