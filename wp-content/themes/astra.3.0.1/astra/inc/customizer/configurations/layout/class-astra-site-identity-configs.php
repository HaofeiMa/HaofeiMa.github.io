<?php
/**
 * Bottom Footer Options for Astra Theme.
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Site_Identity_Configs' ) ) {

	/**
	 * Register Astra Customizerr Site identity Customizer Configurations.
	 */
	class Astra_Site_Identity_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Astra Customizerr Site identity Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_section = 'title_tagline';

			$_configs = array(

				/**
				 * Notice for Colors - Transparent header enabled on page.
				 */
				array(
					'name'            => ASTRA_THEME_SETTINGS . '[ahfb-notice-header-transparent-header-logo]',
					'type'            => 'control',
					'control'         => 'ast-description',
					'section'         => $_section,
					'priority'        => 1,
					'context'         => array(
						Astra_Builder_Helper::$general_tab_config,
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[different-transparent-logo]',
							'operator' => '==',
							'value'    => true,
						),
					),
					'active_callback' => array( $this, 'is_transparent_header_enabled' ),
					'help'            => $this->get_help_text_notice( 'transparent-header' ),
				),

				/**
				* Option: Transparent Header Section - Link.
				*/
				array(
					'name'            => ASTRA_THEME_SETTINGS . '[ahfb-notice-header-transparent-header-logo-link]',
					'type'            => 'control',
					'control'         => 'ast-customizer-link',
					'section'         => $_section,
					'priority'        => 1,
					'link_type'       => 'control',
					'linked'          => ASTRA_THEME_SETTINGS . '[transparent-header-logo]',
					'context'         => array(
						Astra_Builder_Helper::$general_tab_config,
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[different-transparent-logo]',
							'operator' => '==',
							'value'    => true,
						),
					),
					'link_text'       => '<u>' . __( 'Customize Transparent Header.', 'astra' ) . '</u>',
					'active_callback' => array( $this, 'is_transparent_header_enabled' ),
				),

				/**
				 * Option: Different retina logo
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[different-retina-logo]',
					'type'      => 'control',
					'control'   => 'checkbox',
					'section'   => $_section,
					'title'     => __( 'Different Logo For Retina Devices?', 'astra' ),
					'default'   => false,
					'priority'  => 5,
					'transport' => 'postMessage',
					'context'   => array(
						array(
							'setting'  => 'custom_logo',
							'operator' => '!=',
							'value'    => '',
						),
						Astra_Builder_Helper::$general_tab_config,
					),
					'partial'   => array(
						'selector'            => '.site-branding',
						'container_inclusive' => false,
						'render_callback'     => 'Astra_Builder_Header::site_identity',
					),
				),

				/**
				 * Option: Retina logo selector
				 */
				array(
					'name'           => ASTRA_THEME_SETTINGS . '[ast-header-retina-logo]',
					'default'        => astra_get_option( 'ast-header-retina-logo' ),
					'type'           => 'control',
					'control'        => 'image',
					'section'        => 'title_tagline',
					'context'        => array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[different-retina-logo]',
							'operator' => '!=',
							'value'    => 0,
						),
						Astra_Builder_Helper::$general_tab_config,
					),
					'priority'       => 5,
					'title'          => __( 'Retina Logo', 'astra' ),
					'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
					'transport'      => 'postMessage',
					'partial'        => array(
						'selector'            => '.site-branding',
						'container_inclusive' => false,
						'render_callback'     => 'Astra_Builder_Header::site_identity',
					),
				),

				/**
				 * Option: Inherit Desktop logo
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[different-mobile-logo]',
					'type'      => 'control',
					'control'   => 'checkbox',
					'default'   => false,
					'section'   => 'title_tagline',
					'title'     => __( 'Different Logo For Mobile Devices?', 'astra' ),
					'priority'  => 5,
					'context'   => array(
						array(
							'setting'  => 'custom_logo',
							'operator' => '!=',
							'value'    => '',
						),
						Astra_Builder_Helper::$general_tab_config,
						array(
							'setting'  => 'ast_selected_device',
							'operator' => 'in',
							'value'    => array( 'tablet', 'mobile' ),
						),
					),
					'transport' => 'postMessage',
					'partial'   => array(
						'selector'            => '.site-branding',
						'container_inclusive' => false,
						'render_callback'     => 'Astra_Builder_Header::site_identity',
					),
				),

				/**
				 * Option: Mobile header logo
				 */
				array(
					'name'           => ASTRA_THEME_SETTINGS . '[mobile-header-logo]',
					'default'        => astra_get_option( 'mobile-header-logo' ),
					'type'           => 'control',
					'control'        => 'image',
					'section'        => 'title_tagline',
					'priority'       => 5,
					'title'          => __( 'Mobile Logo (optional)', 'astra' ),
					'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
					'context'        => array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[different-mobile-logo]',
							'operator' => '==',
							'value'    => '1',
						),
						Astra_Builder_Helper::$general_tab_config,
						array(
							'setting'  => 'ast_selected_device',
							'operator' => 'in',
							'value'    => array( 'tablet', 'mobile' ),
						),
					),
				),

				/**
				 * Option: Logo Width
				 */
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[ast-header-responsive-logo-width]',
					'type'        => 'control',
					'control'     => 'ast-responsive-slider',
					'section'     => $_section,
					'transport'   => 'postMessage',
					'default'     => astra_get_option( 'ast-header-responsive-logo-width' ),
					'priority'    => 5,
					'title'       => __( 'Logo Width', 'astra' ),
					'input_attrs' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 600,
					),
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[ast-site-logo-divider]',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'title'    => __( 'Site Icon', 'astra' ),
					'section'  => $_section,
					'priority' => 15,
					'settings' => array(),
				),

				/**
				 * Option: Display Title
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[display-site-title]',
					'type'      => 'control',
					'control'   => 'checkbox',
					'default'   => astra_get_option( 'display-site-title' ),
					'section'   => 'title_tagline',
					'title'     => __( 'Display Site Title', 'astra' ),
					'priority'  => 7,
					'transport' => 'postMessage',
					'partial'   => array(
						'selector'            => '.site-branding',
						'container_inclusive' => false,
						'render_callback'     => 'Astra_Builder_Header::site_identity',
					),
				),

				/**
				 * Option: Display Tagline
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[display-site-tagline]',
					'type'      => 'control',
					'control'   => 'checkbox',
					'default'   => astra_get_option( 'display-site-tagline' ),
					'section'   => 'title_tagline',
					'priority'  => 10,
					'title'     => __( 'Display Site Tagline', 'astra' ),
					'transport' => 'postMessage',
					'partial'   => array(
						'selector'            => '.site-branding',
						'container_inclusive' => false,
						'render_callback'     => 'Astra_Builder_Header::site_identity',
					),
				),

				/**
				 * Option: Logo inline title.
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[logo-title-inline]',
					'default'   => astra_get_option( 'logo-title-inline' ),
					'type'      => 'control',
					'context'   => array(
						'relation' => 'AND',
						Astra_Builder_Helper::$general_tab_config,
						array(
							'relation' => 'OR',
							array(
								'setting'  => ASTRA_THEME_SETTINGS . '[display-site-title]',
								'operator' => '==',
								'value'    => true,
							),
							array(
								'setting'  => ASTRA_THEME_SETTINGS . '[display-site-tagline]',
								'operator' => '==',
								'value'    => true,
							),
						),
					),
					'control'   => 'checkbox',
					'section'   => $_section,
					'title'     => __( 'Inline Logo & Site Title', 'astra' ),
					'priority'  => 7,
					'transport' => 'postMessage',
					'partial'   => array(
						'selector'            => '.site-branding',
						'container_inclusive' => false,
						'render_callback'     => 'Astra_Builder_Header::site_identity',
					),
				),

				/**
				 * Option: Divider
				*/
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[ast-site-icon-divider]',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'title'    => __( 'Site Title', 'astra' ),
					'section'  => $_section,
					'priority' => 6,
					'settings' => array(),
				),

				/**
				 * Option: Header Site Title.
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[site-title-typography]',
					'default'   => astra_get_option( 'site-title-typography' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => Astra_Builder_Helper::$is_header_footer_builder_active ? __( 'Title', 'astra' ) : __( 'Typography', 'astra' ),
					'section'   => $_section,
					'transport' => 'postMessage',
					'priority'  => Astra_Builder_Helper::$is_header_footer_builder_active ? 16 : 7,
					'context'   => Astra_Builder_Helper::$is_header_footer_builder_active ? array(
						Astra_Builder_Helper::$design_tab_config,
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[display-site-title]',
							'operator' => '==',
							'value'    => true,
						),
					) : array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[display-site-title]',
							'operator' => '==',
							'value'    => true,
						),
					),
				),

				/**
				 * Options: Site Tagline.
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[site-tagline-typography]',
					'default'   => astra_get_option( 'site-tagline-typography' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => Astra_Builder_Helper::$is_header_footer_builder_active ? __( 'Tagline', 'astra' ) : __( 'Typography', 'astra' ),
					'section'   => $_section,
					'transport' => 'postMessage',
					'priority'  => Astra_Builder_Helper::$is_header_footer_builder_active ? 20 : 11,
					'context'   => Astra_Builder_Helper::$is_header_footer_builder_active ? array(
						Astra_Builder_Helper::$design_tab_config,
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[display-site-tagline]',
							'operator' => '==',
							'value'    => true,
						),
					) : array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[display-site-tagline]',
							'operator' => '==',
							'value'    => true,
						),
					),
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[ast-site-title-divider]',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'section'  => $_section,
					'title'    => __( 'Site Tagline', 'astra' ),
					'priority' => 9,
					'settings' => array(),
				),

			);

			if ( ! Astra_Builder_Helper::$is_header_footer_builder_active ) {

				array_push(
					$_configs,
					/**
					* Option: Divider
					*/
					array(
						'name'     => ASTRA_THEME_SETTINGS . '[divider-section-site-identity-logo]',
						'type'     => 'control',
						'control'  => 'ast-heading',
						'section'  => $_section,
						'title'    => __( 'Site Logo', 'astra' ),
						'priority' => 2,
						'settings' => array(),
					)
				);

			} else {
				$_configs = array_merge(
					$_configs,
					array(
						/**
						 * Notice - Transparent meta header enabled on page.
						 */
						array(
							'name'            => ASTRA_THEME_SETTINGS . '[ahfb-notice-header-transparent-meta-enabled]',
							'type'            => 'control',
							'control'         => 'ast-description',
							'section'         => 'section-header-builder-layout',
							'priority'        => 1,
							'active_callback' => array( $this, 'is_transparent_header_enabled' ),
							'help'            => $this->get_help_text_notice( 'transparent-meta' ),
						),

						/**
						 * Notice Link - Transparent meta header enabled on page.
						 */
						array(
							'name'            => ASTRA_THEME_SETTINGS . '[ahfb-notice-header-transparent-header-meta-link]',
							'type'            => 'control',
							'control'         => 'ast-customizer-link',
							'section'         => 'section-header-builder-layout',
							'priority'        => 1,
							'link_type'       => 'section',
							'linked'          => 'section-transparent-header',
							'link_text'       => '<u>' . __( 'Customize Transparent Header.', 'astra' ) . '</u>',
							'active_callback' => array( $this, 'is_transparent_header_enabled' ),
						),
					)
				);
			}

			$configurations = array_merge( $configurations, $_configs );
			return $configurations;

		}

		/**
		 * Check if transparent header is enabled on the page being previewed.
		 *
		 * @since  2.4.5
		 * @return boolean True - If Transparent Header is enabled, False if not.
		 */
		public function is_transparent_header_enabled() {
			$status = Astra_Ext_Transparent_Header_Markup::is_transparent_header();
			return ( true === $status ? true : false );
		}

		/**
		 * Help notice message to be displayed when the page that is being previewed has Logo set from Transparent Header.
		 *
		 * @since  2.4.5
		 * @param String $context Type of notice message to be returned.
		 * @return String HTML Markup for the help notice.
		 */
		private function get_help_text_notice( $context ) {

			switch ( $context ) {
				case 'transparent-header':
					$notice = '<div class="ast-customizer-notice wp-ui-highlight"><p>The Logo on this page is set from the Transparent Header Section. Please click the link below to customize Transparent Header Logo.</p></div>';
					break;
				case 'transparent-meta':
					$notice = '<div class="ast-customizer-notice wp-ui-highlight"><p>The header on this page is set from the Transparent Header.</p> <p> Please click the link below to customize Transparent Header </p></div>';
					break;
				default:
					$notice = '';
			}
			return $notice;
		}
	}
}


new Astra_Site_Identity_Configs();
