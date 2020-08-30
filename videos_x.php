<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<style>
* { padding: 0; margin: 0; }

body { font-family: Arial, Helvetica, sans-serif; font-size: 13px; }
#wrapper { margin: 0 auto; width: 95%; }
#header { width: 95%; float: left; padding: 10px; height: 20px; }
#navigation { float: left; width: 100%; border: 1px solid #ccc; margin: 0px 0px 0px 0px; background-color:#F3F2ED; }
#leftcolumn { width: 61%; float: left; margin: 0px 0px 0px 0px; padding: 10px; height: 350px; }
#rightcolumn { float: right; height: 350px; width: 35%; position: relative; }

.search { padding:8px 8px; background:rgba(50, 50, 50, 0.2); border:0px solid #dbdbdb; width:90%;}


#playlist { display:table; }
#playlist li{ cursor:pointer; padding:8px; }
#playlist li:hover{ color:blue; }
#videoarea {
    float:left;
    width:100%;
    height:100%;
    margin:10px;    
}


</style>
<script src="libs/jquery-3.5.1.js"></script>
<script>
$(function() {
    $("#playlist li").on("click", function() {
        $("#videoarea").attr({
            "src": $(this).attr("movieurl"),
            "poster": "",
            "autoplay": "autoplay"
        })
    })
    $("#videoarea").attr({
        "src": $("#playlist li").eq(0).attr("movieurl"),
        "poster": $("#playlist li").eq(0).attr("moviesposter")
    })

	$("#myInput").on("keyup", function() {
    	var value = $(this).val().toLowerCase();
    	$("#playlist li").filter(function() {
      		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    	});
  	});    
})
</script>
</head>

<body>
<!-- Begin Wrapper -->
<div id="wrapper">
  <!-- Begin Header -->
  <div id="header"><h1><a href="http://www.free-css.com/free-css-layouts.php">Free CSS Layouts</a></h1></div>
  <!-- End Header -->
  <!-- Begin Navigation -->
  <div id="navigation"> Navigation Here </div>
  <!-- End Navigation -->
  <!-- Begin Left Column -->
  <div id="leftcolumn">

<video id="videoarea" controls="controls" poster="" src=""></video>

  </div>
  <!-- End Left Column -->
  <!-- Begin Right Column -->
  <div id="rightcolumn">
  <div style="height:100%; border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">

<?php
$pth = isset($_REQUEST["dirs"])? ($_REQUEST["dirs"]): "DANGDUT" ;
$url = "/media/videos/";
$dsl = "/home/ants/public_html/media/videos/";
$dir = $dsl."/".$pth;

echo '<form action=""><select name="dirs" width="80%">';
$sl = opendir($dsl);
while (($dirsel = readdir($sl))!== false){
	if(is_dir($dirsel)!== true){ 
		if($dirsel === $pth) { echo '<option value="'.$dirsel.'" selected>'.$dirsel.'</option>';  }else{ echo '<option value="'.$dirsel.'">'.$dirsel.'</option>';  }
	}
}
echo '</select><input type="submit" name="submit"></form>';
echo '<input type="text" class="search" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">';

echo '<ul id="playlist">';    

$dh  = opendir($dir);
while (($file = readdir($dh)) !== false) {
    $match = preg_match("/.*\.(mp4|png|gif|jpeg|bmp)/", $file);
    if ($match) {
    	echo '<li movieurl="http://'.$_SERVER["SERVER_NAME"].'/media/videos/'.$pth.'/'.$file.'">'.$file.'</li>'   ;
    }
}
?>
        
</ul>
</div>
  </div>

  <!-- End Right Column -->
 </div>
<!-- End Wrapper -->
</body>



</html>
