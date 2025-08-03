<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <?php
                include "../includes/pdoconnection.php";
                $sql = "SELECT tbluser.name,tblgate.gate_name FROM `tbluser` INNER JOIN tblgate ON tbluser.gate_id=tblgate.gate_id WHERE tbluser.user_id=".$_SESSION['uid']." AND tbluser.gate_id=".$_SESSION['ugate'];
                
                foreach($conn->query($sql) as $var){
                    // var_dump($var);
                    echo $var['name'] .' ('. $var['gate_name'] .')';
                }
                ?>
            </div>
        </div>
    </div>
</header>