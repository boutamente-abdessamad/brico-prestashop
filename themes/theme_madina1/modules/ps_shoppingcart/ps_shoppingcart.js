/* global $, prestashop */

/**
 * This module exposes an extension point in the form of the `showModal` function.
 *
 * If you want to override the way the modal window is displayed, simply define:
 *
 * prestashop.blockcart = prestashop.blockcart || {};
 * prestashop.blockcart.showModal = function myOwnShowModal (modalHTML) {
 *   // your own code
 *   // please not that it is your responsibility to handle closing the modal too
 * };
 *
 * Attention: your "override" JS needs to be included **before** this file.
 * The safest way to do so is to place your "override" inside the theme's main JS file.
 *
 */

$(document).ready(function () {
  HoverCart();
  prestashop.blockcart = prestashop.blockcart || {};

  var showModal = prestashop.blockcart.showModal || function (modal) {
    var $popup_cart = $('popup_cart');
    $popup_cart.append(modal);
    $popup_cart.one('click', '#blockcart-modal', function (event) {
      if (event.target.id === 'blockcart-modal') {
        $(event.target).remove();
      }
    });
  };

  prestashop.on(
    'updateCart',
    function (event) {
      var refreshURL = $('.blockcart').data('refresh-url');
      var requestData = {};

      if (event && event.reason) {
        requestData = {
          id_product_attribute: event.reason.idProductAttribute,
          id_product: event.reason.idProduct,
          action: event.reason.linkAction
        };
      }

      $.post(refreshURL, requestData).then(function (resp) {
        $('.blockcart').replaceWith(resp.preview);
        HoverCart();
        if (resp.modal) {
          showModal(resp.modal);
        }
        
      }).fail(function (resp) {
        prestashop.emit('handleError', {eventType: 'updateShoppingCart', resp: resp});
      });
    }
  );
});
function HoverCart(){
  var cart_block = new HoverWatcher('.blockcart .button_cart');
  var shopping_cart = new HoverWatcher('.blockcart .popup_cart');
  $(".blockcart .button_cart").hover(
    function(){
      if (parseInt($('.blockcart').attr('data-cartitems')) > 0)
        $(".blockcart .popup_cart").stop(true, true).slideDown(450);
    },
    function(){
      setTimeout(function(){
        if (!shopping_cart.isHoveringOver() && !cart_block.isHoveringOver())
          $(".blockcart .popup_cart").stop(true, true).slideUp(450);
      }, 200);
    }
  );

  $(".blockcart .popup_cart").hover(
    function(){
    },
    function(){
      setTimeout(function(){
        if (!shopping_cart.isHoveringOver())
          $(".blockcart .popup_cart").stop(true, true).slideUp(450);
      }, 200);
    }
  );
}
function HoverWatcher(selector)
{
  this.hovering = false;
  var self = this;

  this.isHoveringOver = function(){
    return self.hovering;
  }

  $(selector).hover(function(){
    self.hovering = true;
  }, function(){
    self.hovering = false;
  })
}
