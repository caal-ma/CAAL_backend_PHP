<?php
function genRandStr($length=NULL){
	if(!$length)$length=mt_rand(64,96);
    $c = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';$cl = strlen($c);
    $s = '';
    for($i=0;$i<$length;$i++)$s.=$c[mt_rand(0,$cl-1)];
	return $s;
}

if(@!is_null($_POST["post"])){
	$name=genRandStr(20);
	file_put_contents("posts/".$name.".post",htmlentities($_POST["title"]."\n".time()."\n".$_POST["categories"]."\n".$_POST["content"]."\n"));
}
if(@!is_null($_POST["confpost"])){
	//$name.".tmppost";
	//file_put_contents("posts/");
}

?>

<style>
label{display:block;width:500px;padding-left:400px;}
label input{width:100%;}
</style>
<form method="POST">
<label>Title <input type="text" name="title" placeholder = "Important Announcement" /></label>
<label>Categories <input type="text" name="categories" placeholder="announcements important really_important" /></label>
<label><textarea name="content">Moo.</textarea></label>
<label><input type="submit" name="post" /></label>
</form>