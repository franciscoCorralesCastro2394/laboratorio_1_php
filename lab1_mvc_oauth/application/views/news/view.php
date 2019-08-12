<div class="container">
	

<?php
echo '<h2>'.$news_item['title'].'</h2>';

$var  = '..'.substr($news_item['img'], 30);


?>

<img src="<?php echo $var?>" class="img-fluid" alt="">

<?php


echo $news_item['text'];

?>
</div>