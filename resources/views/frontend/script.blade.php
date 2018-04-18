<!-- Load JS here for greater good =============================-->
<script src="/frontend/js/jquery-1.11.3.min.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
<script src="/frontend/js/jquery.scrollTo-min.js"></script>
<script src="/frontend/js/jquery.magnific-popup.min.js"></script>
<script src="/frontend/js/plugins.js"></script>
<script src="/frontend/js/custom.js"></script>

<script src="/frontend/calendar/js/moment.min.js"></script>
<script src="/frontend/calendar/js/fullcalendar.js"></script>

<!-- REVOLUTION JS FILES -->
<script src="/frontend/js/rev-slider.js"></script>
<script type="text/javascript" src="/frontend/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/frontend/revolution/js/jquery.themepunch.revolution.min.js"></script>

<script type="text/javascript" src="/frontend/slider/js/jquery.slicebox.js"></script>
<script type="text/javascript">
    $(function() {

        var Page = (function() {

            var $navArrows = $( '#nav-arrows' ).hide(),
                $navOptions = $( '#nav-options' ).hide(),
                $shadow = $( '#shadow' ).hide(),
                slicebox = $( '#sb-slider' ).slicebox( {
                    onReady : function() {
                        $navArrows.show();
                        $navOptions.show();
                        $shadow.show();
                        slicebox.play();
                    },
                    orientation : 'h',
                    cuboidsCount : 3
                } ),

                init = function() {
                    initEvents();
                },
                initEvents = function() {

                    // add navigation events
                    $navArrows.children( ':first' ).on( 'click', function() {

                        slicebox.next();
                        return false;

                    } );

                    $navArrows.children( ':last' ).on( 'click', function() {

                        slicebox.previous();
                        return false;

                    } );

                    $( '#navPlay' ).on( 'click', function() {

                        slicebox.play();
                        return false;

                    } );

                    $( '#navPause' ).on( 'click', function() {

                        slicebox.pause();
                        return false;

                    } );

                };

            return { init : init };

        })();

        Page.init();

    });
</script>


<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
    (Load Extensions only on Local File Systems !
    The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="/frontend/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="/frontend/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="/frontend/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="/frontend/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="/frontend/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="/frontend/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="/frontend/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="/frontend/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="/frontend/revolution/js/extensions/revolution.extension.video.min.js"></script>

<!-- SLIDER REVOLUTION WHITEBOARD ADD ON -->
<script type="text/javascript" src="/frontend/js/revolution.addon.whiteboard.min.js"></script>