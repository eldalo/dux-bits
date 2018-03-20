var life         = 100,
    level        = '1',
    play         = true,
    timespeaker  = 0,
    timesnak     = 0,
    timespecial  = 0,
    pause        = false,
    cursors, music,
    player, speakers, snaks, specials;

function onOpen(url) {
    var width   = 510,
        height  = 330,
        left    = (screen.width) ? (screen.width - width) / 2 : 100,
        top     = (screen.height) ? (screen.height - height) / 2 : 100,
        option  = 'toolbar=0, location=0, directories=0, status=0, scrollbars=1, resizable=0, width=' + width + ', left=' + left + ', top=' + top + ', height=' + height + '';

    window.open(url, 'blank', option);
}