function openNav() {
    document.getElementById("myNav").classList.add('open');
    document.querySelector('.open-menu').style.display = "none";
    document.querySelector("html").style.overflowY = "hidden";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    document.getElementById("myNav").classList.remove('open');
    document.querySelector("html").style.overflowY = "visible";
    document.querySelector('.open-menu').style.display = "block";
}

const menuItems = document.querySelectorAll('.menu-item-has-children');
menuItems.forEach(item => {
    item.addEventListener("click", function (event) {
        event.target.parentNode.classList.toggle('active');
    });
});

const content = document.querySelector(".about__content");
const showMoreBtn = document.querySelector(".about__button");
const arrow = document.querySelector(".about__button svg");
let isExpanded = false;

function toggleContent() {
    isExpanded = !isExpanded;
    content.classList.toggle("expanded", isExpanded);
    arrow.classList.toggle("down");
}


showMoreBtn.addEventListener("click", toggleContent);


jQuery(document).ready(function ($) {
    $(".slider").owlCarousel({
        items: 1,
        responsiveClass: true,
        nav: false,
        dots: true,
        loop: true,
        rtl: true,

    });

});
