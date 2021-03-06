<?php

/**
 	* Audio component utilizes core wordpress audio
 	*
 	* @since    1.0.0
*/
if (!function_exists('aesop_audio_shortcode')){

	function aesop_audio_shortcode($atts, $content = null) {

    	$defaults 	= array(
    		'src' 		=>	'',
    		'viewstart' => 'off'
    	);
	    $atts 		= apply_filters('aesop_video_defaults',shortcode_atts($defaults, $atts));
	    $hash 		= rand();

	    ob_start();

	    do_action('aesop_audio_before'); //action

	   		?><aside id="aesop-audio-<?php echo $hash;?>" class="aesop-component aesop-audio-component">

	   			<?php if ('on' == $atts['viewstart']) { ?>
			    	<script>
			    	jQuery(document).ready(function(){
						jQuery('#aesop-audio-<?php echo $hash;?>').waypoint({
							offset: 'bottom-in-view',
							handler: function(direction){
						   		jQuery('#aesop-audio-<?php echo $hash;?> .mejs-playpause-button button').trigger('click');

						   	}
						});
			    	});
			    	</script>
	   			<?php } ?>

	   			<?php
	   			do_action('aesop_audio_inside_top'); //action

	   				echo wp_audio_shortcode(  array( 'src' => $atts['src']) );

	   			do_action('aesop_audio_inside_bottom'); //action

	   		?></aside><?php

	   	do_action('aesop_audio_after'); //action

        return ob_get_clean();
	}
}