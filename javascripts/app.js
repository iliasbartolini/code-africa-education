/* Foundation v2.2 http://foundation.zurb.com */
jQuery(document).ready(function ($) {

  // $('#questionForm').submit(questionSubmitted);
  //   
  // function questionSubmitted() {
  //   var form = $(this);
  //   var action = form.attr('action');
  //   
  //   
  //   return false;
  // }


  /* Use this js doc for all application specific JS */

  /* TABS --------------------------------- */
  /* Remove if you don't need :) */

  function activateTab($tab) {
    var $activeTab = $tab.closest('dl').find('a.active'), contentLocation = $tab.attr("href") + 'Tab';

    //Make Tab Active
    $activeTab.removeClass('active');
    $tab.addClass('active');

    //Show Tab Content
    $(contentLocation).closest('.tabs-content').children('li').hide();
    $(contentLocation).css('display', 'block');
  }

  $('dl.tabs').each(function () {
    //Get all tabs
    var tabs = $(this).children('dd').children('a');
    tabs.click(function (e) {
      activateTab($(this));
    });
  });

  if (window.location.hash) {
    activateTab($('a[href="' + window.location.hash + '"]'));
  }

  /* ALERT BOXES ------------ */
  $(".alert-box").delegate("a.close", "click", function (event) {
    event.preventDefault();
    $(this).closest(".alert-box").fadeOut(function (event) {
      $(this).remove();
    });
  });


  /* PLACEHOLDER FOR FORMS ------------- */
  /* Remove this and jquery.placeholder.min.js if you don't need :) */

  if( $('input, textarea').placeholder ) {
    $('input, textarea').placeholder();
  }

  /* TOOLTIPS ------------ */
  if( $(this).tooltips ) {
    $(this).tooltips();
  }

  var options = {
    url:'twilio_sendsms.php',
    success: questionsSubmitSuccessHandler,
    beforeSubmit: beforeSubmitHandler
  };

  $('#send-sms').ajaxForm(options);
  
  function questionsSubmitSuccessHandler() {
    $('#send-sms input[type="submit"]').slideUp();
  }
  
  function beforeSubmitHandler() {
    $('#send-sms input[type="submit"]')
    .val('Submitting')
    .attr('readonly', 'readonly');
  }

  /* DROPDOWN NAV ------------- */

  var lockNavBar = false;
  $('.nav-bar a.flyout-toggle').live('click', function (e) {
    e.preventDefault();
    var flyout = $(this).siblings('.flyout');
    if (lockNavBar === false) {
      $('.nav-bar .flyout').not(flyout).slideUp(500);
      flyout.slideToggle(500, function () {
        lockNavBar = false;
      });
    }
    lockNavBar = true;
  });
  if ( window['Modernizr'] && Modernizr.touch) {
    $('.nav-bar>li.has-flyout>a.main').css({
      'padding-right':'75px'
    });
    $('.nav-bar>li.has-flyout>a.flyout-toggle').css({
      'border-left':'1px dashed #eee'
    });
  } else {
    $('.nav-bar>li.has-flyout').hover(function () {
      $(this).children('.flyout').show();
    }, function () {
      $(this).children('.flyout').hide();
    })
  }


  /* DISABLED BUTTONS ------------- */
  /* Gives elements with a class of 'disabled' a return: false; */


});
