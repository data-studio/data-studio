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
 */"use strict";

(function ($, data_studio_ajax_object) {"use strict";
  data_studio_ajax_object = data_studio_ajax_object || {};

  var _ajax_url = data_studio_ajax_object.ajax_url;

  /**
   * Build Preferences Selection
   */
  (function ($) {"use strict";
    $.dsBuildPreferences = function ( _d ) {
      _d = _d || {};
      var preferencesVisible = null;
      var $selectEl = _d.$selectEl;
      var $prefsEls = _d.$prefsEls;
      var buildPrefs = {};
      for (var i = 0; i < $prefsEls.length; i++) {
        initPrefsEl($($prefsEls[i]));
      }
      $selectEl.change(function ($ev) {
        readSelectEl();
      });
      $(document).load(function () {
        readSelectEl();
      });
      function initPrefsEl ($el) {
        var buildType = $el.attr('x-build-type');
        buildPrefs[buildType] = {
          name: buildType,
          $el: $el,
        };
      }
      function togglePreferences () {
        if (true === preferencesVisible) {
          hidePreferences();
          return;
        }
        showPreferences();
      }
      function showPreferences (prefs) {
        prefs.$el.show();
        preferencesVisible = prefs.name;
      }
      function hideAllPreferences () {
        $prefsEls.hide();
        preferencesVisible = null;
      }
      function readSelectEl () {
        var value = $selectEl.val();
        hideAllPreferences();
        showPreferences(buildPrefs[value]);
      }
    };
  })(jQuery);

  /**
   * Form Toggle
   */
  (function ($) {"use strict";
    $.dsFormToggle = function ( _d ) {
      _d = _d || {};
      var $formEl = _d.$formEl;
      var $toggleBtnEl = _d.$toggleBtnEl;
      var formHidden = false;
      hideCreateForm();
      $toggleBtnEl.click(function () {
        toggleCreateForm();
      });
      function toggleCreateForm () {
        if (formHidden) {
          return showCreateForm();
        }
        return hideCreateForm();
      }
      function hideCreateForm () {
        $formEl.hide();
        formHidden = true;
      }
      function showCreateForm () {
        $formEl.show();
        $($formEl.find('input:visible')[0]).focus();
        formHidden = false;
      }
    };
  })($);

  /**
   * AJAX Form
   */
  (function ($) {"use strict";
    $.dsAjaxForm = function ( _d ) {
      _d = _d || {};
      var type = _d.type;
      var $formEl = _d.$formEl || $("<form></form>");
      var onSuccess = _d.onSuccess || function () { };

      $formEl.submit(function ($event) {
        $event.preventDefault();
        submitForm();
      });

      function submitForm () {
        var postUrl = _ajax_url;

        var args = {};
        var dArray = $formEl.serializeArray();

        for (var i = 0; i < dArray.length; i++) {
          args[dArray[i].name] = dArray[i].value;
        }

        var req = $.post(_ajax_url, {
          action: 'data_studio',
          type: type,
          args: args,
        });

        req.success(function (res) {
          console.log(arguments);
          onSuccess(res);
        });

        req.error(function () {
          console.log(arguments);
        });

        req.always(function () {

        });
      }
    };
  })($);

  /**
   * Scroll Feed
   */
  (function ($) {"use strict";
    $.dsScrollFeed = function ( _d ) {
      _d = _d || {};
      var type = _d.type;
      var args = _d.args || {};
      var $loadingEl = _d.$loadingEl || $('<div></div>');
      var $feedEl = _d.$feedEl || $('<ul></ul>');
      var feedItemSelector = _d.feedItemSelector || 'li.card';

      var busy = false;
      var finished = false;

      var offset = 0;
      var lastScrollMax = 0;

      $(document).ready(function () {
        initFeed();
      });

      function isBusy () {
        return true === busy;
      }

      function setBusy ( newValue ) {
        busy = true === newValue ? true : false;
      }

      function isFinished () {
        $loadingEl.hide();
        return true === finished;
      }

      function setFinished ( newValue ) {
        finished = true === newValue ? true : false;
      }

      function initFeed () {
        feed();
        $(window).scroll(function () {
          if (isBusy() || isFinished()) {
            return;
          }

          setBusy(true);

          var a = $(window)[0].scrollY;
          var b = $(window)[0].innerHeight;
          var c = a+b;
          var x = $feedEl.height();

          var needsMore = c > lastScrollMax && c > x;
          if (needsMore) {
            feed();
            console.log($(window), a, b, c, x);
          }

          lastScrollMax = c;
        });
      }

      function feed () {
        refreshOffset();
        var getUrl = _ajax_url
          + '?action=data_studio'
          + '&type=' + type
          + '&offset=' + offset;

        getUrl = appendArgsTo(getUrl);

        var req = $.get(getUrl);

        req.success(function (res) {
          console.log(arguments);
          var $newEls = $(res);
          if (0 === $newEls.length || '' === res.trim()) {
            isFinished();
            return;
          }
          $newEls.appendTo($feedEl);
        });

        req.error(function () {
          console.log(arguments);
        });

        req.always(function () {
          setBusy(false);
        });
      }

      function refreshOffset () {
        offset = $feedEl.find(feedItemSelector).length;
      }

      function appendArgsTo ( url ) {
        var argKeys = Object.keys(args);
        var k = argKeys.length;
        for (var i = 0; i < k; i++) {
          url = url + '&' + argKeys[i] + '=' + args[argKeys[i]];
        }
        return url;
      }
    };

    /**
     * Tab Group
     */
    (function ($) {"use strict";
      $.dsTabGroup = function ( _d ) {
        _d = _d || {};
        var tabs = _d.tabs || [];

        initTabs();

        function initTabs () {
          for (var i = 0; i < tabs.length; i++) {
            initTab(tabs[i]);
          }
          selectTab(tabs[0]);
        }

        function initTab ( tab ) {
          tab.$toggleEl.click(function ( $ev ) {
            $ev.preventDefault();
            selectTab(tab);
          });
        }

        function hideAllTabContent () {
          for (var i = 0; i < tabs.length; i++) {
            hideTabContent(tabs[i]);
          }
        }

        function selectTab ( tab ) {
          hideAllTabContent();
          showTabContent(tab);
          for (var i = 0; i < tabs.length; i++) {
            tabs[i].$toggleEl.removeClass( 'selected' );
            if (tab === tabs[i]) {
              tabs[i].$toggleEl.addClass( 'selected' );
            }
          }
        }

        function showTabContent ( tab ) {
          tab.$contentEl.show();
        }

        function hideTabContent ( tab ) {
          tab.$contentEl.hide();
        }
      };
    })($);
  })($);
})(jQuery, data_studio_ajax_object);
