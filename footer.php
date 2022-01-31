<link rel="stylesheet" href="./assets/styles/footer.css">

<footer style="height: 24vh; background: #efefef;">
    <center>
        <div class="footerdiv">
            Copyright All Right Reserved ! <a href="https://neeswebservices.business.site/">Nees web services </a>
            <div class="social">
                <a href="https://www.facebook.com/techneesofficial17/" target="_blank" class="fb">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com/tech_nees_official/" target="_blank" class="fb">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.twitter.com/neeschalyt" target="_blank" class="td">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.youtube.com/channel/UCP013FdEq1ti7fz1y78v1eg" target="_blank" class="fb">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="mailto:neeswebservices@gmail.com" target="_blank" class="td">
                    <i class="fas fa-envelope"></i>
                </a>
                <a href="http://nees.eu5.net/" target="_blank" class="fb">
                    <i class="fas fa-globe"></i>
                </a>
                <a href="tel:+9779803104764" target="_blank" class="td">
                    <i class="fas fa-phone"></i>
                </a>
            </div>
        </div>

    </center>
</footer>
</div>
<script src='./apps/jquery.js'></script>
<script>
$(document).ready(function() {


    $('#navbtn').on('click', function() {
        $('.tabs').css('transform', 'translateX(0%)');
        $('#navbtn').css('display', 'none');
        $('#navbtnclose').css('display', 'block');
        $('#navbtnclose').css('display', 'flex');

    })
    $('#navbtnclose').on('click', function() {
        $('.tabs').css('transform', 'translateX(100%)');
        $('#navbtnclose').css('display', 'none');
        $('#navbtn').css('display', 'block');
        $('#navbtn').css('display', 'flex');
    })


    const checkonlinestatus = async () => {
        try {
            const online = await fetch('https://jsonplaceholder.typicode.com/todos/1');
            return online.status >= 200 && online.status < 300;
        } catch (err) {
            return false;
        }
    }
    setInterval(async () => {
        const result = await checkonlinestatus();
        if (result == false) {
            $('#offlinebox').css('display', 'block');
            $('#offlinebox').css('display', 'flex');
        }

        if (result == true) {
            $('#offlinebox').css('display', 'none');
        }
    }, 3000);

    function gmailLogout() {
        const auth2 = gapi.auth2.getAuthInstance();
        auth2.gmailLogout().then((res) => {
            console.log(res);
        })
    }



    $(window).scroll(function() {
        var windowTop = $(window).scrollTop(),
            windowHeight = $(window).height(),
            documentHeight = $(document).height();
        const scrolltotop = $('.scrolltotop');
        const pause = $('#stopautoscroll');
        var widthproperty = (windowTop / (documentHeight - windowHeight)) * 100;
        $('#scrolled').css('width', (widthproperty) + '%');

        if (windowTop > 150) {
            scrolltotop.css('display', 'block');
            scrolltotop.css('display', 'grid');
            pause.css('display', 'block');
            pause.css('display', 'grid');
        } else {
            scrolltotop.css('display', 'none');
            pause.css('display', 'none');
        }

        scrolltotop.on('click', () => {
            $(window).scrollTop(0);
        })
    });
    let scroll = 0;
    let documentwidth = $('.innerbox').innerWidth().toFixed(0);
    let innerboxwidth = $('.innerbox').innerWidth();
    let innerboxtotalwidth = $('.innerbox').innerWidth() + 2000;
    let currentscrollbar = $('.innerbox').scrollLeft();

    function autoscrollleft() {
        let entity = Math.floor((Math.random() * 10) + 1);
        scroll += 300 * entity;
        $('.innerbox').scrollLeft(scroll);
        if (scroll > innerboxtotalwidth) {
            scroll = 0;
            $('.innerbox').scrollLeft(scroll);
        }
    }
    autoscroll = setInterval(autoscrollleft, 10000);


    $(document).on('click', '#pause', () => {
        $('#pause').css('display', 'none');
        $('#play').css('display', 'block');
        clearInterval(autoscroll);
    })

    $(document).on('click', '#play', () => {
        $('#play').css('display', 'none');
        $('#pause').css('display', 'block');
        autoscroll = setInterval(autoscrollleft, 10000);
    })

    $(document).on('click', '#left-scroll', () => {
        scroll = 0;
        let v = $('.innerbox').innerWidth() + 500;
        $('.innerbox').scrollLeft(v);
    })

    $(document).on('click', '#right-scroll', () => {
        scroll = 0;
        $('.innerbox').scrollLeft(0);
    })
})
</script>
</body>

</html>