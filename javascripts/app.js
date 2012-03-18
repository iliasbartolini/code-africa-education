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
		var $activeTab = $tab.closest('dl').find('a.active'),
				contentLocation = $tab.attr("href") + 'Tab';

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
	$(".alert-box").delegate("a.close", "click", function(event) {
    event.preventDefault();
	  $(this).closest(".alert-box").fadeOut(function(event){
	    $(this).remove();
	  });
	});


	/* PLACEHOLDER FOR FORMS ------------- */
	/* Remove this and jquery.placeholder.min.js if you don't need :) */

	$('input, textarea').placeholder();

	/* TOOLTIPS ------------ */
	$(this).tooltips();

var getResults = function() {

        //   $.getJSON('twilio_sendsms.php', function(data) {
        //   var items = [];
        //   try{
        //   	$('.form-wrapper').hide();
        //   	console.log('success!');
        //     $.each(data, function(key,val)){
        //       items.push('<li>'+ key +': '+ val +'</li>')
        //     }
        //   } catch (err) {
        //       console.log('error:'+ err);
        //   }

        //   $('<ul/>', {
        //     'class': 'results-list',
        //     html: items.join('')
        //   }).appendTo('body');
        // });

  /* attach a submit handler to the form */
  // $("#send-sms").submit(function(event) {

  //   /* stop form from submitting normally */
  //   event.preventDefault(); 
        
  //   /* get some values from elements on the page: */
  //   var $form = $( this ),
  //       term = $form.find( 'input[name="s"]' ).val(),
  //       url = $form.attr( 'action' );

  //   /* Send the data using post and put the results in a div */
  //   $.post( url, { s: term },
  //     function( data ) {
  //         var content = $( data ).find( '#content' );
  //         $( "#result" ).empty().append( content );
  //     }
  //   );
  // });
				var options = { 
			    target:     '#content', 
			    url:        'twilio_sendsms.php', 
			    success:    function() { 
			    console.log('Form Submitted');
                $('.form-wrapper').fadeOut();

                $('#content').append('<p class="message">Message sent successfully!</p>');
			    } 
			};

            $('#send-sms').ajaxForm(options);

}

	/* UNCOMMENT THE LINE YOU WANT BELOW IF YOU WANT IE6/7/8 SUPPORT AND ARE USING .block-grids */
//	$('.block-grid.two-up>li:nth-child(2n+1)').css({clear: 'left'});
//	$('.block-grid.three-up>li:nth-child(3n+1)').css({clear: 'left'});
//	$('.block-grid.four-up>li:nth-child(4n+1)').css({clear: 'left'});
//	$('.block-grid.five-up>li:nth-child(5n+1)').css({clear: 'left'});

	$('.submit-btn').click(function(event){
		event.preventDefault();
		//$('#send-sms').submit();
		//$(this).parent().submit();

		getResults();
	});

	/* DROPDOWN NAV ------------- */

	var lockNavBar = false;
	$('.nav-bar a.flyout-toggle').live('click', function(e) {
		e.preventDefault();
		var flyout = $(this).siblings('.flyout');
		if (lockNavBar === false) {
			$('.nav-bar .flyout').not(flyout).slideUp(500);
			flyout.slideToggle(500, function(){
				lockNavBar = false;
			});
		}
		lockNavBar = true;
	});
  if (Modernizr.touch) {
    $('.nav-bar>li.has-flyout>a.main').css({
      'padding-right' : '75px'
    });
    $('.nav-bar>li.has-flyout>a.flyout-toggle').css({
      'border-left' : '1px dashed #eee'
    });
  } else {
    $('.nav-bar>li.has-flyout').hover(function() {
      $(this).children('.flyout').show();
    }, function() {
      $(this).children('.flyout').hide();
    })
  }


	/* DISABLED BUTTONS ------------- */
	/* Gives elements with a class of 'disabled' a return: false; */
  

});
