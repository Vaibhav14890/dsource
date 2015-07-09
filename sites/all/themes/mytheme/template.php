 <?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function mytheme_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  mytheme_preprocess_html($variables, $hook);
  mytheme_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function mytheme_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function mytheme_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function mytheme_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // mytheme_preprocess_node_page() or mytheme_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function mytheme_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function mytheme_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function mytheme_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */



/*function MYTHEME_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Adding the title of the current page to the breadcrumb.
    $breadcrumb[] = drupal_get_title();
    
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' » ', $breadcrumb) . '</div>';
    return $output;
  }
}
?>*/
//<?php
/**
 * Override theme_breadcrumb().
 *
 * Base breadcrumbs on paths e.g., about/our-organization/bob-jones
 * turns into About Us > Our Organization > Bob Jones
 */



function mytheme_breadcrumb($breadcrumb) {
  $links = array();
  $path = '';
  $arguments = explode('/', request_uri());
  array_shift($arguments); //remove dsource folder name in breadcrumb
  array_shift($arguments); //remove dsource folder name in breadcrumb 
  foreach ($arguments as $key => $value) {
    if (empty($value)) {
      unset($arguments[$key]);
    }
  }
  $arguments = array_values($arguments);

  $links[] = l(t('Home'), '<front>');

  if (!empty($arguments)) {
    foreach ($arguments as $key => $value) {
      if ($key == (count($arguments) - 1)) {
        $links[] = drupal_get_title();
      }
      else {
        if (!empty($path)) {
          $path .= '/'. $value;
        } else {
          $path .= $value;
        }

        $menu_item = menu_get_item(drupal_lookup_path('source', $path));
        if ($menu_item['title']) {
          $links[] = l($menu_item['title'], $path);
        }
        else {
          $links[] = l(ucwords(str_replace('-', ' ', $value)), $path);
        }
      }
    }
  }

  drupal_set_breadcrumb($links);
  $breadcrumb = drupal_get_breadcrumb();
  if (count($breadcrumb) > 1) {
    return '<div class="breadcrumb">'. implode(' / ', $breadcrumb) .'</div>';
  }
}
?>





<?php
/**
 * Implements hook_form_alter().
 */
function mytheme_form_alter(array &$form, array &$form_state = array(), $form_id = NULL) {
  if ($form_id) {
    switch ($form_id) {
      case 'search_form':
        /*// Add a clearfix class so the results don't overflow onto the form.
        $form['#attributes']['class'][] = 'clearfix';

        // Remove container-inline from the container classes.
        $form['basic']['#attributes']['class'] = array();

        // Hide the default button from display.
        $form['basic']['submit']['#attributes']['class'][] = 'element-invisible';

        // Implement a theme wrapper to add a submit button containing a search
        // icon directly after the input element.
        $form['basic']['keys']['#theme_wrappers'] = array('mytheme_search_form_wrapper');
        $form['basic']['keys']['#title'] = '';
        //control the width of the input          
        $form['basic']['keys']['#attributes']['class'][] = 'wide input';
        $form['basic']['keys']['#attributes']['placeholder'] = t('Search');
        break;*/
      case 'search_block_form':
        $form['#attributes']['class'][] = 'form-search';

        $form['search_block_form']['#title'] = '';
        $form['search_block_form']['#attributes']['placeholder'] = t('Search');
        //control the width of the input
         $form['search_block_form']['#attributes']['class'][] ='custom-search-box form-control wide input';
        // Hide the default button from display and implement a theme wrapper
        // to add a submit button containing a search icon directly after the
        // input element.
        $form['actions']['submit']['#attributes']['class'][] = 'element-invisible';
        $form['search_block_form']['#theme_wrappers'] = array('mytheme_search_form_wrapper');
        $form['search_block_form']['#size'] = 131;
        //$form['actions']['submit']['#value'] = t('GO!');
        
        // Apply a clearfix so the results don't overflow onto the form.
        $form['#attributes']['class'][] = 'content-search';
        break;
    }
  }
}


/**
 * Theme function implementation for mytheme_search_form_wrapper.
 */
function mytheme_mytheme_search_form_wrapper($variables) {
  $output = '<div class="input-group" style="display:table;">';
  $output .= $variables['element']['#children'];
  $output .= '<span class="input-group-btn">';
  $output .= '<button type="submit" class="btn btn-default form-submit">';
  $output .= '<i class="glyphicon glyphicon-search"></i>';
  $output .= '<span class="element-invisible">' . t('Search') . '</span>';
  $output .= '</button>';
  $output .= '</span></div>';
  return $output;
}

/**
 * Stub implementation for hook_theme().
 *
 * @see mytheme_theme()
 * @see hook_theme()
 */
function mytheme_theme(&$existing, $type, $theme, $path) {
  // Custom theme hooks:
  // Do not define the `path` or `template`.
  $hook_theme = array(
    'mytheme_search_form_wrapper' => array(
      'render element' => 'element',
    ),
  );

  return $hook_theme;
}






?>
<!--
<script src="http://10.113.149.22/dsource/sites/all/themes/mytheme/js/jquery-1.9.1.js"></script>
<script src="http://10.113.149.22/dsource/sites/all/themes/mytheme/js/jquery-ui.1.10.2.js"></script>
-->

<script>
/**
    $(function() {
$('#edit-search-block-form--3').keyup(function(){
    
     var data=$('#edit-search-block-form--3').val();
     
	 $.ajax({
	   type:'POST',
	   url:'http://10.113.149.22/dsource/sites/all/themes/mytheme/ajax.php',
	   data:"data="+data,
	   dataType: "json",
	   success: function(msg){
               
	        var availableTags = msg;
              
                
			$("#edit-search-block-form--3").autocomplete({
			   source: availableTags,
                           select: function (event, ui) { 
                               $("#search-block-form").submit(); }
			});
	   }
	});

});
});*//
    </script>
    


<script>
/**
$(function() {
$('#edit-search-block-form--2').keyup(function(){
    
     var data=$('#edit-search-block-form--2').val();
   
	 $.ajax({
	   type:'POST',
	   url:'http://10.113.149.22/dsource/sites/all/themes/mytheme/ajax.php',
	   data:"data="+data,
	   dataType: "json",
	   success: function(msg){
               
	        var availableTags = msg;
                
                
			$("#edit-search-block-form--2").autocomplete({
			   source: availableTags,
                           select: function (event, ui) { 
                               $("#search-block-form").submit(); }
			});
	   }
	});

});


});
*/
</script>