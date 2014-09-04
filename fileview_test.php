<html>
<head>
<link rel="shortcut icon" href="/G/Shared%20Pictures/icos/damotouicon16x16.ico" type="image/x-icon" />
<title>文件在线读看页面</title>
</head>
<?php
//临时缓存开启与验证
session_start();
//if($_SESSION['page_check']!="true")
if(0>1)
{
	if(md5($_POST['check_id'])=="50a3ce788e132894d6cade1a3e107583")
	{
		$_SESSION['page_check']="true";
		header("Location: #");
	}
	else
	{
		echo "<form action='' method='post'>";
		echo "网页密码：<input type='password' id='check_id' name='check_id' value='' />";
		echo "<input type='submit' value='进入'/>";
		echo "</form>";
	}
	exit();
}


//获取当前位置
$localpath=getcwd();
$urlpath="http://".$_SERVER['SERVER_NAME']."/G";
//文件网络地址
$fileurl=$_GET['file'];
//文件读取地址
$readfile=$fileurl;

//设置网页字符串的格式，UTF-8|GB2312
if((double)(filesize($readfile))>0)
{
	echo "<meta http-equiv='content-type' conent='text/html;charset=UTF-8' />";
}
else
{
	echo "<meta http-equiv='content-type' conent='text/html;charset=GB2312' />";
}
?>
<body>
<?php
	echo "<a href='$urlpath/$readfile' >下载文件</a><br/>";
	switch($_GET['type'])
	{
		case "text":
			echo "<textarea cols='60' rows='20'>";
			echo file_get_contents($localpath."/".$readfile);
			echo "</textarea>";
			break;
		case "rm":
		case "wav":
		case "avi":
		case "rmvb":
		case "mp3":
			echo "
				<object id='video' width='400' height='200' border='0' classid='clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA'> 
				<param name='ShowDisplay' value='0'> 
				<param name='ShowControls' value='1'> 
				<param name='AutoStart' value='1'> 
				<param name='AutoRewind' value='0'> 
				<param name='PlayCount' value='0'> 
				<param name='Appearance value='0 value='''> 
				<param name='BorderStyle value='0 value='''> 
				<param name='MovieWindowHeight' value='240'> 
				<param name='MovieWindowWidth' value='320'> 
				<param name='FileName' value='".$fileurl."'> 
				<embed width='80%' height='80%' border='0' showdisplay='0' showcontrols='1' autostart='1' autorewind='1' playcount='1' moviewindowheight='100%' moviewindowwidth='100%' filename='".$fileurl."' src='".$fileurl."'> 
				</embed> 
				</object>
			";
			break;
		case "jpg":
		case "gif":
		case "png":
		case "tif":
		case "jpeg":
			echo "<img src='".$fileurl."' height='80%' />";
			break;
		case "pdf":
			echo "
			<object classid='clsid:CA8A9780-280D-11CF-A24D-444553540000' width='990' height='700' border='0' top='-10' name='pdf'>   
                    <param name='toolbar' value='false'>  
                    <param name='_Version' value='65539'>  
                    <param name='_ExtentX' value='20108'>  
                    <param name='_ExtentY' value='10866'>  
                    <param name='_StockProps' value='0'>  
                    <param name='SRC' value='".$fileuri."'>  
                <object data='".$fileuri."' type='application/pdf' width='300' height='200' class='hiddenObjectForIE'>     
                    <a href='res/papers/<s:property value='paper.filename'></a>'><s:property value='paper.filename'/></a>   
                </object></object>  
			";
		default :
			echo "default";
			break;
	}
	
?>
</body>
</html>