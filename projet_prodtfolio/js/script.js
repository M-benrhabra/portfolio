$(window).resize(function () {
    //update stuff
});

//Change pos/background/padding/add shadow on nav when scroll event happens 
$(function () {
    var navbar = $('.navbar');
    var navDropdown = $('.dropdown-menu');

    $(window).scroll(function () {
        if ($(window).scrollTop() <= 40) {
            navbar.removeClass('navbar-scroll');
            navDropdown.removeClass('nav-dropdown-scroll');
            $('.top').hide();
        } else {
            navbar.addClass('navbar-scroll');
            navDropdown.addClass('nav-dropdown-scroll');
            $('.top').show();
        }
    });
    $('.navbar-toggle').click(function () {
        if ($(window).scrollTop() <= 40) {
            navbar.addClass('navbar-scroll');
        }
    });
});


//Close collapse nav when scroll spy page link is clicked
$('.navbar-nav a[href*="#spy"]').click(function () {
    $('.navbar-collapse').collapse('hide');
    if ($(window).scrollTop() <= 40) {
        $('.navbar').removeClass('navbar-scroll');
    }
});


//Get height of col next to img col and apply a fixed height for flexbox to work correctly.
// $(function () {
//     var flexColHeight = $('.to-match').height();
//     var flexCol = $('.css-img-wrapper');

//     flexCol.css('height', flexColHeight);
// });


//Smooth Scrolling For Internal Page Links
// $(function () {
//     $('a[href*=#spy]:not([href=#])').click(function () {
//         if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
//             var target = $(this.hash);
//             target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//             if (target.length) {
//                 $('html,body').animate({
//                     scrollTop: target.offset().top
//                 }, 1000);
//                 return false;
//             }
//         }
//     });
// });


/*============ANIMATION SKILLS=============*/
$(".skills").addClass("active")
$(".skills .skill .skill-bar span").each(function () {
    $(this).animate({
        "width": $(this).parent().attr("data-bar") + "%"
    }, 1000);
    $(this).append('<b>' + $(this).parent().attr("data-bar") + '%</b>');
});
setTimeout(function () {
    $(".skills .skill .skill-bar span b").animate({ "opacity": "1" }, 1000);
}, 2000);

// skills bar circle

function Circlle(el) {
    $(el).circleProgress({ fill: { color: 'rosybrown' } })
        .on('circle-animation-progress', function (event, progress, stepValue) {
            $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2) + '%');
        });
};
Circlle('.round');



/*============FILTER PROJECT=============*/

const buttons = document.querySelector("#buttons").children;
const items = document.querySelector(".items").children;


for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function () {

        for (let j = 0; j < buttons.length; j++) {
            buttons[j].classList.remove("active")
        }
        this.classList.add("active")
        const target = this.getAttribute("data-target");

        for (let k = 0; k < items.length; k++) {
            items[k].style.opacity = "0.5";
            items[k].style.transform = "scale(0.8)";


            if (items[k].getAttribute("data-id") == target) {
                items[k].style.opacity = "1";
                items[k].style.transform = "scale(1)";
            }
            if (target == "all") {
                items[k].style.opacity = "1";
                items[k].style.transform = "scale(1)";
            }
        }
    })
}




