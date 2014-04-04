$('document').ready(function()
{
    handle_videos();
    $('.fancy_image').fancybox();
    $('.fancy_link').fancybox({ajax:{'cache':false}});
});



function handle_videos()
{
    var tpl = '<div id="fancyvideo-player" style="width:750px;height:550px;" href="{videopath}"></div>';
    $('a.fancyvideo').each(function()
    {
        $(this).click(function()
        {
            var html = tpl.replace('{videopath}', $(this).attr('href'));
            $.fancybox(html, 
            {
                'autoDimensions': false,
                'width': 800, 
                'height': 600
            });
            flowplayer('fancyvideo-player', '/assets/js/flowplayer/flowplayer.swf', {
                clip: 
                {
                    scaling:'fit',
                    autoPlay:true
                }
            });
            return false;
        });
    });
}