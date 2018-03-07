<?php
/*
	project: PWAMP
	file:    ABSPATH/wp-content/plugins/pwamp/themes/illdy.php
	version: 1.1.0
	author:  Rickey Gu
	web:     https://flexplat.com
	email:   rickey29@gmail.com
*/
if ( !defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly.

require_once(plugin_dir_path(__FILE__) . 'lib/lib.php');


class PWAMP_Application extends PWAMP_Library
{
	protected $amp_style = '#header,#projects .project{-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover}#header .bottom-header h1 span,body,html{word-wrap:break-word}html{font-family:sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}a{background-color:transparent}a:active,a:hover{outline:0}h1{margin:.67em 0}img{border:0;vertical-align:middle}button,input,optgroup,select,textarea{margin:0;font:inherit;color:inherit}button{overflow:visible}button,select{text-transform:none}button,html input[type=button],input[type=reset],input[type=submit]{-webkit-appearance:button;cursor:pointer}button::-moz-focus-inner,input::-moz-focus-inner{padding:0;border:0}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}textarea{overflow:auto}@media print{blockquote,img,pre,tr{page-break-inside:avoid}*,:after,:before{color:#000;text-shadow:none;background:0 0;-webkit-box-shadow:none;box-shadow:none}a,a:visited{text-decoration:underline}a[href]:after{content:" (" attr(href) ")"}abbr[title]:after{content:" (" attr(title) ")"}a[href^="#"]:after,a[href^="javascript:"]:after{content:""}blockquote,pre{border:1px solid #999}img{max-width:100%}h2,h3,p{orphans:3;widows:3}h2,h3{page-break-after:avoid}}*,:after,:before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}html{font-size:10px;-webkit-tap-highlight-color:transparent}button,input,select,textarea{font-family:inherit;font-size:inherit;line-height:inherit}a:focus{outline:dotted thin;outline:-webkit-focus-ring-color auto 5px;outline-offset:-2px}.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6{font-family:inherit;font-weight:500;line-height:1.1;color:inherit}.h1 .small,.h1 small,.h2 .small,.h2 small,.h3 .small,.h3 small,.h4 .small,.h4 small,.h5 .small,.h5 small,.h6 .small,.h6 small,h1 .small,h1 small,h2 .small,h2 small,h3 .small,h3 small,h4 .small,h4 small,h5 .small,h5 small,h6 .small,h6 small{font-weight:400;line-height:1;color:#777}.h1,.h2,.h3,h1,h2,h3{margin-top:20px;margin-bottom:10px}.h1 .small,.h1 small,.h2 .small,.h2 small,.h3 .small,.h3 small,h1 .small,h1 small,h2 .small,h2 small,h3 .small,h3 small{font-size:65%}.h4,.h5,.h6,h4,h5,h6{margin-top:10px;margin-bottom:10px}.h1,h1{font-size:36px}.h2,h2{font-size:30px}.h3,h3{font-size:24px}.h4,h4{font-size:18px}.h5,h5{font-size:14px}.h6,h6{font-size:12px}p{margin:0 0 10px}.small,small{font-size:85%}blockquote ol:last-child,blockquote p:last-child,blockquote ul:last-child,ol ol,ol ul,ul ol,ul ul{margin-bottom:0}abbr[data-original-title],abbr[title]{cursor:help;border-bottom:1px dotted #777}blockquote{padding:10px 20px;margin:0 0 20px;font-size:17.5px;border-left:5px solid #eee}.container,.container-fluid{margin-right:auto;margin-left:auto;padding-right:15px;padding-left:15px}@media (min-width:768px){.container{width:750px}}@media (min-width:992px){.container{width:970px}}@media (min-width:1200px){.container{width:1170px}}.row{margin-right:-15px;margin-left:-15px}.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{position:relative;min-height:1px;padding-right:15px;padding-left:15px}.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{float:left}.col-xs-12{width:100%}.col-xs-10{width:83.33333333%}.col-xs-8{width:66.66666667%}.col-xs-6{width:50%}.col-xs-4{width:33.33333333%}.col-xs-offset-1{margin-left:8.33333333%}@media (min-width:768px){.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9{float:left}.col-sm-12{width:100%}.col-sm-10{width:83.33333333%}.col-sm-8{width:66.66666667%}.col-sm-7{width:58.33333333%}.col-sm-6{width:50%}.col-sm-5{width:41.66666667%}.col-sm-4{width:33.33333333%}.col-sm-3{width:25%}.col-sm-2{width:16.66666667%}.col-sm-offset-2{margin-left:16.66666667%}.col-sm-offset-1{margin-left:8.33333333%}.col-sm-offset-0{margin-left:0}}@media (min-width:992px){.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9{float:left}.col-md-4{width:33.33333333%}.col-md-3{width:25%}}@media (min-width:1200px){.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9{float:left}.col-lg-4{width:33.33333333%}.col-lg-offset-0{margin-left:0}}input[type=search]{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;-webkit-appearance:none}.btn-group-vertical>.btn-group:after,.btn-group-vertical>.btn-group:before,.btn-toolbar:after,.btn-toolbar:before,.clearfix:after,.clearfix:before,.container-fluid:after,.container-fluid:before,.container:after,.container:before,.dl-horizontal dd:after,.dl-horizontal dd:before,.form-horizontal .form-group:after,.form-horizontal .form-group:before,.modal-footer:after,.modal-footer:before,.modal-header:after,.modal-header:before,.nav:after,.nav:before,.navbar-collapse:after,.navbar-collapse:before,.navbar-header:after,.navbar-header:before,.navbar:after,.navbar:before,.pager:after,.pager:before,.panel-body:after,.panel-body:before,.row:after,.row:before{display:table;content:" "}.btn-group-vertical>.btn-group:after,.btn-toolbar:after,.clearfix:after,.container-fluid:after,.container:after,.dl-horizontal dd:after,.form-horizontal .form-group:after,.modal-footer:after,.modal-header:after,.nav:after,.navbar-collapse:after,.navbar-header:after,.navbar:after,.pager:after,.panel-body:after,.row:after{clear:both}.fa{display:inline-block;font:normal normal normal 14px/1 FontAwesome;font-size:inherit;text-rendering:auto;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}h4,h5{line-height:32px}@-webkit-keyframes fa-spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(359deg);transform:rotate(359deg)}}@keyframes fa-spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(359deg);transform:rotate(359deg)}}.fa-search:before{content:"\f002"}.fa-user:before{content:"\f007"}.fa-font:before{content:"\f031"}.fa-pencil:before{content:"\f040"}.fa-calendar:before{content:"\f073"}.fa-twitter:before{content:"\f099"}.fa-facebook-f:before,.fa-facebook:before{content:"\f09a"}.fa-bars:before,.fa-navicon:before,.fa-reorder:before{content:"\f0c9"}.fa-linkedin:before{content:"\f0e1"}.fa-comment-o:before{content:"\f0e5"}.fa-folder-o:before{content:"\f114"}.fa-code:before{content:"\f121"}.fa-chevron-circle-right:before{content:"\f138"}@-webkit-keyframes fadeOut{0%{opacity:1}100%{opacity:0}}@keyframes fadeOut{0%{opacity:1}100%{opacity:0}}body,html{width:100%;height:100%;display:block}body{line-height:26px;background-color:#fff;font-family:Lato,sans-serif;font-weight:400;font-size:16px;color:#8c9597}h1,h2,h3,h4,h5,h6{font-weight:700;font-family:Poppins}h1{font-size:80px;line-height:84px}h2{font-size:65px;line-height:70px}h3{font-size:35px;line-height:38px}h4{font-size:25px}h5{font-size:23px}h6{font-size:20px;line-height:24px}.front-page-section .section-header .section-description,ol,ul{line-height:26px;font-size:16px;font-weight:400;font-family:Lato}input[type=text],input[type=email],input[type=search],textarea{-webkit-appearance:none;border-radius:0}ol,ul{margin-top:0;margin-bottom:10px}a{text-decoration:none;color:#8c979e}a:focus,a:hover{color:#6a4d8a;text-decoration:none}.front-page-section{width:100%;text-align:center;position:relative}.front-page-section .section-header{margin-bottom:65px;width:100%}.front-page-section .section-header h3{margin:0 0 5px;color:#545454}.front-page-section .section-header .section-description{margin-bottom:0;color:#8c9597}.front-page-section .section-content{width:100%}.no-padding{padding:0}#header{width:100%;background-position:center;background-size:cover;background-repeat:no-repeat}#header .top-header{width:100%;padding-top:20px;padding-bottom:20px}#header .top-header .row{display:flex;align-items:center}#header .top-header .header-logo{display:block;font-size:60px;color:#fff;-webkit-transition:all .3s;-moz-transition:all .3s;-o-transition:all .3s;transition:all .3s;line-height:75px;font-weight:700}#header .top-header .header-logo:hover{color:#f1d204;text-decoration:none}#header .top-header .header-navigation ul{width:100%;margin:0;padding:0;list-style-type:none}#header .top-header .header-navigation ul li{margin-left:40px;line-height:40px;font-weight:700;font-size:14px;color:#fff;position:relative;float:left;font-family:Lato}#header .top-header .header-navigation ul li:first-child{margin-left:0}#header .top-header .header-navigation ul li a{color:#fff;font-size:16px;line-height:26px}#header .top-header .header-navigation ul li:hover a{color:#ffde00;text-decoration:none}#header .bottom-header{width:100%;padding-top:240px;padding-bottom:280px;text-align:center}#header .bottom-header.blog{padding:130px 0}#header .bottom-header.blog p{margin-bottom:0;color:#fff}#header .bottom-header h1{margin:0 0 29px;line-height:84px;font-weight:700;font-size:80px;color:#fff;font-family:Poppins}#header .bottom-header span.span-dot{color:#ffde00}#header .bottom-header .section-description{line-height:26px;margin-bottom:60px;font-size:16px;color:#fff;font-family:Lato;font-weight:400}#header .bottom-header .header-button-one,#header .bottom-header .header-button-two{width:auto;height:63px;margin:0 15px;padding:0 70px;display:inline-block;font-weight:700;font-size:16px;font-family:Lato;color:#fff}#header .bottom-header .header-button-one{line-height:57px;background:rgba(255,255,255,.2);border:3px solid #fff;border-radius:3px;-webkit-transition:all .3s;-moz-transition:all .3s;-o-transition:all .3s;transition:all .3s;min-width:242px}#header .bottom-header .header-button-one:hover{background:rgba(255,255,255,.1);text-decoration:none}#header .bottom-header .header-button-two{line-height:63px;background:#f1d204;border-radius:3px;-webkit-transition:all .3s;-moz-transition:all .3s;-o-transition:all .3s;transition:all .3s;min-width:242px}#header .bottom-header .header-button-two:hover{background:rgba(241,210,4,.9);text-decoration:none}#about,#static-page-content{width:100%;padding:65px 0 85px;text-align:center}#about .section-header{margin-bottom:110px}#about .section-header h3{margin-bottom:55px}#about .skill{width:100%}#about .skill .skill-top{width:100%;margin-bottom:25px}#about .skill .skill-top .skill-progress-bar{width:100%;height:2px;background-color:#ebebeb;position:relative}#about .skill .skill-bottom{width:100%;text-align:left}#counter,#latest-news,#projects,#services,#team,#testimonials,#testimonials .section-content .testimonials-carousel .carousel-testimonial{text-align:center}#about .skill .skill-bottom span{margin-left:8px;line-height:26px;font-size:16px;font-family:Lato}#about .widget_illdy_skill{margin-top:106px}#about .widget_illdy_skill:nth-child(1),#about .widget_illdy_skill:nth-child(2),#about .widget_illdy_skill:nth-child(3){margin-top:0}#projects{width:100%;padding:65px 0 0}#projects .container-fluid{max-width:1920px}#projects .section-header{margin-bottom:65px}#testimonials .section-content .testimonials-carousel .carousel-testimonial .testimonial-image,#testimonials .section-header{width:100%;margin-bottom:40px}#projects .project{width:100%;height:200px;display:block;position:relative;background-size:cover}#projects .project.no-url{pointer-events:none}#projects .project:hover .project-overlay{opacity:.3}#projects .project .project-overlay{width:100%;height:100%;background-color:#fff;opacity:0;position:absolute;top:0;left:0;z-index:1;-webkit-transition:all .3s;-moz-transition:all .3s;-o-transition:all .3s;transition:all .3s}#testimonials{width:100%;padding:50px 0 30px;position:relative;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;background-attachment:fixed;background-position:center center}#testimonials .section-header h3{color:#fff}#testimonials .section-content,#testimonials .section-content .testimonials-carousel{width:100%}#testimonials .section-content .testimonials-carousel .carousel-testimonial .testimonial-image img{width:127px;height:127px;display:inline;border-radius:50%}#testimonials .section-content .testimonials-carousel .carousel-testimonial .testimonial-content{width:100%;background-color:#6a4d8a;margin-bottom:48px;padding:50px 35px 25px;position:relative}#testimonials .section-content .testimonials-carousel .carousel-testimonial .testimonial-content blockquote{line-height:26px;margin:0;padding:0;border-left:none;color:#fff;font-size:16px;font-family:Lato;font-weight:400}#testimonials .section-content .testimonials-carousel .carousel-testimonial .testimonial-content:after{content:"";width:0;height:0;margin-right:auto;margin-left:auto;border-style:solid;border-width:19px 18px 0;border-color:#6a4d8a transparent transparent;position:absolute;right:0;bottom:-19px;left:0}#testimonials .section-content .testimonials-carousel .carousel-testimonial .testimonial-meta{width:100%;color:#fff;font-family:Poppins}#services{width:100%;padding:65px 0 75px}#services .section-header{width:100%;margin-bottom:65px}#services .section-content,#services .section-content .service{width:100%}#services .section-content .service .service-icon{width:100%;margin-bottom:10px;font-size:35px}#services .section-content .service .service-icon .fa{display:block}#services .section-content .service .service-title{width:100%;margin-bottom:20px}#services .section-content .service .service-entry{width:100%;line-height:26px;color:#8c9597;font-size:16px;font-family:Lato;font-weight:400}#services .widget_illdy_service{margin-top:40px}#services .widget_illdy_service:nth-child(1),#services .widget_illdy_service:nth-child(2),#services .widget_illdy_service:nth-child(3){margin-top:0}#latest-news{width:100%;background-color:#222f36;padding:75px 0 85px}#latest-news .section-header h3,#latest-news .section-header p{color:#fff}#latest-news .section-header{margin-bottom:55px}#latest-news .section-content{width:100%}#latest-news .section-content .post{width:100%;background-color:#fff;padding-bottom:40px;text-align:left;min-height:547px}#latest-news .illdy-blog-post{margin-top:30px;min-height:540px}#latest-news .illdy-blog-post h5{margin:0}#latest-news .section-content .post .post-title{width:100%;padding:0 30px;color:#5e5e5e;-webkit-transition:all .3s;-moz-transition:all .3s;-o-transition:all .3s;transition:all .3s;display:block}#latest-news .section-content .post .post-title:hover{color:#f1d204;text-decoration:none}#latest-news .section-content .post .post-entry{margin:40px 0 55px;padding:0 30px;line-height:26px;color:#8c9597;font-size:16px}#latest-news .section-content .post .post-button{line-height:26px;padding:0 30px;font-size:16px;font-family:Lato;color:#f1d204;-webkit-transition:all .3s;-moz-transition:all .3s;-o-transition:all .3s;transition:all .3s;margin-left:10px}#latest-news .section-content .post .post-button:focus,#latest-news .section-content .post .post-button:hover{text-decoration:none;color:#6a4d8a}#latest-news .section-content .post .post-button:active,.illdy_home_parallax h3{color:#545454}#latest-news .section-content .post .post-button .fa{margin-right:10px}#latest-news .latest-news-button,a.button{width:auto;min-height:45px;line-height:45px;background:#f1d204;margin-bottom:50px;padding:0 35px;display:inline-block;font-weight:700;font-size:16px;color:#f7f7f7;border-radius:3px;-webkit-transition:all .3s;-moz-transition:all .3s;-o-transition:all .3s;transition:all .3s;font-family:Lato}#latest-news .latest-news-button:hover,a.button:hover{text-decoration:none;opacity:.9;color:#fff}#latest-news .latest-news-button .fa{margin-right:12px}#counter{width:100%;padding:55px 0;position:relative;background-attachment:fixed;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;background-position:center}#counter .col-sm-4{border-right:1px solid #fff}#counter .col-sm-4:last-child{border-right:none}#counter .counter-overlay{width:100%;height:100%;background:rgba(0,0,0,.5);position:absolute;top:0;left:0;display:none}#counter .counter-description,#counter .counter-number{display:block;color:#fff;font-family:Poppins;font-weight:700;width:100%}#counter .counter-number{margin-bottom:10px;font-size:65px;line-height:70px}#counter .counter-description{line-height:24px;font-size:20px;text-transform:uppercase}#counter .widget_illdy_counter{margin-top:40px}#counter .widget_illdy_counter:nth-child(1),#counter .widget_illdy_counter:nth-child(2),#counter .widget_illdy_counter:nth-child(3){margin-top:0}#team{width:100%;padding:80px 0 100px}#team .section-header{width:100%;margin-bottom:85px}#team .section-content,#team .section-content .person{width:100%}#team .section-content .person .person-image{width:125px;margin-right:25px;float:left}#team .section-content .person .person-content{text-align:left;width:calc(100% - 150px);float:right}#team .section-content .person .person-content h6{width:100%;margin:12px 0 5px;color:#5e5e5e}#team .section-content .person .person-content p{width:100%;margin:0 0 10px;line-height:20px}#team .section-content .person .person-content p.person-position{margin:0 0 20px;line-height:26px}#team .section-content .person .person-content .person-content-social{width:100%;margin:0;padding:0;list-style-type:none}#team .section-content .person .person-content .person-content-social li{margin-left:10px;float:left}#team .section-content .person .person-content .person-content-social li:first-child{margin-left:0}#team .section-content .person .person-content .person-content-social li a{width:25px;height:25px;line-height:25px;display:inline-block;border-radius:50%;font-size:13px;text-align:center;-webkit-transition:all .3s;-moz-transition:all .3s;-o-transition:all .3s;transition:all .3s;border:1px solid}#team .section-content .person .person-content .person-content-social li a:hover{opacity:.9}#team .widget_illdy_person{margin-top:40px}#team .widget_illdy_person:nth-child(1),#team .widget_illdy_person:nth-child(2),#team .widget_illdy_person:nth-child(3){margin-top:0}#contact-us{width:100%;background-color:#FFF;padding:40px 0 50px;text-align:center}#contact-us .section-header{width:100%;margin-bottom:80px}#contact-us .section-content{width:100%}#contact-us .section-content .contact-us-box{width:100%;display:inline-block;text-align:left}#contact-us .section-content .contact-us-box .box-left{width:auto;margin:0;padding:0 20px 0 0;border-right:1px solid #e1e1e1;display:table-cell;font-weight:400;font-size:16px;color:#f1d204;font-family:Lato;line-height:26px}#contact-us .section-content .contact-us-box .box-right{width:auto;margin:0;padding:0 0 0 20px;display:table-cell}#contact-us .section-content .contact-us-box .box-right span{width:100%;display:block;line-height:1.6;font-size:16px;color:#8c9597;font-family:Lato}#contact-us .section-content .contact-us-box .box-right span a{color:#8c9597;text-decoration:none}#contact-us .section-content .contact-us-box .box-right span a:hover{text-decoration:underline}#contact-us .section-content .contact-us-social{width:100%;text-align:right}#contact-us .section-content .contact-us-social a{margin-left:15px;font-size:15px;color:#8c9597;-webkit-transition:all .3s;-moz-transition:all .3s;-o-transition:all .3s;transition:all .3s}#contact-us .section-content .contact-us-social a:hover{color:#333}#contact-us .section-content .contact-us-social a:first-child{margin-left:0}#footer{width:100%;background-color:#292825;padding:40px 0 0}#footer .bottom-footer{margin-top:50px;padding:30px 0;text-align:center;background-color:#242320}#footer .copyright{width:100%;line-height:1.2;color:#8c9597;margin-bottom:0;font-size:15px}#footer .bottom-copyright{color:#fff}#footer .copyright a{color:#8c9597;text-decoration:none}#footer .copyright a:hover{text-decoration:underline}#footer .widget .widget-title{margin:0 0 20px;padding:0;color:#fff}#footer .widget .widget-title h5,#footer .widget .widget-title h5 a{color:#fff}#footer .widget .widget-title:before{display:none}.recentcomments>a{color:#f1d204}.recentcomments a:hover{color:#6a4d8a}#footer .widget ul li:last-child{margin-bottom:0}#blog{width:100%;padding:50px 0 40px}#blog .blog-post{width:100%;margin-bottom:100px}#blog .blog-post .blog-post-title{width:100%;margin-top:0;margin-bottom:10px;line-height:1.4;font-weight:700;font-size:25px;color:#333;text-transform:uppercase;-webkit-transition:all .3s;-moz-transition:all .3s;-o-transition:all .3s;transition:all .3s;display:block}#blog .blog-post .blog-post-title:hover{text-decoration:none;color:#f1d204}#blog .blog-post .blog-post-meta{width:100%;margin-bottom:10px;line-height:2.428;font-size:14px}#blog .blog-post .blog-post-meta .post-meta-author{color:#f1d204}#blog .blog-post .blog-post-meta .post-meta-author .fa{margin-right:6px;color:#f1d204}#blog .blog-post .blog-post-meta .post-meta-categories,#blog .blog-post .blog-post-meta .post-meta-time{margin-left:20px;color:#888}#blog .blog-post .blog-post-meta .post-meta-categories a{color:#888}#blog .blog-post .blog-post-meta .post-meta-categories .fa,#blog .blog-post .blog-post-meta .post-meta-time .fa{margin-right:6px;color:#f1d204}#blog .blog-post .blog-post-meta .post-meta-comments{margin-left:40px;color:#888}#blog .blog-post .blog-post-meta .post-meta-comments .fa{margin-right:6px;color:#f1d204}#blog .blog-post .blog-post-meta .post-meta-comments a{color:#888}#blog .blog-post .blog-post-entry{width:100%;margin-bottom:40px}#blog .blog-post .blog-post-button{height:45px;line-height:45px;background-color:#f1d204;padding:0 30px;display:inline-block;border-radius:3px;font-weight:700;font-size:16px;color:#fff;-webkit-transition:all .3s;-moz-transition:all .3s;-o-transition:all .3s;transition:all .3s}#blog .blog-post .blog-post-button:hover{text-decoration:none;opacity:.9}#blog .blog-post .blog-post-author{width:100%;background:#f9f9f9;margin-bottom:45px;padding:20px 40px}#blog .blog-post .blog-post-author .avatar{margin-right:30px;border-radius:50%;float:left}#blog .blog-post .blog-post-author h4{line-height:1.7;margin:10px 0 0;display:inline-block;font-size:20px;color:#f1d204}#sidebar{width:90%;margin:50px 0 40px;padding-left:10%;border-left:1px solid #ebebeb}.widget{width:100%;margin-bottom:75px}.widget:last-child{margin-bottom:0}.widget .widget-title{width:100%;margin-bottom:20px;position:relative}.widget .widget-title h5,.widget ul{margin:0;padding:0}.widget ul{list-style-type:none}.widget:not(.widget_rss):not(.widget_recent_comments):not(.widget_recent_entries) ul li{width:100%;padding-left:20px;position:relative;line-height:38px}.widget:not(.widget_rss):not(.widget_recent_comments):not(.widget_recent_entries) ul li:before{content:"\f105";font-family:FontAwesome;color:#8c979e;position:absolute;left:0;line-height:38px}.widget ul li a,.widget_recent_comments .recentcomments .comment-author-link{line-height:33px}.widget:not(.widget_rss):not(.widget_recent_comments):not(.widget_recent_entries) ul li:hover:before{color:#6a4d8a}.widget ul li a{-webkit-transition:all .3s;-moz-transition:all .3s;-o-transition:all .3s;transition:all .3s}.widget.widget_recent_comments ul li a:hover,.widget:not(.widget_recent_comments) ul li:hover>a{text-decoration:none;color:#6a4d8a}.widget .search-form{width:100%}.widget .search-form .search-form-box{width:100%;position:relative}.widget .search-form .search-form-box:after{content:"\f002";position:absolute;right:20px;top:5px;color:#a9afb1;font-family:FontAwesome;font-size:15px}.widget .search-form .search-form-box #s{padding-right:40px;background-color:transparent;border-radius:5px}.widget .search-form .search-form-box #searchsubmit{height:37px;line-height:37px;background:0 0;margin-right:10px;padding:0;border:none;font-family:FontAwesome;color:#000;float:left}.widget .search-form .search-form-box #s::-webkit-input-placeholder{color:#a9afb1}.widget .search-form .search-form-box #s::-moz-placeholder{color:#a9afb1}.widget .search-form .search-form-box #s:-ms-input-placeholder{color:#a9afb1}.widget .search-form .search-form-box #s:-moz-placeholder{color:#a9afb1}.widget .widget-recent-post .recent-post-title,.widget.widget_recent_entries ul li a{width:100%;line-height:20px;font-size:16px;display:block;font-weight:400}.widget.widget_recent_entries ul li{margin-bottom:35px}.widget_archive ul li,.widget_categories ul li{text-align:right}.widget_archive ul li a,.widget_categories ul li a{float:left;clear:left;line-height:38px}.widget_archive ul li:after,.widget_categories ul li:after{content:"";display:block;clear:both}.widget_archive ul li:hover,.widget_categories ul li:hover{color:#6a4d8a}.markup-format p{margin:30px 0}.markup-format a{color:#e2c504;text-decoration:underline}.markup-format a:hover{text-decoration:none}.markup-format blockquote,.markup-format q{margin:0;padding:0;line-height:50px;font-size:30px;color:#888;border-left:none}#comments #comments-list h3.medium,#comments #respond #reply-title{line-height:1.5;font-weight:700;font-size:17px;width:100%;text-transform:uppercase}.markup-format blockquote:after,.markup-format blockquote:before{content:"\""}.markup-format blockquote p{margin:0}#comments{width:100%}#comments #comments-list{width:100%;margin-bottom:50px}#comments #comments-list h3.medium{margin:0 0 15px;color:#333}#comments #comments-list ul.comments{width:100%;margin:0;padding:0;list-style-type:none}#comments #comments-list ul.comments .comment{width:100%}#comments #comments-list ul.comments .comment>div{margin-bottom:30px}#comments #comments-list ul.comments .comment .comment-gravatar{width:100%}#comments #comments-list ul.comments .comment .comment-gravatar img{max-width:100%;height:auto}#comments #comments-list ul.comments .comment .url{color:#f1d204}#comments #comments-list ul.comments .comment .comment-entry p{margin:15px 0;color:#8C9597}#comments #comments-list ul.comments .comment .comment-reply-link{color:#f1d204}#comments #respond,#comments #respond .comment-form{width:100%}#comments #respond #reply-title{margin:0 0 15px;color:#333}#comments #respond .comment-form .comment-notes{display:none}#comments #respond .comment-form .input-full{width:100%;margin:0 0 30px}#comments #respond .comment-form textarea{height:125px;margin-bottom:30px;padding:10px}#comments #respond .comment-form textarea::-webkit-input-placeholder{color:#8c9597}#comments #respond .comment-form textarea::-moz-placeholder{color:#8c9597}#comments #respond .comment-form textarea:-ms-input-placeholder{color:#8c9597}#comments #respond .comment-form textarea:-moz-placeholder{color:#8c9597}#comments #respond .comment-form input.input-full::-webkit-input-placeholder{color:#8c9597}#comments #respond .comment-form input.input-full::-moz-placeholder{color:#8c9597}#comments #respond .comment-form input.input-full:-ms-input-placeholder{color:#8c9597}#comments #respond .comment-form input.input-full:-moz-placeholder{color:#8c9597}input[type=text],input[type=email],input[type=number],input[type=search],textarea{width:100%;padding:5px 10px;border:1px solid #d7d7d7;outline:0;font-family:Lato,sans-serif;font-weight:400;color:#8c9597;resize:none;display:block;font-size:16px;line-height:26px;background-color:transparent}input:focus,input:hover,textarea:focus,textarea:hover{border-color:#6a4d8a}#comments #respond .comment-form #input-submit,input[type=submit]{width:auto;height:36px;background-color:#f1d204;padding:0 40px;display:inline-block;border:0;font-family:Lato,sans-serif;font-weight:700;color:#fff;-webkit-transition:all .3s;-moz-transition:all .3s;-o-transition:all .3s;transition:all .3s;border-radius:3px}#header .top-header .header-navigation,.widget .search-form .search-form-box #searchsubmit{display:none}#blog .blog-post .blog-post-button:hover,#comments #respond .comment-form #input-submit:hover,#contact-us .section-content .wpcf7-form p .wpcf7-submit:hover,#header .bottom-header .header-button-two:hover,#latest-news .latest-news-button:hover,a.button:hover,input[type=submit]:hover{background-color:#6a4d8a}.bottom-header h2{color:#fff}#comments #respond .comment-form #input-submit:hover{opacity:.9}@media only screen and (max-width:1024px){#header{background-attachment:initial}}.open-responsive-menu{height:100%;background:0 0;padding:26px 0;border:none;outline:0;display:block;float:right}.open-responsive-menu .fa{font-size:22px;color:#fff}.responsive-menu{width:100%;background-color:#fff;margin-top:20px}.responsive-menu ul{width:100%;margin:0;padding:0}.responsive-menu ul li{width:100%}.responsive-menu ul li a{width:100%;padding:15px;display:block;border-bottom:1px solid #e4e4e4;color:#000;text-align:center}#header .bottom-header .header-button-one,#header .bottom-header .header-button-two{margin-top:10px;margin-bottom:10px}@media only screen and (min-width:768px) and (max-width:800px){#team .section-content .person .person-image{float:none;margin-right:auto;margin-left:auto}#team .section-content .person .person-content{float:none;width:100%}.row.blog-carousel.owl-carousel{margin:0}}@media only screen and (max-width:767px){#header .bottom-header h2{font-size:60px}#about .widget_illdy_skill:nth-child(1){margin-top:0}#about .widget_illdy_skill:nth-child(2),#about .widget_illdy_skill:nth-child(3){margin-top:66px}#services .widget_illdy_service:nth-child(1){margin-top:0}#services .widget_illdy_service:nth-child(2),#services .widget_illdy_service:nth-child(3){margin-top:40px}#counter .col-sm-4{border-right:none}#counter .widget_illdy_counter:nth-child(1){margin-top:0}#counter .widget_illdy_counter:nth-child(2),#counter .widget_illdy_counter:nth-child(3){margin-top:40px}#team .widget_illdy_person:nth-child(1){margin-top:0}#contact-us .section-content .col-sm-3,#contact-us .section-content .col-sm-5,#team .widget_illdy_person:nth-child(2),#team .widget_illdy_person:nth-child(3){margin-top:40px}#contact-us .section-content .contact-us-box .box-left{width:50%}#contact-us .section-content .contact-us-social{text-align:left}#sidebar{width:100%;margin-top:0;padding-left:0;border-left:none}#comments #comments-list ul.comments .comment .comment-gravatar{margin-bottom:20px}#blog{padding-bottom:0}.row.blog-carousel.owl-carousel{margin:0}}@media only screen and (max-width:320px){#team .section-content .person .person-image{width:100%;margin-right:0;margin-bottom:20px}#team .section-content .person .person-content{text-align:center}#team .section-content .person .person-content .person-content-social li{display:inline-block;float:none}}@media screen and (max-width:768px){body #header .bottom-header{padding-top:70px;padding-bottom:70px}body #header .bottom-header h1{line-height:54px;font-size:50px}body #header .bottom-header .section-description{margin-bottom:0}}.inline-columns{text-align:center}.inline-columns>div{display:inline-block;float:none;vertical-align:top}#latest-news{background-size:cover;background-repeat:no-repeat;background-attachment:fixed}#about:before,#counter:before,#full-width:before,#projects:before,#services:before,#team:before,#testimonials:before{background-size:cover;background-repeat:no-repeat;background-attachment:fixed;content:"";position:absolute;top:0;left:0;width:100%;height:100%;display:block;z-index:-101}header#header{position:relative}#header .top-header{position:relative;z-index:3}#header .bottom-header,.responsive-menu{position:relative;z-index:2}.woocommerce #payment #place_order,.woocommerce #respond input#submit,.woocommerce #review_form #respond .form-submit input,.woocommerce a.button,.woocommerce button.button,.woocommerce div.product form.cart .button,.woocommerce input.button,.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,.woocommerce-page #payment #place_order{background-color:#f1d204;color:#fff;text-transform:uppercase;-webkit-transition:all .3s;-moz-transition:all .3s;-o-transition:all .3s;transition:all .3s}@media only screen and (max-width:560px){#contact-us .section-content .contact-us-box .box-left{width:100%;margin:0;padding:0;display:block;border-right:none}#contact-us .section-content .contact-us-box .box-right{width:100%;margin:0;padding:0;display:block}}@media only screen and (max-width:320px){#header .bottom-header .header-button-one,#header .bottom-header .header-button-two{width:100%;margin:10px 0;padding:0}}#about .skill .skill-top .skill-progress-bar .ui-progressbar-value{height:4px;position:absolute;top:-1px;left:0}#about .skill .skill-top .skill-progress-bar .ui-progressbar-value .ui-progressbar-value-circle{content:"";width:9px;height:9px;position:absolute;top:-2.5px;right:0;border-radius:50%}#about .skill .skill-top .skill-progress-bar .ui-progressbar-value .ui-progressbar-value-top{content:"";width:64px;height:29px;line-height:26px;position:absolute;top:-45px;right:-28px;border-radius:3px;font-weight:400;font-size:16px;color:#fff;font-family:Lato}#about .skill .skill-top .skill-progress-bar .ui-progressbar-value .ui-progressbar-value-top .ui-progressbar-value-triangle{width:0;height:0;margin-right:auto;margin-left:auto;border-style:solid;border-width:5px 4.5px 0;line-height:0;position:absolute;right:0;bottom:-5px;left:0}';

	protected $amp_fonts = '@font-face {
  font-family: \'FontAwesome\';
  src: url(\'../fonts/font-awesome/fontawesome-webfont.eot?v=4.5.0\');
  src: url(\'../fonts/font-awesome/fontawesome-webfont.eot?#iefix&v=4.5.0\') format(\'embedded-opentype\'), url(\'../fonts/font-awesome/fontawesome-webfont.woff2?v=4.5.0\') format(\'woff2\'), url(\'../fonts/font-awesome/fontawesome-webfont.woff?v=4.5.0\') format(\'woff\'), url(\'../fonts/font-awesome/fontawesome-webfont.ttf?v=4.5.0\') format(\'truetype\'), url(\'../fonts/font-awesome/fontawesome-webfont.svg?v=4.5.0#fontawesomeregular\') format(\'svg\');
  font-weight: normal;
  font-style: normal;
}';


	public function __construct()
	{
		parent::__construct();
	}

	public function __destruct()
	{
	}


	public function transcode(&$page, $canonical, $home_url, $permalink, $theme_uri)
	{
		$page = $this->transcode_html($page, $home_url, $permalink);

		$this->amp_fonts = preg_replace('#url\(\'\.\./fonts/font-awesome/#i', 'url(\'' . $theme_uri . '/layout/fonts/font-awesome/', $this->amp_fonts);
		$this->amp_style .= $this->minify_css($this->amp_fonts);

		$pattern = '#<a href="" title="([^"]+)" class="project no-url" style="([^"]+(front-page-project-\d)[^"]+)">#i';
		if ( preg_match_all($pattern, $page, $matches) )
		{
			foreach ( $matches[3] as $key => $value )
			{
				$title = $matches[1][$key];

				$id = $matches[3][$key];
				$style = $matches[2][$key];
				$this->amp_style .= $this->minify_css('a#' . $id . '{' . $style . '}');

				$pattern2 = '#<a href="" title="(' . $title . ')" class="project no-url" style="[^"]+">#i';
				$page = preg_replace($pattern2, '<a href="" title="${1}" class="project no-url" id="' . $id . '">', $page);
			}
		}

		$pattern = '#<a rel="nofollow" id="cancel-comment-reply-link" href="([^"]+)" style="([^"]+)">#i';
		if ( preg_match($pattern, $page, $matches) )
		{
			$this->amp_style .= $this->minify_css('a#cancel-comment-reply-link{' . $matches[2] . '}');

			$page = preg_replace($pattern, '<a rel="nofollow" id="cancel-comment-reply-link" href="${1}">', $page);
		}

		$page = preg_replace('#^([\s\t]*)<button class="open-responsive-menu"><i class="fa fa-bars"></i></button>$#im', '${1}<button on="tap:sidebar.toggle" class="open-responsive-menu ampstart-btn caps m2"><i class="fa fa-bars"></i></button>', $page, 1);

		$page = preg_replace('#^[\s\t]*<div class="pace-overlay"></div>$#im', '', $page, 1);

		$pattern = '#^([\s\t]*)<div class="post" style="([^"]*)">$#im';
		if ( preg_match($pattern, $page, $matches) )
		{
			$this->amp_style .= $this->minify_css('div#post{' . $matches[2] . '}');

			$page = preg_replace($pattern, '${1}<div class="post">', $page);
		}

		$pattern = '#^([\s\t]*)<div class="row" style="([^"]*)">$#im';
		if ( preg_match($pattern, $page, $matches) )
		{
			$this->amp_style .= $this->minify_css('div#row{' . $matches[2] . '}');

			$page = preg_replace($pattern, '${1}<div class="row">', $page);
		}

		$pattern = '@<div class="([^"]+)" data-person-color="#(([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2}))">@i';
		if ( preg_match_all($pattern, $page, $matches) )
		{
			foreach ( $matches[2] as $key => $value )
			{
				$class = $matches[1][$key];

				$id = 'data-person-color-' . $matches[2][$key];
				$style = 'color: rgb(' . hexdec($matches[3][$key]) . ', ' . hexdec($matches[4][$key]) . ', ' . hexdec($matches[5][$key]) . ');';
				$this->amp_style .= $this->minify_css('p#' . $id . '{' . $style . '}');

				$id2 = 'data-person-color-' . $matches[2][$key] . '-2';
				$style2 = 'border-color: rgb(' . hexdec($matches[3][$key]) . ', ' . hexdec($matches[4][$key]) . ', ' . hexdec($matches[5][$key]) . '); color: rgb(' . hexdec($matches[3][$key]) . ', ' . hexdec($matches[4][$key]) . ', ' . hexdec($matches[5][$key]) . ');';
				$this->amp_style .= $this->minify_css('a#' . $id2 . '{' . $style2 . '}');

				$pattern2 = '@<div class="(' . $class . ')" data-person-color="#' . $matches[2][$key] . '">(.+)<p class="person-position">(.+)</p>(.+)<a href="#" title="Facebook" target="_blank" rel="nofollow">(.+)<a href="#" title="Twitter">(.+)<a href="#" title="LinkedIn">@iU';
				$page = preg_replace($pattern2, '<div class="${1}">${2}<p class="person-position" id="' . $id . '">${3}</p>${4}<a href="#" title="Facebook" target="_blank" rel="nofollow" id="' . $id2 . '">${5}<a href="#" title="Twitter" id="' . $id2 . '">${6}<a href="#" title="LinkedIn" id="' . $id2 . '">', $page);
			}
		}

		$pattern = '@<div class="([^"]+)" data-service-color="#(([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2}))">@i';
		if ( preg_match_all($pattern, $page, $matches) )
		{
			foreach ( $matches[2] as $key => $value )
			{
				$class = $matches[1][$key];

				$id = 'data-service-color-' . $matches[2][$key];
				$style = 'color: rgb(' . hexdec($matches[3][$key]) . ', ' . hexdec($matches[4][$key]) . ', ' . hexdec($matches[5][$key]) . ');';
				$this->amp_style .= $this->minify_css('div#' . $id . '{' . $style . '}');

				$pattern2 = '@<div class="(' . $class . ')" data-service-color="#' . $matches[2][$key] . '"><div class="service-icon">(.+)</div>(.+)<div class="service-title">@iU';
				$page = preg_replace($pattern2, '<div class="${1}"><div class="service-icon" id="' . $id . '">${2}</div>${3}<div class="service-title" id="' . $id . '">', $page);
			}
		}

		$pattern = '@<div class="([^"]+)" data-skill-progress-bar-width="([^"]+)" data-skill-color="#(([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2}))">@i';
		if ( preg_match_all($pattern, $page, $matches) )
		{
			foreach ( $matches[2] as $key => $value )
			{
				$class = $matches[1][$key];
				$width = $matches[2][$key];

				$id = 'data-skill-progress-bar-width' . $matches[3][$key];
				$style = 'width: ' . $width . '%; background-color: rgb(' . hexdec($matches[4][$key]) . ', ' . hexdec($matches[5][$key]) . ', ' . hexdec($matches[6][$key]) . ');';
				$this->amp_style .= $this->minify_css('div#' . $id . '{' . $style . '}');

				$id2 = 'data-skill-progress-bar-width' . $matches[3][$key] . '-2';
				$style2 = 'background-color: #' . $matches[3][$key];
				$this->amp_style .= $this->minify_css('span#' . $id2 . '{' . $style2 . '}');

				$id3 = 'data-skill-progress-bar-width' . $matches[3][$key] . '-3';
				$style3 = 'border-top-color: #' . $matches[3][$key] . '; border-right-color: transparent; border-bottom-color: transparent; border-left-color: transparent;';
				$this->amp_style .= $this->minify_css('span#' . $id3 . '{' . $style3 . '}');

				$pattern2 = '@<div class="(' . $class . ')" data-skill-progress-bar-width="' . $width . '" data-skill-color="#(' . $matches[3][$key] . ')">(.+)<div class="skill-progress-bar"></div>@iU';
				$page = preg_replace($pattern2, '<div class="${1}" data-skill-color="#${2}">${3}<div class="skill-progress-bar ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="' . $width . '"><div class="ui-progressbar-value ui-widget-header ui-corner-left" id="' . $id . '"><span class="ui-progressbar-value-circle" id="' . $id2 . '"></span><span class="ui-progressbar-value-top" id="' . $id2 . '">' . $width . '%<span class="ui-progressbar-value-triangle" id="' . $id3 . '"></span></span></div></div>', $page);
			}
		}

		$pattern = '@<div class="([^"]+)" data-skill-color="#(([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2}))">@i';
		if ( preg_match_all($pattern, $page, $matches) )
		{
			foreach ( $matches[2] as $key => $value )
			{
				$class = $matches[1][$key];

				$id = 'data-skill-color-' . $matches[2][$key];
				$style = 'color: rgb(' . hexdec($matches[3][$key]) . ', ' . hexdec($matches[4][$key]) . ', ' . hexdec($matches[5][$key]) . ');';
				$this->amp_style .= $this->minify_css('div#' . $id . '{' . $style . '}');

				$pattern2 = '@<div class="(' . $class . ')" data-skill-color="#' . $matches[2][$key] . '">(.+)<div class="skill-bottom">@iU';
				$page = preg_replace($pattern2, '<div class="${1}">${2}<div class="skill-bottom" id="' . $id . '">', $page);
			}
		}

		$pattern = '#^<header id="header" class="([^"]+)" style="([^"]+)">$#im';
		if ( preg_match($pattern, $page, $matches) )
		{
			$this->amp_style .= $this->minify_css('header#header{' . $matches[2] . '}');

			$page = preg_replace($pattern, '<header id="header" class="${1}">', $page, 1);
		}

		$page = preg_replace('#<i class="([^"]+)" target="_blank" rel="nofollow">#i', '<i class="${1}" rel="nofollow">', $page);

		$page = preg_replace('#<img src="([^"]+)"([^>]*)>#i', '<amp-img src="${1}" height="128px" width="128px"${2}>', $page);

		$page = preg_replace('#<img([^>]+)>#i', '<amp-img${1}>', $page);

		$pattern = '#^[\s\t]*<nav class="responsive-menu">.+<ul>.+<div>(.+)</div>.+</ul>.+</nav>$#imsU';
		if ( preg_match($pattern, $page, $matches) )
		{
			$sidebar = '<amp-sidebar id="sidebar" layout="nodisplay" side="right">' . "\n";
			$sidebar .= '<div class="responsive-menu">' . $matches[1] . '</div>' . "\n";
			$sidebar .= '</amp-sidebar>' . "\n";
			$sidebar .= '<header${1}>';
			$page = preg_replace('#^<header([^>]*)>$#im', $sidebar, $page, 1);

			$pattern = '#^[\s\t]*<nav class="[^"]+">.+</nav>$#imsU';
			$page = preg_replace($pattern, '', $page);
		}

		$pattern = '#^<section id="about" class="front-page-section" style="([^"]*)">$#im';
		if ( preg_match($pattern, $page, $matches) )
		{
			$this->amp_style .= $this->minify_css('section#about{' . $matches[1] . '}');

			$page = preg_replace($pattern, '<section id="about" class="front-page-section">', $page);
		}

		$pattern = '#^<section id="counter" class="front-page-section" style="([^"]*)">$#im';
		if ( preg_match($pattern, $page, $matches) )
		{
			$this->amp_style .= $this->minify_css('section#counter{' . $matches[1] . '}');

			$page = preg_replace($pattern, '<section id="counter" class="front-page-section">', $page);
		}

		$pattern = '#^<section id="projects" class="front-page-section" style="([^"]*)">$#im';
		if ( preg_match($pattern, $page, $matches) )
		{
			$this->amp_style .= $this->minify_css('section#projects{' . $matches[1] . '}');

			$page = preg_replace($pattern, '<section id="projects" class="front-page-section">', $page);
		}

		$pattern = '#^<section id="testimonials" class="front-page-section" style="([^"]*)">$#im';
		if ( preg_match($pattern, $page, $matches) )
		{
			$this->amp_style .= $this->minify_css('section#testimonials{' . $matches[1] . '}');

			$page = preg_replace($pattern, '<section id="testimonials" class="front-page-section">', $page);
		}

		$page = preg_replace('#<span class="counter-number" data-from="\d+" data-to="(\d+)" data-speed="\d+" data-refresh-interval="\d+"></span>#i', '<span class="counter-number">${1}</span>', $page);

		$page = $this->transcode_head($page, $canonical);

		return $page;
	}
}