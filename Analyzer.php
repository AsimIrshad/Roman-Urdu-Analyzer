
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Facebook Scrapper</title>


</head>
<body>
<link rel="stylesheet" type="text/css" href="career.css">
<link rel="stylesheet"  href="bootstrap.min.css" >
<link rel="stylesheet" type="text/css" href="font-awesome.min.css">
	<section class="Education">
		<h3 class="inner" align="center">Analyzer</h3>
		<div class="container">
			<div class="row ">
							<?php
							// Read JSON file
$json = file_get_contents('adjectivewords.json');

//Decode JSON
$json_data = json_decode($json);
// access property of object in array


$myfile = fopen("newfile.txt", "r") or die("Unable to open file!");
while(!feof($myfile) ) {
    $title=fgets($myfile);
	$image=fgets($myfile);
	$positive=0;
	$negative=0;
	$Netural=0;
	
	
	for($i=0;$i<5;$i++){
		
		$comment=fgets($myfile);
		$SplitComment=explode(" ",$comment);
		//echo count($json_data);
		for($k=0;$k<count($json_data);$k++){
			if($json_data[$k]->PartOfSpeech=='adjective'){
				for($j=0;$j<count($SplitComment);$j++){
					
				if($json_data[$k]->Roman[0]->Word1==$SplitComment[$j] || $json_data[$k]->Roman[0]->Word2==$SplitComment[$j]){
						
						if($json_data[$k]->Category==1)
						{$positive++;}
						else if($json_data[$k]->Category==0)
						{$Netural++;}
						else if($json_data[$k]->Category==2)
						{$negative++;}
					break;
					}
				
				}
				
			}
			
			
		}

		}
	$Netural=5-($positive+$negative);
	{
 echo"  <div class='col-md-4'>
				<div class='box'>
					<img src='$image' style='width: 100%;'>
				<h4>$title</h4>";
				
				
				echo"<h4><b>Postitive</b> :$positive <b>Negative</b>  :$negative   <b>Netural</b>   :$Netural</h4>
				</div>
	</div>";}
  }
fclose($myfile);

?>
			</div>
			

		</div>
	</section>

</body>
</html>