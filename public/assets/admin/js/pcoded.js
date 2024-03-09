"use strict";
document.addEventListener("DOMContentLoaded", function () {
    togglemenu();
    if (document.querySelector('body').classList.contains('layout-6') || document.querySelector('body').classList.contains('layout-7')) {
        togglemenulayout();
    }
    menuclick();
    menuhrres();
    var vw = window.innerWidth;
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
    document.querySelector("#mobile-collapse").addEventListener('click', function () {
        if (vw > 991) {
            if (document.querySelector(".pcoded-navbar:not(.theme-horizontal)").classList.contains('navbar-collapsed')) {
                document.querySelector(".pcoded-navbar:not(.theme-horizontal)").classList.remove('navbar-collapsed');
            } else {
                document.querySelector(".pcoded-navbar:not(.theme-horizontal)").classList.add('navbar-collapsed');
            }
        }
    });
    document.querySelector(".mob-toggler").addEventListener('click', function () {
        document.querySelector('.pcoded-header > .collapse,.pcoded-header > .container > .collapse').classList.toggle('d-flex');
    });
    // open user list
    document.querySelector('.displayChatbox').addEventListener('click', function () {
        document.querySelector('.header-user-list').classList.toggle('open');
    });
    // open messages
    document.querySelector('.header-user-list .userlist-box').addEventListener('click', function () {
        document.querySelector('.header-chat').classList.add('open');
        document.querySelector('.header-user-list').classList.toggle('msg-open');
    });
    // close user list
    document.querySelector('.h-back-user-list').addEventListener('click', function () {
        document.querySelector('.header-chat').classList.remove('open');
        document.querySelector('.header-user-list').classList.remove('msg-open');
    });

    //  full chat
    document.querySelector('.h-close-text').addEventListener('click', function () {
        document.querySelector('.header-chat').classList.remove('open');
        document.querySelector('.header-user-list').classList.remove('open');
        document.querySelector('.header-user-list').classList.remove('msg-open');
    });
    document.querySelector('.btn-attach').click(function () {
        document.querySelector('.chat-attach').trigger('click');
    });
    document.querySelector('.h-send-chat').addEventListener('keyup', function (e) {
        fc(e);
    });
    document.querySelector('.btn-send').addEventListener('click', function (e) {
        cfc(e);
    });
    // Friend scroll
    if (document.querySelector('.main-friend-cont')[0]) {
        document.querySelector(".main-friend-cont").each(function () {
            var px = new PerfectScrollbar(this, {
                wheelSpeed: .5,
                swipeEasing: 0,
                suppressScrollX: !0,
                wheelPropagation: 1,
                minScrollbarLength: 40,
            });
        });
    }
    if (document.querySelector('.main-chat-cont')[0]) {
        var px = new PerfectScrollbar('.main-chat-cont', {
            wheelSpeed: .5,
            swipeEasing: 0,
            suppressScrollX: !0,
            wheelPropagation: 1,
            minScrollbarLength: 40,
        });
    }
    document.querySelector("#search-friends").addEventListener("keyup", function () {
        var g = document.querySelector(this).value.toLowerCase();
        document.querySelector(".header-user-list .userlist-box .media-body .chat-header").each(function () {
            var s = document.querySelector(this).text().toLowerCase();
            document.querySelector(this).closest('.userlist-box')[s.indexOf(g) !== -1 ? 'show' : 'hide']();
        });
    });

    function fc(e) {
        if (e.which == 13) {
            cfc(e)
        }
    };

    function cfc(e) {
        document.querySelector('.header-chat .main-friend-chat').insertAdjacentHTML("beforeend", '' +
            '<div class="media chat-messages">' +
            '<div class="media-body chat-menu-reply">' +
            '<div class="">' +
            '<p class="chat-cont">' + document.querySelector('.h-send-chat').value + '</p>' +
            '</div>' +
            '<p class="chat-time">now</p>' +
            '</div>' +
            '<a class="media-right photo-table" href="#"><img class="media-object img-radius img-radius m-t-5" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image"></a>' +
            '</div>' +
            '');
        frc(document.querySelector('.h-send-chat').value);
        fsc();
        document.querySelector('.h-send-chat').val(null);
    };

    function frc(wrmsg) {
        setTimeout(function () {
            document.querySelector('.header-chat .main-friend-chat').insertAdjacentHTML("beforeend", '' +
                '<div class="media chat-messages typing">' +
                '<a class="media-left photo-table" href="#"><img class="media-object img-radius img-radius m-t-5" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image"></a>' +
                '<div class="media-body chat-menu-content">' +
                '<div class="rem-msg">' +
                '<p class="chat-cont">Typing . . .</p>' +
                '</div>' +
                '<p class="chat-time">now</p>' +
                '</div>' +
                '</div>' +
                '');
            fsc();
        }, 1500);
        setTimeout(function () {
            document.getElementsByClassName("rem-msg")[0].innerHTML = "<p class='chat-cont'>hello dear you write</p> <p class='chat-cont'>" + wrmsg + "</p>";
            document.querySelector('.rem-msg').classList.remove("rem-msg");
            document.querySelector('.typing').classList.remove("typing");
            fsc();
        }, 3000);
    };

    function fsc() {
        var tmph = document.querySelector('.header-chat .main-friend-chat');
        document.querySelector('.main-chat-cont.scroll-div').scrollTop(tmph.outerHeight());
    }
    if (!!document.querySelector('.noti-body')) {
        var px = new PerfectScrollbar('.notification  .noti-body', {
            wheelSpeed: .5,
            swipeEasing: 0,
            suppressScrollX: !0,
            wheelPropagation: 1,
            minScrollbarLength: 40,
        });
    }
    // Menu scroll
    if (!document.querySelector('.pcoded-navbar').classList.contains('theme-horizontal')) {
        var vw = window.innerWidth;
        if (!!document.querySelector('.navbar-content')) {
            if (vw < 992 || document.querySelector('.pcoded-navbar').classList.contains('menupos-static')) {
                var px = new PerfectScrollbar('.navbar-content', {
                    wheelSpeed: .5,
                    swipeEasing: 0,
                    suppressScrollX: !0,
                    wheelPropagation: 1,
                    minScrollbarLength: 40,
                });
            } else {
                var px = new PerfectScrollbar('.navbar-content', {
                    wheelSpeed: .5,
                    swipeEasing: 0,
                    suppressScrollX: !0,
                    wheelPropagation: 1,
                    minScrollbarLength: 40,
                });
            }
        }
    }
    // search-bar
    // document.querySelector(".pop-search").addEventListener('click', function () {
    //     slideDown(document.querySelector(".search-bar"), 200);
    //     document.querySelector(".search-bar input").focus();
    // });
    // document.querySelector(".search-bar .btn-close").addEventListener('click', function () {
    //     slideUp(document.querySelector(".search-bar"), 200);
    // });
    // if (document.querySelector('.pcoded-navbar').classList.contains('theme-horizontal')) {
    //     rmactive();
    //     horizontalmenu();
    // }
    // remove pre-loader start
    setTimeout(function () {
        document.querySelector('.loader-bg').remove();
    }, 400);
    // remove pre-loader end
});

