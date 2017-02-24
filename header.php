<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> ng-app="FSNapp">
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<?php if ( current_theme_supports( 'bp-default-responsive' ) ) : ?><meta name="viewport" content="width=device-width, initial-scale=1.0" /><?php endif; ?>
		<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

		<?php bp_head(); ?>
		<?php wp_head(); ?>

		<!-- due to some error wordpress not including the file in index and hence ajax functions on activity page stopped working -->

		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
  		<script src="https://code.angularjs.org/1.5.9/angular-route.min.js"></script>
  		<script type="text/javascript" src="http://localhost/wordpress/wp-content/themes/Free-Social-Network/js/scrjipt.js"></script>
  		<script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script>
  		

	</head>

	<body <?php body_class(); ?> id="bp-default" ng-controller="mainController">

		
		
		<?php do_action( 'bp_before_header' ); ?>

		<div id="header">
		<!-- Navigation Bar for the SN -->
			<div id="navigation" role="navigation">
			<!--
					wp_page_menu( array|string $args = '' )

					Retrieve or display list of pages in list (li) format.

					wp_nav_menu( array $args = array() )

					Displays a navigation menu.
					
					navbar-fixed-top can be used here but hav to adjust whole body downwards
			-->
				<nav class="navbar navbar-default ">
  					<div class="container-fluid">
    		<!-- Brand and toggle get grouped for better mobile display -->
    					<div class="navbar-header">
	      					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        					<span class="sr-only">Toggle navigation</span>
		        				<span class="icon-bar"></span>
		        				<span class="icon-bar"></span>
		        				<span class="icon-bar"></span>
	      					</button>
	      					<a class="navbar-brand" href= "<?php echo home_url(); ?>">Brand</a>
    					</div>
    <!-- Collect the nav links, forms, and other content for toggling -->
				    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					    	<form class="navbar-form navbar-left" action="<?php echo bp_search_form_action(); ?>" method="post" id="search-form">
	        					<div class="form-group">
	          						<input type="text" class="form-control" placeholder="Search" id="search-terms" name="search-terms" value="<?php echo isset( $_REQUEST['s'] ) ? esc_attr( $_REQUEST['s'] ) : ''; ?>">
	        					</div>
	        					<button type="submit" class="btn btn-default" name="search-submit" id="search-submit" value="<?php esc_attr_e( 'Search', 'buddypress' ); ?>">Submit</button>
	        					<?php wp_nonce_field( 'bp_search_form' ); ?>
	      					</form>
	      					<ul class="list-inline navbar-right nav navbar-nav">
								<li><a ui-sref="home"><i class="material-icons">home</i></a></li>
								<li><a ui-sref="messages"><i class="material-icons">message</i></a></li>
								<li><a ui-sref="notification"><i class="material-icons">notifications</i></a></li>
								<li><a ui-sref="profile"><i class="material-icons">account_circle</i></a></li>

							</ul>
				    	</div><!-- /.navbar-collapse -->
  					</div><!-- /.container-fluid -->
				</nav>	
			</div>
		<!-- Search Bar -->

			<ul>
				

			</ul>

			

			<?php do_action( 'bp_header' ); ?>

		</div><!-- #header -->

		<?php do_action( 'bp_after_header'     ); ?>
		<?php do_action( 'bp_before_container' ); ?>

		<div id="container">
			<div class="col-md-3">
				<div ui-view="timelineProfileEdit"></div>
			</div>
			<div class="col-md-6 col-sm-8 col-xs-12">
				<div ui-view></div>
			</div>
			<div class="col-md-3 col-sm-4">
				<div ui-view="friendList"></div>
			</div>
