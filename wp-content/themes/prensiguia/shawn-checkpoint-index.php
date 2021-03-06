<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Index Template
 *
 *
 * @file           index.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/index.php
 * @link           http://codex.wordpress.org/Theme_Development#Index_.28index.php.29
 * @since          available since Release 1.0
 */

get_header(); 
$archive_year  = get_the_time('Y'); 
$archive_month = get_the_time('m'); 
$archive_day   = get_the_time('d'); 
?>

<div style="clear:both;"></div>
<?php if (current_user_can( 'manage_options' ))  { } else { include('/var/www/html/lpmu/wp-content/themes/noticias' . '/page-wing-ads.php'); } ?>
<?php include('/var/www/html/lpmu/wp-content/themes/noticias' . '/banner-ad-widget-portada.php'); ?>
<?php include('/var/www/html/lpmu/wp-content/themes/noticias' . '/banner-ad-widget-270x90.php'); ?>
<div style="clear:both;"></div>

<div id="content" class="grid col-620">

<?php 
echo do_shortcode('[doap_spacer size="1" class="homespace"]'); 
echo '<div id="tagbox" style="width:100%;max-width:650px;padding-left:2px;padding-bottom:6px;padding-top:2px;background-color:#f5f5f5;position:absolute;top:100px;font-size:1.1em;overflow:hidden;">';

echo '<div style="position:relative;top:7px;padding-left:0px;padding-right:0px;" id="toptagcloud">';

$how_many_posts = 30;
$args = array(
    'posts_per_page' => $how_many_posts,
    'orderby' => 'date',
    'order' => 'DESC',
);
// get the last $how_many_posts, which we will loop over
// and gather the tags of
query_posts($args);
//
$temp_ids = array();
while (have_posts()) : the_post(); 
    // get tags for each post
    $posttags = get_the_tags();
    if ($posttags) {
        foreach($posttags as $tag) {
            // store each tag id value
            $temp_ids[] = $tag->term_id;
        }
    }
endwhile;
// we're done with that loop, so we need to reset the query now
wp_reset_query();
$id_string = implode(',', array_unique($temp_ids));
// These are the params I use, you'll want to adjust the args
// to suit the look you want    
$args = array(
    'smallest'  => 10, 
    'largest'   => 15,
    'unit'      => 'px', 
    'number'    => 8,  
    'format'    => 'flat',
    'separator' => " - \n",
    'orderby'   => 'count', 
    'order'     => 'DESC',
    'include'   => $id_string,  // only include stored ids
    'link'      => 'view', 
    'echo'      => true,

);

echo '<div style="z-index:10000;height: 20px;float: left;padding-left:0px;padding-right:5px;left:0px;position:relative;top:0px;" id=destacados-sidebar><div style="font-size:.8em;width:130px;position:relative;float:left;"><img style="-webkit-user-select: none;height:12px;width:12px;" src="http://laprensa13.doap.us/images/tag.png"> Temas del dia:</div> '.wp_tag_cloud( $args ).'</div>';

//wp_tag_cloud( $args );

//wp_tag_cloud('smallest=8&largest=22&number=15&orderby=count'); 
//echo do_shortcode('[xyz-ips snippet="portada-tag-cloud"]');
echo '</div>';

