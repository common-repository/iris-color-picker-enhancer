<?php
/*
	Plugin Name: Iris Color Picker Enhancer
	Plugin Author: EnigmaWeb
	Plugin URI: http://wordpress.org/plugin/iris-color-picker-enhancer
	Author URI: http://enigmaplugins.com
	Description: Customise the default color palette used by Iris Color Picker
	Version: 1.1
	Requires at least: 2.7
	Text Domain: iris-color-picker-enhancer
	Domain Path: /languages
*/

// Define Plugin Version
define( 'ICPE_PLUGIN_VERSION', '1.0' );

// Desfine Plugin URI Path
define( 'ICPE_PLUGIN_URI', plugin_dir_url( __FILE__ ) );

// Plugin Menu
function icpe_plugin_menu() {
	add_submenu_page( 'options-general.php', __( "Iris Color Picker Enhancer", "iris-color-picker-enhancer" ), __( "Iris Color Picker Enhancer", "iris-color-picker-enhancer" ),
		'manage_options', 'iris-color-picker-enhancer', 'icpe_color_picker' );
}

add_action( 'admin_menu', 'icpe_plugin_menu' );

// Register Plugin Settings
function icpe_plugin_settings() {
	register_setting( 'icpe_color_group_settings', 'icpe_color_palettes1' );
	register_setting( 'icpe_color_group_settings', 'icpe_color_palettes2' );
	register_setting( 'icpe_color_group_settings', 'icpe_color_palettes3' );
	register_setting( 'icpe_color_group_settings', 'icpe_color_palettes4' );
	register_setting( 'icpe_color_group_settings', 'icpe_color_palettes5' );
	register_setting( 'icpe_color_group_settings', 'icpe_color_palettes6' );
	register_setting( 'icpe_color_group_settings', 'icpe_color_palettes7' );

	register_setting( 'icpe_color_group_settings', 'icpe_color_alpha' );
}

add_action( 'admin_init', 'icpe_plugin_settings' );

function icpe_plugin_hooks() {
	add_option( 'icpe_color_palettes1', '#FF0000', '', 'yes' );
	add_option( 'icpe_color_palettes2', '#FFA500', '', 'yes' );
	add_option( 'icpe_color_palettes3', '#FFFF00', '', 'yes' );
	add_option( 'icpe_color_palettes4', '#00FF00', '', 'yes' );
	add_option( 'icpe_color_palettes5', '#0000FF', '', 'yes' );
	add_option( 'icpe_color_palettes6', '#4b0082', '', 'yes' );
	add_option( 'icpe_color_palettes7', '#8A2BE2', '', 'yes' );

	add_option( 'icpe_color_alpha', '0', '', 'yes' );
}

register_activation_hook( __FILE__, 'icpe_plugin_hooks' );

// Color Settings Form
function icpe_color_picker() {
	require "includes/icpe-settings.php";
}

// Enqueue Color Picker
add_action( 'admin_enqueue_scripts', 'icpe_pallete_script' );
function icpe_pallete_script() {
	wp_enqueue_script( 'wp-color-picker' );

	wp_enqueue_script( 'wp-color-picker-alpha', ICPE_PLUGIN_URI . 'assets/js/wp-color-picker-alpha.min.js', array(
		'jquery',
		'wp-color-picker'
	), null, true );

	wp_enqueue_style( 'alpha-color-picker', ICPE_PLUGIN_URI . 'assets/css/alpha-color-picker.css', array( 'wp-color-picker' ), true );
}

// Color Palettes
add_action( 'admin_footer', 'uphill_scripts' );
add_action( 'customize_controls_print_footer_scripts', 'uphill_scripts' );
function uphill_scripts() {

	$icpe_color_palettes1 = get_option( 'icpe_color_palettes1' );
	$icpe_color_palettes2 = get_option( 'icpe_color_palettes2' );
	$icpe_color_palettes3 = get_option( 'icpe_color_palettes3' );
	$icpe_color_palettes4 = get_option( 'icpe_color_palettes4' );
	$icpe_color_palettes5 = get_option( 'icpe_color_palettes5' );
	$icpe_color_palettes6 = get_option( 'icpe_color_palettes6' );

	$icpe_color_alpha = get_option( 'icpe_color_alpha' );

	if ( wp_script_is( 'wp-color-picker', 'enqueued' ) ) {
		?>
        <script type="text/javascript">
            jQuery(document).ready(function () {

                jQuery.wp.wpColorPicker.prototype.options = {
                    palettes: [
                        '<?php echo $icpe_color_palettes1 ?>',
                        '<?php echo $icpe_color_palettes2 ?>',
                        '<?php echo $icpe_color_palettes3 ?>',
                        '<?php echo $icpe_color_palettes4 ?>',
                        '<?php echo $icpe_color_palettes5 ?>',
                        '<?php echo $icpe_color_palettes6 ?>'
                    ]
                };

				<?php
				if($icpe_color_alpha == 1) {
				?>
                jQuery('input').data('alpha', 'true');
				<?php
				}
				?>
            });
        </script>
		<?php
	}
}

// Modify Plugin Activation Message
add_action( 'admin_notices', 'plugin_activated' );

function plugin_activated() {

	if ( 1 != get_option( 'icp_active' ) ) {

		$path_link = get_admin_url();

		$new = "<div class='updated notice is-dismissible'><p>Plugin activated. <a href='" . $path_link . "options-general.php?page=iris-color-picker-enhancer'>Go to Iris Color Picker Enhancer Settings.</a></p></div>";

		echo $new;

		add_option( 'icp_active', 1 );

	}
}


