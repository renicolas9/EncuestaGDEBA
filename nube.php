<html>
	<head></head>

<body>
	
<style>



a{
      color:#88D6FF;
}
 
.tagg span{
      margin-right:8px;
}
 
a:hover{
      text-decoration:underline;    
}
 
#tagcloud_1 {
    font-family: "Arial";
    opacity: .5; 
    font-size: 12pt;    
    line-height: 18pt;
}
 
#tagcloud_2 {
    font-family: "Arial";
    opacity: .5; 
    font-size: 13pt;    
    line-height: 18pt;
}
 
#tagcloud_3 {
    font-family: "Arial";
    opacity: .5; 
    font-size: 14pt;    
    line-height: 18pt;
}
 
#tagcloud_4 {
    font-family: "Arial";
    opacity: .5;
    font-size: 15pt;    
    line-height: 18pt;
}
 
#tagcloud_5 {
    font-family: "Arial";
    opacity: .5;
    font-size: 16pt;    
    line-height: 18pt;
}
 
#tagcloud_6 {
    font-family: "Arial";
    opacity: .6;
    font-size: 17pt;    
    line-height: 18pt;
}
 
#tagcloud_7 {
    font-family: "Arial";
    opacity: .7;
    font-size: 18pt;    
    line-height: 18pt;
}
 
#tagcloud_8 {
    font-family: "Arial";
    opacity: .8;
    font-size: 19pt;    
    line-height: 18pt;
}
 
#tagcloud_9 {
    font-family: "Arial";
    opacity: .9;
    font-size: 20pt;    
    line-height: 18pt;
}
 
#tagcloud_10 {
    font-family: "Arial";
    font-size: 21pt;    
    line-height: 18pt;
}
</style>	



<?php 


include("TagCloud.php");
//include("conexion.php");

class tags{
	public $mysql;
	function tags(){}


	function obtener(){
		$full_tags = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

			$full_tags = str_replace(", ",",",$full_tags);
						  $full_tags = str_replace(" ",",",$full_tags);
						  $full_tags = str_replace(".",",",$full_tags);
			$full_tags = str_replace(",,",",",$full_tags);
		$full_tags = substr($full_tags,1,strlen($full_tags));
		
		//separamos los tags uno a uno en un array
		$array_tags = explode(",", $full_tags);
		return $array_tags;
	}
}

$f = new tags();
$array = $f->obtener();
$o = new TagCloud();
$o->addTags($array);
$o->addTag("programming");

echo $o->render();

//echo $o->outputCloud;

?>



</body>
</html>