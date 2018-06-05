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


/**
 *
 * Disable Feed
 *
 */

function eviratec_web_disable_feed () {
  wp_die( __(
    'No feed available, please visit our <a href="' . esc_url( home_url() )
      . '">homepage</a>!'
  ) );
}

add_action('do_feed',                 'eviratec_web_disable_feed', 1);
add_action('do_feed_rdf',             'eviratec_web_disable_feed', 1);
add_action('do_feed_rss',             'eviratec_web_disable_feed', 1);
add_action('do_feed_rss2',            'eviratec_web_disable_feed', 1);
add_action('do_feed_atom',            'eviratec_web_disable_feed', 1);
add_action('do_feed_comments',        'eviratec_web_disable_feed', 1);
add_action('do_feed_rss_comments',    'eviratec_web_disable_feed', 1);
add_action('do_feed_rss2_comments',   'eviratec_web_disable_feed', 1);
add_action('do_feed_atom_comments',   'eviratec_web_disable_feed', 1);
