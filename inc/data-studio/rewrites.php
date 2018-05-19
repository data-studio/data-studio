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

add_action( 'init', 'data_studio_rewrite' );

function data_studio_rewrite () {
  add_rewrite_rule(
    '^app/(.+)/$',
    'index.php?post_type=app&p=$matches[1]',
    'top'
  );

  add_rewrite_rule(
    '^logic-group/(.+)/models/$',
    'index.php?post_type=model&meta_key=model_logic_group_id&meta_value=$matches[1]',
    'top'
  );

  add_rewrite_rule(
    '^logic-group/(.+)/commands/$',
    'index.php?post_type=command&meta_key=command_logic_group_id&meta_value=$matches[1]',
    'top'
  );

  add_rewrite_rule(
    '^logic-group/(.+)/queries/$',
    'index.php?post_type=query&meta_key=query_logic_group_id&meta_value=$matches[1]',
    'top'
  );

  add_rewrite_rule(
    '^logic-group/(.+)/$',
    'index.php?post_type=logic_group&p=$matches[1]',
    'top'
  );

  add_rewrite_rule(
    '^web-service/(.+)/$',
    'index.php?post_type=web_service&p=$matches[1]',
    'top'
  );

  add_rewrite_rule(
    '^model/(.+)/$',
    'index.php?post_type=model&p=$matches[1]',
    'top'
  );

  add_rewrite_rule(
    '^attribute/(.+)/$',
    'index.php?post_type=attribute&p=$matches[1]',
    'top'
  );

  add_rewrite_rule(
    '^command/(.+)/$',
    'index.php?post_type=command&p=$matches[1]',
    'top'
  );

  add_rewrite_rule(
    '^query/(.+)/$',
    'index.php?post_type=query&p=$matches[1]',
    'top'
  );
}
