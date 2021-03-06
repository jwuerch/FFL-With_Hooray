<?php
/**
 * Post Audio.
 * ----------------------------------------------------------------------------- *
 */
global $post, $wp_query, $bd_data;

$bdCurrentID = get_the_ID();
$post_type = get_post_meta($bdCurrentID, 'bd_post_type', true);

// Rating
$bd_criteria_display = get_post_meta($bdCurrentID, 'bd_criteria_display', true);

// Title Position.
$title_position = "";
$bdayh_post_title = bdayh_get_option('bdayh_post_title');

if( $bdayh_post_title == 'above' ) { $title_position = " title-position-above"; }
elseif ($bdayh_post_title == 'below') { $title_position = " title-position-below"; }

$post_reviews = get_post_meta(get_the_ID(), 'bd_review_enable', true);
$baia_itemscope = "";
if( $post_reviews ) {
	$baia_itemscope = ' itemscope itemtype="http://schema.org/Review"';
}
else {
	$baia_itemscope = ' itemscope itemtype="http://schema.org/Article"';
}
?>
<?php if( is_single() ){ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('isotope-item post-item post-id'.$title_position); ?> <?php echo $baia_itemscope; ?>>
	<?php
	// Itemscope.
	global $post_author, $post;
	$author_id = '';
	if( isset( $post_author->id ) ) $author_id = $post_author->id;
	$image_id                       = get_post_thumbnail_id( $post->ID );
	$image_url                      = wp_get_attachment_image_src( $image_id, 'full' );
	$image_url                      = $image_url[0];
	$bd_date_unix                   = get_the_time('U', $post->ID);

	$logo = '';
	if( bdayh_get_option( 'logo_upload' ) ) {
		$logo = bdayh_get_option( 'logo_upload' );
	} else {
		$logo = get_template_directory_uri() .'/images/logo.png';
	}
	?>
	<span style="display: none;" itemprop="author" itemscope="" itemtype="https://schema.org/Person">
							<meta itemprop="name" content="<?php echo get_the_author_meta( 'display_name', $author_id ); ?>">
						</span>
	<meta itemprop="interactionCount" content="UserComments:<?php echo get_comments_number( $post->ID ); ?>">
	<meta itemprop="datePublished" content="<?php echo date(DATE_W3C, $bd_date_unix);?>">
	<meta itemprop="dateModified" content="<?php echo date(DATE_W3C, $bd_date_unix);?>">
	<meta itemscope="" itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="<?php echo esc_url( get_permalink( $post->ID ) );?>">
	                <span style="display: none;" itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
							<span style="display: none;" itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
								<meta itemprop="url" content="<?php echo esc_url( $logo );?>">
							</span>
							<meta itemprop="name" content="<?php echo bloginfo('name'); ?>">
						</span>
	<meta itemprop="headline " content="<?php echo get_the_title(); ?>">
	                <span style="display: none;" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
							<meta itemprop="url" content="<?php echo esc_url ( $image_url );?>">
							<meta itemprop="width" content="1240">
							<meta itemprop="height" content="540">
						</span>
	<?php } else { ?>
	<article class="isotope-item post-item post-id<?php echo $title_position; ?>">
		<?php } ?>

    <?php
    // Post Top Des
    get_template_part( 'framework/loop/post-topdes' ); ?>

    <div class="bdayh-post-Featured">

        <?php if( $bdayh_post_title == 'above' ){ ?>
            <?php get_template_part( 'framework/global/post-title' ); ?>
            <?php get_template_part( 'framework/global/post-meta' ); ?>
        <?php } ?>
        <div class="clear"></div>

        <?php
        // Post Audio
        global $post;

        $url            = get_post_meta ($post->ID, 'bd_soundcloud_url', true);
        $is_home        = bdayh_get_option('home_featured_image');
        $is_post        = bdayh_get_option('post_featured_image');

        if($post_type == 'post_soundcloud'){

            bd_home_img();

            if($url)
                bd_wp_sc();
        }
        elseif( is_singular() ) {

            if( $is_post == 1 || $post_type == 'post_image' ) bd_home_img();
        }
        else {

            if( $is_home == 1 || $post_type == 'post_image' ) bd_home_img();
        }
        ?>
        <div class="clear"></div>

        <?php if( $bdayh_post_title == 'below' ){ ?>
            <?php get_template_part( 'framework/global/post-title' ); ?>
            <?php get_template_part( 'framework/global/post-meta' ); ?>
        <?php } ?>

    </div><!-- .bdayh-post-Featured /-->

    <?php
    // No Contnet
    if($post->post_content=="")
        $no_content = " no-content";
    else
        $no_content = "";
    ?>

    <div class="entry entry-content<?php echo $no_content; ?>">

        <?php
        if ( is_single() ){

            // Above Ad.
            echo bd_post_above_ads();
	        echo "<div class='bdayh-clearfix'></div><br>\n";

            // Rating.
            if($bd_criteria_display == 't')
                bd_post_rate();
        }

        if(is_singular() || bdayh_get_option( 'blog_display' ) == 'content'){

            // The Content.
            the_content( __( 'Read more', LANG) );

            // Post Links.
            $defaults = array(
                'before' => '<div class="clear"></div><div class="main-pagination post-pagination">',
                'after' => '</div><div class="clear"></div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
                'next_or_number'   => 'next',
                'separator'        => ' ',
                'nextpagelink'     => '<i class="fa fa-chevron-right"></i>',
                'previouspagelink' => '<i class="fa fa-chevron-left"></i>',
                'pagelink'         => '%',
            );
            wp_link_pages( $defaults );
        }
        else {

            if( !$post->post_content=="" ){
                ?>
                <div class="post-formats-exc"><?php bd_excerpt(); ?></div>
                <div><a class="more-link" href="<?php the_permalink(); ?>"><?php _e('Read more', LANG); ?></a></div>
            <?php
            }
        }
        ?>

        <?php
        if ( is_single() )
        {
            // Rating.
            if($bd_criteria_display == 'bottom')
                bd_post_rate();

            // Bellow Ad.
            echo bd_post_below_ads();

            // Post Tags.
            if( bdayh_get_option('post_tags') )
                the_tags( '<div class="clear"></div><div class="tagcloud">', '', '</div><div class="clear"></div>' );
        }

        // Post Sharing.
        $social_sharing = '<div class="home-post-share">'.bd_load_template_part('framework/global/social-sharing').'</div>';

        if( is_singular() and bdayh_get_option( 'social_sharing_box' ) ) {
            echo $social_sharing;
        }
        elseif( (is_home() or is_front_page()) and bdayh_get_option( 'social_sharing_box_home' ) ) {
            echo $social_sharing;
        }
        ?>

    </div><!-- .entry-content /-->

</article><!-- .post /-->