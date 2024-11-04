<?php
get_header();

// Début de la boucle WordPress
while (have_posts()) :
    
    the_post();
    // Affichage du titre de l'artiste
    the_title('<h1>', '</h1>');
    // Affichage du contenu de l'artiste
    echo '<div class="artist-content">';
    the_content();
    echo '</div>';

endwhile; // Fin de la boucle WordPress

get_footer();
