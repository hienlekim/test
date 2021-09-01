<?php
	$list_data = array(
		1 => array(
			'id' => 1,
			'title'=>'Branding',
			'parent_id'=>0
		 ),
		2 => array(
			'id' => 2,
			'title'=>'Marketing',
			'parent_id'=>0
		 ),
		3 => array(
			'id' => 3,
			'title'=>'PR',
			'parent_id'=>1
		 ),
		4 => array(
			'id' => 4,
			'title'=>'Branding design',
			'parent_id'=>1
		 ),
		5 => array(
			'id' => 5,
			'title'=>'Strategy',
			'parent_id'=>1
		 ),
		6 => array(
			'id' => 6,
			'title'=>'Business',
			'parent_id'=>5
		 ),
		7 => array(
			'id' => 7,
			'title'=>'Target client',
			'parent_id'=>5
		 ),
		8 => array(
			'id' => 8,
			'title'=>'Inbound marketing',
			'parent_id'=>2
		 ),
		9 => array(
			'id' => 9,
			'title'=>'Outbound marketing',
			'parent_id'=>2
		 )
	);
	function data_tree($data,$parent_id=0,$level=0){
		$result = [];
		foreach ($data as $val) {
			if($val['parent_id']==$parent_id){
				$val['level'] = $level;
				$result[] = $val;
				unset($data[$val['id']]);
				$child =data_tree($data,$val['id'],$level+1);
				$result = array_merge($result,$child);
			}
		}
		return $result;
	}
	$result = data_tree($list_data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  	#hien_thi, #hidden:active{
  		border: none!important;
  	}
  </style>
</head>
<body>

<div class="container">
  <h2>Cấu trúc cây thư mục</h2>
  <button type="button" class="btn btn-success" id="hien_thi">Hiển thị</button>
  <button type="button" class="btn btn-warning" id="hidden">Ẩn</button>
  <div class="content_dequy" style="display: none;">
	<ul>
		<?php foreach($result as $item){ ?>
			<li style="list-style: none;"><?php echo str_repeat('-',$item['level']).$item['title']; ?></li>
		<?php } ?>
	</ul>
</div>   
</div>
<script type="text/javascript">
	$('#hien_thi').on('click',function(){
		$('.content_dequy').css('display','block');
	});
	$('#hidden').on('click',function(){
		$('.content_dequy').css('display','none');
	});
</script>
</body>
</html>
