<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DancingDeadRecords
 */

?>

<footer id="colophon" class="site-footer">
	<div class="footer-container">
	<?php
            if (function_exists('the_custom_logo')) {
                    the_custom_logo();
        	}
        ?> 
	<p class="legal">


	</p>

	<h3>Presentations</h3>

	<h4 class="social">Social :</h4>
	<p class="social-1">
		<a href="https://www.instagram.com/dancingdeadrecords/">Instagram↗︎</a><br>
		<a href="https://www.youtube.com/@DancingDeadRecords">Youtube↗︎</a><br>
		<a href="https://www.facebook.com/dancingdeadrecords">Facebook↗︎</a><br>
		<a href="https://open.spotify.com/user/31zrqreuinlgwqno4x6e6crxqboe?si=f9b70e81910b4242">Spotify↗︎</a><br>
	</p>

	<p class="social-2">
		<a href="https://www.tiktok.com/@dancingdead.records">TikTok↗︎</a><br>
		<a href="https://discord.gg/KaCT6AVs">Discord↗︎</a><br>
		<a href="https://www.linkedin.com/company/dancing-dead-records/">LinkedIn↗︎</a><br>

	</p>

	<h4 class="menu">Menu :</h4>
	<p class="menu-1">
		<a href="<?php echo get_home_url(); ?>">Home</a><br>
		<!-- mettre le lien pour lier la page home au lien wordpress automatiquement -->
		<?php
		$about = get_page_by_title('About');
		$about_id = $about->ID;
		?>
		<a href="<?php echo get_permalink($about_id); ?>">About</a><br>
		<!-- mettre le lien pour lier la page about au lien wordpress automatiquement -->
		<?php
		$music = get_page_by_title('Music');
		$music_id = $music->ID;
		?>
		<a href="<?php echo get_permalink($music_id); ?>">Music</a><br>
		<!-- mettre le lien pour lier la page music au lien wordpress automatiquement -->
		<?php
		$artist = get_page_by_title('Artist');
		$artist_id = $artist->ID;
		?>
		<a href="<?php echo get_permalink($artist_id); ?>">Artist</a><br>
		<!-- mettre le lien pour lier la page artist au lien wordpress automatiquement -->
	</p>

	<p class="menu-2">

	</p>


</div>
<div class="sub-footer">
<div class="sub-footer-container"> 
	<img class="footer-a-img" src="https://www.dancingdeadrecords.com/wp-content/uploads/2024/09/DANCING_DEAD_-_A_BLACK_RVB.png"/>
	<p>@DancingDeadRecords - All Rights Reserved</p>
	<!-- legal terms -->
	<?php
	$legal_terms = get_page_by_title('legal-terms');
	$legal_terms_id = $legal_terms->ID;
	?>
	<a href="<?php echo get_permalink($legal_terms_id); ?>">Legal Terms</a>


	<?php
	$privacy_policy = get_page_by_title('privacy-policy');
	$privacy_policy_id = $privacy_policy->ID;
	?>
	<a href="<?php echo get_permalink($privacy_policy_id); ?>">Privacy Policy</a>

</div>
</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Dans footer.php, juste avant la balise de fermeture </body> -->
<script src="https://unpkg.com/scrollreveal"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        ScrollReveal().reveal('.reveal', {
            duration: 1000,
            origin: 'bottom',
            distance: '20px',
            easing: 'ease-in-out',
            reset: false
        });
    });
</script>

</body>

</html>