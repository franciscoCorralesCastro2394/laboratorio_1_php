<div class="container">
	
<br>
<?php
echo '<h2>'.$news_item['title'].'</h2>';

$var  = '../views/uploads/'.$news_item['img'];


?>

<img src="<?php echo base_url().'uploads/'.$news_item['img']; ?>" class="img-fluid" alt="">

<?php


echo $news_item['text'];

?>
</div>