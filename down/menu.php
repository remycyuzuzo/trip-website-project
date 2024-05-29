<style>
    /* menu */
    hr {
        margin: 0;
    }

    header h6 i {
        float: left;
        font-size: 24px;
        margin: 0;
        margin-top: 0px;
        margin-right: 0px;
        margin-right: 10px;
        margin-top: 5px;
    }

    header h6 span {
        overflow: hidden;
        display: block;
        float: left;
        font-size: 12px;
        line-height: 18px;
    }

    #default2.fixed-top {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #222;
    }

    header .logo-cont {
        margin-top: auto;
    }

    #logo-small img {
        max-height: 40px;
    }

    #logo-small {
        display: none;
    }

    img.logo {
        max-height: 100px;
        border-radius: 10px;
    }

    /* end of menu */
</style>
<header class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1 m-auto d-none d-lg-block">
                <img class="logo" src="musanze.jpg" alt="Musanze F.C Official Logo">
            </div>
            <div class="col-md-12 col-lg-9">
                <nav class="navbar navbar-expand-md navbar-light bg-light ">
                    <ul class="navbar-nav">
                        <li class="nav-item p-3">
                            <h6><i class="fa fa-map-marker"></i> <span><strong>Житомир, пр. Мира 16, оф. 1</strong><br>10020, а/я 99, КЦ "Net-City"</span></h6>
                        </li>
                        <li class="nav-item p-3">
                            <h6><i class="fa fa-phone"></i> <span><strong><span class="ringo-phone">+38 (999) 999 9999</span></strong><br> <a href="#" class="callback-ringo">Перезвоните мне</a></span></h6>
                        </li>
                        <li class="nav-item p-3">
                            <h6><i class="fas fa-envelope-open-text"></i> <span><strong>support@net-city.net</strong><br>24/7 поддержка по email</span></h6>
                        </li>
                        <li class="nav-item p-3">
                            <h6><i class="far fa-comment-alt"></i> <span><strong>Чат</strong><br><a href="#" class="jsBillChat" target="_self">Спросить </a></span></h6>
                        </li>
                    </ul>
                </nav>
                <hr>

                <nav id="default2" class="navbar navbar-expand-md navbar-light bg-light default2">
                    <div id="nav-size" class="container-fuil">
                        <div class="row">
                            <div class="d-sm-block d-md-none">
                                <a class="navbar-brand" href="#">Musanze FC</a>
                            </div>


                            <a id='logo-small' class="navbar-brand" href="#"><img src="musanze.jpg" alt="Musanze FC Logo"></a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Главная <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Тарифы и услуги</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Абонентам</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Компания</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fas fa-sign-in-alt"></i> Личный кабинет </a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav navbar-right">
                                    <li class="nav-item active"> <a href="#" class="nav-link">укр</a></li>
                                    <li class="nav-item"> <a href="#" class="nav-link ">рус</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

</header>

<script>
    // Nav menu
    $(document).ready(function() {
        var $default2 = $("#default2");
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100 && $default2.hasClass("navbar-light bg-light default2")) {
                $default2.removeClass("navbar-light bg-light default2").addClass("navbar-dark bg-dark fixed-top");
            } else if ($(this).scrollTop() <= 100 && $default2.hasClass("navbar-dark bg-dark fixed-top")) {
                $default2.removeClass("navbar-dark bg-dark fixed-top").addClass("navbar-light bg-light default2");
            }
        }); //scroll
    });

    $(document).ready(function() {
        var $default3 = $("#nav-size");
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100 && $default3.hasClass("container-fuil")) {
                $default3.removeClass("container-fuil").addClass("container");
            } else if ($(this).scrollTop() <= 100 && $default3.hasClass("container")) {
                $default3.removeClass("container").addClass("container-fuil");
            }
        }); //scroll
    });

    jQuery(window).scroll(function() {
        if (jQuery(window).scrollTop() > 100) {
            jQuery('#logo-small').css('display', 'block');
        } else {
            jQuery('#logo-small').css('display', 'none');
        }
    });
    jQuery(window).scroll(function() {
        if (jQuery(window).scrollTop() > 100) {
            jQuery('#nav-size').css('display', 'block');
            jQuery('#nav-size-small').css('display', 'none');
        } else {
            jQuery('#nav-size').css('display', 'block');
            jQuery('#nav-size-small').css('display', 'none');
        }
    });
    // Navigation menu
</script>