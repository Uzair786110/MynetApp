<?php

require_once 'db_config.php';
$fetch="Select * from user";
$fres = mysqli_query($db,$fetch);
while($frow = mysqli_fetch_assoc($fres))
{
$Balance=$frow['Remaining'];
$Price=$frow['price'];
$new=$Price+$Balance;
$id=$frow['id'];

$setrem="UPDATE `user` SET `Remaining`='$new' WHERE id=$id";
//echo $setrem;
$ures = mysqli_query($db,$setrem);
if($ures)
{
echo 'succ';
}
else
{
    echo 'err';
}
}

?>