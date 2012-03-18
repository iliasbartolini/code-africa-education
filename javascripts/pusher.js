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

  $('[name="phone[]"]').each(function () {
    var page_nr = $(this).val();
    if (page_nr == data.From) {
      // @todo: check answer
      $(this).parents('tr').addClass('correct');
      $(this).parents('td.indicator').text('Y');
    }

    return;
  });


  //alert( JSON.stringify(data) );
}
