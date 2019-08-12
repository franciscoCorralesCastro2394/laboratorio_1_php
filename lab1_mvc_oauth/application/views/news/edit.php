
<div class="container">
    

<h2><?php echo $title; ?></h2>
 
<?php echo validation_errors(); ?>
  
 
<?php echo form_open('news/edit/'.$news_item['id'],['enctype'=>'multipart/form-data']); ?>    
    <table>

          <tr>
        <div class="form-group">
        <label for="img">Imagen</label>
        <input type="file" name="img">
        </div>
      </tr>

        <tr>
            <td>
                <label for="title">Title</label>    
                <input class="form-control" type="input" name="title" size="50" value="<?php echo $news_item['title']?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="text">Text</label>
                <textarea class="form-control" name="text" rows="10" cols="40"> <?php echo $news_item['text'] ?> </textarea>
           </td>
        </tr>
        <tr>
            <td>
                <br>
                <input class="btn btn-outline-info" type="submit" name="submit" value="Edit news item"/>
            </td>
        </tr>
    </table>    
</form>

</div>