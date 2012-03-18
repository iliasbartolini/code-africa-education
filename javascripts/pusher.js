Pusher.log = function (msg) {
  if (window.console != 'undefined') {
    console.log(msg);
  }
}
var pusher = new Pusher(PUSHER_APP_KEY);
var channel = pusher.subscribe('prototype-answers');
channel.bind('new_answer', newAnswerReceived);

function newAnswerReceived(data) {
  // data.From
  // 447951432567

  var answer = $('textarea#answer').val();

  $('[name="phone[]"]').each(function () {
    var page_nr = $(this).val();
    if (page_nr == data.From) {
      if (answer == data.Body) {
        // correct answer
        mark_input_correct($(this), data.Body);
      }
      else {
        // wrong answer!
        mark_input_incorrect($(this), data.Body);
      }
    }

    return;
  });


  //alert( JSON.stringify(data) );
}

function mark_input_correct($input_field, answer) {
  var $parent =  $input_field.parents('tr');

  $parent
   .removeClass('unanswered')
   .removeClass('incorrect')
   .addClass('correct');

  $parent
    .find('td.answer')
    .text(answer);
}

function mark_input_incorrect($input_field, answer) {
  var $parent =  $input_field.parents('tr');

  $parent
   .removeClass('unanswered')
   .removeClass('correct')
   .addClass('incorrect');

  $parent
    .find('td.answer')
    .text(answer);
}
