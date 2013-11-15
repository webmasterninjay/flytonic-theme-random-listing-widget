<?php
/*
Plugin Name: Flytonic Random Listing Widget
Plugin URI: http://www.forexaffiliates.com/
Description: Add widget to randomize affiliate program for Flytonic Theme. This plugin works only with Flytonic theme and not intended to use with other theme.
Version: 1.5	
Author: Jayson Antipuesto
Author URI: http://www.forexaffiliates.com/
*/

class RandomAffiliateWidget extends WP_Widget
{
  function RandomAffiliateWidget()
  {
    $widget_ops = array('classname' => 'RandomAffiliateWidget', 'description' => 'Displays a random affiliate program' );
    $this->WP_Widget('RandomAffiliateWidget', 'Random Affiliate Program', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'broker' => '', 'program' => '', 'brokerurl' => '') );
    $title = $instance['title'];
	$broker = $instance['broker'];
	$program = $instance['program'];
	$brokerurl = $instance['brokerurl'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('broker'); ?>">All Links Wordings: <input class="widefat" id="<?php echo $this->get_field_id('broker'); ?>" name="<?php echo $this->get_field_name('broker'); ?>" type="text" value="<?php echo attribute_escape($broker); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('brokerurl'); ?>">All Links URL: <input class="widefat" id="<?php echo $this->get_field_id('brokerurl'); ?>" name="<?php echo $this->get_field_name('brokerurl'); ?>" type="text" value="<?php echo attribute_escape($brokerurl); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('program'); ?>">Affiliate Program Type: <select class="widefat" id="<?php echo $this->get_field_id('program'); ?>" name="<?php echo $this->get_field_name('program'); ?>" type="text" value="<?php echo attribute_escape($program); ?>"><option value="1">CPA</option><option value="2">Pip Rebate</option><option value="3">Revenue Share</option><option value="4">Hybrid</option><option value="5">Whitelabel</option><option value="6">Refer a friend</option><option value="7">Second Tier</option></select></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
	$instance['broker'] = $new_instance['broker'];
	$instance['program'] = $new_instance['program'];
	$instance['brokerurl'] = $new_instance['brokerurl'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
	
?>

<?php
	if ($instance['program'] == 1) { ?>
 
 <table class="widget-aff-program">
		<tr>
			<td class="row1 col1 head">Broker Name</td>
			<td class="row1 col2 head">CPA</td>
			<td class="row1 col3 head"></td>
		</tr>
		<?php $random = new wp_query('post_type=casino&category_name=CPA Brokers&showposts=3&orderby=rand'); while($random->have_posts()) : $random->the_post(); ?> 
		<tr>
			<td class="row2 col1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></td>
			<td  class="row2 col2"><?php echo get_post_meta(get_the_ID(), '_as_cpa', true);?></td>
			<td  class="row2 col3"><a href="<?php the_permalink() ?>"><img alt="Visit" src="<? bloginfo('stylesheet_directory'); ?>/images/reviewbutton.png" class="review-img" /></a><a href="<?php bloginfo('url'); ?>/visit/<?php echo get_post_meta(get_the_ID(), '_as_redirectkey', true) ?>/"><img alt="Visit" src="<? bloginfo('stylesheet_directory'); ?>/images/gobutton.png" class="play-img" /></a></td>
		</tr>
		<?php endwhile; ?>		
		</table>
		<p id="link-all-broker"><a href="<?php echo $instance['brokerurl']; ?>"><?php echo $instance['broker']; ?></a></p>
		<?php }
		
	if ($instance['program'] == 2) { ?>
 
 <table class="widget-aff-program">
		<tr>
			<td class="row1 col1 head">Broker Name</td>
			<td class="row1 col2 head">Rebate (up to)</td>
			<td class="row1 col3 head"></td>
		</tr>
		<?php $random = new wp_query('post_type=casino&category_name=Pip Rebate Brokers&showposts=3&orderby=rand'); while($random->have_posts()) : $random->the_post(); ?> 
		<tr>
			<td class="row2 col1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></td>
			<td  class="row2 col2"><?php echo get_post_meta(get_the_ID(), '_as_rebate', true);?></td>
			<td  class="row2 col3"><a href="<?php the_permalink() ?>"><img alt="Visit" src="<? bloginfo('stylesheet_directory'); ?>/images/reviewbutton.png" class="review-img" /></a><a href="<?php bloginfo('url'); ?>/visit/<?php echo get_post_meta(get_the_ID(), '_as_redirectkey', true) ?>/"><img alt="Visit" src="<? bloginfo('stylesheet_directory'); ?>/images/gobutton.png" class="play-img" /></a></td>
		</tr>
		<?php endwhile; ?>		
		</table>
		<p id="link-all-broker"><a href="<?php echo $instance['brokerurl']; ?>"><?php echo $instance['broker']; ?></a></p>
		<?php }
		
	if ($instance['program'] == 3) { ?>
 
 <table class="widget-aff-program">
		<tr>
			<td class="row1 col1 head">Broker Name</td>
			<td class="row1 col2 head">Revenue Share %</td>
			<td class="row1 col3 head"></td>
		</tr>
		<?php $random = new wp_query('post_type=casino&category_name=Revenue Share Brokers&showposts=3&orderby=rand'); while($random->have_posts()) : $random->the_post(); ?> 
		<tr>
			<td class="row2 col1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></td>
			<td  class="row2 col2"><?php echo get_post_meta(get_the_ID(), '_as_revenueshare', true);?></td>
			<td  class="row2 col3"><a href="<?php the_permalink() ?>"><img alt="Visit" src="<? bloginfo('stylesheet_directory'); ?>/images/reviewbutton.png" class="review-img" /></a><a href="<?php bloginfo('url'); ?>/visit/<?php echo get_post_meta(get_the_ID(), '_as_redirectkey', true) ?>/"><img alt="Visit" src="<? bloginfo('stylesheet_directory'); ?>/images/gobutton.png" class="play-img" /></a></td>
		</tr>
		<?php endwhile; ?>		
		</table>
		<p id="link-all-broker"><a href="<?php echo $instance['brokerurl']; ?>"><?php echo $instance['broker']; ?></a></p>
		<?php }
		
	if ($instance['program'] == 4) { ?>
 
 <table class="widget-aff-program">
		<tr>
			<td class="row1 col1 head">Broker Name</td>
			<td class="row1 col2 head">CPA (up to)</td>
			<td class="row1 col3 head"></td>
		</tr>
		<?php $random = new wp_query('post_type=casino&category_name=Hybrid Brokers&showposts=3&orderby=rand'); while($random->have_posts()) : $random->the_post(); ?> 
		<tr>
			<td class="row2 col1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></td>
			<td  class="row2 col2"><?php echo get_post_meta(get_the_ID(), '_as_cpa_up_to', true);?></td>
			<td  class="row2 col3"><a href="<?php the_permalink() ?>"><img alt="Visit" src="<? bloginfo('stylesheet_directory'); ?>/images/reviewbutton.png" class="review-img" /></a><a href="<?php bloginfo('url'); ?>/visit/<?php echo get_post_meta(get_the_ID(), '_as_redirectkey', true) ?>/"><img alt="Visit" src="<? bloginfo('stylesheet_directory'); ?>/images/gobutton.png" class="play-img" /></a></td>
		</tr>
		<?php endwhile; ?>		
		</table>
		<p id="link-all-broker"><a href="<?php echo $instance['brokerurl']; ?>"><?php echo $instance['broker']; ?></a></p>
		<?php }	
	
	if ($instance['program'] == 5) { ?>
 
 <table class="widget-aff-program">
		<tr>
			<td class="row1 col1 head">Broker Name</td>
			<td class="row1 col2 head">Rebate/ Revenue Share</td>
			<td class="row1 col3 head"></td>
		</tr>
		<?php $random = new wp_query('post_type=casino&category_name=White Label Brokers&showposts=3&orderby=rand'); while($random->have_posts()) : $random->the_post(); ?> 
		<tr>
			<td class="row2 col1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></td>
			<td  class="row2 col2"><?php echo get_post_meta(get_the_ID(), '_as_rebate_revenue_share', true);?></td>
			<td  class="row2 col3"><a href="<?php the_permalink() ?>"><img alt="Visit" src="<? bloginfo('stylesheet_directory'); ?>/images/reviewbutton.png" class="review-img" /></a><a href="<?php bloginfo('url'); ?>/visit/<?php echo get_post_meta(get_the_ID(), '_as_redirectkey', true) ?>/"><img alt="Visit" src="<? bloginfo('stylesheet_directory'); ?>/images/gobutton.png" class="play-img" /></a></td>
		</tr>
		<?php endwhile; ?>		
		</table>
		<p id="link-all-broker"><a href="<?php echo $instance['brokerurl']; ?>"><?php echo $instance['broker']; ?></a></p>
		<?php }
	
	if ($instance['program'] == 6) { ?>
 
 <table class="widget-aff-program">
		<tr>
			<td class="row1 col1 head">Broker Name</td>
			<td class="row1 col2 head">CPA for Referrer</td>
			<td class="row1 col3 head"></td>
		</tr>
		<?php $random = new wp_query('post_type=casino&category_name=Refer-a-Friend Brokers&showposts=3&orderby=rand'); while($random->have_posts()) : $random->the_post(); ?> 
		<tr>
			<td class="row2 col1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></td>
			<td  class="row2 col2"><?php echo get_post_meta(get_the_ID(), '_as_cpa_for_referrer', true);?></td>
			<td  class="row2 col3"><a href="<?php the_permalink() ?>"><img alt="Visit" src="<? bloginfo('stylesheet_directory'); ?>/images/reviewbutton.png" class="review-img" /></a><a href="<?php bloginfo('url'); ?>/visit/<?php echo get_post_meta(get_the_ID(), '_as_redirectkey', true) ?>/"><img alt="Visit" src="<? bloginfo('stylesheet_directory'); ?>/images/gobutton.png" class="play-img" /></a></td>
		</tr>
		<?php endwhile; ?>		
		</table>
		<p id="link-all-broker"><a href="<?php echo $instance['brokerurl']; ?>"><?php echo $instance['broker']; ?></a></p>
		<?php }
	
	if ($instance['program'] == 7) { ?>
 
 <table class="widget-aff-program">
		<tr>
			<td class="row1 col1 head">Broker Name</td>
			<td class="row1 col2 head">Commission % (up to)</td>
			<td class="row1 col3 head"></td>
		</tr>
		<?php $random = new wp_query('post_type=casino&category_name=2nd Tier Brokers&showposts=3&orderby=rand'); while($random->have_posts()) : $random->the_post(); ?> 
		<tr>
			<td class="row2 col1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></td>
			<td  class="row2 col2"><?php echo get_post_meta(get_the_ID(), '_as_commission', true);?></td>
			<td  class="row2 col3"><a href="<?php the_permalink() ?>"><img alt="Visit" src="<? bloginfo('stylesheet_directory'); ?>/images/reviewbutton.png" class="review-img" /></a><a href="<?php bloginfo('url'); ?>/visit/<?php echo get_post_meta(get_the_ID(), '_as_redirectkey', true) ?>/"><img alt="Visit" src="<? bloginfo('stylesheet_directory'); ?>/images/gobutton.png" class="play-img" /></a></td>
		</tr>
		<?php endwhile; ?>		
		</table>
		<p id="link-all-broker"><a href="<?php echo $instance['brokerurl']; ?>"><?php echo $instance['broker']; ?></a></p>
		<?php }
	
		?>
		<?php
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("RandomAffiliateWidget");') );

//CSS

function wprandom_style() {
        wp_enqueue_style( 'WP-Random-Style', plugin_dir_url( __FILE__ ) . 'table-style.css', array(), '0.1', 'screen' );
}
add_action( 'wp_enqueue_scripts', 'wprandom_style' );
?>
