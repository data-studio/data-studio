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

class MoneyCmd {
  public function __construct () {

  }

  public static function createWallet ( $name ) {
    $wallet_id = null;

    $wallet_id = wp_insert_post(array(
      'post_author'  => wp_get_current_user()->ID,
      'post_content' => $name,
      'post_title'   => $name,
      'post_status'  => 'publish',
      'post_type'    => 'wallet',
    ));

    update_field( 'wallet_name', $name, $wallet_id );
    update_field( 'wallet_balance', '0.00', $wallet_id );

    return $wallet_id;
  }

  public static function createTransaction ( $wallet_id, $description, $amt, $type = 'CR' ) {
    $transaction_id = null;

    $transaction_id = wp_insert_post(array(
      'post_author'  => wp_get_current_user()->ID,
      'post_content' => $description,
      'post_title'   => $description,
      'post_status'  => 'publish',
      'post_type'    => 'wallet_tx',
    ));

    update_field( 'wallet_id', $wallet_id, $transaction_id );
    update_field( 'transaction_description', $description, $transaction_id );
    update_field( 'transaction_amt', $amt, $transaction_id );
    update_field( 'transaction_type', $type, $transaction_id );

    update_field(
      'wallet_balance',
      floatval(get_field( 'wallet_balance', $wallet_id )) + floatval(( 'CR' === $type ? $amt : -$amt )),
      $wallet_id
    );

    return $transaction_id;
  }

  public static function setWalletName ( $wallet_id, $new_value ) {
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $wallet_id ) ) {
      return;
    }
    update_field( 'wallet_name', $new_value, $wallet_id );
  }

  public static function deleteWallet ( $wallet_id ) {
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $wallet_id ) ) {
      return;
    }

  }

  public static function deleteTransaction ( $transaction_id ) {
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $transaction_id ) ) {
      return;
    }

  }
}
