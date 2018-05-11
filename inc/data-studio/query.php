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

class MoneyQuery {
  public function __construct () {

  }
  public static function getWallets ( $query = array() ) {
    return new WP_Query( array_merge(
      array ( 'posts_per_page' => 100 ),
      $query,
      array(
        'post_type'      => 'wallet',
        'author'         => wp_get_current_user()->ID,
      )
    ) );
  }
  public static function getTransactionsByWallet ( $wallet_id, $query = array() ) {
    return new WP_Query( array_merge(
      array ( 'posts_per_page' => 100 ),
      $query,
      array(
        'post_type'      => 'wallet_tx',
        'author'         => wp_get_current_user()->ID,
        'meta_key'       => 'wallet_id',
        'meta_value'     => (int) $wallet_id,
      )
    ) );
  }
}