echo '</div>';
//echo '</span>';
echo '<div style="clear:both;"></div>';

	    date_default_timezone_set("America/Managua"); // Set the default time zone. Ideally, you want this in your header.
		// For a list of supported timezones visit:  http://www.php.net/manual/en/timezones.php 


		// Variables
		$h = date('G'); // G will display the hour using the 24 hour clock (0-23).
		$m = date('i'); // i will display the minutes in 01, 02 (etc) format.
		$d = date('l'); // l will display the day of the week in Sunday, Monday (etc) format.

		// The first broadcast starts at 45 past the hour. 
		// This variable returns the difference in minutes until broadcast time
		$startMinute = 45 - date ('i'); // Start Time - Current Time = Minutes left

		// If it's Friday and the hour is greater than or equal to 13 and less than or equal than 15
		// variable $toggleBar echos "radio-online" else, it echos "radio-offline"
		// This is used to toggle the container that will hold our buttons.		
		if ($d == 'Friday' && $h >= 13 && $h <= 15) {
			$toggleBar = 'radio-online';	
		} else {
			$toggleBar = 'radio-offline';	
		}	

		// Broadcast 1 - Displays Friday's between 13:40 and 13:59 
		if ($d == 'Friday' && $h == 13 && $m >= 40 && $m <= 59) {
			$toggleBroadcast1 = 'radio-online';
		} else {
			$toggleBroadcast1 = 'radio-offline';
		}

		// Broadcast 2 - Displays Fridays between 14:00 and 15:00
		if ($d == 'Friday' && $h >= 14 && $h <= 15) {
			$toggleBroadcast2 = 'radio-online';	
		} else {
			$toggleBroadcast2 = 'radio-offline';	
		}

		// Removes "In" from "Streaming Live In" on the Countdown
		// The countdown is displayed Fridays from 13:00 - 13:45. 
		if ($d == 'Friday' && $h == 13 && $m < 45 ) {
//echo do_shortcode('[xyz-ips snippet="doap-livestream-embed"]');
			$streaming = 'radio-online';
		} else {
			$streaming = 'radio-offline';
		}	

