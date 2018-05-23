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

class DataStudioQuery {
  public function __construct () {

  }

  public static function getApps ( $query = array() ) {
    return new WP_Query( array_merge(
      array ( 'posts_per_page' => 100 ),
      $query,
      array(
        'post_type'      => 'app',
        'author'         => wp_get_current_user()->ID,
        'meta_key'       => 'app_name',
        'orderby'        => 'meta_value',
        'order'          => 'asc',
      )
    ) );
  }

  public static function getLogicGroupsByApp ( $app_id, $query = array() ) {
    return new WP_Query( array_merge(
      array ( 'posts_per_page' => 100 ),
      $query,
      array(
        'post_type'      => 'logic_group',
        'author'         => wp_get_current_user()->ID,
        'meta_key'       => 'logic_group_name',
        'orderby'        => 'meta_value',
        'order'          => 'asc',
        'meta_query'     => array(
          array(
            'key'     => 'logic_group_app_id',
            'value'   => (int) $app_id,
            // 'compare' => 'IN',
          ),
        ),
      )
    ) );
  }

  public static function getWebServicesByApp ( $app_id, $query = array() ) {
    return new WP_Query( array_merge(
      array ( 'posts_per_page' => 100 ),
      $query,
      array(
        'post_type'      => 'web_service',
        'author'         => wp_get_current_user()->ID,
        'meta_key'       => 'web_service_name',
        'orderby'        => 'meta_value',
        'order'          => 'asc',
        'meta_query'     => array(
          array(
            'key'     => 'web_service_app_id',
            'value'   => (int) $app_id,
            // 'compare' => 'IN',
          ),
        ),
      )
    ) );
  }

  public static function getPathsByWebService ( $web_service_id, $query = array() ) {
    return new WP_Query( array_merge(
      array ( 'posts_per_page' => 100 ),
      $query,
      array(
        'post_type'      => 'path',
        'author'         => wp_get_current_user()->ID,
        'meta_key'       => 'path_uri',
        'orderby'        => 'meta_value',
        'order'          => 'asc',
        'meta_query'     => array(
          array(
            'key'     => 'path_web_service_id',
            'value'   => (int) $web_service_id,
            // 'compare' => 'IN',
          ),
        ),
      )
    ) );
  }

  public static function getOperationsByPath ( $path_id, $query = array() ) {
    return new WP_Query( array_merge(
      array ( 'posts_per_page' => 100 ),
      $query,
      array(
        'post_type'      => 'operation',
        'author'         => wp_get_current_user()->ID,
        'meta_key'       => 'operation_name',
        'orderby'        => 'meta_value',
        'order'          => 'asc',
        'meta_query'     => array(
          array(
            'key'     => 'operation_path_id',
            'value'   => (int) $path_id,
            // 'compare' => 'IN',
          ),
        ),
      )
    ) );
  }

  public static function getModelsByLogicGroup ( $logic_group_id, $query = array() ) {
    return new WP_Query( array_merge(
      array ( 'posts_per_page' => 100 ),
      $query,
      array(
        'post_type'      => 'model',
        'author'         => wp_get_current_user()->ID,
        'meta_key'       => 'model_name',
        'orderby'        => 'meta_value',
        'order'          => 'asc',
        'meta_query'     => array(
          array(
            'key'     => 'model_logic_group_id',
            'value'   => (int) $logic_group_id,
            // 'compare' => 'IN',
          ),
        ),
      )
    ) );
  }

  public static function getAttributesByModel ( $model_id, $query = array() ) {
    return new WP_Query( array_merge(
      array ( 'posts_per_page' => 100 ),
      $query,
      array(
        'post_type'      => 'attribute',
        'author'         => wp_get_current_user()->ID,
        'meta_key'       => 'attribute_name',
        'orderby'        => 'meta_value',
        'order'          => 'asc',
        'meta_query'     => array(
          array(
            'key'     => 'attribute_model_id',
            'value'   => (int) $model_id,
            // 'compare' => 'IN',
          ),
        ),
      )
    ) );
  }

  public static function getCommandsByLogicGroup ( $logic_group_id, $query = array() ) {
    return new WP_Query( array_merge(
      array ( 'posts_per_page' => 100 ),
      $query,
      array(
        'post_type'      => 'command',
        'author'         => wp_get_current_user()->ID,
        'meta_key'       => 'command_name',
        'orderby'        => 'meta_value',
        'order'          => 'asc',
        'meta_query'     => array(
          array(
            'key'     => 'command_logic_group_id',
            'value'   => (int) $logic_group_id,
            // 'compare' => 'IN',
          ),
        ),
      )
    ) );
  }

  public static function getQueriesByLogicGroup ( $logic_group_id, $query = array() ) {
    return new WP_Query( array_merge(
      array ( 'posts_per_page' => 100 ),
      $query,
      array(
        'post_type'      => 'query',
        'author'         => wp_get_current_user()->ID,
        'meta_key'       => 'query_name',
        'orderby'        => 'meta_value',
        'order'          => 'asc',
        'meta_query'     => array(
          array(
            'key'     => 'query_logic_group_id',
            'value'   => (int) $logic_group_id,
            // 'compare' => 'IN',
          ),
        ),
      )
    ) );
  }
}
