<?php
/**
 * zerif Theme Customizer
 *
 * @package zerif
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zerif_customize_register( $wp_customize ) {
	class Zerif_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}
	class Zerif_Customizer_Number_Control extends WP_Customize_Control {
		public $type = 'number';
		public function render_content() {
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />
			</label>
		<?php
		}
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('background_image');


	/***********************************************/
	/************** GENERAL OPTIONS  ***************/
	/***********************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_general', array(
			'priority' => 30,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'General options', 'zerif-lite' )
		) );

		$wp_customize->add_section( 'zerif_general_section' , array(
				'title'       => __( 'General', 'zerif-lite' ),
				'priority'    => 30,
				'panel' => 'panel_general'
		));
		/* LOGO	*/
		$wp_customize->add_setting( 'zerif_logo', array('sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
				'label'    => __( 'Logo', 'zerif-lite' ),
				'section'  => 'title_tagline',
				'settings' => 'zerif_logo',
				'priority'    => 1,
		)));

		/* Disable preloader */
		$wp_customize->add_setting( 'zerif_disable_preloader', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
				'zerif_disable_preloader',
				array(
					'type' => 'checkbox',
					'label' => __('Disable preloader?','zerif-lite'),
					'section' => 'zerif_general_section',
					'priority'    => 2,
				)
		);

		/* Disable smooth scroll */
		$wp_customize->add_setting( 'zerif_disable_smooth_scroll', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
				'zerif_disable_smooth_scroll',
				array(
					'type' 		=> 'checkbox',
					'label' 	=> __('Disable smooth scroll?','zerif-lite'),
					'section' 	=> 'zerif_general_section',
					'priority'	=> 3,
				)
		);

		/* Enable accessibility */
		$wp_customize->add_setting( 'zerif_accessibility', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
				'zerif_accessibility',
				array(
					'type' 		=> 'checkbox',
					'label' 	=> __('Enable accessibility?','zerif-lite'),
					'section' 	=> 'zerif_general_section',
					'priority'	=> 3,
				)
		);

		/* COPYRIGHT */
		$wp_customize->add_setting( 'zerif_copyright', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_copyright', array(
				'label'    => __( 'Copyright', 'zerif-lite' ),
				'section'  => 'zerif_general_section',
				'settings' => 'zerif_copyright',
				'priority'    => 3,
		));

		$wp_customize->add_section( 'zerif_general_socials_section' , array(
				'title'       => __( 'Socials', 'zerif-lite' ),
				'priority'    => 31,
				'panel' => 'panel_general'
		));

		/* facebook */
		$wp_customize->add_setting( 'zerif_socials_facebook', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_facebook', array(
				'label'    => __( 'Facebook link', 'zerif-lite' ),
				'section'  => 'zerif_general_socials_section',
				'settings' => 'zerif_socials_facebook',
				'priority'    => 4,
		));
		/* twitter */
		$wp_customize->add_setting( 'zerif_socials_twitter', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_twitter', array(
				'label'    => __( 'Twitter link', 'zerif-lite' ),
				'section'  => 'zerif_general_socials_section',
				'settings' => 'zerif_socials_twitter',
				'priority'    => 5,
		));
		/* linkedin */
		$wp_customize->add_setting( 'zerif_socials_linkedin', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_linkedin', array(
				'label'    => __( 'Linkedin link', 'zerif-lite' ),
				'section'  => 'zerif_general_socials_section',
				'settings' => 'zerif_socials_linkedin',
				'priority'    => 6,
		));
		/* behance */
		$wp_customize->add_setting( 'zerif_socials_behance', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_behance', array(
				'label'    => __( 'Behance link', 'zerif-lite' ),
				'section'  => 'zerif_general_socials_section',
				'settings' => 'zerif_socials_behance',
				'priority'    => 7,
		));
		/* dribbble */
		$wp_customize->add_setting( 'zerif_socials_dribbble', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_dribbble', array(
				'label'    => __( 'Dribbble link', 'zerif-lite' ),
				'section'  => 'zerif_general_socials_section',
				'settings' => 'zerif_socials_dribbble',
				'priority'    => 8,
		));
		/* facebook */
		$wp_customize->add_setting( 'zerif_socials_youtube', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_youtube', array(
				'label'    => __( 'Youtube link', 'zerif-lite' ),
				'section'  => 'zerif_general_socials_section',
				'settings' => 'zerif_socials_youtube',
				'priority'    => 4,
		));

		$wp_customize->add_section( 'zerif_general_footer_section' , array(
				'title'       => __( 'Footer', 'zerif-lite' ),
				'priority'    => 32,
				'panel' => 'panel_general'
		));

		/* email - ICON */
		$wp_customize->add_setting( 'zerif_email_icon', array('sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/images/envelope4-green.png'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_email_icon', array(
					'label'    => __( 'Email section - icon', 'zerif-lite' ),
					'section'  => 'zerif_general_footer_section',
					'settings' => 'zerif_email_icon',
					'priority'    => 9,
		)));

		/* email */
		$wp_customize->add_setting( 'zerif_email', array( 'sanitize_callback' => 'zerif_sanitize_text','default' => '<a href="mailto:contact@site.com">contact@site.com</a>') );
		$wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_email', array(
				'label'   => __( 'Email', 'zerif-lite' ),
				'section' => 'zerif_general_footer_section',
				'settings'   => 'zerif_email',
				'priority' => 10
		)) );

		/* phone number - ICON */
		$wp_customize->add_setting( 'zerif_phone_icon', array('sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/images/telephone65-blue.png'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_phone_icon', array(
					'label'    => __( 'Phone number section - icon', 'zerif-lite' ),
					'section'  => 'zerif_general_footer_section',
					'settings' => 'zerif_phone_icon',
					'priority'    => 11,
		)));
		/* phone number */

		$wp_customize->add_setting( 'zerif_phone', array('sanitize_callback' => 'zerif_sanitize_number','default' => '<a href="tel:0 332 548 954">0 332 548 954</a>') );
		$wp_customize->add_control(new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_phone', array(
				'label'   => __( 'Phone number', 'zerif-lite' ),
				'section' => 'zerif_general_footer_section',
				'settings'   => 'zerif_phone',
				'priority' => 12
		)) );

		/* address - ICON */
		$wp_customize->add_setting( 'zerif_address_icon', array('sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/images/map25-redish.png'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_address_icon', array(
					'label'    => __( 'Address section - icon', 'zerif-lite' ),
					'section'  => 'zerif_general_footer_section',
					'settings' => 'zerif_address_icon',
					'priority'    => 13,
		)));
		/* address */

		$wp_customize->add_setting( 'zerif_address', array( 'sanitize_callback' => 'zerif_sanitize_text', 'default' => __('Company address','zerif-lite') ) );
		$wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_address', array(
				'label'   => __( 'Address', 'zerif-lite' ),
				'section' => 'zerif_general_footer_section',
				'settings'   => 'zerif_address',
				'priority' => 14
		)) ) ;

	else: /* Old versions of WordPress */

		$wp_customize->add_section( 'zerif_general_section' , array(
				'title'       => __( 'General options', 'zerif-lite' ),
				'priority'    => 30,
				'description' => __('Zerif theme general options','zerif-lite'),
		));
		/* LOGO	*/
		$wp_customize->add_setting( 'zerif_logo', array('sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
				'label'    => __( 'Logo', 'zerif-lite' ),
				'section'  => 'zerif_general_section',
				'settings' => 'zerif_logo',
				'priority'    => 1,
		)));

		/* Disable preloader */
		$wp_customize->add_setting( 'zerif_disable_preloader', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
				'zerif_disable_preloader',
				array(
					'type' => 'checkbox',
					'label' => __('Disable preloader?','zerif-lite'),
					'section' => 'zerif_general_section',
					'priority'    => 2,
				)
		);

		/* Disable smooth scroll */
		$wp_customize->add_setting( 'zerif_disable_smooth_scroll', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
				'zerif_disable_smooth_scroll',
				array(
					'type' 		=> 'checkbox',
					'label' 	=> __('Disable smooth scroll?','zerif-lite'),
					'section' 	=> 'zerif_general_section',
					'priority'	=> 3,
				)
		);

		/* Enable accessibility */
		$wp_customize->add_setting( 'zerif_accessibility', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
				'zerif_accessibility',
				array(
					'type' 		=> 'checkbox',
					'label' 	=> __('Enable accessibility?','zerif-lite'),
					'section' 	=> 'zerif_general_section',
					'priority'	=> 3,
				)
		);

		/* COPYRIGHT */
		$wp_customize->add_setting( 'zerif_copyright', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_copyright', array(
				'label'    => __( 'Copyright', 'zerif-lite' ),
				'section'  => 'zerif_general_section',
				'settings' => 'zerif_copyright',
				'priority'    => 3,
		));
		/* facebook */
		$wp_customize->add_setting( 'zerif_socials_facebook', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_facebook', array(
				'label'    => __( 'Facebook link', 'zerif-lite' ),
				'section'  => 'zerif_general_section',
				'settings' => 'zerif_socials_facebook',
				'priority'    => 4,
		));
		/* twitter */
		$wp_customize->add_setting( 'zerif_socials_twitter', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_twitter', array(
				'label'    => __( 'Twitter link', 'zerif-lite' ),
				'section'  => 'zerif_general_section',
				'settings' => 'zerif_socials_twitter',
				'priority'    => 5,
		));
		/* linkedin */
		$wp_customize->add_setting( 'zerif_socials_linkedin', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_linkedin', array(
				'label'    => __( 'Linkedin link', 'zerif-lite' ),
				'section'  => 'zerif_general_section',
				'settings' => 'zerif_socials_linkedin',
				'priority'    => 6,
		));
		/* behance */
		$wp_customize->add_setting( 'zerif_socials_behance', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_behance', array(
				'label'    => __( 'Behance link', 'zerif-lite' ),
				'section'  => 'zerif_general_section',
				'settings' => 'zerif_socials_behance',
				'priority'    => 7,
		));
		/* dribbble */
		$wp_customize->add_setting( 'zerif_socials_dribbble', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_dribbble', array(
				'label'    => __( 'Dribbble link', 'zerif-lite' ),
				'section'  => 'zerif_general_section',
				'settings' => 'zerif_socials_dribbble',
				'priority'    => 8,
		));
		/* youtube */
		$wp_customize->add_setting( 'zerif_socials_youtube', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_youtube', array(
				'label'    => __( 'Youtube link', 'zerif-lite' ),
				'section'  => 'zerif_general_section',
				'settings' => 'zerif_socials_youtube',
				'priority'    => 4,
		));
		/* email - ICON */
		$wp_customize->add_setting( 'zerif_email_icon', array('sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/images/envelope4-green.png'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_email_icon', array(
					'label'    => __( 'Email section - icon', 'zerif-lite' ),
					'section'  => 'zerif_general_section',
					'settings' => 'zerif_email_icon',
					'priority'    => 9,
		)));

		/* email */
		$wp_customize->add_setting( 'zerif_email', array( 'sanitize_callback' => 'zerif_sanitize_text','default' => __('support@codeinwp.com','zerif-lite')) );
		$wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_email', array(
				'label'   => __( 'Email', 'zerif-lite' ),
				'section' => 'zerif_general_section',
				'settings'   => 'zerif_email',
				'priority' => 10
		)) );

		/* phone number - ICON */
		$wp_customize->add_setting( 'zerif_phone_icon', array('sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/images/telephone65-blue.png'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_phone_icon', array(
					'label'    => __( 'Phone number section - icon', 'zerif-lite' ),
					'section'  => 'zerif_general_section',
					'settings' => 'zerif_phone_icon',
					'priority'    => 11,
		)));
		/* phone number */

		$wp_customize->add_setting( 'zerif_phone', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Phone number','zerif-lite')) );
		$wp_customize->add_control(new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_phone', array(
				'label'   => __( 'Phone number', 'zerif-lite' ),
				'section' => 'zerif_general_section',
				'settings'   => 'zerif_phone',
				'priority' => 12
		)) );

		/* address - ICON */
		$wp_customize->add_setting( 'zerif_address_icon', array('sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/images/map25-redish.png'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_address_icon', array(
					'label'    => __( 'Address section - icon', 'zerif-lite' ),
					'section'  => 'zerif_general_section',
					'settings' => 'zerif_address_icon',
					'priority'    => 13,
		)));
		/* address */

		$wp_customize->add_setting( 'zerif_address', array( 'sanitize_callback' => 'zerif_sanitize_text', 'default' => __('24B, Fainari Street, Bucharest, Romania','zerif-lite') ) );
		$wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_address', array(
				'label'   => __( 'Address', 'zerif-lite' ),
				'section' => 'zerif_general_section',
				'settings'   => 'zerif_address',
				'priority' => 14
		)) ) ;

	endif;

	/********************************************************************/
	/*************  FORMULA STUDENT FOCUS SECTION **********************************/
	/********************************************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):
		$wp_customize->add_panel( 'panel_ourfocus', array(
			'priority' => 32,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Formula Student focus section', 'zerif-lite' )
		) );
		$wp_customize->add_section( 'zerif_ourfocus_section' , array(
				'title'       => __( 'Content', 'zerif-lite' ),
				'priority'    => 1,
				'panel'       => 'panel_ourfocus'
		));
		/* show/hide */
		$wp_customize->add_setting( 'zerif_ourfocus_show', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_ourfocus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide Formula Student focus section?','zerif-lite'),
				'section' => 'zerif_ourfocus_section',
				'priority'    => 1,
			)
		);
		/* focus title */
		$wp_customize->add_setting( 'zerif_ourfocus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('FORMULA STUDENT','zerif-lite')));

			$wp_customize->add_control( 'zerif_ourfocus_title', array(
					'label'    => __( 'Title', 'zerif-lite' ),
					'section'  => 'zerif_ourfocus_section',
					'settings' => 'zerif_ourfocus_title',
					'priority'    => 2,
		));
		/* focus subtitle */
		$wp_customize->add_setting( 'zerif_ourfocus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('A project that worth it','zerif-lite')));
		$wp_customize->add_control( 'zerif_ourfocus_subtitle', array(
				'label'    => __( 'Our focus subtitle', 'zerif-lite' ),
				'section'  => 'zerif_ourfocus_section',
				'settings' => 'zerif_ourfocus_subtitle',
				'priority'    => 3,
		));

	else:

		$wp_customize->add_section( 'zerif_ourfocus_section' , array(
				'title'       => __( 'Formula Student focus section', 'zerif-lite' ),
				'priority'    => 32,

				'description' => __( 'The main content of this section is customizable in: Customize -> Widgets -> Formula Student focus section. There you must add the "Zerif - Formula Student focus widget"', 'zerif-lite' )
		));
		/* show/hide */
		$wp_customize->add_setting( 'zerif_ourfocus_show', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_ourfocus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide our focus section?','zerif-lite'),
				'section' => 'zerif_ourfocus_section',
				'priority'    => 1,
			)
		);
		/* focus title */
		$wp_customize->add_setting( 'zerif_ourfocus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('FORMULA STUDENT','zerif-lite')));

			$wp_customize->add_control( 'zerif_ourfocus_title', array(
					'label'    => __( 'Title', 'zerif-lite' ),
					'section'  => 'zerif_ourfocus_section',
					'settings' => 'zerif_ourfocus_title',
					'priority'    => 2,
		));
		/* focus subtitle */
		$wp_customize->add_setting( 'zerif_ourfocus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('A project that worth it.','zerif-lite')));
		$wp_customize->add_control( 'zerif_ourfocus_subtitle', array(
				'label'    => __( 'Our focus subtitle', 'zerif-lite' ),
				'section'  => 'zerif_ourfocus_section',
				'settings' => 'zerif_ourfocus_subtitle',
				'priority'    => 3,
		));
	endif;

	/************************************/
	/******* ABOUT US SECTION ***********/
	/************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_about', array(
			'priority' => 34,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Competitions section', 'zerif-lite' )
		) );

		$wp_customize->add_section( 'zerif_aboutus_main_section' , array(
				'title'       => __( 'Main content', 'zerif-lite' ),
				'priority'    => 2,
				'panel' => 'panel_about'
		));
		/* show/hide */
		$wp_customize->add_setting( 'zerif_aboutus_show', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_aboutus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide about us section?','zerif-lite'),
				'section' => 'zerif_aboutus_settings_section',
				'priority'    => 1,
			)
		);
		/* title */
		$wp_customize->add_setting( 'zerif_aboutus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('About','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_title', array(
					'label'    => __( 'Title', 'zerif-lite' ),
					'section'  => 'zerif_aboutus_main_section',
					'settings' => 'zerif_aboutus_title',
					'priority'    => 2,
		));
		/* subtitle */
		$wp_customize->add_setting( 'zerif_aboutus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Use this section to showcase important details about your business.','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_main_section',
				'settings' => 'zerif_aboutus_subtitle',
				'priority'    => 3,
		));
		/* big left title */
		$wp_customize->add_setting( 'zerif_aboutus_biglefttitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Everything you see here is responsive and mobile-friendly.','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_biglefttitle', array(
				'label'    => __( 'Big left side title', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_main_section',
				'settings' => 'zerif_aboutus_biglefttitle',
				'priority'    => 4,
		));
		/* text */
		$wp_customize->add_setting( 'zerif_aboutus_text', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_text', array(
				'label'    => __( 'Text', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_main_section',
				'settings' => 'zerif_aboutus_text',
				'priority'    => 5,
		));

		$wp_customize->add_section( 'zerif_aboutus_feat1_section' , array(
				'title'       => __( 'Test no#1', 'zerif-lite' ),
				'priority'    => 3,
				'panel' => 'panel_about'
		));

		/* test no#1 */
		$wp_customize->add_setting( 'zerif_aboutus_feature1_title', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => __('YOUR SKILL #1','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_feature1_title', array(
				'label'    => __( 'Test no1 title', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_feat1_section',
				'settings' => 'zerif_aboutus_feature1_title',
				'priority'    => 6,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature1_text', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_aboutus_feature1_text', array(
				'label'    => __( 'Test no1 text', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_feat1_section',
				'settings' => 'zerif_aboutus_feature1_text',
				'priority'    => 7,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature1_nr', array('sanitize_callback' => 'zerif_sanitize_number', 'default' => '80'));
		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature1_nr',
				array(
					'type' => 'number',
					'label' => __( 'Test no1 percentage', 'zerif-lite' ),
					'section' => 'zerif_aboutus_feat1_section',
					'settings' => 'zerif_aboutus_feature1_nr',
					'priority'    => 8
				)
			)
		);

		$wp_customize->add_section( 'zerif_aboutus_feat2_section' , array(
				'title'       => __( 'Test no#2', 'zerif-lite' ),
				'priority'    => 4,
				'panel' => 'panel_about'
		));

		/* Test no#2 */
		$wp_customize->add_setting( 'zerif_aboutus_feature2_title', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => __('YOUR SKILL #2','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_feature2_title', array(
				'label'    => __( 'Test no2 title', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_feat2_section',
				'settings' => 'zerif_aboutus_feature2_title',
				'priority'    => 9,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature2_text', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_aboutus_feature2_text', array(
				'label'    => __( 'Test no2 text', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_feat2_section',
				'settings' => 'zerif_aboutus_feature2_text',
				'priority'    => 10,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature2_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '91'));
		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature2_nr',
				array(
					'type' => 'number',
					'label' => __( 'Test no2 percentage', 'zerif-lite' ),
					'section' => 'zerif_aboutus_feat2_section',
					'settings' => 'zerif_aboutus_feature2_nr',
					'priority'    => 11
				)
			)
		);

		$wp_customize->add_section( 'zerif_aboutus_feat3_section' , array(
				'title'       => __( 'Test no#3', 'zerif-lite' ),
				'priority'    => 5,
				'panel' => 'panel_about'
		));

		/* Test no#3 */
		$wp_customize->add_setting( 'zerif_aboutus_feature3_title', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => __('YOUR SKILL #3','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_feature3_title', array(
				'label'    => __( 'Test no3 title', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_feat3_section',
				'settings' => 'zerif_aboutus_feature3_title',
				'priority'    => 12,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature3_text', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_aboutus_feature3_text', array(
				'label'    => __( 'Test no3 text', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_feat3_section',
				'settings' => 'zerif_aboutus_feature3_text',
				'priority'    => 13,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature3_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '88'));
		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature3_nr',
				array(
					'type' => 'number',
					'label' => __( 'Test no3 percentage', 'zerif-lite' ),
					'section' => 'zerif_aboutus_feat3_section',
					'settings' => 'zerif_aboutus_feature3_nr',
					'priority'    => 14
				)
			)
		);

		$wp_customize->add_section( 'zerif_aboutus_feat4_section' , array(
				'title'       => __( 'Test no#4', 'zerif-lite' ),
				'priority'    => 6,
				'panel' => 'panel_about'
		));

		/* Test no#4 */
		$wp_customize->add_setting( 'zerif_aboutus_feature4_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('YOUR SKILL #4','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_feature4_title', array(
				'label'    => __( 'Test no4 title', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_feat4_section',
				'settings' => 'zerif_aboutus_feature4_title',
				'priority'    => 15,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature4_text', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_aboutus_feature4_text', array(
				'label'    => __( 'Test no4 text', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_feat4_section',
				'settings' => 'zerif_aboutus_feature4_text',
				'priority'    => 16,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature4_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '95'));
		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature4_nr',
				array(
					'type' => 'number',
					'label' => __( 'Test no4 percentage', 'zerif-lite' ),
					'section' => 'zerif_aboutus_feat4_section',
					'settings' => 'zerif_aboutus_feature4_nr',
					'priority'    => 17
				)
			)
		);

	else:	/* Old versions of WordPress */
		$wp_customize->add_section( 'zerif_aboutus_section' , array(
				'title'       => __( 'Competitions section', 'zerif-lite' ),
				'priority'    => 34
		));
		/* show/hide */
		$wp_customize->add_setting( 'zerif_aboutus_show', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_aboutus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide about us section?','zerif-lite'),
				'section' => 'zerif_aboutus_section',
				'priority'    => 1,
			)
		);
		/* title */
		$wp_customize->add_setting( 'zerif_aboutus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('About','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_title', array(
					'label'    => __( 'Title', 'zerif-lite' ),
					'section'  => 'zerif_aboutus_section',
					'settings' => 'zerif_aboutus_title',
					'priority'    => 2,
		));
		/* subtitle */
		$wp_customize->add_setting( 'zerif_aboutus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Use this section to showcase important details about your business.','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_subtitle',
				'priority'    => 3,
		));
		/* big left title */
		$wp_customize->add_setting( 'zerif_aboutus_biglefttitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Everything you see here is responsive and mobile-friendly.','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_biglefttitle', array(
				'label'    => __( 'Big left side title', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_biglefttitle',
				'priority'    => 4,
		));
		/* text */
		$wp_customize->add_setting( 'zerif_aboutus_text', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_text', array(
				'label'    => __( 'Text', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_text',
				'priority'    => 5,
		));
		/* Test no#1 */
		$wp_customize->add_setting( 'zerif_aboutus_feature1_title', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => __('YOUR SKILL #1','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_feature1_title', array(
				'label'    => __( 'Test no1 title', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature1_title',
				'priority'    => 6,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature1_text', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_aboutus_feature1_text', array(
				'label'    => __( 'Test no1 text', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature1_text',
				'priority'    => 7,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature1_nr', array('sanitize_callback' => 'zerif_sanitize_number', 'default' => '80'));
		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature1_nr',
				array(
					'type' => 'number',
					'label' => __( 'Test no1 percentage', 'zerif-lite' ),
					'section' => 'zerif_aboutus_section',
					'settings' => 'zerif_aboutus_feature1_nr',
					'priority'    => 8
				)
			)
		);
		/* Test no#2 */
		$wp_customize->add_setting( 'zerif_aboutus_feature2_title', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => __('YOUR SKILL #2','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_feature2_title', array(
				'label'    => __( 'Test no2 title', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature2_title',
				'priority'    => 9,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature2_text', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_aboutus_feature2_text', array(
				'label'    => __( 'Test no2 text', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature2_text',
				'priority'    => 10,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature2_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '91'));
		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature2_nr',
				array(
					'type' => 'number',
					'label' => __( 'Test no2 percentage', 'zerif-lite' ),
					'section' => 'zerif_aboutus_section',
					'settings' => 'zerif_aboutus_feature2_nr',
					'priority'    => 11
				)
			)
		);
		/* Test no#3 */
		$wp_customize->add_setting( 'zerif_aboutus_feature3_title', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => __('YOUR SKILL #3','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_feature3_title', array(
				'label'    => __( 'Test no3 title', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature3_title',
				'priority'    => 12,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature3_text', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_aboutus_feature3_text', array(
				'label'    => __( 'Test no3 text', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature3_text',
				'priority'    => 13,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature3_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '88'));
		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature3_nr',
				array(
					'type' => 'number',
					'label' => __( 'Test no3 percentage', 'zerif-lite' ),
					'section' => 'zerif_aboutus_section',
					'settings' => 'zerif_aboutus_feature3_nr',
					'priority'    => 14
				)
			)
		);
		/* Test no#4 */
		$wp_customize->add_setting( 'zerif_aboutus_feature4_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('YOUR SKILL #4','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_feature4_title', array(
				'label'    => __( 'Test no4 title', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature4_title',
				'priority'    => 15,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature4_text', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_aboutus_feature4_text', array(
				'label'    => __( 'Test no4 text', 'zerif-lite' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature4_text',
				'priority'    => 16,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature4_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '95'));
		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature4_nr',
				array(
					'type' => 'number',
					'label' => __( 'Test no4 percentage', 'zerif-lite' ),
					'section' => 'zerif_aboutus_section',
					'settings' => 'zerif_aboutus_feature4_nr',
					'priority'    => 17
				)
			)
		);
	endif;
	/******************************************/
    /********** TEAM SECTION **************/
	/******************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_ourteam', array(
			'priority' => 35,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Team section', 'zerif-lite' )
		) );

		$wp_customize->add_section( 'zerif_ourteam_section' , array(
				'title'       => __( 'Content', 'zerif-lite' ),
				'priority'    => 1,
				'panel'       => 'panel_ourteam'
		));
		/* team show/hide */
		$wp_customize->add_setting( 'zerif_ourteam_show', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_ourteam_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide our team section?','zerif-lite'),
				'section' => 'zerif_ourteam_section',
				'priority'    => 1,
			)
		);
		/* team title */
		$wp_customize->add_setting( 'zerif_ourteam_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('TEAM','zerif-lite')));
		$wp_customize->add_control( 'zerif_ourteam_title', array(
					'label'    => __( 'Title', 'zerif-lite' ),
					'section'  => 'zerif_ourteam_section',
					'settings' => 'zerif_ourteam_title',
					'priority'    => 2,
		));
		/* team subtitle */
		$wp_customize->add_setting( 'zerif_ourteam_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Prove that you have real people working for you, with some nice looking profile pictures and links to social media.','zerif-lite')));
		$wp_customize->add_control( 'zerif_ourteam_subtitle', array(
				'label'    => __( 'Team subtitle', 'zerif-lite' ),
				'section'  => 'zerif_ourteam_section',
				'settings' => 'zerif_ourteam_subtitle',
				'priority'    => 3,
		));

	else:

		$wp_customize->add_section( 'zerif_ourteam_section' , array(
				'title'       => __( 'Team section', 'zerif-lite' ),
				'priority'    => 35,

				'description' => __( 'The main content of this section is customizable in: Customize -> Widgets -> Team section. There you must add the "Zerif - Team member widget"', 'zerif-lite' )
		));
		/* team show/hide */
		$wp_customize->add_setting( 'zerif_ourteam_show', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_ourteam_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide our team section?','zerif-lite'),
				'section' => 'zerif_ourteam_section',
				'priority'    => 1,
			)
		);
		/* team title */
		$wp_customize->add_setting( 'zerif_ourteam_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('TEAM','zerif-lite')));
		$wp_customize->add_control( 'zerif_ourteam_title', array(
					'label'    => __( 'Title', 'zerif-lite' ),
					'section'  => 'zerif_ourteam_section',
					'settings' => 'zerif_ourteam_title',
					'priority'    => 2,
		));
		/* team subtitle */
		$wp_customize->add_setting( 'zerif_ourteam_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Prove that you have real people working for you, with some nice looking profile pictures and links to social media.','zerif-lite')));
		$wp_customize->add_control( 'zerif_ourteam_subtitle', array(
				'label'    => __( 'Team subtitle', 'zerif-lite' ),
				'section'  => 'zerif_ourteam_section',
				'settings' => 'zerif_ourteam_subtitle',
				'priority'    => 3,
		));

	endif;
	/**********************************************/
    /**********	TESTIMONIALS SECTION **************/
	/**********************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_testimonials', array(
			'priority' => 36,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Testimonials section', 'zerif-lite' )
		) );

		$wp_customize->add_section( 'zerif_testimonials_section' , array(
				'title'       => __( 'Testimonials section', 'zerif-lite' ),
				'priority'    => 1,
				'panel'       => 'panel_testimonials'
		));
		/* testimonials show/hide */
		$wp_customize->add_setting( 'zerif_testimonials_show', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_testimonials_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide testimonials section?','zerif-lite'),
				'section' => 'zerif_testimonials_section',
				'priority'    => 1,
			)
		);
		/* testimonial pinterest layout */
		$wp_customize->add_setting( 'zerif_testimonials_pinterest_style', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_testimonials_pinterest_style',
			array(
				'type' 			=> 'checkbox',
				'label' 		=> __('Use pinterest layout?','zerif-lite'),
				'section' 		=> 'zerif_testimonials_section',
				'priority'    	=> 2,
			)
		);
		/* testimonials title */
		$wp_customize->add_setting( 'zerif_testimonials_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Testimonials','zerif-lite')));
		$wp_customize->add_control( 'zerif_testimonials_title', array(
					'label'    => __( 'Title', 'zerif-lite' ),
					'section'  => 'zerif_testimonials_section',
					'settings' => 'zerif_testimonials_title',
					'priority'    => 2,
		));
		/* testimonials subtitle */
		$wp_customize->add_setting( 'zerif_testimonials_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_testimonials_subtitle', array(
				'label'    => __( 'Testimonials subtitle', 'zerif-lite' ),
				'section'  => 'zerif_testimonials_section',
				'settings' => 'zerif_testimonials_subtitle',
				'priority'    => 3,
		));

	else:

		$wp_customize->add_section( 'zerif_testimonials_section' , array(
				'title'       => __( 'Testimonials section', 'zerif-lite' ),
				'priority'    => 36,
				'description' => __( 'The main content of this section is customizable in: Customize -> Widgets -> Testimonials section. There you must add the "Zerif - Testimonial widget"', 'zerif-lite' )
		));
		/* testimonials show/hide */
		$wp_customize->add_setting( 'zerif_testimonials_show', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_testimonials_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide testimonials section?','zerif-lite'),
				'section' => 'zerif_testimonials_section',
				'priority'    => 1,
			)
		);
		/* testimonial pinterest layout */
		$wp_customize->add_setting( 'zerif_testimonials_pinterest_style', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_testimonials_pinterest_style',
			array(
				'type' 			=> 'checkbox',
				'label' 		=> __('Use pinterest layout?','zerif-lite'),
				'section' 		=> 'zerif_testimonials_section',
				'priority'    	=> 2,
			)
		);
		/* testimonials title */
		$wp_customize->add_setting( 'zerif_testimonials_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Testimonials','zerif-lite')));
		$wp_customize->add_control( 'zerif_testimonials_title', array(
					'label'    => __( 'Title', 'zerif-lite' ),
					'section'  => 'zerif_testimonials_section',
					'settings' => 'zerif_testimonials_title',
					'priority'    => 2,
		));
		/* testimonials subtitle */
		$wp_customize->add_setting( 'zerif_testimonials_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_testimonials_subtitle', array(
				'label'    => __( 'Testimonials subtitle', 'zerif-lite' ),
				'section'  => 'zerif_testimonials_section',
				'settings' => 'zerif_testimonials_subtitle',
				'priority'    => 3,
		));

	endif;

	/**********************************************/
    /**********	LATEST NEWS SECTION **************/
	/**********************************************/
	$wp_customize->add_section( 'zerif_latestnews_section' , array(
			'title'       => __( 'Latest News section', 'zerif-lite' ),
    	  	'priority'    => 37
	));
	/* latest news show/hide */
	$wp_customize->add_setting( 'zerif_latestnews_show', array('sanitize_callback' => 'zerif_sanitize_text'));
    $wp_customize->add_control(
		'zerif_latestnews_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide latest news section?','zerif-lite'),
			'section' => 'zerif_latestnews_section',
			'priority'    => 1,
		)
	);
	/* latest news subtitle */
	$wp_customize->add_setting( 'zerif_latestnews_title', array('sanitize_callback' => 'zerif_sanitize_text'));
	$wp_customize->add_control( 'zerif_latestnews_title', array(
			'label'    		=> __( 'Latest News title', 'zerif-lite' ),
	      	'section'  		=> 'zerif_latestnews_section',
	      	'settings' 		=> 'zerif_latestnews_title',
			'priority'    	=> 2,
	));
	/* latest news subtitle */
	$wp_customize->add_setting( 'zerif_latestnews_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));
	$wp_customize->add_control( 'zerif_latestnews_subtitle', array(
			'label'    		=> __( 'Latest News subtitle', 'zerif-lite' ),
	      	'section'  		=> 'zerif_latestnews_section',
	      	'settings' 		=> 'zerif_latestnews_subtitle',
			'priority'   	=> 3,
	));


	/*******************************************************/
    /************	CONTACT US SECTION *********************/
	/*******************************************************/

	$zerif_contact_us_section_description = '';

	/* if Pirate Forms is installed */
	if( defined("PIRATE_FORMS_VERSION") ):
		$zerif_contact_us_section_description = __( 'For more advanced settings please go to Settings -> Pirate Forms','zerif-lite' );
	endif;

	$wp_customize->add_section( 'zerif_contactus_section' , array(
			'title'       => __( 'Contact us section', 'zerif-lite' ),
			'description' => $zerif_contact_us_section_description,
    	  	'priority'    => 38
	));
	/* contact us show/hide */
	$wp_customize->add_setting( 'zerif_contactus_show', array('sanitize_callback' => 'zerif_sanitize_text'));
    $wp_customize->add_control(
		'zerif_contactus_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide contact us section?','zerif-lite'),
			'section' => 'zerif_contactus_section',
			'priority'    => 1,
		)
	);
	/* contactus title */
	$wp_customize->add_setting( 'zerif_contactus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Get in touch','zerif-lite')));
	$wp_customize->add_control( 'zerif_contactus_title', array(
				'label'    => __( 'Contact us section title', 'zerif-lite' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_title',
				'priority'    => 2,
	));
	/* contactus subtitle */
	$wp_customize->add_setting( 'zerif_contactus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));
	$wp_customize->add_control( 'zerif_contactus_subtitle', array(
			'label'    => __( 'Contact us section subtitle', 'zerif-lite' ),
	      	'section'  => 'zerif_contactus_section',
	      	'settings' => 'zerif_contactus_subtitle',
			'priority'    => 3,
	));

	/* contactus email */
	$wp_customize->add_setting( 'zerif_contactus_email', array('sanitize_callback' => 'zerif_sanitize_text'));

	$wp_customize->add_control( 'zerif_contactus_email', array(
				'label'    => __( 'Email address', 'zerif-lite' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_email',
				'priority'    => 4,
	));

	/* contactus button label */
	$wp_customize->add_setting( 'zerif_contactus_button_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Send Message','zerif-lite')));

	$wp_customize->add_control( 'zerif_contactus_button_label', array(
				'label'    => __( 'Button label', 'zerif-lite' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_button_label',
				'priority'    => 5,
	));
	/* recaptcha */
	$wp_customize->add_setting( 'zerif_contactus_recaptcha_show', array('sanitize_callback' => 'zerif_sanitize_text'));
	$wp_customize->add_control(
		'zerif_contactus_recaptcha_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide reCaptcha?','zerif-lite'),
			'section' => 'zerif_contactus_section',
			'priority'    => 6,
		)
	);

	/* site key */
	$attribut_new_tab = (isset($zerif_accessibility) && ($zerif_accessibility != 1) ? ' target="_blank"' : '' );
	$wp_customize->add_setting( 'zerif_contactus_sitekey', array('sanitize_callback' => 'zerif_sanitize_text'));
	$wp_customize->add_control( 'zerif_contactus_sitekey', array(
				'label'    => __( 'Site key', 'zerif-lite' ),
				'description' => '<a'.$attribut_new_tab.' href="https://www.google.com/recaptcha/admin#list">'.__('Create an account here','zerif-lite').'</a> to get the Site key and the Secret key for the reCaptcha.',
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_sitekey',
				'priority'    => 7,
	));
	/* secret key */
	$wp_customize->add_setting( 'zerif_contactus_secretkey', array('sanitize_callback' => 'zerif_sanitize_text'));
	$wp_customize->add_control( 'zerif_contactus_secretkey', array(
				'label'    => __( 'Secret key', 'zerif-lite' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_secretkey',
				'priority'    => 8,
	));
	/**********************************************/
    /**********	CONTACTS SECTION **************/
	/**********************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_contacts', array(
			'priority' => 39,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Contacts section', 'zerif-lite' )
		) );

		$wp_customize->add_section( 'zerif_contacts_section' , array(
				'title'       => __( 'Contacts section', 'zerif-lite' ),
				'priority'    => 1,
				'panel'       => 'panel_contacts'
		));
		/* contacts show/hide */
		$wp_customize->add_setting( 'zerif_contacts_show', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_contacts_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide contacts section?','zerif-lite'),
				'section' => 'zerif_contacts_section',
				'priority'    => 1,
			)
		);
		/* contacts cell phone */
		$wp_customize->add_setting( 'zerif_contacts_phone', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_contacts_phone', array(
					'label'    => __( 'Phone', 'zerif-lite' ),
					'section'  => 'zerif_contacts_section',
					'settings' => 'zerif_contacts_phone',
					'priority'    => 2,
		));
		/* contacts email */
		$wp_customize->add_setting( 'zerif_contacts_email', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_contacts_email', array(
				'label'    => __( 'Email', 'zerif-lite' ),
				'section'  => 'zerif_contacts_section',
				'settings' => 'zerif_contacts_email',
				'priority'    => 3,
		));
		/* contacts steet address */
		$wp_customize->add_setting( 'zerif_contacts_street', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_contacts_street', array(
				'label'    => __( 'Street address', 'zerif-lite' ),
				'section'  => 'zerif_contacts_section',
				'settings' => 'zerif_contacts_street',
				'priority'    => 4,
		));

		/* GOOGLE MAPS SECTION */
		$wp_customize->add_section('zerif_contacts_maps_section', array(
			'title' => __('Google maps section', 'zerif-lite'),
			'priority' => 40,
			'panel' => 'panel_contacts'
		));
		/* show/hide google maps */
		$wp_customize->add_setting('zerif_contacts_maps_show', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_contacts_maps_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide Google Maps section?', 'zerif-lite'),
				'section' => 'zerif_contacts_maps_section',
				'priority' => 1
			)
		);
		/* scroll google maps */
		$wp_customize->add_setting('zerif_contacts_maps_scroll', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_contacts_maps_scroll',
			array(
				'type' => 'checkbox',
				'label' => __('Disable Google Maps scroll?', 'zerif-lite'),
				'section' => 'zerif_contacts_maps_section',
				'priority' => 2
			)
		);
		/* draggable google maps */
		$wp_customize->add_setting('zerif_contacts_maps_draggable', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_contacts_maps_draggable',
			array(
				'type' => 'checkbox',
				'label' => __('Disable Google Maps draggably?', 'zerif-lite'),
				'section' => 'zerif_contacts_maps_section',
				'priority' => 3
			)
		);
		/* width */
		$wp_customize->add_setting('zerif_contacts_maps_width', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control('zerif_contacts_maps_width', array(
			'label' => __('Width', 'zerif-lite'),
			'section' => 'zerif_contacts_maps_section',
			'settings' => 'zerif_contacts_maps_width',
			'priority' => 4
		));
		/* height */
		$wp_customize->add_setting('zerif_contacts_maps_height', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control('zerif_contacts_maps_height', array(
			'label' => __('Height', 'zerif-lite'),
			'section' => 'zerif_contacts_maps_section',
			'settings' => 'zerif_contacts_maps_height',
			'priority' => 5
		));
		/* zoom */
		$wp_customize->add_setting('zerif_contacts_maps_zoom', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control('zerif_contacts_maps_zoom', array(
			'label' => __('Zoom', 'zerif-lite'),
			'section' => 'zerif_contacts_maps_section',
			'settings' => 'zerif_contacts_maps_zoom',
			'priority' => 6
		));
		/* latitude */
		$wp_customize->add_setting('zerif_contacts_maps_lat', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control('zerif_contacts_maps_lat', array(
			'label' => __('Latitude', 'zerif-lite'),
			'section' => 'zerif_contacts_maps_section',
			'settings' => 'zerif_contacts_maps_lat',
			'priority' => 7
		));
		/* longitude */
		$wp_customize->add_setting('zerif_contacts_maps_lng', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control('zerif_contacts_maps_lng', array(
			'label' => __('Longitude', 'zerif-lite'),
			'section' => 'zerif_contacts_maps_section',
			'settings' => 'zerif_contacts_maps_lng',
			'priority' => 8
		));


	else:

		$wp_customize->add_section( 'zerif_contacts_section' , array(
				'title'       => __( 'Contacts section', 'zerif-lite' ),
				'priority'    => 39,
				'description' => __( 'No customizable.', 'zerif-lite' )
		));
		/* contacts show/hide */
		$wp_customize->add_setting( 'zerif_contacts_show', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_contacts_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide contacts section?','zerif-lite'),
				'section' => 'zerif_contacts_section',
				'priority'    => 1,
			)
		);
		/* contacts phone */
		$wp_customize->add_setting( 'zerif_contacts_phone', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_contacts_phone', array(
					'label'    => __( 'Phone', 'zerif-lite' ),
					'section'  => 'zerif_contacts_section',
					'settings' => 'zerif_contacts_phone',
					'priority'    => 2,
		));
		/* contacts email */
		$wp_customize->add_setting( 'zerif_contacts_email', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_contacts_email', array(
				'label'    => __( 'Email', 'zerif-lite' ),
				'section'  => 'zerif_contacts_section',
				'settings' => 'zerif_contacts_email',
				'priority'    => 3,
		));
		/* contacts street address */
		$wp_customize->add_setting( 'zerif_contacts_street', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_contacts_street', array(
				'label'    => __( 'Street address', 'zerif-lite' ),
				'section'  => 'zerif_contacts_section',
				'settings' => 'zerif_contacts_street',
				'priority'    => 4,
		));

		/* GOOGLE MAPS SECTION */
		$wp_customize->add_section( 'zerif_contacts_maps_section' , array(
				'title'       => __( 'Google maps section', 'zerif-lite' ),
				'priority'    => 40,
				'description' => __( 'No customizable.', 'zerif-lite' )
		));
		/* show/hide */
		$wp_customize->add_setting( 'zerif_contacts_maps_show', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_contacts_maps_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide Google Maps section?','zerif-lite'),
				'section' => 'zerif_contacts_maps_section',
				'priority'    => 1,
			)
		);
		/* scroll Google Maps*/
		$wp_customize->add_setting( 'zerif_contacts_maps_scroll', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_contacts_maps_scroll',
			array(
				'type' => 'checkbox',
				'label' => __('Disable Google Maps scroll?','zerif-lite'),
				'section' => 'zerif_contacts_maps_section',
				'priority'    => 2,
			)
		);
		/* draggable Google Maps*/
		$wp_customize->add_setting( 'zerif_contacts_maps_draggable', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
			'zerif_contacts_maps_draggable',
			array(
				'type' => 'checkbox',
				'label' => __('Disable Google Maps draggably?','zerif-lite'),
				'section' => 'zerif_contacts_maps_section',
				'priority'    => 3,
			)
		);
		/* width */
		$wp_customize->add_setting( 'zerif_contacts_maps_width', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_contacts_maps_width', array(
				'label'    => __( 'Width', 'zerif-lite' ),
				'section'  => 'zerif_contacts_maps_section',
				'settings' => 'zerif_contacts_maps_width',
				'priority'    => 4,
		));
		/* height */
		$wp_customize->add_setting( 'zerif_contacts_maps_height', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_contacts_maps_height', array(
				'label'    => __( 'Height', 'zerif-lite' ),
				'section'  => 'zerif_contacts_maps_section',
				'settings' => 'zerif_contacts_maps_height',
				'priority'    => 5,
		));
		/* zoom */
		$wp_customize->add_setting( 'zerif_contacts_maps_zoom', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_contacts_maps_zoom', array(
				'label'    => __( 'Zoom', 'zerif-lite' ),
				'section'  => 'zerif_contacts_maps_section',
				'settings' => 'zerif_contacts_maps_zoom',
				'priority'    => 6,
		));
		/* latitude */
		$wp_customize->add_setting( 'zerif_contacts_maps_lat', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_contacts_maps_lat', array(
				'label'    => __( 'Latitude', 'zerif-lite' ),
				'section'  => 'zerif_contacts_maps_section',
				'settings' => 'zerif_contacts_maps_lat',
				'priority'    => 7,
		));
		/* longitude */
		$wp_customize->add_setting( 'zerif_contacts_maps_lng', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control( 'zerif_contacts_maps_lng', array(
				'label'    => __( 'Longitude', 'zerif-lite' ),
				'section'  => 'zerif_contacts_maps_section',
				'settings' => 'zerif_contacts_maps_lng',
				'priority'    => 8,
		));

	endif;

}
add_action( 'customize_register', 'zerif_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zerif_customize_preview_js() {
	wp_enqueue_script( 'zerif_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'zerif_customize_preview_js' );
function zerif_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function zerif_sanitize_pro_version( $input ) {
    return $input;
}
function zerif_sanitize_number( $input ) {
    return force_balance_tags( $input );
}
function zerif_registers() {

	wp_enqueue_script( 'zerif_customizer_script', get_template_directory_uri() . '/js/zerif_customizer.js', array("jquery"), '20120206', true  );

	wp_localize_script( 'zerif_customizer_script', 'zerifLiteCustomizerObject', array(

		'documentation' => __( 'View Documentation', 'zerif-lite' ),
		'pro' => __('View PRO version','zerif-lite')

	) );
}
add_action( 'customize_controls_enqueue_scripts', 'zerif_registers' );