echo do_shortcode('
<div style="position:relative;">
<div class="su-row">
<div class="su column su-column-size-3-4">
[doap_slider source="category: 2293,3518,1625,26,31,22,21,30,991" limit="1" autoplay="0" arrows="no" link="post" width="640" height="360" pages="no" mousewheel="no" autoplay="8000" speed="400" class="slider-home  "]

[doap_posts template="templates/box-loop-single-wide.php" posts_per_page="1" tax_term="3" tax_operator="0" author="1,102,108,113,114,116,117,103,111,118,112,110,107,115,120,106,104,105,119,109" order="desc" post_parent=" " ignore_sticky_posts="yes"]
    
[doap_spacer size="2"]



[doap_posts template="templates/box-loop.php" offset="2" posts_per_page="4" tax_term="2293,3518,1673,25,26,31,22,21,25763,10,3,3132,3519,27,63721,24,30,991,1675" tax_operator="0" author="1,102,108,113,114,116,117,103,111,118,112,110,107,115,120,106,104,105,119,109" order="desc" post_parent="  " ignore_sticky_posts="yes"]

  
<div style="clear:both;"></div>
[doap_spacer size="10"]

<div id="middle-home-ad-468x60">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 468x60 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:468px;height:60px"
     data-ad-client="ca-pub-6970273280466483"
     data-ad-slot="8470961064"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({}); 
</script>
</div> 
<div style="clear:both;"></div>
[doap_spacer size="10"]

[doap_animate type="fadeIn"][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/departamentales"><div class="title-left">DEPARTAMENTALES</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading][/doap_animate]

<div style="border:0px solid #000;background-color:#eae8dd;margin-left:0px;padding:15px;width:95%;height:217px;">
 
    [doap_posts template="templates/teaser-loop-departamentales.php" offset="4" posts_per_page="2" tax_term="26" tax_operator="0" author="1,102,108,113,114,116,117,103,111,118,112,110,107,115,120,106,104,105,119,109" order="desc" post_parent="  " ignore_sticky_posts="yes"]
<div id="ipad-only" style="display:none;" class="centercol">
[doap_animate type="fadeIn"][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/category/noticias/deportes">DEPORTES</a>[/doap_heading][/doap_animate] 
     </div> 

<div style="display:none;" id="middle-home-ad-468x60">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 468x60 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:468px;height:60px"
     data-ad-client="ca-pub-6970273280466483"
     data-ad-slot="8470961064"></ins>
</div>

</div>

[doap_posts template="templates/box-loop.php" posts_per_page="2" offset="2" tax_term="3" tax_operator="0" author="1,102,108,113,114,116,117,103,111,118,112,110,107,115,120,106,104,105,119,109" order="desc" post_parent=" " ignore_sticky_posts="yes"]



</div>


<div class="su column su-column-size-1-4">
<div id="hideonipad"> 
[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/deportes"><div id="des-sec" class="title-left">DEPORTES</div><div id="des-dot" class="twodots"></div></a>[/doap_heading]

[doap_posts template="templates/teaser-home-centercol.php" posts_per_page="3" tax_term="17,3132" tax_operator="0" author="1,102,108,113,114,116,117,103,111,118,112,110,107,115,120,106,104,105,119,109" order="desc" post_parent="  " ignore_sticky_posts="yes"]

[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/reportajes-especiales"><div class="title-left">REPORTAJE</div><div class="twodots"></div></a>[/doap_heading]

[doap_posts template="templates/teaser-home-centercol.php" posts_per_page="1" tax_term="63721" tax_operator="0" author="1,102,108,113,114,116,117,103,111,118,112,110,107,115,120,106,104,105,119,109" order="desc" post_parent="  " ignore_sticky_posts="yes"]

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- short-vert -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:240px"
     data-ad-client="ca-pub-6970273280466483"
     data-ad-slot="6979461869"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/vida"><div id="des-sec" class="title-left">VIDA</div><div id="des-dot" class="twodots"></div></a>[/doap_heading]

[doap_posts template="templates/teaser-home-centercol.php" posts_per_page="4" tax_term="1675" tax_operator="0" author="1,102,108,113,114,116,117,103,111,118,112,110,107,115,120,106,104,105,119,109" order="desc" post_parent="  " ignore_sticky_posts="yes"]
 
[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/vida"><div id="des-sec" class="title-left">TECNOLOGÍA</div><div id="des-dot" class="twodots"></div></a>[/doap_heading]

[doap_posts template="templates/teaser-home-centercol.php" offset="1" posts_per_page="4" tax_term="991" tax_operator="0" author="1,102,108,113,114,116,117,103,111,118,112,110,107,115,120,106,104,105,119,109" order="desc" post_parent="  " ignore_sticky_posts="yes"]
</div>

</div>
 
</div>
</div>
');
?>


	<?php if( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>

				<?php get_template_part( 'post-meta-page' ); ?>

				<div class="post-entry">
					<?php if( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					<?php endif; 
					the_content( __( 'Leer más &#8250;', 'responsive' ) );
					$qqq++; ?>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Paginas:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div>

				<!-- end of .post-entry -->

				<?php get_template_part( 'post-data' ); ?>

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

			<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php responsive_comments_after(); ?>

		<?php
		endwhile;

		get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

</div><!-- end of #content -->

<?php get_sidebar('index'); ?>

<?php //echo do_shortcode('[doap_spacer id=aftersidebar size="20"]'); ?>
<div style="clear:both"></div>
<?php //echo "<div style=z-index:0;position:relative;top:0;border:1px solid #cccccc;>"; ?>
<div style="height:0px;width:728px;margin-left:138px;">
<?php //include('/var/www/html/lpmu/wp-content/themes/noticias' . '/banner-midpage-index.php'); ?>
</div>
<div style="clear:both"></div>
<?php //echo do_shortcode('[doap_animate type="fadeIn"][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/destacados">DESTACADOS<div class="2dots" style="width:100%;background: url("/2dots.png") repeat;"></div></a>[/doap_heading][/doap_animate]'); ?>
<div class="destacados-section">

<div class="home-728x90" style="margin-left:135px;">
<!-- Portada-horizontal-2-728x90 -->
<div id='div-gpt-ad-1402091929548-0' style='width:728px; height:90px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1402091929548-0'); });
</script>
</div>
</div>

<?php echo do_shortcode('[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/destacados"><div class="title-left">DESTACADOS</div><div id="des-dot" class="twodots"></div></a>[/doap_heading]'); ?>

<?php
$args = array( 'posts_per_page' => 4, 'meta_key'=> '_thumbnail_id', 'meta_query' => array(array('key' => 'bloque_destacado_portada','value' => true,'type' => 'BOOLEAN')), 'post_status' => 'publish' );
add_filter('posts_clauses', 'filterEdiciones');
$myposts = get_posts( $args );
//var_dump($myposts);
$dest_count = 0;
foreach ( $myposts as $post )
{	
	setup_postdata( $post );
	$dest_count++;
	$category = get_the_category(); 
	$themaincat = $category[0]->cat_ID;
	$single_cat_title = $category[0]->cat_name;
	$cat_url = '/' . remove_accents(strtolower($single_cat_title));
	$title = the_title_attribute('echo=0');
	$post_url = get_permalink($post->ID);
	$margin_right = ($dest_count == 4) ? 'margin-right:4px;' : 'margin-right:10px;';
	echo '<div style="position:relative;float:left;min-height:378px;width:240px;' . $margin_right . '">';
	echo '<div class="tcp-product-list tcpf" style="border: 1px solid #ccc;margin-bottom:10px;min-height:378px;">';
	$feat_image_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'center-top-300x300' ); 
	$feat_image = $feat_image_array[0];
	echo '<div style="position:relative;max-width:300px;margin-top:0px;margin-bottom:0px;">' . PHP_EOL . '<a href="' . $post_url . '"><img src="' . $feat_image . '"></a>' . PHP_EOL;
	echo '</div>';
	echo '<a href="' . $cat_url . '"><h5 style="background-color:#4c4c4c;color:#fff;position:absolute;top:-17px;margin-bottom:0px;padding: 5px 15px 0px 15px;height:20px;z-index:10;font-family:Arial,Helvetica,sans-serif;font-size:1.125em;font-weight:700;line-height:1.0em;">' . $single_cat_title . '</h5></a>';
	echo '<div class="destacados-titles" style="padding:4px;"><h4 class="tcpf"><a href="' . $post_url . '">'. $title . '</a></h5></div>' . PHP_EOL;
	echo '<div class="destacados-excerpt" style="padding:4px;">' . PHP_EOL;
	$theexcerpt = get_doap_excerpt(30);
	$theexcerpt = '<div style="text-align:justify;">' . $theexcerpt . '</div>' . PHP_EOL;
	echo $theexcerpt;
	//echo get_the_term_list( $post->ID, 'post_tag', 'Etiquetas: ', ', ', '' );
	echo '</div>' . PHP_EOL;
	echo '</div>' . PHP_EOL;
	echo '</div>' . PHP_EOL;
	wp_reset_postdata();
}
removeQueryFilter();
echo '</div><div style="clear:both;"</div>';
?>
<?php //echo do_shortcode('[doap_spacer size="20"]'); ?>
<?php //echo do_shortcode('[doap_spacer size="20"]'); ?>

<div class="home-728x90" style="margin-left:135px">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-6970273280466483";
/* nica-728x90banner */
google_ad_slot = "4717436669";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>



<div style="clear:both;"></div>
<?php //echo do_shortcode('[doap_spacer size="140"]'); 
echo '<div style="height:30px;"></div>';
echo '<div class="bottom-section">';
echo '<div style="clear:both;"></div>';
echo '<div class="su-column su-column-size-1-3 suplementos-home-bottom" style="position:relative;float:right;margin:0 0 0 0;"><a href="http://noticias.laprensa.com.ni/category/portada-impresa">';
echo do_shortcode('[doap_animate type="fadeIn"][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/category/noticias/portada-impresa"><div class="title-left">PORTADA IMPRESA</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading][/doap_animate]');
echo '</a>';
echo do_shortcode('<div style=margin-bottom:20px;height:218px;width:250px;>[doap_custom_gallery source="category: 3680" limit="1" link="post" width="250" height="218" title="always" class="gallery-of-portadas"]</div>');
echo '<a style="position:relative;top:-35px;" href="http://noticias.laprensa.com.ni/2014">';
echo '<div style="position:relative;top:-10px;max-width:90%;margin-top:50px;">';
echo do_shortcode('[doap_button url="/2014/" style="soft" background="#eee" color="#369" size="2" icon="icon: calendar" icon_color="#369" text_shadow="0px 0px 0px #369" class="daves-sample-menu-item"]Archivo de Ediciones Anteriores[/doap_button]');
echo '<div style="width:100%;padding-left:5px;padding-right:5px;max-width:90%;text-align:justify;">Haga clic al calendario y seleccione la edicion.  Para ediciones anteriores al 30 de Octubre del 2009 clic <a href=http://archivo.laprensa.com.ni/archivo/servicios/edicionesanteriores/index.php?month=10&year=2009 style=color:blue>aqui</a>.</div></div>';

echo ' <div style="position:relative;left:20px;top:-20px;">
    
<form name="form1" method="GET" action="/" id="form1">
    
<input name="txtDate" type="text" id="txtDate" />
<br>    
    <p><span src="/someimage.jpg"><input id="fullDate" type="hidden" /></span></p>
    <select id="month" name="monthnum">
        <option value="01">Enero</option> 
        <option value="02">Febrero</option>
        <option value="03">Marzo</option>
        <option value="04">Abril</option>
        <option value="05">Mayo</option>
        <option value="06">Junio</option>
        <option value="07">Julio</option>
        <option value="08">Augosto</option>
        <option value="09">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Deciembre</option>
    </select>
    <select id="day" name="day">
        <option value="01">1</option>
        <option value="02">2</option>
        <option value="03">3</option>
        <option value="04">4</option>
        <option value="05">5</option>
        <option value="06">6</option>
        <option value="07">7</option>
        <option value="08">8</option>
        <option value="09">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
    </select>
    <select id="year" name="year">
        <option value="2014">2014</option>
        <option value="2013">2013</option>
        <option value="2012">2012</option>
        <option value="2011">2011</option>
        <option value="2010">2010</option>
        <option value="2009">2009</option>
    </select>
    <input type="hidden" id="datepicker" /> 
    <input type="submit" id="searchsubmit" value="Ir" />

    </form>
</div> ';





echo ' <div style="top:20px;border:1px solid #000;width:300px;height:250px;background-color:#369;">'; ?>



<!-- Portada-Robapagina-inferior-300x250 -->
<div id='div-gpt-ad-1402091032981-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1402091032981-0'); });
</script>
</div>


<?php
echo '</div></div>';

echo '<div class="su-column su-column-size-2-3 suplementos-home-bottom" style="position:relative;float:left;"><div class="su-column-inner su-clearfix"></div>';
//echo do_shortcode('[doap_row][doap_column size="2/3" class="suplementos-home-bottom"]');
echo do_shortcode('[doap_animate type="fadeIn"][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/suplemento"><div class="title-left">SUPLEMENTOS</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading][/doap_animate]');
include('supl-sect.php');

echo '<div style="height:30px;"></div>';
echo '<div id=magazine-ad><a href=http://magazine.laprensa.com.ni><iframe src=http://noticias.laprensa.com.ni/los-cuatro/magazine.html frameborder=0 scrolling=no height=137 width=728></iframe></a></div>';
echo '<div style="height:30px;"></div>';

echo do_shortcode('<div>[doap_animate type="fadeIn"][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/cartelera-de-cine"><div class="title-left">CARTELERA DE CINE</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading][/doap_animate]<br><div style="max-width:600px;width:100%;height:300px;background-color:#369:">[doap_custom_gallery source="category: 23782" limit="1" link="post" width="600" height="280" title="never" class="cartelera-images-3up"]</div></div>');


 ?>

</div>
</div>
<div style="clear:both;"></div>

<?php echo do_shortcode('[doap_divider text="Volver a la parte superior de la página"]'); ?>

<div style="position:absolute;width:100%;background-color:#369;"> </div>
<div style="position:absolute;width:100%;background-color:#2B4C92;"> </div>
<?php 
echo $qqq;
get_footer(); ?>
