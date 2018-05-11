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

add_action( 'wp_ajax_nopriv_eviratec_money', 'eviratec_money_nopriv_ajax' );
add_action( 'wp_ajax_eviratec_money', 'eviratec_money_ajax' );

function eviratec_money_nopriv_ajax () {
  $response = json_encode( $_REQUEST );

  header( 'Content-Type: application/json;charset=utf-8' );

  print json_encode([
    'Error' => 'Login required',
    'Echo' => $response,
  ]);

  wp_die();
}

// wp-admin/admin-ajax.php?action=eviratec_money
function eviratec_money_ajax () {
  $response = json_encode( $_REQUEST );



  try {
    switch ( $_REQUEST['type'] ) {
      case 'createWallet':
        $response = MoneyCmd::createWallet(
           $_REQUEST['summary'],
           explode( ',', $_REQUEST['tags'] )
        );
        break;

      case 'getTransactionsByWallet':
        // &type=getEvents&offset=8
        $events = MoneyQuery::getTransactionsByWallet( [
          'offset' => $_REQUEST['offset'],
        ] );
        // $response = [
        //   $events->posts,
        //   $events->post_count,
        // ];
        header( 'Content-Type: text/html;charset=utf-8' );
        ?>
        <?php if ($events->have_posts()) : while ($events->have_posts()) : ?>
          <?php $events->the_post(); ?>
            <?php if ( !in_array( get_the_time('M Y'), $days ) ) : ?>
            <?php $days[count($days)] = get_the_time('M Y'); ?>
            <li class="card-group-heading">
              <h3>
                <span><?php the_time('M Y'); ?></span>
              </h3>
            </li>
            <?php endif; ?>
            <?php get_template_part( 'parts/lists/transaction-list-item'); ?>
          <?php endwhile; endif; ?>
      <?php
      wp_die();
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
