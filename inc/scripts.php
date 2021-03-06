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

add_action("init", "eviratec_web_enqueue_scripts");

function eviratec_web_enqueue_admin_scripts () {
  if (is_admin()) {
    eviratec_web_enqueue_admin_authed_scripts();
  }
}

function eviratec_web_enqueue_admin_authed_scripts () {

}

function eviratec_web_enqueue_scripts () {
  if (is_admin()) {
    return eviratec_web_enqueue_admin_scripts();
  }
  wp_enqueue_script(
    "main-js",
    get_stylesheet_directory_uri() . "/main.js",
    array( "jquery" ),
    "1.0.11",
    false
  );
  wp_localize_script(
    'main-js',
    'data_studio_ajax_object',
    array(
      'ajax_url' => admin_url( 'admin-ajax.php' )
    )
  );
}
