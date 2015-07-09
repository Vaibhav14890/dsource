<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>
<body>
<div id="page">
    <?php
  if($is_front){
    $title = ''; // This is optional ... it removes the default Welcome to @site-name
    $page['content']['system_main']['default_message'] = array(); // This will remove the 'No front page content has been created yet.'
  }
?>    
  <header>
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
<a href="<?php print $front_page; ?>" class="navbar-brand">
                D&#8217;source
            </a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-right navbar-nav">
              <li><a href="<?php print $front_page; ?>course">Courses</a></li>
              <li><a href="<?php print $front_page; ?>resource">Resources</a></li>
              <li><a href="<?php print $front_page; ?>case-study">Case study</a></li>
              <li><a href="<?php print $front_page; ?>showcase">Showcase</a></li>
              <li><a href="<?php print $front_page; ?>gallery">Gallery</a></li>
              <li><a href="<?php print $front_page; ?>video">Videos</a></li>
            </ul>
            
          </div>
        </div>
      </nav>
    </header>

     <section class="main" style="margin-top:80px;margin-bottom:13px;">
      <div class="container" >
        <div class="row search-bar">
            <div class="col-sm-12">
         <!-- <div class="col-md-push-7 col-md-5">-->
            <div class="input-group">  
              <?php print render($page['header']); ?>
          
            </div>
          </div>
        </div>
      </div>
    </section>    

  <div id="main">
    <div class="container" >
        <div class="row">
            <div id="content" class="column" role="main">
      
    </div>
            <?php
                // Render the sidebars to see if there's anything in them.
                $sidebar_first  = render($page['sidebar_first']);
                $sidebar_second = render($page['sidebar_second']);
            ?>
            <?php if ($sidebar_first): ?>
                <div class="col-sm-3">
                <?php print $sidebar_first; ?>
                </div>
                <div class="col-sm-9">
                    <?php print render($page['highlighted']); ?>
                    <?php print $breadcrumb; ?>
                    <a id="main-content"></a>
                    <?php print render($title_prefix); ?>
                    <?php if ($title): ?>
                      <h3><?php print $title; ?></h3>
                    <?php endif; ?>
                    <?php print render($title_suffix); ?>
                    <?php print $messages; ?>
                    <?php print render($tabs); ?>
                    <?php print render($page['help']); ?>
                    <?php if ($action_links): ?>
                      <ul class="action-links"><?php print render($action_links); ?></ul>
                    <?php endif; ?>
                    <?php print render($page['content']);; ?>    
                    <?php print $feed_icons; ?>
                    
                </div>
            <?php else: ?>
                <div class="col-sm-12">
                    <?php print render($page['highlighted']); ?>
                    <?php print $breadcrumb; ?>
                    <a id="main-content"></a>
                    <?php print render($title_prefix); ?>
                    <?php if ($title): ?>
                      <h3><?php print $title; ?></h3>
                    <?php endif; ?>
                    <?php print render($title_suffix); ?>
                    <?php print $messages; ?>
                    <?php print render($tabs); ?>
                    <?php print render($page['help']); ?>
                    <?php if ($action_links): ?>
                      <ul class="action-links"><?php print render($action_links); ?></ul>
                    <?php endif; ?>
                    <?php print render($page['content']);; ?>    
                    <?php print $feed_icons; ?>    
                </div>
            <?php endif; ?>    
            <?php //if ($sidebar_first || $sidebar_second): ?>
                <?php //print $sidebar_first; ?>
                <?php //print $sidebar_second; ?>
            <?php //endif; ?>
            
        </div>
    </div>
</div>
    <!--<div id="navigation">

      <?php if ($main_menu): ?>
        <nav id="main-menu" role="navigation" tabindex="-1">
          <?php
          // This code snippet is hard to modify. We recommend turning off the
          // "Main menu" on your sub-theme's settings form, deleting this PHP
          // code block, and, instead, using the "Menu block" module.
          // @see https://drupal.org/project/menu_block
          print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
              'class' => array('links', 'inline', 'clearfix'),
            ),
            'heading' => array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        </nav>
      <?php endif; ?>

      <?php print render($page['navigation']); ?>

    </div>-->

    

  
  <?php print render($page['footer']); ?>

</div>

<?php print render($page['bottom']); ?>
</body>
