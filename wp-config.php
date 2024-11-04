<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'dancinwdatabase' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'dancinwdatabase' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'DDead35000' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'dancinwdatabase.mysql.db' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'v!T-!IZ{yxY-Bj}MI)L)R_#zV1;6uR/R#iOfI8n#i~(K{KPN`1n~,gss.f([[PN ' );
define( 'SECURE_AUTH_KEY',  '>6h)%u{9z+I`s}LCg)82q&p4mU>$g@~x/=[?nC+}~yp<&P`DYSw/fBY|)DK*:n>I' );
define( 'LOGGED_IN_KEY',    '}cNfH^Gxm3<nlZ4M1er;#_AlB` 5ni==M8&:+>)eRYp4e(*c9qS}g=6=,z:_qo.B' );
define( 'NONCE_KEY',        'RD(:27(6*}UKb|$srk,ze.:zeCc=0F{zvQuAtxk|N}4Z_~B/;X*^y %aiA^4gQzo' );
define( 'AUTH_SALT',        '0_envz/Ha#/gm~eF!I.1;m?BiR2<CV>ytfZxc6u>WI7OpCZdK+KFr7R[,]no4.G)' );
define( 'SECURE_AUTH_SALT', 'k6e%Ft%Pn7zH^o>Q~8:u#]xP:HKhuoMQh);)FeF(pI [^k&*0(m)k[[D$<L1o<N<' );
define( 'LOGGED_IN_SALT',   ';5aI-l0-E)Rj|.gGl3.%>N7gGRJ+qd5l7NAgLU;1iReJF^A*RREfs:%a;*EMwSUX' );
define( 'NONCE_SALT',       '|)c.I,Wu=jYg3TbYlj7AGIP62Z+HS%68u8qpl/-wJVY|&wu{Tw@8#wFfW64@*Po9' );
define('WP_HOME', 'https://www.dancingdeadrecords.com');
define('WP_SITEURL', 'https://www.dancingdeadrecords.com');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
