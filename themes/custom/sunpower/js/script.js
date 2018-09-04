/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */
(function ($) {
  'use strict'

  // Nav toggle.
  Drupal.behaviors.nav_toggle = {
    attach: function (context, settings) {
      var navToggle = $('.nav-toggle', context)

      navToggle.click(function (event) {
        $(this).toggleClass('is-active', context)
        $('body').toggleClass('is-navigation-expanded', context)
        event.preventDefault()
      })
    }
  }

  // Menu order.
  Drupal.behaviors.nav_menu_order = {
    attach: function (context, settings) {
      if ($(window).width() < 720) {
        $('#block-sunpower-main-menu ul.menu-level-1', context)
          .find('li.menu-item--expanded', context)
          .appendTo('#block-sunpower-main-menu ul.menu-level-1', context)
      }
    }
  }
}(jQuery))
