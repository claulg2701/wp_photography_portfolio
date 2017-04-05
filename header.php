<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Claudia De Leon Blank Template</title>
    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	</head>
	<body>
		<div class="container"> <!-- ends in footer -->
			<header class="row">
  			<div class="row">
        	<div id="cd-logo" class="twelve columns">
        		<?php
              if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
              } ?>
          </div>
        </div> <!--end row -->
          <!-- Menu Bar -->
        	<div id="menu-bar" class="row">
            <div class="menu ten columns">
          		<?php
              wp_nav_menu(array(
              'sort_column' => 'menu_order',
              'container_class' => 'blank-menu-header'
              ));?>
            </div>
            <div class="search two columns"><?php get_search_form(); ?></div>
          </div><!--end row -->
        </header>
