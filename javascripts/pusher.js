Pusher.log = function (msg) {
  if (console && console.log) {
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
  $input_field
    .parents('tr')
      .removeClass('unanswered')
      .addClass('correct');
  $(this)
    .parents('td.indicator')
    .text('Y');
  $(this)
    .parents('td.answer')
    .text(answer);
}

function mark_input_incorrect($input_field, answer) {
  $input_field
    .parents('tr')
      .removeClass('unanswered')
      .addClass('incorrect');
  $(this)
    .parents('td.indicator')
    .text('N');
  $(this)
    .parents('td.answer')
    .text(answer);
}
