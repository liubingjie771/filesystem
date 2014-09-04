<meta http-equiv='content-type' content='text/html;charset=UTF-8' />
<link rel="shortcut icon" href="/G/Shared%20Pictures/icos/damotouicon16x16.ico" type="image/x-icon" />
<center>
<?php

//临时缓存开启与验证
session_start();
//if($_SESSION['page_check']!="true")
if(0>1)
{
	if(md5($_POST['check_id'])=="50a3ce788e132894d6cade1a3e107583")
	{
		$_SESSION['page_check']="true";
		header("Location: ".$_SERVER['PHP_SELF']);
	}
	else
	{
		echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
		echo "网页密码：<input type='password' id='check_id' name='check_id' value='' />";
		echo "<input type='submit' value='进入'/>";
		echo "</form>";
	}
	exit();
}
else
{
?>
<audio controls="controls" hidden='hidden' autoplay="autoplay">
	<!--source src="/G/Music/铃儿响叮当.mp3" type="audio/mpeg" -->
	<source src="/G/Music/一万个舍不得.mp3" type="audio/mpeg" >
	<source src="/G/Music/宝莲灯前传_片尾曲.mp3" type="audio/mpeg" >
	<source src="/G/Music/朋友(周华健).mp3" type="audio/mpeg" >
	<source src="/G/Music/鸿雁.mp3" type="audio/mpeg" >
	<source src="/G/Music/荷塘月色.mp3" type="audio/mpeg" >
</audio>
<?php
}

function dfs($path)
{
	if(filesize($path)==65536)
	{
		return "--dir--";
	}
	elseif(filesize($path)==0)
	{
		return "-----";
	}
	else
	{
		return formatBytes(filesize($path));
	}
}

function formatBytes($size) { 
  $units = array(' B', ' KB', ' MB', ' GB', ' TB'); 
  for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024; 
  return round($size, 2).$units[$i]; 
 }

function fpermfun($path,$ugdd)
{
	$retinfo="";
	$uudd="";
	$ggdd="";
	if(fileowner($path)!=FALSE)
	{
		$userinfo=posix_getpwuid(fileowner($path));
		$uudd=$userinfo['name'];
		$ggdd=$userinfo['gid'];
	}
	else
	{
		return "-----";
	}
	if($ugdd=="user")
	{
		return $uudd;
	}
	else
	{
		$groupinfo=posix_getpwuid($ggdd);
		return $groupinfo['name'];
	}
}

function frwp($path)
{
	if(is_writable($path))
	{
		return "开放";
	}
	else
	{
		return "关闭";
	}
}

function urladdress($urladd,$sysadd)
{
	$filedetype=pathinfo($sysadd, PATHINFO_EXTENSION);
	switch(strtolower($filedetype))
	{
		case 'php' :
		case 'txt' : 
		case 'asp' : 
		case 'pl' :
		case 'cgi' :
		case 'aspx' :
		case 'htm':
		case 'sh' : 
		case 'html' :
		case 'php' : 
		case 'reg' :
		case 'log' :
		case 'xml' :
		case 'config' :
		case 'conf' :
		case 'cfg' :
		case 'ini' :
		case 'mf' :
		case 'css' :
		case 'js' :
		case 'manifest' :
		case 'bat' : $tzurl = "fileview_test.php?file={$urladd}&type=text"; break;
		case 'jpg' :
		case 'gif' :
		case 'tiff' :
		case 'png' : $tzurl = "fileview_test.php?file={$urladd}&type=jpeg"; break;
		case 'mp4' :
		case 'avi' :
		case 'wav' :
		case 'wmv' : $tzurl = "fileview_test.php?file={$urladd}&type=mp4"; break;
		case 'mp3' :
		case 'midi' : $tzurl = "fileview_test.php?file={$urladd}&type=mp3"; break;
		case 'rm' :
		case 'rmvb' : $tzurl = "fileview_test.php?file={$urladd}&type=rm"; break;
		case 'pdf' : $tzurl = "fileview_test.php?file={$urladd}&type=pdf"; break;
		default : $tzurl = "fileview_test.php?file=".$urladd."&type=".$filedetype; break;
	}
	return $tzurl;
	//return $sysadd;
}

