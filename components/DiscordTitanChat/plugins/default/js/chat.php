$(document).ready(function() {
  adjustChatSizing();
});
$(window).resize(function() {
  adjustChatSizing();
});

function adjustChatSizing() {
  var topbarHeight = $('.topbar').css('height');
  var containerFluidHeight = $('.topbar .container-fluid').css('height');
  var diff = parseInt(containerFluidHeight) - parseInt(topbarHeight);
  var windowHeight = $(window).height();
  var maxHeight = parseInt(windowHeight) - parseInt(topbarHeight);
  $('iframe#discordchat').css({'max-height': maxHeight + 'px', 'margin-top': '-' + diff + 'px'});
}
