<!--
任务系统类型
1.对话类型
2.

-->

<?php
$db = new Mysql();
$user = $_SESSION['userid'];
$role = $db->table('role')->field('*')->where("Id=$user")->item();
if (isset($_GET['task'])) {
    $task = $db->table('task')->field('*')->where("Id={$_GET['task']}")->item();
} else {
    exit("未知的任务ID");
}
?>
<div style="height: 20px"></div>
<div style="text-align: left;color: white;font-size: 14px;margin-top: 10px">
    <h3><?php
        if($role['task']>$_GET['task'])
            echo "交付成功";
        else
            echo "交付失败";
        ?>
    </h3>
    <div style="height: 20px"></div>
    <?php
    $html=<<<EOF
    获得奖励:<?php echo "  {$task['silver']} 银币"; ?><br>
    EOF;
    if($role['task']>$_GET['task'])
        echo $html;
    else
        echo "任务未完成！";
    ?>
    <div style="height: 20px"></div>
    <a href="/main.php" style="color: #0f6674;font-size: 15px;margin-top: 3px">回到首页</a>
</div>