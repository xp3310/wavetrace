<html lang="en">
<head>
    <meta charset="UTF-8">
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/service.css') !!}
    <title>{{ trans('m.header') }}</title>
</head>
<body id="home">
    <div id="app">
        <header class="header" >
            <div class="bg" ></div>
            <div class="bannerMask" ></div>
            <div class="top ">
                <div class="logo" ><img src="../imgs/logo_light.png"></div>
                <ul class="menu" >
                    <li><a>客房介紹</a></li>
                    <li><a>線上訂房</a></li>
                    <li><a>優惠方案</a></li>
                    <li><a>交通指南</a></li>
                    <li><a>聯絡我們</a></li>
                </ul>
            </div>
        </header>
        <div class="about">
            <section class="top">
                <header class="title">關於浪痕</header>
                <div class="pic clearfix">
                    <div class="left">
                        
                    </div>
                    <div class="right">
                        
                    </div>
                </div>
            </section>

            <div class="photos container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8" style="margin: 0 auto; text-align: center">
                        <div class="photo"><img src="../imgs/about_1.jpg"></div>
                        <div class="aboutText">踏著單車在田野裡探索，吸一口乾淨無比的空氣.....</div>
                        <img src="../imgs/about_2.jpg">
                        <div class="aboutText">踏著單車在田野裡探索，吸一口乾淨無比的空氣.....</div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div></div>
            </div>
        </div>
        <footer>
            <div class="siteInfo">
                <div class="container">
                    <div class="logo" style="">
                        <img src="../imgs/logo_dark.png" >
                    </div>
                    <div class="info">
                        <div class="social footerBox">
                            <div class="title">追蹤我們</div>
                            <div class="content">
                                <span class="icon"><img src="./imgs/icon_footer_fb.png"></span>
                                <span class="icon"><img src="./imgs/icon_footer_ig.png"></span>
                                <span class="icon"><img src="./imgs/icon_footer_LINE.png"></span>
                            </div>
                        </div>
                        <div class="contactUs footerBox">
                            <div class="title">聯絡我們</div>
                            <div class="content">
                                <div>+886 920 036 652 | LineID: wavetrace</div>
                                <div>(962) 台東縣長濱鄉長濱村下三崙 5 號</div>
                                <div>Email: wavetrace@gmail.com</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright" style="padding: 24px 0; background: #149bea; text-align: center;">
                <div style="color: #fff; font-size:16px; letter-spacing: 0">Copyright <i class="fa fa-copyright"></i> 2017 wavetrace. All rights reserved</div>
                <div style="margin-top: 10px"><img src="../imgs/footer_licence.png"></div>
                
            </div>
            
        </footer>
    </div>
</body>
</html>