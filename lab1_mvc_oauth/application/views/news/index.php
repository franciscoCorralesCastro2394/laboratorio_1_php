
<div class="container">
    <br>
<h2><?php echo $title; ?></h2>
    <table class="table table-hover">
        <tr>
            <td><strong>titulo</strong></td>
            <td><strong>Texto</strong></td>
            <td><strong>Acciones</strong></td>

            
        </tr>
    <?php foreach ($news as $news_item): ?>
            <tr>
                <td><?php echo $news_item['title']; ?></td>
                <td><?php echo $news_item['text']; ?></td>
                <td><a href="<?php echo site_url('news/'.$news_item['id']); ?>">View</a>
                   <a href="<?php echo site_url('news/edit/'.$news_item['id']); ?>">Edit</a> 
                   <a href="<?php echo site_url('news/delete/'.$news_item['id']); ?>" onClick="return confirm('Esta segurode borrar esta noticia?')">Delete</a> </td>
                
            </tr>
    <?php endforeach; ?>
    </table>
</div>



