 <?php if(!empty($errors)):?>
          <div class="msg error">
            <?php foreach($errors as $error):?>
            <li style="text-align: center;"><?php echo $error; ?></li>
            <?php endforeach;?>
          </div>
      <?php endif;?> 