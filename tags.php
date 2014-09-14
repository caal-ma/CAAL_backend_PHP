<a href="tags.php">Deselect tags</a>
<?php
require "functions.php";
$b = new BlogManager;
if(@!is_null($_GET["t"])){
	$b->filterByTags([$_GET["t"]]);
	echo "<h1>Posts tagged <i>".$_GET["t"]."</i></h1>";
}
else{
	echo "<h1>No tags selected.</h1>";
}

echo $b->toString();
?>
