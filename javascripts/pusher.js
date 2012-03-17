Pusher.log = function(msg) {
  if(console && console.log) {
    console.log(msg);
  }
}
var pusher = new Pusher(PUSHER_APP_KEY);
var channel = pusher.subscribe('prototype-answers');
channel.bind('new_answer', newAnswerReceived);

function newAnswerReceived(data) {
 /*
 {
   answer: 'student answer',
   phoneNumber: '+44',
   
 }
 */
 alert( JSON.stringify(data) );
}