var owl = $('.stories-slider');
owl.owlCarousel({
    autoplay: true,
    autoplayTimeout: 5000,
    singleItem: true,
    margin: 10,
    loop: true,
    nav: true,
    navText: [
        '<i class="fa fa-chevron-left"></i>',
        '<i class="fa fa-chevron-right"></i>'
    ],
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        575: {
            items: 2
        },
        768: {
            items: 3
        },
        992: {
            items: 3
        },
        1200: {
            items: 4
        }
    }
})