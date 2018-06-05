<?php
/**
 * Copyright (c) 2018 Callan Peter Milne
 *
 * Permission to use, copy, modify, and/or distribute this software for any
 * purpose with or without fee is hereby granted, provided that the above
 * copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
 * REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
 * INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
 * LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
 * OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
 * PERFORMANCE OF THIS SOFTWARE.
 */

class DataStudioPostTypes {
  public function __construct () {
    add_action( 'init', array( $this, 'registerPostTypes'));
  }
  public function registerPostTypes () {

    $this->registerAppPostType();

    $this->registerLogicGroupPostType();
    $this->registerModelPostType();
    $this->registerAttributePostType();
    $this->registerCommandPostType();
    $this->registerQueryPostType();

    $this->registerWebServicePostType();
    $this->registerPathPostType();
    $this->registerOperationPostType();

  }
  private function registerAppPostType () {
    $this->registerPostType(array(
      'label_single'     => 'App',
      'label_single_lc'  => 'app',
      'label_multi'      => 'Apps',
      'label_multi_lc'   => 'apps',
      'name'             => 'app',
      'slug'             => 'app',
      'type_name'        => 'app'
    ));
  }
  private function registerLogicGroupPostType () {
    $this->registerPostType(array(
      'label_single'     => 'Logic Group',
      'label_single_lc'  => 'logic group',
      'label_multi'      => 'Logic Groups',
      'label_multi_lc'   => 'logic groups',
      'name'             => 'logic_group',
      'slug'             => 'logic-group',
      'type_name'        => 'logic_group'
    ));
  }
  private function registerWebServicePostType () {
    $this->registerPostType(array(
      'label_single'     => 'Web Service',
      'label_single_lc'  => 'web service',
      'label_multi'      => 'Web Services',
      'label_multi_lc'   => 'web services',
      'name'             => 'web_service',
      'slug'             => 'web-service',
      'type_name'        => 'web_service'
    ));
  }
  private function registerPathPostType () {
    $this->registerPostType(array(
      'label_single'     => 'Path',
      'label_single_lc'  => 'path',
      'label_multi'      => 'Paths',
      'label_multi_lc'   => 'paths',
      'name'             => 'path',
      'slug'             => 'path',
      'type_name'        => 'path'
    ));
  }
  private function registerOperationPostType () {
    $this->registerPostType(array(
      'label_single'     => 'Operation',
      'label_single_lc'  => 'operation',
      'label_multi'      => 'Operations',
      'label_multi_lc'   => 'operations',
      'name'             => 'operation',
      'slug'             => 'operation',
      'type_name'        => 'operation'
    ));
  }
  private function registerModelPostType () {
    $this->registerPostType(array(
      'label_single'     => 'Model',
      'label_single_lc'  => 'model',
      'label_multi'      => 'Models',
      'label_multi_lc'   => 'models',
      'name'             => 'model',
      'slug'             => 'model',
      'type_name'        => 'model'
    ));
  }
  private function registerAttributePostType () {
    $this->registerPostType(array(
      'label_single'     => 'Attribute',
      'label_single_lc'  => 'attribute',
      'label_multi'      => 'Attributes',
      'label_multi_lc'   => 'attributes',
      'name'             => 'attribute',
      'slug'             => 'attribute',
      'type_name'        => 'attribute'
    ));
  }
  private function registerCommandPostType () {
    $this->registerPostType(array(
      'label_single'     => 'Command',
      'label_single_lc'  => 'command',
      'label_multi'      => 'Commands',
      'label_multi_lc'   => 'commands',
      'name'             => 'command',
      'slug'             => 'command',
      'type_name'        => 'command'
    ));
  }
  private function registerQueryPostType () {
    $this->registerPostType(array(
      'label_single'     => 'Query',
      'label_single_lc'  => 'queries',
      'label_multi'      => 'Query',
      'label_multi_lc'   => 'queries',
      'name'             => 'query',
      'slug'             => 'query',
      'type_name'        => 'query'
    ));
  }
  private function registerTaxa ($postType, $d) {
    $labels = array(
      'name'                       => _x( sprintf('%s', $d['label_multi']), 'taxonomy general name', 'data-studio' ),
      'singular_name'              => _x( sprintf('%s', $d['label_single']), 'taxonomy singular name', 'data-studio' ),
      'search_items'               => __( sprintf('Search %s Name', $d['label_multi']), 'data-studio' ),
      'popular_items'              => __( sprintf('Popular %s Name', $d['label_multi']), 'data-studio' ),
      'all_items'                  => __( sprintf('All %s Name', $d['label_multi']), 'data-studio' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( sprintf('Edit %s', $d['label_single']), 'data-studio' ),
      'update_item'                => __( sprintf('Update %s', $d['label_single']), 'data-studio' ),
      'add_new_item'               => __( sprintf('Add New %s', $d['label_single']), 'data-studio' ),
      'new_item_name'              => __( sprintf('New %s Name', $d['label_single']), 'data-studio' ),
      'separate_items_with_commas' => __( sprintf('Separate %s with commas', $d['label_multi_lc']), 'data-studio' ),
      'add_or_remove_items'        => __( sprintf('Add or remove %s', $d['label_multi_lc']), 'data-studio' ),
      'choose_from_most_used'      => __( sprintf('Choose from the most used %s', $d['label_multi_lc']), 'data-studio' ),
      'not_found'                  => __( sprintf('No %s found.', $d['label_multi_lc']), 'data-studio' ),
      'menu_name'                  => __( sprintf('%s', $d['label_multi']), 'data-studio' ),
    );

    $args = array(
      'hierarchical'          => false,
      'labels'                => $labels,
      'show_ui'               => true,
      'show_admin_column'     => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var'             => true,
      'rewrite'               => array( 'slug' => $d['slug'] ),
    );

    register_taxonomy( $d['name'], $postType, $args );
  }
  private function registerPostType ($d) {

    $labels = array(
      'name'               => _x( $d['label_multi'], 'post type general name', 'data-studio' ),
      'singular_name'      => _x( $d['label_single'], 'post type singular name', 'data-studio' ),
      'menu_name'          => _x( $d['label_multi'], 'admin menu', 'data-studio' ),
      'name_admin_bar'     => _x( $d['label_single'], 'add new on admin bar', 'data-studio' ),
      'add_new'            => _x( 'Add New', $d['name'], 'data-studio' ),
      'add_new_item'       => __( sprintf('Add New %s', $d['label_single']), 'data-studio' ),
      'new_item'           => __( sprintf('New %s', $d['label_single']), 'data-studio' ),
      'edit_item'          => __( sprintf('Edit %s', $d['label_single']), 'data-studio' ),
      'view_item'          => __( sprintf('View %s', $d['label_single']), 'data-studio' ),
      'all_items'          => __( sprintf('All %s', $d['label_multi']), 'data-studio' ),
      'search_items'       => __( sprintf('Search %s', $d['label_multi']), 'data-studio' ),
      'parent_item_colon'  => __( sprintf('Parent %s:', $d['label_multi']), 'data-studio' ),
      'not_found'          => __( sprintf('No %s found.', $d['label_multi_lc']), 'data-studio' ),
      'not_found_in_trash' => __( sprintf('No %s found in Trash.', $d['label_multi_lc']), 'data-studio' )
    );
    $args = array(
      'labels'             => $labels,
      'description'        => __( 'Description.', 'data-studio' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      // 'show_in_menu'    => 'data-studio',
      'show_in_nav_menus'  => false,
      'show_in_admin_bar'  => false,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => $d['slug'] ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'supports'           => array( 'title', 'comments', 'editor' )
    );

    register_post_type( $d['type_name'], $args );

  }
}

new DataStudioPostTypes();
