<?php
/**
 * Copyright (c) 2018 Callan Peter Milne
 *
 * Permission to use, copy, modify, and/or distribute this software for any
 * purpose with or without fee is hereby granted, provided that the above
 * copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED 'AS IS' AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
 * REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
 * INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
 * LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
 * OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
 * PERFORMANCE OF THIS SOFTWARE.
 */

add_action( 'wp_ajax_nopriv_data_studio', 'data_studio_nopriv_ajax' );
add_action( 'wp_ajax_data_studio', 'data_studio_ajax' );

function data_studio_nopriv_ajax () {
  $response = json_encode( $_REQUEST );

  header( 'Content-Type: application/json;charset=utf-8' );

  print json_encode([
    'Error' => 'Login required',
    'Echo' => $response,
  ]);

  wp_die();
}

// wp-admin/admin-ajax.php?action=data_studio
function data_studio_ajax () {
  $response = json_encode( $_REQUEST );



  try {
    switch ( $_REQUEST['type'] ) {
      case 'createApp':
        $response = DataStudioCmd::createApp(
           $_REQUEST['args']['AppName']
        );
        wp_die();
        break;

      case 'createLogicGroup':
        $response = DataStudioCmd::createLogicGroup(
           $_REQUEST['args']['LogicGroupAppID'],
           $_REQUEST['args']['LogicGroupName']
        );
        wp_die();
        break;

      case 'createWebService':
        $response = DataStudioCmd::createWebService(
           $_REQUEST['args']['WebServiceAppID'],
           $_REQUEST['args']['WebServiceName']
        );
        wp_die();
        break;

      case 'createModel':
        $response = DataStudioCmd::createModel(
           $_REQUEST['args']['ModelLogicGroupID'],
           $_REQUEST['args']['ModelName']
        );
        wp_die();
        break;

      case 'createAttribute':
        $response = DataStudioCmd::createAttribute(
           $_REQUEST['args']['AttributeModelID'],
           $_REQUEST['args']['AttributeName']
        );
        wp_die();
        break;

      case 'createCommand':
        $response = DataStudioCmd::createCommand(
           $_REQUEST['args']['CommandLogicGroupID'],
           $_REQUEST['args']['CommandName']
        );
        break;

      case 'createQuery':
        $response = DataStudioCmd::createQuery(
           $_REQUEST['args']['QueryLogicGroupID'],
           $_REQUEST['args']['QueryName']
        );
        break;

      case 'getLogicGroupsByApp':
        // &type=getEvents&offset=8
        $logic_groups = DataStudioQuery::getLogicGroupsByApp(
          $_REQUEST['app_id'],
          [
            'offset' => $_REQUEST['offset'],
          ]
        );
        // $response = [
        //   $events->posts,
        //   $events->post_count,
        // ];
        header( 'Content-Type: text/html;charset=utf-8' );
        ?>
        <?php if ($logic_groups->have_posts()) : ?>
        <?php while ($logic_groups->have_posts()) : ?>
          <?php $logic_groups->the_post(); ?>
          <?php get_template_part( 'parts/lists/logic_group-list-item'); ?>
        <?php endwhile; endif; ?>
        <?php
        wp_die();
        break;

      case 'getModelsByLogicGroup':
        // &type=getEvents&offset=8
        $models = DataStudioQuery::getModelsByLogicGroup(
          $_REQUEST['logic_group_id'],
          [
            'offset' => $_REQUEST['offset'],
          ]
        );
        // $response = [
        //   $events->posts,
        //   $events->post_count,
        // ];
        header( 'Content-Type: text/html;charset=utf-8' );
        ?>
        <?php if ($models->have_posts()) : ?>
        <?php while ($models->have_posts()) : ?>
          <?php $models->the_post(); ?>
          <?php get_template_part( 'parts/lists/model-list-item'); ?>
        <?php endwhile; endif; ?>
        <?php
        wp_die();
        break;

      case 'getAttributesByModel':
        // &type=getEvents&offset=8
        $attributes = DataStudioQuery::getAttributesByModel(
          $_REQUEST['model_id'],
          [
            'offset' => $_REQUEST['offset'],
          ]
        );
        // $response = [
        //   $events->posts,
        //   $events->post_count,
        // ];
        header( 'Content-Type: text/html;charset=utf-8' );
        ?>
        <?php if ($attributes->have_posts()) : ?>
        <?php while ($attributes->have_posts()) : ?>
          <?php $attributes->the_post(); ?>
          <?php get_template_part( 'parts/lists/attribute-list-item'); ?>
        <?php endwhile; endif; ?>
        <?php
        wp_die();
        break;

      case 'getCommandsByLogicGroup':
        // &type=getEvents&offset=8
        $commands = DataStudioQuery::getCommandsByLogicGroup(
          $_REQUEST['logic_group_id'],
          [
            'offset' => $_REQUEST['offset'],
          ]
        );
        // $response = [
        //   $events->posts,
        //   $events->post_count,
        // ];
        header( 'Content-Type: text/html;charset=utf-8' );
        ?>
        <?php if ($commands->have_posts()) : ?>
        <?php while ($commands->have_posts()) : ?>
          <?php $commands->the_post(); ?>
          <?php get_template_part( 'parts/lists/command-list-item'); ?>
        <?php endwhile; endif; ?>
        <?php
        wp_die();
        break;

      case 'getQueriesByLogicGroup':
        // &type=getEvents&offset=8
        $queries = DataStudioQuery::getQueriesByLogicGroup(
          $_REQUEST['logic_group_id'],
          [
            'offset' => $_REQUEST['offset'],
          ]
        );
        // $response = [
        //   $events->posts,
        //   $events->post_count,
        // ];
        header( 'Content-Type: text/html;charset=utf-8' );
        ?>
        <?php if ($queries->have_posts()) : ?>
        <?php while ($queries->have_posts()) : ?>
          <?php $queries->the_post(); ?>
          <?php get_template_part( 'parts/lists/query-list-item'); ?>
        <?php endwhile; endif; ?>
        <?php
        wp_die();
        break;
    }

    header( 'Content-Type: application/json;charset=utf-8' );

    print json_encode( [
      'Success' => true,
      'Result' => $response,
      'Echo' => json_encode( $_REQUEST ),
    ] );
  }
  catch (Exception $e) {
    print json_encode( [
      'Error' => true,
      'Message' => $e->getMessage(),
    ] );
  }

  wp_die();
}
