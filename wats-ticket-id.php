<?php
/* Plugin Name: Wats Ticket ID Widget
Plugin URI: http://zoecorkhill.co.uk/
Description: A plugin to jump to support tickets from a sidebar widget, by ID. Designed to work with <a href="http://www.ticket-system.net/">Wordpress Advanced Ticket System</a>, whilst using the 'single number' numbering system.
Author: Zoe Corkhill
Version: 1.0
Author URI: http://zoecorkhill.co.uk/
*/

add_filter('query_vars', 'parameter_wats_id' );
function parameter_wats_id( $qvars )
{
$qvars[] = ' wats_id';
return $qvars;
}
 
function widget_ticketID($args) {
  extract($args);
  if(isset($_POST['wats_id'])):
	  $ticketID=$_POST['wats_id'];
	  if($ticketID>0):
	  
	  // The Query
	  
	 	
 $the_query = new WP_Query( 'meta_key=wats_ticket_number&meta_value='.$ticketID );
	  
	  if ( $the_query->have_posts()) :
	  
	  // The Loop
	  while ( $the_query->have_posts() ) : $the_query->the_post();
	  
	 
	  $url=get_permalink();
	 
	  //	header("location: ".get_permalink());
	  endwhile;
	  endif;
	  
	  // Reset Query
	  wp_reset_query();

	  endif;
  endif;
  
  $options = get_option("widget_ticketID");
    if (!is_array( $options ))
  {
  $options = array(
        'title' => 'Jump to Ticket by ID'
        );
    }
    
  echo $before_widget;
  echo $before_title;
  echo $options['title'];
  echo $after_title;
  echo '
  <div id="ticketID"><form id="ticketIDform" method="POST" action="">
  <label>Ticket ID:</label><input id="wats_id" name="wats_id" value = "" type="text" size="10" />
  <input type="image" id="searchsubmit" src="';
  bloginfo( 'stylesheet_directory' );
  echo '/images/search-btn.gif" style="height:16px;width:26px;border-width:0px;" class="btn" />
  </form></div>';
  if(isset($_POST['wats_id'])&&!isset($url)){
  	echo '<div id="ticketIDerror">Ticket not found</div>';
  }elseif(isset($url)){?>
  	<script type="text/javascript">
  	<!--
  	window.location = "<?php echo $url?>";
  	//-->
  	</script>
  <?php }
  echo $after_widget;
}



function ticketID_control()
{
  $options = get_option("widget_ticketID");
  if (!is_array( $options ))
{
$options = array(
      'title' => 'Jump to Ticket by ID'
      );
  }
 
  if ($_POST['ticketID-Submit'])
  {
    $options['title'] = htmlspecialchars($_POST['ticketID-WidgetTitle']);
    update_option("widget_ticketID", $options);
  }
 
?>
  <p>
    <label for="ticketID-WidgetTitle">Widget Title: </label>
    <input type="text" id="ticketID-WidgetTitle" name="ticketID-WidgetTitle" value="<?php echo $options['title'];?>" />
    <input type="hidden" id="ticketID-Submit" name="ticketID-Submit" value="1" />
  </p>
<?php
}
 
function ticketID_init() {
  register_sidebar_widget(__('Jump to Ticket by ID'), 'widget_ticketID');
  register_widget_control(   'Jump to Ticket by ID', 'ticketID_control');
  
}

add_action("plugins_loaded", "ticketID_init"); 
?>