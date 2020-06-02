<?php
$query = "SELECT * FROM users WHERE id !=?";
$var = [$id];
$users = $db->row_array($query,$var);

foreach ($users as $user) {
?>
    <div class="friend" data-id="<?php echo $user->id ?>">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/1_copy.jpg" />
        <p>
            <strong><?php echo $user->name?></strong>
            <span><?php echo $user->email?></span>
        </p>
        <?
        $now =  date('H:i:s');
        $endTime = strtotime("+1 minutes", strtotime($now));
        $nexttime = date("H:i:s",$endTime);
        if($user->online == $now){
            echo '<div class="status available"></div>';
        }elseif($user->online <= $nexttime){
            echo '<div class="status away"></div>';
        }else{
            echo '<div class="status inactive"></div>';
        }
        ?>
    </div>

   <?php
}

?>