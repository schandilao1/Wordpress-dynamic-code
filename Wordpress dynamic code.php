<!-- Repeater code -->
<?php
if( have_rows('aspect_box') ):
$i = 0;
while( have_rows('aspect_box') ): the_row();
$aspect_box_content = get_sub_field('aspect_box_content');
$aspect_box_icon = get_sub_field('aspect_box_icon');
?>				
	<div class="col-md-4">
		<div class="rearch_main">
			<div class="icon_wrap">
			<img src="<?php echo $aspect_box_icon; ?>" alt="">
			</div>
			<?php echo $aspect_box_content; ?>
			<a href="#.">Know More</a>
		</div>
	</div>				
<?php
$i++;
endwhile;
endif;
?>	

<!-- this is custom field code -->
<?php the_field('quality_section_1_image'); ?>

<!-- this is postype code to call a posts -->
<?php
$args = array(
	// here a name a of postype
'post_type' => 'post_news',  
'posts_per_page' => 2,
'order'   => 'desc',
);
$query = new WP_Query( $args );
if($query->have_posts()) :
while($query->have_posts()) : $query->the_post();
?> 			
<div class="col-md-6">
<div class="inner_events">
<a href="<?php the_permalink();?>">
<div class="image_wrap_events">
<img src="<?php the_post_thumbnail_url();?>" alt="">
</div>
<div class="content_events">
<h4><?php the_title();?></h4>
<span class="arrow">
<img src="https://nextstep.net.in/harsoria-healthcare/wp-content/themes/harsoria-healthcare/assets/images/arrow right.png" alt="">
</span>
</div>
</a>
</div>
</div>   			
<?php 
endwhile;
endif;
wp_reset_postdata(); 
?>

<!-- call a Image in main directory -->
(<?php bloginfo('template_url'); ?>/assets/images/bg.jpg);

<!-- this a code of dynamic site url code -->
<a href="<?php echo site_url()?>/company">know More</a>


<!-- this is a code of create a dynamic navbar -->
<?php 
$args = array(
'menu' => '(Main Menu)',
'container'      => 'ul',
'menu_class'     => 'nav-menu',
);
wp_nav_menu( $args ); 
?>



<!-- this is code of to call a taxonomy -->
<?php
$i=0;
$terms = get_terms( array(
'taxonomy' => 'products_range',
'hide_empty' => false,
'orderby'    => 'title', 
'order' => 'asc',
'parent' => 0,
) );
if ( $terms && !is_wp_error( $terms ) ) :
$i = 0;
foreach ( $terms as $term ) {
$term_id = $term->term_id;
$term_name = $term->name;
$term_slug = $term->slug;
$count = count($posts); 
$category_image = get_field('category_image',$term);
?>
	<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
		<div class="used__inner">
			<a href="<?php echo get_term_link($term->term_id); ?>">
				<div class="used__image">
					<img src="<?php echo $category_image ?>" alt="">
				</div>
				<h5><?php echo $term_name; ?></h5>
			</a>
		</div>
	</div>
<?php
$i++;
} 
endif; 	
?>