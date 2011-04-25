<?php
$speakers = array();

$speakerNames = array();
foreach($eventDetail->session_detail->session as $detail){
	if(in_array((string)$detail->speaker->name,$speakerNames)){ 
		continue; }else{ $speakerNames[] = (string)$detail->speaker->name; }
	$speakers[] = $detail->speaker;
}

$speakerIds = array_rand($speakers,8);

// now lets pick 8 randonmly to show

$row = 1;
$col = 1;
foreach($speakerIds as $id): 
	$speaker = $speakers[$id];
	if($col==1){
		$divClass = 'speaker grid_5 alpha prefix_3';
	}elseif($row==2 && $col==0){
		$divClass = 'speaker grid_5 omega';
	}else{
		$divClass = 'speaker grid_5'; 
	}

	// build our image name
	$speakerImg = str_replace(' ','',ucwords($speaker->name)).'.jpg';
	$speakerImg{0} = strtolower($speakerImg{0});

	if(is_file($_SERVER['DOCUMENT_ROOT'].'/assets/img/lonestarphp/'.$speakerImg)){
		$img = '/assets/img/lonestarphp/'.$speakerImg;
	}else{
		$img = '/assets/img/lonestarphp/default.jpg';
	}
	$company_link = (isset($speaker->company_link)) ? $speaker->company_link : '';
	?>

	<div class="<?php echo $divClass?>">
		<a href="#<?php echo str_replace(' ','-',strtolower($speaker->name)); ?>"><img src="<?php echo $img; ?>" class="left" border="0"/></a>
		<h4><?php echo $speaker->name; ?></h4>
		<a href="<?php echo $company_link; ?>"><?php echo $speaker->company; ?></a>
	</div>
	<?php
	$col++;
	if($col%4==0){ $row++; $col=0; }
	?>
	
<?php endforeach; ?>