// ===============
function horizontalmenu() {
    var vw = window.innerWidth;
    if (document.querySelector(".pcoded-navbar").classList.contains('theme-horizontal')) {
        if (vw < 992) {
            document.querySelector(".pcoded-navbar.theme-horizontal").classList.remove("theme-horizontal");
        }
    }
}
window.addEventListener("resize", function () {
    togglemenu();
    menuhrres();
    if (document.querySelector('.pcoded-navbar').classList.contains('theme-horizontal')) {
        rmactive();
        horizontalmenu();
    }
    if (document.querySelector('body').classList.contains('layout-6') || document.querySelector('body').classList.contains('layout-7')) {
        togglemenulayout();
    }
});
// menu [ horizontal configure ]
function rmactive() {
    var elem = document.querySelectorAll(".pcoded-navbar li.pcoded-hasmenu");
    for (var j = 0; j < elem.length; j++) {
        elem[j].classList.remove("active");
        elem[j].classList.remove("pcoded-trigger");
        elem[j].children[1].removeAttribute("style");
    }
}

function menuhrres() {
    if (document.querySelector('body').classList.contains('theme-horizontal')) {
        var vw = window.innerWidth;
        if (vw < 992) {
            setTimeout(function () {
                document.querySelector(".sidenav-horizontal-wrapper").classList.add("sidenav-horizontal-wrapper-dis").classList.remove("sidenav-horizontal-wrapper");
                document.querySelector(".theme-horizontal").classList.add("theme-horizontal-dis").classList.remove("theme-horizontal");
            }, 400);
        } else {
            setTimeout(function () {
                document.querySelector(".sidenav-horizontal-wrapper-dis").classList.add("sidenav-horizontal-wrapper");
                document.querySelector(".sidenav-horizontal-wrapper-dis").classList.remove("sidenav-horizontal-wrapper-dis");
                document.querySelector(".theme-horizontal-dis").classList.add("theme-horizontal");
                document.querySelector(".theme-horizontal-dis").classList.remove("theme-horizontal-dis");
            }, 400);
        }
        // Menu scroll
        setTimeout(function () {
            if (document.querySelector('.pcoded-navbar').classList.contains('theme-horizontal-dis')) {
                document.querySelector(".sidenav-horizontal-wrapper-dis").css({
                    'height': '100%',
                    'position': 'relative'
                });
                if (document.querySelector('.sidenav-horizontal-wrapper-dis')[0]) {
                    var px = new PerfectScrollbar('.sidenav-horizontal-wrapper-dis', {
                        wheelSpeed: .5,
                        swipeEasing: 0,
                        suppressScrollX: !0,
                        wheelPropagation: 1,
                        minScrollbarLength: 40,
                    });
                }
            }
        }, 1000);
    }
}
var ost = 0;
// menu [ compact ]
function togglemenu() {
    var vw = window.innerWidth;
    if (document.querySelector(".pcoded-navbar").classList.contains('theme-horizontal') == false) {
        if (vw <= 1200 && vw >= 992) {
            document.querySelector(".pcoded-navbar:not(.theme-horizontal)").classList.add("navbar-collapsed");
        }
        if (vw < 992) {
            document.querySelector(".pcoded-navbar:not(.theme-horizontal)").classList.remove("navbar-collapsed");
        }
    }
}
// ===============