$jdpath=getcwd();
if($_GET['dir']!=""&&$_GET['dir']!="/"&&$_GET['dir']!=".")
{
	$jdpath=$jdpath."/".$_GET['dir'];
	$xdpath=$_GET['dir'];
}
else
{
	$xdpath=".";
}
$dirlist=scandir($jdpath);
echo "<!--";
print_r($dirlist);
echo "-->";

if(count($dirlist)>1)
{
	echo "<h1>目录文件管理页面</h1>";
	echo "<p style='color:red'>共有<b><u>".(count($dirlist)-2)."</u></b>个文件或文件夹</p>";
	echo "<table width='80%' bgcolor='lightblue' border='0'>";
	echo "<thead>";
	echo "<tr bgcolor='lightgreen'>";
	echo "<th style='color:red'>ID</th>";
	echo "<th>文件名称</th>";
	echo "<th>文件权限</th>";
	echo "<th>文件属主</th>";
	echo "<th>文件属组</th>";
	echo "<th>写权限</th>";
	echo "<th width='18%'>文件大小</th>";
	echo "<th width='24%'>";
	if($xdpath!=".")
	{
		echo "<a href='?dir=";
		echo dirname($xdpath);
		echo "'>上级目录</a>";
	}
	else
		echo "上级目录";
	echo "&nbsp;<a href='fdirupdoad1.php?dir=";
	echo $xdpath;
	echo "' target='_blank'>目录上传</a>";
	echo "</th>";
	echo "</tr>";
	echo "<thead>";
	echo "<tbody>";
	for($i=2;$i<count($dirlist);$i++)
	{
		if($i%2==0)
			echo "<tr bgcolor='lightgray'>";
		else
			echo "<tr bgcolor='orange'>";
		echo "<th width='5%' style='color:#4466FA'><!--文件序号-->".($i-1)."</th>";
		echo "<td width='20%'><!--文件名称-->{$dirlist[$i]}</td>";
		echo "<td width='5%'><!--文件权限-->".substr(base_convert(@fileperms($jdpath."/".$dirlist[$i]),10,8),-4)."</td>";
		echo "<td width='10%'><!--文件属主-->".fpermfun($jdpath."/".$dirlist[$i],'user')."</td>";
		echo "<td width='10%'><!--文件属组-->".fpermfun($jdpath."/".$dirlist[$i],'group')."</td>";
		echo "<td width='5%'><!--文件可写-->".frwp($jdpath."/".$dirlist[$i])."</td>";
		echo "<td width='10%'><!--文件类型-->".dfs($jdpath."/".$dirlist[$i])."</td>";
		if(filetype($jdpath."/".$dirlist[$i])=="file")
		{
			echo "<td>";
			echo "<a href='".urladdress($xdpath."/".$dirlist[$i],$jdpath."/".$dirlist[$i])."' target='_blank'>查看</a>";
			echo " ";
			echo "<a href='{$xdpath}/{$dirlist[$i]}' target='_blank'>运行</a>";
			echo " ";
			echo "<a href='down.php?dir={$xdpath}&file={$dirlist[$i]}' target='_blank'>下载</a>";
			echo " ";
			echo "<a href='rm.php?dir=./{$xdpath}&del=./{$xdpath}/{$dirlist[$i]}' target='_blank'>删除</a>";
			echo "</td>";
		}
		else
		{
			echo "<td>";
			echo " ";
			echo "<a href='?dir={$xdpath}/{$dirlist[$i]}'>查看下级</a>";
			echo "?";
			echo "<a href='image_view.php?dir={$xdpath}/{$dirlist[$i]}' target='_blank'>图库下级</a>";
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
}
else
{
	echo "{$xdpath}目录为空！<!--{$jdpath}目录为空！-->";
}
?>
<p><a href='/G/filelist_test.php'>公共库</a>  <a href='/Z/filelist_test.php'>资料库</a>  <a href='/P/filelist_test.php'>个人库</a></p>
</center>
