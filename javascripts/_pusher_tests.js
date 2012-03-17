$(pusherTestsInit);

function pusherTestsInit() {
  $(document.body).dblclick(sendFakeEvent);
};

function sendFakeEvent() {
  var fakeData = {
     answer: 'student answer',
     phoneNumber: '+44'
   };
   
   Pusher.instances[0].channel('prototype-answers').emit('new_answer', fakeData);
}