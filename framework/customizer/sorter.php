<?php
/**
 *	Sorter for the Front Page.
**/

function vlogr_front_page_sorter($wp_customize) {
	
	/**
	 * Sortable Repeater Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */
	class Vlogr_Sorter_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'sorter';
	
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
		?>
	      <div class="drag_and_drop_control">
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-drag-and-drop" <?php $this->link(); ?> />
				<ul class="sortable">
					<li class="repeater" data-sorter="slider">
						<div class="repeater-input">Slider</div>
					</li>
					<li class="repeater" data-sorter="hero1">
						<div class="repeater-input">Hero Area 1</div>
					</li>
					<li class="repeater" data-sorter="hero2">
						<div class="repeater-input">Hero Area 2</div>
					</li>
					<li class="repeater" data-sorter="hero3">
						<div class="repeater-input">Hero Area 3</div>
					</li>
					<li class="repeater" data-sorter="feat_cat">
						<div class="repeater-input">Featured Posts Categories</div>
					</li>
					<li class="repeater" data-sorter="feat_area1">
						<div class="repeater-input">Featured Area 1</div>
					</li>
					<li class="repeater" data-sorter="feat_area2">
						<div class="repeater-input">Featured Area 2</div>
					</li>
				</ul>
				<button type="button" class="sorter_reset button">Reset</div>
			</div>
		<?php
		}
	}
	
	// Sorter Control
    $wp_customize->add_section('vlogr_front_page_sorter',
        array(
            'title' => __('Front page Sorter', 'vlogr'),
            'priority' => 35,
            'description'	=> __('Customize the Layout of the Sections on the Front Page', 'vlogr'),
        )
    );

    //Basic Setting Info
    $wp_customize->add_setting(
			'vlogr_sorter',
			array( 'default'	=> 'slider,hero1,hero2,hero3,feat_cat,feat_area1,feat_area2',
					'sanitize_callback'	=> 'sanitize_text_field'
			 )
		);
			
	$wp_customize->add_control(
	    new vlogr_Sorter_Custom_Control(
	        $wp_customize,
	        'vlogr_sorter',
	        array(
	            'label' => __('Drage and Drop','vlogr'),
	            'description' => __('You need to enable the respective Featured Areas from their Sections.','vlogr'),
	            'section' => 'vlogr_front_page_sorter',
	            'settings' => 'vlogr_sorter',		       
	        )
		)
	);
}

add_action( 'customize_register', 'vlogr_front_page_sorter' );