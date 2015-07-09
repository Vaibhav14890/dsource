<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<?php if (!empty($title)): ?>
        <?php print $title; ?>
    <?php endif; ?>
  <?php $i=1;?>   
<?php foreach ($rows as $id => $row): ?>
  <?php if($i%2==1){ ?>

      <div class="row">
  <?php }?>
        <div class="col-sm-6">
          <?php print $row; $i++;?>
          
        </div>
        
        <?php if($i%2==1){ ?>
      </div>
        <?php }?>
<?php endforeach; ?>

<?php if($i%2==0){?>    
  </div>
<?php }?> 