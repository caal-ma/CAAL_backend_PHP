
<pre>
<?php
require "functions.php";

$b = new BlogManager;
$b->filterReverseChron(0,2);
var_dump($b->posts);
?>
</pre>
hello

