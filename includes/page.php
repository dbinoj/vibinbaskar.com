<?php
 
if(!$_POST['page']) die("0");

$page = $_POST['page'];
$page = str_replace('#','',$page);

if(file_exists('../data/pages/'.$page.'.html'))
	echo file_get_contents('../data/pages/'.$page.'.html');
else echo '<center><img src="images/404.png" alt="Uh oh! Its a 404!" title="Uh oh! Its a 404!"></center>';

?>