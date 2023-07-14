import './bootstrap';

// public event example
var channel = Echo.channel('my-public-channel');
channel.listen('.my-public-event', function(data) {
  console.log('.my-public-event : ', JSON.stringify(data));
});

//private event example
var privateChannel = Echo.private('my-private-channel-1');
privateChannel.listen('.my-private-event', function(data) {
  console.log('.my-private-event : ', JSON.stringify(data));
});