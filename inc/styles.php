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

add_action("init", "eviratec_web_enqueue_styles");
add_action("admin_init", "eviratec_web_enqueue_admin_styles");

function eviratec_web_enqueue_styles () {
  if (!is_admin()) {
    wp_enqueue_style(
      "material-icons",
      "https://fonts.googleapis.com/icon?family=Material+Icons"
    );
    wp_enqueue_style(
      "roboto-font",
      "https://fonts.googleapis.com/css?family=Roboto:100,300,400,500"
    );
    wp_enqueue_style(
      "eviratec-web",
      get_stylesheet_uri(),
      array(),
      "1.0.7"
    );
  }
}

function eviratec_web_enqueue_admin_styles () {
  wp_enqueue_style(
    "eviratec-web-admin-styles",
    get_stylesheet_directory_uri() . "/admin-style.css"
  );
}
