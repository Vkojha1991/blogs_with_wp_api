<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * A class to create a dropdown for all categories in your wordpress site
 */
 class Gist_Masonry_Customize_Category_Dropdown_Control extends WP_Customize_Control {
    
    /**
     * Render the control's content.
     *
     * @return void
     * @since 1.0.0
     */
    public function render_content() {
      $gist_masonry_dropdown = wp_dropdown_categories(
          array(
            'name'              => 'customize-dropdown-categories' . $this->id,
            'echo'              => 0,
            'show_option_none'  => esc_html__( '&mdash; Select Category &mdash;','gist-masonry'),
            'option_none_value' => '0',
            'selected'          => $this->value(),
          )
      );

      // Hackily add in the data link parameter.
      $gist_masonry_dropdown = str_replace( '<select', '<select ' . $this->get_link(), $gist_masonry_dropdown );

      printf(
        '<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
        $this->label,
        $this->description,
        $gist_masonry_dropdown
      );
    }
  }