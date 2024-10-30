<div id="wpbody">
    <div id="wpbody-content">
        <div class="wrap">
            
            <!-- Page Heading -->
            <h2><?php echo get_admin_page_title(); ?></h2>

            <?php
            	if (isset($_GET['settings-updated'])) {
            ?>
            		<!-- Update Success Message -->
            		<div class='updated' style='margin-top:10px;'>
                        <p><?php _e('Settings updated successfully', 'iris-color-picker-enhancer') ?></p>
                    </div>
            <?php
            	}
            ?>

            <!-- Left Content Area -->
            <div class="icpe-left-content">
            	<h3>
            		<?php _e('Color Settings', 'iris-color-picker-enhancer') ?>
            	</h3>

            	<div class="icpe-settings-body">
        		
        			<!-- Form for Color Palettes -->
	        		<form method="post" action="options.php">
	        			<?php

	        				settings_fields('icpe_color_group_settings');

	        				$icpe_color_palettes1 = get_option('icpe_color_palettes1');
	        				$icpe_color_palettes2 = get_option('icpe_color_palettes2');
	        				$icpe_color_palettes3 = get_option('icpe_color_palettes3');
	        				$icpe_color_palettes4 = get_option('icpe_color_palettes4');
	        				$icpe_color_palettes5 = get_option('icpe_color_palettes5');
	        				$icpe_color_palettes6 = get_option('icpe_color_palettes6');
	        				$icpe_color_palettes7 = get_option('icpe_color_palettes7');

	        				$icpe_color_alpha = get_option('icpe_color_alpha');


	    				?>

	    					<div class="description" style="float:right;  width:50%">
	    					<h2 class="desc_title"><?php _e('About this plugin', 'iris-color-picker-enhancer') ?></h2>
	    					<p> <?php _e('This is a simple plugin to customise the default color palette used by all instances of Iris Color Picker. Choose your default colors, and turn Alpha control on or off.', 'iris-color-picker-enhancer') ?> </p>
	    					</div>


		        		<table cellpadding="2" cellspacing="3" width="100%" style="float:left; width:50%">
			        		<tr>
			        			<td width="50%">
			        				<strong><?php _e('Color 1:', 'iris-color-picker-enhancer') ?></strong>
			        			</td>
			        			<td width="50%">
			        				<input type="text" name="icpe_color_palettes1" value="<?php echo $icpe_color_palettes1 ?>" style="width: 56%;" class="icpe-field">
			        				<span style="background-color: <?php echo $icpe_color_palettes1 ?>">&nbsp;</span>
			        			</td>
							</tr>
			        		<tr>
			        			<td width="12%">
			        				<strong><?php _e('Color 2:', 'iris-color-picker-enhancer') ?></strong>
			        			</td>
			        			<td width="33%">
			        				<input type="text" name="icpe_color_palettes2" value="<?php echo $icpe_color_palettes2 ?>" style="width: 56%;" class="icpe-field">
	        						<span style="background-color: <?php echo $icpe_color_palettes2 ?>">&nbsp;</span>
			        			</td>
			        		</tr>
			        		<tr>
			        			<td>
			        				<strong><?php _e('Color 3:', 'iris-color-picker-enhancer') ?></strong>
			        			</td>
			        			<td>
			        				<input type="text" name="icpe_color_palettes3" value="<?php echo $icpe_color_palettes3 ?>" style="width: 56%;" class="icpe-field">
	        						<span style="background-color: <?php echo $icpe_color_palettes3 ?>">&nbsp;</span>
			        			</td>
			        			<td>
			        			</tr>
	        				<tr>
	        				<td>
			        				<strong><?php _e('Color 4:', 'iris-color-picker-enhancer') ?></strong>
			        			</td>
			        			<td>
			        				<input type="text" name="icpe_color_palettes4" value="<?php echo $icpe_color_palettes4 ?>" style="width: 56%;" class="icpe-field">
	        						<span style="background-color: <?php echo $icpe_color_palettes4 ?>">&nbsp;</span>
			        			</td>
		        			</tr>
			        		<tr>
			        			<td>
			        				<strong><?php _e('Color 5:', 'iris-color-picker-enhancer') ?></strong>
			        			</td>
			        			<td>
			        				<input type="text" name="icpe_color_palettes5" value="<?php echo $icpe_color_palettes5 ?>" style="width: 56%;" class="icpe-field">
	        						<span style="background-color: <?php echo $icpe_color_palettes5 ?>">&nbsp;</span>
			        			</td>
			        			</tr>
			        		<tr>
			        			<td>
			        				<strong><?php _e('Color 6:', 'iris-color-picker-enhancer') ?></strong>
			        			</td>
			        			<td>
			        				<input type="text" name="icpe_color_palettes6" value="<?php echo $icpe_color_palettes6 ?>" style="width: 56%;" class="icpe-field">
	        						<span style="background-color: <?php echo $icpe_color_palettes6 ?>">&nbsp;</span>
			        			</td>
			        		</tr>
			        		<tr>
			        			<td>
			        				<strong><?php _e('Color 7:', 'iris-color-picker-enhancer') ?></strong>
			        			</td>
			        			<td>
			        				<input type="text" name="icpe_color_palettes7" value="<?php echo $icpe_color_palettes7 ?>" style="width: 56%;" class="icpe-field">
	        						<span style="background-color: <?php echo $icpe_color_palettes7 ?>">&nbsp;</span>
			        			</td>
			        			</tr>
			        		<tr>
			        			<td>
			        				<strong><?php _e('Alpha', 'iris-color-picker-enhancer') ?></strong>
		        				</td>
			        			<td>
			        				<input type="radio" name="icpe_color_alpha" value="1" <?php checked( $icpe_color_alpha, '1' ); ?>>
			        				On
			        				&nbsp;&nbsp;
			        				<input type="radio" name="icpe_color_alpha" value="0" <?php checked( $icpe_color_alpha, '0' ); ?> >
			        				Off
			        			</td>
			        		</tr>
			        		<tr>
			        			
			        			<td align="left">
			        				<input type="submit" name="icpe_color_submit" value="Save Colors">
			        			</td>
			        		</tr>
		        		</table>
	        		</form>

            	</div>
            </div>

            <!-- Plugin Right Sidebar -->
            <div class="icpe-sidebar">
				<table cellpadding="0" class="widefat donation" style="margin-bottom:10px; border:solid 2px #008001;" width="50%">
	                <thead>
	                    <th scope="col">
	                        <strong style="color:#008001;"><?php _e('Help Improve This Plugin!','iris-color-picker-enhancer') ?></strong>
	                    </th>
	                </thead>
	      			<tbody>
	                    <tr>
	                        <td style="border:0;">
	                            Enjoyed this plugin? All donations are used to improve and further develop this plugin. Thanks for your contribution.
	                        </td>
	                    </tr>
	                    <tr>
	          				<td style="border:0;">
	                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
	                            <input type="hidden" name="cmd" value="_s-xclick">
	                            <input type="hidden" name="hosted_button_id" value="A74K2K689DWTY">
	                            <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal — The safer, easier way to pay online.">
	                            <img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
	            			</form>
	                  		</td>
	                    </tr>
	                    <tr>
	          				<td style="border:0;"><?php _e('you can also help by','iris-color-picker-enhancer') ?>
	                            <a href="http://wordpress.org/support/view/plugin-reviews/iris-color-picker-enhancer" target="_blank">
	                                <?php _e('rating this plugin on wordpress.org','iris-color-picker-enhancer') ?>
	                            </a>
	                      	</td>
	                    </tr>
	                </tbody>
	            </table>
	                
	            <table cellpadding="0" class="widefat" border="0">
	                <thead>
	                    <th scope="col"><?php _e('Need Support?','iris-color-picker-enhancer') ?></th>
	                </thead>
	                <tbody>
	                    <tr>
	                        <td style="border:0;">
	                            <?php _e('Check out the','iris-color-picker-enhancer') ?>
	                            <a href="http://wordpress.org/plugins/iris-color-picker-enhancer/faq" target="_blank"><?php _e('FAQs','iris-color-picker-enhancer'); ?></a>
	                            <?php _e('and','iris-color-picker-enhancer') ?>
	                            <a href="http://wordpress.org/support/plugin/iris-color-picker-enhancer" target="_blank"><?php _e('Support Forums','iris-color-picker-enhancer') ?></a>
	                        </td>
	                    </tr>
	                </tbody>
	            </table>
            </div>

        </div>
    </div>
</div>