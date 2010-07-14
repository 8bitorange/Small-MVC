<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>:: Autolux :: {$title_for_page}</title>
    <!-- include main css -->
    <link href="index.php?url=css/main.css" rel="stylesheet" type="text/css">
    <!-- include ui css -->
    <link href="/css/smoothness/jquery-ui-1.8.2.custom.css" rel="stylesheet" type="text/css">
    
    <!--[if lt IE 9]>
    <link href="/css/ie.css" rel="stylesheet" type="text/css">
    <![endif]-->
    
    
    <!-- load jquery and jquery ui -->
    <script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui-1.8.2.custom.min.js"></script>
</head>

<body>

    <!--Open Header-->
    <div id="header" class="clearfix">
        <h1 id="logo">Autolux</h1>
    </div>
    
    <!--Open Nav-->
    <div id="nav">
        {$nav}
    </div>
    
    <!--Open Content-->
    <div id="content" class="clearfix">
        {$content_for_layout}
    </div>
    
    <!--Open Footer-->
    <div id="footer" class="clearfix">
    
        <!--uses sprites to animate hover-->
        <ul id="social">
            <li><a id="facebook" href="http://www.facebook.com/pages/Autolux/113041775625?sid=60050e891e9e4e23edd4fc6e072bfb02&ref=s"><span>Facebook</span></a></li>
            <li><a id="myspace" href="http://www.myspace.com/autolux"><span>Myspace</span></a></li>
            <li><a id="twitter" href="https://twitter.com/autolux101"><span>Twitter</span></a></li>
            <li><a id="lastfm" href="http://last.fm/music/autolux"><span>Last.fm</span></a></li>
        </ul>
    </div>
    
    {literal}
    <script type="text/javascript">
        $(document).ready(function(){
        
            $("#nav a")
                .mouseover(function(){
                    $(this).animate({
                        opacity: .5
                    }, 500);
                })
                .mouseout(function(){
                    $(this).stop().animate({
                        opacity: 1
                    }, 500);
                });
        
            $("#social a")
                .mouseover(function(){
                    $(this)
                        .css("background-position-y", "-32px")
                        .animate({
                            backgroundPositionY: "+=32px"
                        },250);
                }).
                mouseout(function(){
                    $(this).animate({
                        backgroundPositionY: "-32px"
                    }, 250)
                });
        
        });
    </script>
    {/literal}
    
</body>

</html>