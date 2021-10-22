<div class="advertorial-section">
    <div id="slides">
        <a href="/getbeta"><img width="100%" src="{{asset('/images/beta_add.png')}}"></a>
        <a href="#2"><img width="100%" src="{{asset('/images/itemmall_add.png')}}"></a>

    </div>
</div>

<script>
    $(function () {
        $("#slides").slidesjs({
            width: 300,
            height: 350,
            navigation: {
                active: false,
                effect: "slide"
            },
            pagination: {
                active: false,
                effect: "slide"
            },
            play: {
                active: false,
                // [boolean] Generate the play and stop buttons.
                // You cannot use your own buttons. Sorry.
                effect: "slide",
                // [string] Can be either "slide" or "fade".
                interval: 5000,
                // [number] Time spent on each slide in milliseconds.
                auto: true,
                // [boolean] Start playing the slideshow on load.
                swap: true,
                // [boolean] show/hide stop and play buttons
                pauseOnHover: true,
                // [boolean] pause a playing slideshow on hover
                restartDelay: 2500
                // [number] restart delay on inactive slideshow
            }
        });
    });
</script>