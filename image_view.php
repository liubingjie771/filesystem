<meta http-equiv='content-type' content='text/html;charset=UTF-8' />
<?php
$jdpath="./";
if($_GET['dir']!="")
{
	$jdpath=$_GET['dir'];
}
$dirlist=scandir($jdpath);
$j=0;
echo "<!--";
print_r($dirlist);
echo "-->";
$page=0;
if($_GET['page']!="")
{
	$page=$_GET['page'];
}
echo "<form action='' method='get'>";
echo "<input type='text' name='dir' id='dir' value='$jdpath' />";
echo "<select id='page' name='page'>";
for($p=0;$p<(count($dirlist)/20)-1;$p++)
{
	if($p==$page)
	{
		echo "<option value='$p' selected>$p</option>";
	}
	else
	{
		echo "<option value='$p'>$p</option>";
	}
}
echo "</select>";
echo "<input type='submit' value='go' />";
echo "</form>";
if(count($dirlist)>($page+1)*20)
{
	$j=($page+1)*20;
}
else
{
	exit;
}
$k=0;
for($i=$page*20;$i<$j;$i++)
{
	$filedetype=pathinfo($jdpath."/".$dirlist[$i], PATHINFO_EXTENSION);
	$filedetype=strtolower($filedetype);
	if($filedetype=="jpg"||$filedetype=="gif"||$filedetype=="png")
	{
		echo "<a href='{$jdpath}/{$dirlist[$i]}' target='_blank'><img src='{$jdpath}/{$dirlist[$i]}' width='20%'/></a>";
		$k=$k+1;
	}
	if($k%5==0)
	{
		echo "<br/>";
	}
}
?>