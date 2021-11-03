<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gKarr
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>


<head>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MQFCWN8');</script>
<!-- End Google Tag Manager -->


	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700;800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" href="https://www.karrforcongress.com/wp-content/themes/gkarr/gkarr_logo2.png">

	<meta name="twitter:card" content="summary" />
<meta name="twitter:creator" content="@comradekarr" />
	<meta property="twitter:image" content="https://karrforcongress.com/wp-content/uploads/2021/06/DSC_0001Edit3-scaled.jpg" />
	<meta property="twitter:url" content="https://karrforcongress.com" />
<meta property="twitter:title" content="Gregory Karr for Congress" />
	
	<meta property="og:image" content="https://karrforcongress.com/wp-content/uploads/2021/06/DSC_0001Edit3-scaled.jpg" />
	<meta property="og:image:width" content="2560" />
<meta property="og:image:height" content="1773"  />
	<meta property="og:description" content="Gregory Karr will not go to Washington to make nice with the establishment and the elite"  />

	<?php wp_head(); ?>


<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '2966106526940610');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=2966106526940610&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


</head>

<body <?php body_class(); ?>>
<?php


		require_once 'popup.php';




?>
<script>
let popup = sessionStorage.getItem('popup');
if (popup == 'yes') {
    let gkarr_pop_container = document.getElementById('gkarr_pop_container');
	gkarr_pop_container.style.display = "none;"
}
</script>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MQFCWN8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'gkarr' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$gkarr_description = get_bloginfo( 'description', 'display' );
			if ( $gkarr_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $gkarr_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><img src="<?php echo get_template_directory_uri(); ?>
/gkarr_menu_color_5.png" style="width: 50px;"></button>
			<?php
			
			
			
		


			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu'
				)
			);
			
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
		