// Add "Settings" link to Plugins Dashboard

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'iris_color_picker_enhancer_plugin_action_links' );

function iris_color_picker_enhancer_plugin_action_links( $links ) {
	$iris_color_picker_enhancer_settings_link = sprintf( '<a href="%s">%s</a>', admin_url( 'options-general.php?page=iris-color-picker-enhancer' ), __( 'Settings' ) );
	array_unshift( $links, $iris_color_picker_enhancer_settings_link );

	return $links;
}

// Admin Styling
add_action( 'admin_head', 'icpe_admin_styling' );
add_action( 'admin_head', 'icpe_color_picker_settings' );


function icpe_color_picker_settings() {
	?>
    <script>
        jQuery(document).ready(function () {

            jQuery('.icpe-field').iris({
                width: 150
            });
            jQuery(document).click(function (e) {
                if (!jQuery(e.target).is(".icpe-field, .iris-picker, .iris-picker-inner")) {
                    jQuery('.icpe-field').iris('hide');
                }
            });
            jQuery('.icpe-field').click(function (event) {
                jQuery('.icpe-field').iris('hide');
                jQuery(this).iris('show');
                return false;
            });


        });

    </script>
	<?php
}


function icpe_admin_styling() {


	?>
    <style type="text/css">
        .icpe-left-content {
            float: left;
            width: 68%;
            height: auto;
            margin-top: 30px;
            border: 1px solid #dfdfdf;
        }

        .icpe-left-content h3 {
            background-color: #F1F1F1;
            background-image: -moz-linear-gradient(center top, #F9F9F9, #ECECEC);
            border-color: #DFDFDF;
            border-style: solid;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            border-width: 1px;
            box-shadow: 0 1px 0 #FFFFFF inset;
            color: #464646;
            cursor: pointer;
            font-size: 13px;
            text-shadow: 0 1px 0 #FFFFFF;
            font-family: Arial;
            font-size: 17px;
            font-weight: normal;
            margin: 0;
            overflow: hidden;
            padding: 14px 10px;
            white-space: nowrap;
            cursor: default;
            font-weight: bold;
        }

        .icpe-left-content .icpe-settings-body {
            padding: 10px;
            background-color: #FFFFFF;
            overflow: hidden;
        }

        .icpe-left-content input[type="submit"] {
            background: none repeat scroll 0 0 #2EA2CC;
            border: 1px solid #0074A2;
            box-shadow: 0 1px 0 rgba(120, 200, 230, 0.5) inset, 0 1px 0 rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0 1px 0 rgba(120, 200, 230, 0.5) inset, 0 1px 0 rgba(0, 0, 0, 0.15);
            -web-box-shadow: 0 1px 0 rgba(120, 200, 230, 0.5) inset, 0 1px 0 rgba(0, 0, 0, 0.15);
            -o-box-shadow: 0 1px 0 rgba(120, 200, 230, 0.5) inset, 0 1px 0 rgba(0, 0, 0, 0.15);
            -msie-box-shadow: 0 1px 0 rgba(120, 200, 230, 0.5) inset, 0 1px 0 rgba(0, 0, 0, 0.15);
            color: #FFFFFF;
            text-decoration: none;
            color: #FFF;
            font-weight: bold;
            padding: 6px 10px;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -web-border-radius: 5px;
            -o-border-radius: 5px;
            -msie-border-radius: 5px;
            font-family: Arial;
            font-size: 13px;
            cursor: pointer;
            margin-top: 20px;
            margin-right: 18px;
        }

        .icpe-left-content input[type="submit"]:hover {
            background: none repeat scroll 0 0 #1e73be;
            border: 1px solid #0074A2;
            box-shadow: 0 1px 0 rgba(120, 200, 230, 0.5) inset, 0 1px 0 rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0 1px 0 rgba(120, 200, 230, 0.5) inset, 0 1px 0 rgba(0, 0, 0, 0.15);
            -web-box-shadow: 0 1px 0 rgba(120, 200, 230, 0.5) inset, 0 1px 0 rgba(0, 0, 0, 0.15);
            -o-box-shadow: 0 1px 0 rgba(120, 200, 230, 0.5) inset, 0 1px 0 rgba(0, 0, 0, 0.15);
            -msie-box-shadow: 0 1px 0 rgba(120, 200, 230, 0.5) inset, 0 1px 0 rgba(0, 0, 0, 0.15);
            color: #FFFFFF;
            text-decoration: none;
            color: #FFF;
            font-weight: bold;
            padding: 6px 10px;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -web-border-radius: 5px;
            -o-border-radius: 5px;
            -msie-border-radius: 5px;
            font-family: Arial;
            font-size: 13px;
            cursor: pointer;
            margin-top: 20px;
            margin-right: 18px;
        }

        .icpe-settings-body span {
            display: inline-block;
            width: 18%;
            margin-left: 8px;
            padding: 4px 0;
        }

        .icpe-sidebar {
            float: right;
            width: 28%;
            height: auto;
            margin-top: 30px;
        }

        .desc_title {
            margin: 0.6em 0 1em !important;
        }

        .iris-picker {
            position: absolute !important;
        }
    </style>
	<?php
}


/**
 * Deactivation Hook
 */
register_deactivation_hook( plugin_basename( __FILE__ ), 'icp_deactivate' );
function icp_deactivate() {
	delete_option( 'icp_active' );
}

