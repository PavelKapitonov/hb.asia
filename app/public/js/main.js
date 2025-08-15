$('a[href="#d"]').on('click', function(e){
    e.preventDefault();
    $(this).hide();
    $('.tx_sh').slideDown(700);

});


// ШАПКА

$(window).scroll(function() {
    if ($(this).scrollTop() > 63 ) {
        $('.scroll_nav').css({
            'top': '0px',
            'position': 'fixed',
        });
        $('.top__nav div p').css({
            'top': '86px',
        });        
        
    };

});
// ШАПКА END

// Shop slider START

$('.slides div:nth-child(1)').addClass('active');
$('.slider-k').each(function () {
    $(this).find('.slides div:not(.youtube)').on('click', function(){
        $(this).toggleClass('active').siblings().removeClass('active');
        const img = $(this).children('img').attr('src');
        $(this).parent().parent('.slider-k').find('.full__slid img').attr('src', img);
        $(this).parent().parent('.slider-k').find('.full__slid iframe').hide();
    });
    $(this).find('.slides div.youtube').on('click', function(){
        $(this).toggleClass('active').siblings().removeClass('active');
        $(this).parent().parent('.slider-k').find('.full__slid iframe').show();
    });    
});
// Shop slider END
$('.go_to').click(function() {
    var scroll_el = $(this).attr('href');
    if ($(scroll_el).length != 0) {
        $('html, body').animate({
            scrollTop: $(scroll_el).offset().top - 205
        }, 500);
    }
    return false;
});

// Owl SLIDER start

$('.slider__1').owlCarousel({
    loop: true,
    margin: 10,
    navRewind: true,
    nav: true,
    dots: true,
    navText: ['0','<div class="next"></div>'],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
        },
    });
$('.slider__2').owlCarousel({
margin:10,
loop: true,
autoWidth:true,
items: 4,
margin: 0,
nav: true,
dots: true,
navText: ['<div class="prev-red owl-bt"></div>','<div class="next-red owl-bt"></div>'],
responsive: {
        0: {
            nav: false,
        },
        800: {
            nav: true,
        },
        },
    });	
$('.slider__3').owlCarousel({
loop: false,
items: 5,
margin: 0,
nav: false,
dots: false,
responsive: {
        0: {
            dots: true,
            items: 2,
            margin: 0,
            autoWidth:true,
        },
        800: {
            dots: false,
        },
        },
    });
$('.slider__4').owlCarousel({
loop: false,
items: 5,
margin: 16,
nav: true,
dots: true,
navText: ['<div class="prev-red owl-bt"></div>','<div class="next-red owl-bt"></div>'],
responsive: {
        0: {
            items: 2,
            nav: false,
        },
        800: {
            items: 4,
            nav: true,
        },
        1440: {
            items: 5,
            nav: true,
        },						
        },
    });	
$('.slider__5').owlCarousel({
loop: false,
items: 5,
margin: 16,
nav: true,
dots: true,
navText: ['<div class="prev-red owl-bt"></div>','<div class="next-red owl-bt"></div>'],
responsive: {
        0: {
            items: 2,
            nav: false,
        },
        800: {
            items: 4,
            nav: true,
        },
        1440: {
            items: 5,
            nav: true,
        },						
        },
    });		
// Owl slider END



// Left menu start
const burger = document.querySelector('.burger_btn');
const close = document.querySelector('.close');
const menu = document.querySelector('.menu');

const toggleMenu = () => {
    menu.classList.toggle('active');
};
burger.addEventListener('click', (e) => {
    e.stopPropagation();
    toggleMenu();
})
close.addEventListener('click', (e) => {
    e.stopPropagation();
    toggleMenu();
})
// Left menu end
// Modal callback start
const callbackBtns = document.querySelectorAll('.callback');
const overCallback = document.querySelector('.overCallback');
const modalCallback = document.querySelector('.modalCallback');
const modalItemCallback = document.querySelector('.modal__itemCallback');
const linkInp = document.querySelector('input[name="link"]');
callbackBtns.forEach((callbackBtn) => {
    callbackBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        overCallback.classList.toggle('active');
        let link = window.location.href;
        linkInp.value = link;
    })
});    
document.addEventListener('click', (e) => {
    const target = e.target;
    const its_modal = target == modalCallback  || modalCallback.contains(target);
    const modal_is_active = overCallback.classList.contains('active');
    if (!its_modal && modal_is_active) {
        overCallback.classList.remove('active');
        modalItemCallback.replaceChildren();
    }        
});    
// Modal callback end

// Modal video start
const playBtns = document.querySelectorAll('.play-video');
const overVideo = document.querySelector('.overVideo');
const modalVideo = document.querySelector('.modalVideo');
const video = document.querySelector('.modalVideo video');

playBtns.forEach((playBtn) => {
    playBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        overVideo.classList.toggle('active');
        const videoSrc = playBtn.getAttribute('data-video');
        if (video.canPlayType('application/vnd.apple.mpegurl')) {
			video.src = videoSrc;
			} else if (Hls.isSupported()) {
				var hls = new Hls();
				hls.loadSource(videoSrc);
				hls.attachMedia(video);
			} else {
                console.log("Ne rabotaet");
            }
    })
});    
document.addEventListener('click', (e) => {
    const target = e.target;
    const its_modal = target == modalVideo  || modalVideo.contains(target);
    const modal_is_active = overVideo.classList.contains('active');
    if (!its_modal && modal_is_active) {
        overVideo.classList.remove('active');
    }        
});    
// Modal video end

// NAV
const url = window.location.href;

const navLink = document.querySelector('a[href="'+url+'"]');

navLink.classList.add('active');

// NAV END

// form callback send
const formCallback = document.querySelector('#callback');
// const overThx = document.querySelector('.over-thx');
const linkVal = document.querySelector('input[name="link"]');
const telVal = document.querySelector('input[name="tel"]');
const nameVal = document.querySelector('input[name="name"]');
function serializeForm(formNode) {
const { elements } = formNode
const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
        const { name, value } = element

        return { name, value }
    })
}
serializeForm(formCallback);
const sendCallback = () => {
    let link = linkVal.value;
    let phone = telVal.value;   
    let name = nameVal.value;   
    var xhr = new XMLHttpRequest(),
        method = "POST",
        url = "/email/callback";
    var body = '&link=' + encodeURIComponent(link) +
    '&phone=' + encodeURIComponent(phone) +
    '&name=' + encodeURIComponent(name);
    xhr.open(method, url, true);
    xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                if(xhr.responseText === "1"){
                    overCallback.classList.remove('active');
                    modalItemCallback.replaceChildren();
                    overThx.classList.toggle('active');
                    setTimeout(() => {
                        overThx.classList.remove('active');
                    }, 5000);
                }else{
                    console.log(xhr.responseText);
                }  
            };
        };
    xhr.send(body);     
}
formCallback.addEventListener('submit', (e) => {
    e.preventDefault();
    sendCallback();
});
// form callback send end

