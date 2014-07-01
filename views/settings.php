<?php

/**
 * @todo Remove get_option() and settings_fields( 'my-settings-group' ); with do_settings_sections( 'my-plugin' );
 */

$a = New Admin;
$settings = $a->get_settings();
$style = get_option( 'ajax_login_register_default_style' );

?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e( 'AJAX Login &amp; Register Settings', 'ajax_login_register' );?></h2>
    <h3>Usage</h3>
    <?php _e('<p>To create a login page using shortcode; add the following shortcode <code>ajax_login</code> for the login page or <code>ajax_register</code> for the registration page to any Page or Post.</p>', 'ajax_login_register'); ?>
    <?php _e('<p>To create a login or registration dialog box do the following; create a menu item, assign a custom class name, then add that custom class name to the field: <em>Login Handle</em> for login or <em>Register Handle</em> for the registration page found in the settings below.</p>', 'ajax_login_register'); ?>
    <?php _e('<p><em>Note your theme must support custom menus</em></p>', 'ajax_login_register'); ?>
    <?php _e('<p><em>Note your site will need to be open to registration</em></p>', 'ajax_login_register'); ?>

    <form action="options.php" method="post" class="form newsletter-settings-form">

        <h3><?php _e( 'General Settings', 'ajax_login_register' ); ?></h3>
        <table class="form-table">
            <?php foreach( $settings['general'] as $setting ) : ?>
                <tr valign="top">
                    <th scope="row"><?php print $setting['label']; ?></th>
                    <td>
                        <input type="checkbox" name="<?php print $setting['key']; ?>" id="<?php print $setting['key']; ?>" <?php checked( get_option( $setting['key'], "off" ), "on" ); ?> />
                        <p class="description"><?php echo $setting['description']; ?></p>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h3><?php _e( 'Facebook Settings', 'ajax_login_register' ); ?></h3>
        <table class="form-table" id="facebook-settings">
        <?php _e('<p>In order to use Facebook login you will need to Create a Facebook App, by visiting <a href="https://developers.facebook.com/">Facebook Developers</a>. Once you have created your Facebook App you are now ready to enter your "site URL" as seen in Facebook Developer App Settings and your App ID.</p>', 'ajax_login_register' ); ?>
        <?php _e('<p>For detailed instructions visit the <a href="http://support.zanematthew.com/how-to/zm-ajax-login-register/adding-facebook-settings/" target="_blank">How To add Facebook Settings to AJAX Login &amp; Register</a>, feel free to contact us via our <a href="http://support.zanematthew.com/forum/zm-ajax-login-register/">Support Forum</a> if you need additional help.</p>', 'ajax_login_register' ); ?>

            <?php foreach( $settings['facebook'] as $setting ) : ?>
                <tr valign="top">
                    <th scope="row"><?php print $setting['label']; ?></th>
                    <td>
                        <?php echo $a->build_input( $setting['type'], $setting['key'] ); ?>
                        <p class="description"><?php echo $setting['description']; ?></p>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h3><?php _e( 'Advanced Usage', 'ajax_login_register' ); ?></h3>
        <table class="form-table">
            <?php foreach( $settings['advanced_usage'] as $setting ) : ?>
                <tr valign="top">
                    <th scope="row"><?php print $setting['label']; ?></th>
                        <td>
                        <?php if ( $setting['key'] == 'ajax_login_register_default_style' ) : ?>
                            <select name="ajax_login_register_default_style">
                                <?php foreach( array('default','wide') as $option ) : ?>
                                    <option value="<?php print $option; ?>" <?php selected( $style, $option ); ?>><?php print ucfirst( $option );?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php else : ?>
                            <?php echo $a->build_input( $setting['type'], $setting['key'] ); ?>
                            <p class="description"><?php echo $setting['description']; ?></p>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php settings_fields('ajax_login_register'); ?>
        <?php do_action('ajax_login_register_below_settings'); ?>

        <?php submit_button(); ?>
    </form>
</div>