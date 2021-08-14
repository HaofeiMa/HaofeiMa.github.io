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

if ( ! class_exists( 'Astra_Blog_Single_Layout_Configs' ) ) {

	/**
	 * Register Blog Single Layout Configurations.
	 */
	class Astra_Blog_Single_Layout_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Blog Single Layout Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_configs = array(

				/**
				 * Option: Single Post Content Width
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[blog-single-width]',
					'type'      => 'control',
					'control'   => 'select',
					'section'   => 'section-blog-single',
					'default'   => astra_get_option( 'blog-single-width' ),
					'priority'  => 5,
					'title'     => __( 'Content Width', 'astra' ),
					'choices'   => array(
						'default' => __( 'Default', 'astra' ),
						'custom'  => __( 'Custom', 'astra' ),
					),
					'transport' => 'postMessage',
				),

				/**
				 * Option: Enter Width
				 */
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[blog-single-max-width]',
					'type'        => 'control',
					'control'     => 'ast-slider',
					'section'     => 'section-blog-single',
					'transport'   => 'postMessage',
					'default'     => 1200,
					'context'     => array(
						Astra_Builder_Helper::$general_tab_config,
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[blog-single-width]',
							'operator' => '===',
							'value'    => 'custom',
						),
					),
					'priority'    => 5,
					'title'       => __( 'Custom Width', 'astra' ),
					'suffix'      => '',
					'input_attrs' => array(
						'min'  => 768,
						'step' => 1,
						'max'  => 1920,
					),
				),

				/**
				 * Option: Display Post Structure
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[blog-single-post-structure]',
					'type'     => 'control',
					'control'  => 'ast-sortable',
					'section'  => 'section-blog-single',
					'default'  => astra_get_option( 'blog-single-post-structure' ),
					'priority' => 5,
					'title'    => __( 'Structure', 'astra' ),
					'choices'  => array(
						'single-image'      => __( 'Featured Image', 'astra' ),
						'single-title-meta' => __( 'Title & Blog Meta', 'astra' ),
					),
				),

			);

			if ( ! defined( 'ASTRA_EXT_VER' ) ) {
				array_push(
					$_configs,
					/**
					 * Option: Single Post Meta
					 */
					array(
						'name'     => ASTRA_THEME_SETTINGS . '[blog-single-meta]',
						'type'     => 'control',
						'control'  => 'ast-sortable',
						'default'  => astra_get_option( 'blog-single-meta' ),
						'context'  => array(
							Astra_Builder_Helper::$general_tab_config,
							array(
								'setting'  => ASTRA_THEME_SETTINGS . '[blog-single-post-structure]',
								'operator' => 'contains',
								'value'    => 'single-title-meta',
							),
						),
						'section'  => 'section-blog-single',
						'priority' => 5,
						'title'    => __( 'Meta', 'astra' ),
						'choices'  => array(
							'comments' => __( 'Comments', 'astra' ),
							'category' => __( 'Category', 'astra' ),
							'author'   => __( 'Author', 'astra' ),
							'date'     => __( 'Publish Date', 'astra' ),
							'tag'      => __( 'Tag', 'astra' ),
						),
					)
				);
			}

			if ( Astra_Builder_Helper::$is_header_footer_builder_active ) {

				array_push(
					$_configs,
					/**
					 * Option: Blog / Archive Tabs.
					 */
					array(
						'name'        => 'section-blog-single-ast-context-tabs',
						'section'     => 'section-blog-single',
						'type'        => 'control',
						'control'     => 'ast-builder-header-control',
						'priority'    => 0,
						'description' => '',
					)
				);

			}

			$configurations = array_merge( $configurations, $_configs );

			return $configurations;

		}
	}
}


new Astra_Blog_Single_Layout_Configs();
