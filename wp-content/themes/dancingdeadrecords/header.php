<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DancingDeadRecords
 */
?>

<?php 

// Si jamais je clique sur artist-details (qui est lié à l'API de spotify, et qui me donne des informations suivant un artiste en détails), si une page artist/[nom de l'artiste] existe, alors je redirige vers cette page. sachant que le nom de l'artiste est récupéré via l'Url en GET. Exemple pour la méthode get : http://localhost:8000/dancingdeadwordpress/wordpress/artist-details/?artist_id=2sf28o6euxEDpYkG9dMtuM&artist_name=Cartoon

if (isset($_GET['artist_name'])) {
    $artist_name = $_GET['artist_name'];
    if (get_page_by_title($artist_name) != null) {
        $artist_page = get_page_by_title($artist_name);
        $artist_page_id = $artist_page->ID;
        wp_redirect(get_permalink($artist_page_id));
        exit;
    }
}

?>




<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- Importer la police ANTON -->
		<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
		<!-- Importer la police DM Sans avec toutes les graisses disponibles (400, 500, 700) -->
		<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
        <title>Dancing Dead Records | Label de Musique Électronique</title>
        <!-- Fav Icon -->
        <!-- Faire en sorte que lorsque l'utilisateur est sur la page d'accueil le lien soit : "wp-content/themes/dancingdeadrecords/img/icons/favicon-32x32.ico" mais lorsqu'il est sur une autre page : "../wp-content/themes/dancingdeadrecords/img/icons/favicon-32x32.ico" -->
        <?php

        // if (is_front_page()) {
        //     echo '        <link rel="shortcut icon" href="wp-content/themes/dancingdeadrecords/img/icons/favicon-32x32.ico">
        // <link rel="apple-touch-icon" sizes="180x180" href="wp-content/themes/dancingdeadrecords/img/icons/favicon-180x180.png">
        // <link rel="icon" type="image/png" sizes="32x32" href="wp-content/themes/dancingdeadrecords/img/icons/favicon-32x32.png">
        // <link rel="icon" type="image/png" sizes="16x16" href="wp-content/themes/dancingdeadrecords/img/icons/favicon-16x16.png">';

        // } else {
        //     echo '        <link rel="shortcut icon" href="../wp-content/themes/dancingdeadrecords/img/icons/favicon-32x32.ico">
        // <link rel="apple-touch-icon" sizes="180x180" href="../wp-content/themes/dancingdeadrecords/img/icons/favicon-180x180.png">
        // <link rel="icon" type="image/png" sizes="32x32" href="../wp-content/themes/dancingdeadrecords/img/icons/favicon-32x32.png">
        // <link rel="icon" type="image/png" sizes="16x16" href="../wp-content/themes/dancingdeadrecords/img/icons/favicon-16x16.png">';
        // }

        ?>

        <link rel="shortcut icon" href="wp-content/themes/dancingdeadrecords/img/icons/favicon-32x32.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="wp-content/themes/dancingdeadrecords/img/icons/favicon-180x180.png">
        <link rel="icon" type="image/png" sizes="32x32" href="wp-content/themes/dancingdeadrecords/img/icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="wp-content/themes/dancingdeadrecords/img/icons/favicon-16x16.png">

        <!-- Balise Meta -->
        <meta name="author" content="Dancing Dead Records">
        <meta name="robots" content="index, follow">
        <meta name="revisit-after" content="7 days">
        <meta name="language" content="fr">
        <meta name="generator" content="WordPress">
        <meta name="publisher" content="Dancing Dead Records">
        <meta name="distribution" content="global">
        <meta name="rating" content="general">
        <meta name="keywords" content=" artistes Independents, electronique, dance music, Hardstyle, EDM, psytrance">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Balise Open Graph -->
        <meta property="og:title" content="Dancing Dead Records | Label de Musique Électronique">
        <meta property="og:description" content="<Dancing Dead est le plus gros label breton en matière de streams en dépassant la barre des 2 milliards de lectures sur les différentes plateformes d’écoute de musique">
        <meta property="og:url" content="https://dancingdeadrecords.com">
        <meta property="og:image" content="https://dancingdeadrecords.com/img/dancing-dead-logo-black-bg.webp">
        
        <!-- Balise Twitter Cards -->
        <meta name="twitter:card" content="Dancing Dead Records | Label de Musique Électronique">
        <meta name="twitter:title" content="Dancing Dead Records | Label de Musique Électronique">
        <meta name="twitter:description" content="Dancing Dead est le plus gros label breton en matière de streams en dépassant la barre des 2 milliards de lectures sur les différentes plateformes d’écoute de musique">
        <meta name="twitter:image" src="https://dancingdeadrecords.com/img/dancing-dead-logo-black-bg.webp">


	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

                 <!-- PIWIK -->
                 <script type="text/javascript">
                (function(window, document, dataLayerName, id) {
                window[dataLayerName]=window[dataLayerName]||[],window[dataLayerName].push({start:(new Date).getTime(),event:"stg.start"});var scripts=document.getElementsByTagName('script')[0],tags=document.createElement('script');
                function stgCreateCookie(a,b,c){var d="";if(c){var e=new Date;e.setTime(e.getTime()+24*c*60*60*1e3),d="; expires="+e.toUTCString();f="; SameSite=Strict"}document.cookie=a+"="+b+d+f+"; path=/"}
                var isStgDebug=(window.location.href.match("stg_debug")||document.cookie.match("stg_debug"))&&!window.location.href.match("stg_disable_debug");stgCreateCookie("stg_debug",isStgDebug?1:"",isStgDebug?14:-1);
                var qP=[];dataLayerName!=="dataLayer"&&qP.push("data_layer_name="+dataLayerName),isStgDebug&&qP.push("stg_debug");var qPString=qP.length>0?("?"+qP.join("&")):"";
                tags.async=!0,tags.src="https://dancingdead.containers.piwik.pro/"+id+".js"+qPString,scripts.parentNode.insertBefore(tags,scripts);
                !function(a,n,i){a[n]=a[n]||{};for(var c=0;c<i.length;c++)!function(i){a[n][i]=a[n][i]||{},a[n][i].api=a[n][i].api||function(){var a=[].slice.call(arguments,0);"string"==typeof a[0]&&window[dataLayerName].push({event:n+"."+i+":"+a[0],parameters:[].slice.call(arguments,1)})}}(i[c])}(window,"ppms",["tm","cm"]);
                })(window, document, 'dataLayer', '1d051d2c-4a22-4a16-b2e0-052b2bdba2aa');
            </script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

<header id="masthead" class="site-header">

        <div class="header-container">
                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>

            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    )
                );
                ?>
            </nav><!-- #site-navigation -->

            <div class="burger-menu">
                <a href="#">
                    <span class="bg-menu"></span>
                </a>
            </div>

            <div class="buttons-header">
            <?php
            $contact = get_page_by_title('Contact');
            $contact_id = $contact->ID;
            ?>
                <a href="<?php echo get_permalink($contact_id); ?>">
                <button class="btn contact">CONTACT</button>
            </a>
            </div>

			</div><!-- .header-container -->
       
    </header><!-- #masthead -->
