$('document').ready(function()
{
    handle_videos();
    $('.fancy_image').fancybox();
    $('.fancy_link').fancybox();
});



function handle_videos()
{
    var tpl = '<div id="fancyvideo-player"><video><source type="mp4" src="{videopath}" /><track src="/empty.txt" /></video></div><div id="fancyvideo-loader"><img src="/assets/img/loader.gif" /></div>';
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
            $('#fancyvideo-player').flowplayer(
            {
                swf: '/assets/js/flowplayer/flowplayer.swf',
                autoplay: true,
                engine: 'flash'
            }).bind('ready',function(){
                $('#fancyvideo-loader').hide();
                $('#fancyvideo-player').show();
            });
            return false;
        });
    });
}