// toggle full screen
function toggleFullScreen() {
    if (!document.fullscreenElement && // alternative standard method
        !document.mozFullScreenElement && !document.webkitFullscreenElement) { // current working methods
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
    document.querySelector('.full-screen > i').classList.toggle('icon-maximize');
    document.querySelector('.full-screen > i').classList.toggle('icon-minimize');
}
// =============   layout builder   =============

// Menu click start
function menuclick() {
    var vw = window.innerWidth;
    var elem = document.querySelectorAll(".pcoded-navbar li");
    for (var j = 0; j < elem.length; j++) {
        elem[j].removeEventListener("click", function () {});
    }
    if (!document.querySelector("body").classList.contains("minimenu")) {
        var elem = document.querySelectorAll(".pcoded-navbar li:not(.pcoded-trigger) .pcoded-submenu");
        for (var j = 0; j < elem.length; j++) {
            elem[j].style.display = "none";
        }
        var pclinkclick = document.querySelectorAll(".pcoded-inner-navbar > li:not(.pcoded-menu-caption)");
        for (var i = 0; i < pclinkclick.length; i++) {
            pclinkclick[i].addEventListener("click", function (event) {
                event.stopPropagation();
                var targetElement = event.target;
                if (targetElement.tagName == "SPAN") {
                    targetElement = targetElement.parentNode;
                }
                if (targetElement.parentNode.classList.contains("pcoded-trigger")) {
                    targetElement.parentNode.classList.remove("pcoded-trigger");
                    slideUp(targetElement.parentNode.children[1], 200);
                } else {
                    var tc = document.querySelectorAll("li.pcoded-trigger");
                    for (var t = 0; t < tc.length; t++) {
                        var c = tc[t];
                        c.classList.remove("pcoded-trigger");
                        slideUp(c.children[1], 200);
                    }
                    targetElement.parentNode.classList.add("pcoded-trigger");
                    var tmp = targetElement.children[1];
                    if (tmp) {
                        slideDown(targetElement.parentNode.children[1], 200);
                    }
                }
            });
        }
        var pcsublinkclick = document.querySelectorAll(".pcoded-inner-navbar > li:not(.pcoded-menu-caption) li");
        for (var i = 0; i < pcsublinkclick.length; i++) {
            pcsublinkclick[i].addEventListener("click", function (event) {
                var targetElement = event.target;
                if (targetElement.tagName == "SPAN") {
                    targetElement = targetElement.parentNode;
                }
                event.stopPropagation();
                if (targetElement.parentNode.classList.contains("pcoded-trigger")) {
                    targetElement.parentNode.classList.remove("pcoded-trigger");
                    slideUp(targetElement.parentNode.children[1], 200);
                } else {
                    var tc = targetElement.parentNode.parentNode.children;
                    for (var t = 0; t < tc.length; t++) {
                        var c = tc[t];
                        c.classList.remove("pcoded-trigger");
                        if (c.tagName == "LI") {
                            c = c.children[0];
                        }
                        if (c.parentNode.classList.contains("pcoded-hasmenu")) {
                            slideUp(c.parentNode.children[1], 200);
                        }
                    }
                    targetElement.parentNode.classList.add("pcoded-trigger");
                    var tmp = targetElement.parentNode.children[1];
                    if (tmp) {
                        tmp.removeAttribute('style');
                        slideDown(tmp, 200);
                    }
                }
            });
        }
    }
}

document.querySelector(".mobile-menu").addEventListener('click', function () {
    if (document.querySelector(".mobile-menu").classList.contains('on')) {
        document.querySelector(".mobile-menu").classList.remove('on');
    } else {
        document.querySelector(".mobile-menu").classList.add('on');
    }
});
// menu [ Mobile ]
document.querySelector("#mobile-collapse").addEventListener("click", function (e) {
    var vw = window.innerWidth;
    if (vw < 992) {
        if (document.querySelector(".pcoded-navbar").classList.contains('mob-open')) {
            document.querySelector(".pcoded-navbar").classList.remove('mob-open');
        } else {
            document.querySelector(".pcoded-navbar").classList.add('mob-open');
        }
        e.stopPropagation();
    }
});
document.addEventListener("DOMContentLoaded", function () {
    var vw = window.innerWidth;
    document.querySelector(".pcoded-navbar").addEventListener('click tap', function (e) {
        e.stopPropagation();
    });
    document.querySelector('.pcoded-main-container').addEventListener("click", function () {
        if (vw < 992) {
            if (document.querySelector(".pcoded-navbar").classList.contains("mob-open") == true) {
                document.querySelector(".pcoded-navbar").classList.remove('mob-open');
                document.querySelector("#mobile-collapse,#mobile-collapse1").classList.remove('on');
            }
        }
    });
});

// active menu item list start
var elem = document.querySelectorAll('.pcoded-navbar .pcoded-inner-navbar a');
for (var l = 0; l < elem.length; l++) {
    var pageUrl = window.location.href.split(/[?#]/)[0];
    if (elem[l].href == pageUrl && elem[l].getAttribute('href') != "") {
        elem[l].parentNode.classList.add("active");
        elem[l].parentNode.parentNode.parentNode.classList.add("active");
        elem[l].parentNode.parentNode.parentNode.classList.add("pcoded-trigger");
        elem[l].parentNode.parentNode.style.display = 'block';

        elem[l].parentNode.parentNode.parentNode.parentNode.parentNode.classList.add("active");
        elem[l].parentNode.parentNode.parentNode.parentNode.parentNode.classList.add("pcoded-trigger");
        elem[l].parentNode.parentNode.parentNode.parentNode.style.display = 'block';

        if (document.body.classList.contains('tab-layout')) {
            var temp = document.querySelector('.pc-tabcontent.active').getAttribute('data-value');
            document.querySelector('.tab-sidemenu > ul > li').classList.remove('active');
            document.querySelector('.tab-sidemenu > ul > li > a[data-cont="' + temp + '"]').parentNode.classList.add('active');
        }
    }
}
// active menu item list end
// only heaeder fixed js start
window.onscroll = function () {
    navfixsticky()
};

function navfixsticky() {
    if (!(document.querySelector('.pcoded-header').classList.contains('headerpos-fixed'))) {
        // console.log("123"); 
        if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
            document.querySelector(".pcoded-navbar.menupos-fixed").style.cssText = `
                transition: none;
                margin-top: 0px;
                position: fixed;
            `;
        } else {
            document.querySelector('.pcoded-navbar.menupos-fixed').removeAttribute('style');
            document.querySelector(".pcoded-navbar.menupos-fixed").style.cssText = `
                margin-top: 56px;
                position: absolute;
            `;
        }

    }
}
// only heaeder fixed js end

// =======================================================
// =======================================================
let slideUp = (target, duration = 0) => {
    target.style.transitionProperty = 'height, margin, padding';
    target.style.transitionDuration = duration + 'ms';
    target.style.boxSizing = 'border-box';
    target.style.height = target.offsetHeight + 'px';
    target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
}
let slideDown = (target, duration = 0) => {
    target.style.removeProperty('display');
    let display = window.getComputedStyle(target).display;

    if (display === 'none')
        display = 'block';

    target.style.display = display;
    let height = target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    target.offsetHeight;
    target.style.boxSizing = 'border-box';
    target.style.transitionProperty = "height, margin, padding";
    target.style.transitionDuration = duration + 'ms';
    target.style.height = height + 'px';
    target.style.removeProperty('padding-top');
    target.style.removeProperty('padding-bottom');
    target.style.removeProperty('margin-top');
    target.style.removeProperty('margin-bottom');
    window.setTimeout(() => {
        target.style.removeProperty('height');
        target.style.removeProperty('overflow');
        target.style.removeProperty('transition-duration');
        target.style.removeProperty('transition-property');
    }, duration);
}
var slideToggle = (target, duration = 0) => {
    if (window.getComputedStyle(target).display === 'none') {
        return slideDown(target, duration);
    } else {
        return slideUp(target, duration);
    }
}