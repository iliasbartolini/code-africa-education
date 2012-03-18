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

  });
  // $('[name="phone[]"]').val()


  // alert( JSON.stringify(data) );
}
