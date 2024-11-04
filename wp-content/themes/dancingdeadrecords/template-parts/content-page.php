<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DancingDeadRecords
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if (is_page( 'Home' )) : ?>
		<!-- Ne pas mettre de titre -->
		<?php else : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php endif; ?>

		
	<!-- .entry-header -->
	<div class="color-filter"></div>
	<?php dancingdeadrecords_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dancingdeadrecords' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>
	<!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<script>


    const images = document.querySelectorAll('.wp-block-image'); 

    // Parcourir les éléments et ajouter une nouvelle div avec la classe 'colorfilter' après chaque image
    images.forEach(image => {
        const colorFilter = document.createElement('div');
        colorFilter.classList.add('color-filter-img');
        image.insertAdjacentElement('beforeend', colorFilter);
    });

    console.log(images);
	
	// Ajouter une icon de flèche pour les liens
	const imageArtist = document.querySelectorAll('.artist>figcaption');
	
	imageArtist.forEach(image => {
		const arrow = document.createElement('i');
		arrow.innerText = '↗︎';
		arrow.classList.add('fas', 'fa-arrow-right');
		image.insertAdjacentElement('beforeend', arrow);
	});

	const burger = document.querySelector('.burger-menu');
	const menu = document.querySelector('.main-navigation');
	const header = document.querySelector('.header-container');

	burger.addEventListener('click', () => {
		menu.classList.toggle('active');
		burger.classList.toggle('active');
	});

	const mediaQuery = window.matchMedia('(max-width: 1025px)')
	const buttonHeader = document.querySelector('.buttons-header');
		const ul = document.querySelector('.menu');

	function handleTabletChange(e) {
		if (e.matches) {
			ul.appendChild(buttonHeader);
		}
		else{
			header.appendChild(buttonHeader);
		}
	}




	// Attachez l'écouteur d'événements
	mediaQuery.addListener(handleTabletChange)

	// Appelez la fonction une fois au chargement de la page pour prendre en compte l'état initial	
	handleTabletChange(mediaQuery)

	// // // // const Artist = document.querySelectorAll('.artist .wp-element-caption');
	// // // // console.log(Artist);

	// // // // Artist.forEach(artist => {
	// // // // 	const imgLink = document.createElement('img');
	// // // // 	imgLink.src = '/wordpress/wp-content/themes/dancingdeadrecords/img/icon-arrow-outward.svg';
	// // // // 	imgLink.classList.add('icon-arrow');
	// // // // 	artist.appendChild(img);
	// // // // });

</script>
