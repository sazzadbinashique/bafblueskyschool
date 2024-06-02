
$(function() {
    $(".sliders").owlCarousel({
        items: 1,
        autoplay: true,
        smartSpeed: 700,
        loop: true,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
    });
});

// const root = document.documentElement;
// const marqueeElementsDisplayed = getComputedStyle(root).getPropertyValue("--marquee-elements-displayed");
// const marqueeContent = document.querySelector("ul.marquee-content");

// root.style.setProperty("--marquee-elements", marqueeContent.children.length);

// for(let i=0; i<marqueeElementsDisplayed; i++) {
//   marqueeContent.appendChild(marqueeContent.children[i].cloneNode(true));
// }


$(document).ready(function()
{
    $(window).scroll(function(){
        if($(window).scrollTop() > 0)
        {
                $('.mains-menu').addClass('sticky')
            //alert('hello')
        }
        else{

          $('.mains-menu').removeClass('sticky')
        }

      })


})

var gallery = $('.gallery a').simpleLightbox({
    sourceAttr:'href',
    overlay:true,
    nav:true,
    close:true,
    closeText:'X',
    nextBtnClass: false,
    prevBtnClass:false,
    nextBtnCaption: '',
    prevBtnCaption: '',
    loop: false,


    });
