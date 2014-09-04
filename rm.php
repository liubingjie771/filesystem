<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<title>网站目录文件删除系统</title>
<!-- optimization begin -->
<script type="text/javascript">
//js异步加载管理
(function(){var w=this,d=document,version='1.0.7',data={},length=0,cbkLen=0;if(w.jsLoader){if(w.jsLoader.version>=version){return};data=w.jsLoader.getData();length=data.length};var addEvent=function(obj,eventType,func){if(obj.attachEvent){obj.attachEvent("on"+eventType,func)}else{obj.addEventListener(eventType,func,false)}};var domReady=false,ondomReady=function(){domReady=true};if(d.addEventListener){var webkit=navigator.userAgent.match(/AppleWebKit\/(\d+)/);if(webkit&&webkit[1]<525){doReadyStateCheck()}else{d.addEventListener("DOMContentLoaded",function(){d.removeEventListener("DOMContentLoaded",arguments.callee,false);ondomReady()},false)}};function doScrollCheck(){if(domReady){return};try{d.documentElement.doScroll("left")}catch(e){return};ondomReady()};function doReadyStateCheck(){if(domReady){return};if(d.readyState=='loaded'||d.readyState=='complete'){ondomReady();return}else{setTimeout(doReadyStateCheck,1);return}};function createPosNode(){if(jsLoader.caller){return};cbkLen++;if(!domReady&&d.attachEvent){doScrollCheck()};if(!domReady){try{d.write('<div style="display:none" id="_jl_pos_'+cbkLen+'"></div>');s=d.getElementById('_jl_pos_'+cbkLen)}catch(e){var s=d.createElement('div');s.id='_jl_pos_'+cbkLen;s.style.display='none';d.body.insertBefore(s,d.body.firstChild)}}else{var s=d.createElement('div');s.id='_jl_pos_'+cbkLen;s.style.display='none';d.body.appendChild(s)};return s};function getScript(url,dispose,charset){var scriptNode=d.createElement("script");scriptNode.type="text/javascript";if(charset){scriptNode.charset=charset};scriptNode.onreadystatechange=scriptNode.onload=function(){if(!this.readyState||this.readyState=="loaded"||this.readyState=="complete"){if(dispose){dispose()};scriptNode.onreadystatechange=scriptNode.onload=null;scriptNode.parentNode.removeChild(scriptNode)}};scriptNode.src=url;var h=d.getElementsByTagName("head")[0];h.insertBefore(scriptNode,h.firstChild)};var write=d.write,posNode;function cWrite(str){if(posNode.childNodes.length>0){return};if(posNode.innerHTML!=''){while(posNode.childNodes.length){posNode.parentNode.insertBefore(posNode.childNodes[0],posNode)}};posNode.innerHTML=str;while(posNode.childNodes.length){posNode.parentNode.insertBefore(posNode.childNodes[0],posNode)}};var JsObj=function(name,url){this.name=name;this.url=url;this.callback=[]};JsObj.prototype={status:'init',onload:function(){this.status='ok';var errors=[];for(var i=0;i<this.callback.length;i++){if(typeof this.callback[i]=='function'){try{if(this.callback[i].posNode){posNode=this.callback[i].posNode;d.write=cWrite};this.callback[i]();if(this.callback[i].posNode){d.write=write;this.callback[i].posNode.parentNode.removeChild(this.callback[i].posNode)}}catch(e){errors.push(e)}}};this.callback=[];if(errors.length!=0){throw errors[0]}}};w.jsLoader=function(cfg){var url=cfg.url||"";var name=cfg.name||"";var callback=cfg.callback||"";var charset=cfg.charset||"";if(name){if(!data[name]){if(!url){data[name]=new JsObj(name);data[name].status='waiting'}else{data[name]=new JsObj(name,url)};length++}else if(data[name].status=='waiting'&&url){data[name].status='init'};if(cfg.status){data[name].status=cfg.status};if(data[name].status=='loading'||data[name].status=='waiting'){if(typeof callback=='function'){callback.posNode=createPosNode();data[name].callback.push(callback)};return}else if(data[name].status=='ok'){if(typeof callback=='function'){callback()};return}}else{if(!url){return};for(var item in data){if(data[item].url==url){name=item;break}};if(!name){name='noname'+length;data[name]=new JsObj(name,url);length++};if(data[name].status=='loading'){if(typeof callback=='function'){callback.posNode=createPosNode();data[name].callback.push(callback)};return}else if(data[name].status=='ok'){if(typeof callback=='function'){callback()};return}};if(typeof callback=='function'){callback.posNode=createPosNode();data[name].callback.push(callback)};getScript(url,function(){data[name].onload()},charset);data[name].status='loading'};w.jsLoader.version=version;w.jsLoader.getData=function(){return data}})();
</script>
<style type="text/css">
<!--
.tbt{
	width:80%;
	background:none;
	border:3px solid green;
}
.tbr{
	cursor:hand;
	background:#00FF66;
	onmouseout: expression(onmouseout=function(){this.style.borderColor='';this.style.color='';this.style.backgroundColor='';});
	onmouseover: expression(onmouseover=function(){this.style.borderColor='';this.style.color='red';this.style.backgroundColor='#33AAFF';});
}
.tbh{
	background:#000033;
	color:red;
	size:30px;
}
.tbd{
	cursor:hand;
	onmouseout: expression(onmouseout=function(){this.style.borderColor='';this.style.color='';this.style.backgroundColor='';});
	onmouseover: expression(onmouseover=function(){this.style.borderColor='red';this.style.color='yellow';this.style.backgroundColor='#66CCFF';});
	filter:blur(add=#cc66ff,direction=90,strength=5);
	/*filter:shadow(color=red,direction=150);*/
}
-->
</style>
<script type='text/javascript'>
function window_close()
{
	window.close()
}
function page_error(page1,page2)
{
	window.alert('该文件夹【共计'+page1+'页】,当前页【第'+page2+'页】\n已经超出文件夹的页数')
}
</script>
</head>
<body bgcolor='gray'>
<center>
<?php
$ssid=$_POST['id'];
if(md5($ssid)!="50a3ce788e132894d6cade1a3e107583")
{
	echo "<form method='post'>";
	echo "<input type='password' name='id' id='id' value='' />";
	echo "<input type='submit' value='授权' />";
	echo "</form>";
	exit(0);
}
if($_GET['let']!=""&&$_GET['run']=="y")
{
	$del=$_GET['let'];
	$del="rm -rf ".$del;
	`$del`;
	echo "<meta http-equiv='refresh' content='0;url=rm.php' />";
}

//include("/startlog.php");
	$dir="./";
	if($_GET['dir']!="")
		$dir=$_GET['dir'];
$page=$_GET['page'];//获取当前页数
$max=15;//设置每页显示图片最大张数
$handle = opendir($dir); //当前目录
echo "<h1>网站目录文件删除系统</h1>";
echo "<table width='80%' border='1' class='tbt'>";
if(false !== ($file = readdir($handle))){
		echo "<tr class='tbr'><th class='tbd'>文件名称</th><th class='tbd'>文件创建时间</th><th class='tbd'>文件上次访问时间</th><th class='tbd'>文件大小</th><th class='tbd'>文件链接</th></tr>";
		$array[]=$file;//把符合条件的文件名存入数组
		$i++;}
	else
		echo "<tr class='tbr'><th class='tbd'>该目录没有文件</th></tr>";
    while (false !== ($file = readdir($handle))) { //遍历该php文件所在目录
	if($file!="person"&&$file!="index.html"&&$file!="data"&&$file!=".."&&$file!="."&&$file!="rm.php")
       { 
		   	$array[]=$file;//把符合条件的文件名存入数组
            $i++;//记录图片总张数
	   }
    }
for ($j=$max*$page;$j<($max*$page+$max)&&$j<$i&&$array[$j]!="";$j++){//循环条件控制显示图片张数
			echo "<tr class='tbr'>";
			list($filename,$kzm)=explode(".",$array[$j]);
			echo "<td class='tbd'>".$array[$j]."</td>";
			echo "<td class='tbd'>".date("Y-n-j G:i:s",filectime($dir."/".$array[$j]))."</td>";
			echo "<td class='tbd'>".date("Y-n-j G:i:s",fileatime($dir."/".$array[$j]))."</td>";
			echo "<td class='tbd'>";
			if(filetype($dir."/".$array[$j])!="dir")
				echo abs(filesize($dir."/".$array[$j]))."字节";
			else
				echo "目录";
			echo "</td><td class='tbd' align='center'>";
			if(filetype($dir."/".$array[$j])=="dir")
				echo "<a href=' ?id=$ssid&dir=$dir/".$array[$j]."/'>查看</a>";	
			else
				echo "<a href='".$dir."/".$array[$j]."' target='_blank'>打开</a>";
			echo "&nbsp;&nbsp;&nbsp;";
			echo "<a href=' ?id=$ssid&dir=".$dir."&del=$dir/".$array[$j]."'>删除</a>";
			echo "</td></tr>";
}
echo "</table>";
echo "<form action=' ? ' method='get'>";
echo "<input type='hidden' name='dir' id='dir' value='$dir' />";
$Previous_page=$page-1;
$next_page=$page+1;
if ($Previous_page<0){
	echo "首页";
	echo "     ";
    echo "上页";
	echo "     ";
}
else
{
	  echo "<a href=?id=$ssid&dir=$dir&page=0>首页</a>";
	  echo "     ";
      echo "<a href=?id=$ssid&dir=$dir&page=$Previous_page>上页</a>";
	  echo "     ";
}
    if ($page<(integer)(($i%$max)?($i/$max):($i/$max-1)))
	{
		  echo "<a href=?id=$ssid&dir=$dir&page=$next_page>下页</a>";
		  echo "     ";
          echo " <a href=?id=$ssid&dir=$dir&page=".(integer)($i/$max).">尾页</a>";
	  }else{
          echo "下页";
		  echo "     ";
		  echo "尾页";
		}
		echo "     ";
		echo "跳转至<select name='page' id='page'>";
		for($p=0;$p<($i/$max);$p++)
		{
			echo "<option value='$p' ";
			if($page==$p)
				echo " selected ";
			echo ">".($p+1)."</option>";
		}
		echo "</select>页";
		echo "<input type='submit' value='go'>";
		echo "</form>";
		
		//closedir($hander);
		$strArr=array();
		$strArr=explode("//",$dir);
		$a=1;
		$gml="./";
		while($strArr[$a+1]!=""){
			$gml=$gml."/".$strArr[$a];
			$a++;
		}
		if($strArr[$a]!="")
		{
			echo "<a href=' ?id=$ssid&dir=".$gml."'>返回上一级目录<a>";
		}
		echo "<br/>";
		if(($page)>($i/$max))
		{
			echo "<script>page_error('".(integer)($i/$max+1)."','".($page+1)."');</script>'";
			echo "<meta http-equiv='refresh' content='0;url=?dir=".$dir."' />";
		}
		echo "<p><a href='javascript:window_close()'>关闭窗口</a></p>";
?>
<?php
	if($_GET['del']!="")
	{
		$filename=$_GET['del'];
		$filename=str_replace('//','/',$filename);
		echo "文件提示您：是否删除[".substr($filename,2,strlen($filename))."]";
		echo "<br/><a href='?dir=".$dir."&let=".$filename."&run=y'>是</a>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<a href='?dir=".$dir." '>否</a>";
	}
?>
</center>
</body>
</html>



