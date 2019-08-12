

<div class="container">
    


<h2><?php echo $title; ?></h2>

 
<?php echo validation_errors(); ?>
 

<?php echo form_open_multipart('Upload/do_upload');?>

              <input type="file" class="form-control" name="userfile" size="20" />
              <br>
               <input type="submit" class="form-control" value="upload" />

               </form>
   
    <br> 

<?php echo form_open('news/create'); ?>    
    <table>
        <tr>
          
            <td>
                <label for="title">Title</label>    
                <input class="form-control" type="input" name="title" size="50" />
            </td>
           
        </tr>

        <tr>
               <td>
                <label for="img">Imagen</label>    
        <input class="form-control" type="input" name="img" size="50" value="<?php echo $upload_data['full_path']?>" />
            </td>
        </tr>
        <tr>
            <td>
                <label for="text">Text</label>
                <textarea class="form-control" name="text" rows="10" cols="40"></textarea>
           </td>
        </tr>
           <tr>
            <td>
                <br>
                <input class="btn btn-outline-info" type="submit" name="submit" value="Create news item"/>
            </td>
        </tr>
    </table>    
</form>



</div>
