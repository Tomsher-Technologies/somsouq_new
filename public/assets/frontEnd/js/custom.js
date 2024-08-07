$(document).ready(function() {

    var sync1 = $("#sync1");
    var sync2 = $("#sync2");
    var slidesPerPage = 4; //globaly define number of elements per page
    var syncedSecondary = true;

    sync1.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: false,
        autoplay: false,
        dots: false,
        loop: true,
        responsiveRefreshRate: 200,
        navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
    }).on('changed.owl.carousel', syncPosition);

    sync2
        .on('initialized.owl.carousel', function() {
            sync2.find(".owl-item").eq(0).addClass("current");
        })
        .owlCarousel({
            items: slidesPerPage,
            dots: false,
            nav: false,
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
            responsiveRefreshRate: 100
        }).on('changed.owl.carousel', syncPosition2);

    function syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;

        //if you disable loop you have to comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }

        //end block

        sync2
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();

        if (current > end) {
            sync2.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
            sync2.data('owl.carousel').to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            sync1.data('owl.carousel').to(number, 100, true);
        }
    }

    sync2.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).index();
        sync1.data('owl.carousel').to(number, 300, true);
    });
});



var navbtn = document.querySelectorAll('.btn-filter'), i; // select all items to become filter

[].forEach.call(navbtn, function(al) {
    al.addEventListener('click', function(){

        document.querySelector('.is-checked').classList.remove('is-checked') //remove the active class
        this.classList.add('is-checked') //add the active class to this, the clicked element

        var match = this.dataset.filter // store the data-filter of the clicked element in a variable

        var project = document.querySelectorAll('.ad-list-item'); // create a variable for element to filter
        [].forEach.call(project, function(el) {
            el.classList.add('fade')
            setTimeout(function(){
                el.classList.add('none')
            },300) //fade and hide all items
            if( el.classList.contains(match)){ //if one or several items contains the variable of this.datafilter in ther class, show it and fade it in.
                setTimeout(function(){
                    el.classList.remove('none')
                },300)
                setTimeout(function(){
                    el.classList.remove('fade')
                },400)
            }
            if ( match === "*") { // if * show all
                setTimeout(function(){
                    el.classList.remove('none')
                },300)
                setTimeout(function(){
                    el.classList.remove('fade')
                },400)
            }
        })
    })
})


$('.category_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:7
        }
    }
})


// $(document).rea


var $categorySlider = $(".top-categories");

$(window).resize(function() {
    showCategorySlider();
});

function showCategorySlider() {
    if ($categorySlider.data("owlCarousel") !== "undefined") {
        if (window.matchMedia('(max-width: 600px)').matches) {
            initialCategorySlider();
        } else {
            destroyCategorySlider();
        }
    }
}
showCategorySlider();

function initialCategorySlider() {
    $categorySlider.addClass("owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: false,
        nav:true,
        dots:false,
        autoplayTimeout: 2000,
        smartSpeed: 1000,
        responsive:{
            0:{
                items:2,
                margin:10,
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });
}

function destroyCategorySlider() {
    $categorySlider.trigger("destroy.owl.carousel").removeClass("owl-carousel");
}



var $propertySlider = $(".list-properties");

$(window).resize(function() {
    showPropertySlider();
});

function showPropertySlider() {
    if ($propertySlider.data("owlCarousel") !== "undefined") {
        if (window.matchMedia('(max-width: 600px)').matches) {
            initialPropertySlider();
        } else {
            destroyPropertySlider();
        }
    }
}
showPropertySlider();

function initialPropertySlider() {
    $propertySlider.addClass("owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: false,
        nav:true,
        dots:false,
        autoplayTimeout: 2000,
        smartSpeed: 1000,
        responsive:{
            0:{
                items:1.5,
                margin:10,
            },
            600:{
                items:2.5
            },
            1000:{
                items:4
            }
        }
    });
}

function destroyPropertySlider() {
    $propertySlider.trigger("destroy.owl.carousel").removeClass("owl-carousel");
}

//end


$(document).ready(function() {
    function closeAllDropdowns() {
        $('.dropdown-content').hide();
        $('.dropbtn i').each(function() {
            const defaultIcon = $(this).closest('.dropbtn').data('icon-default');
            $(this).attr('class', defaultIcon);
        });
    }

    $('.dropdown.click-toggle').each(function() {
        const $dropdown = $(this);
        const $dropbtn = $dropdown.find('.dropbtn');
        const $dropdownContent = $dropdown.find('.dropdown-content');
        const $icon = $dropbtn.find('i');
        const defaultIcon = $icon.attr('class');
        const upIcon = $dropbtn.data('icon-up');

        $dropbtn.data('icon-default', defaultIcon);

        $dropbtn.on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            if ($dropdownContent.is(':visible')) {
                $dropdownContent.hide();
                $icon.attr('class', defaultIcon);
            } else {
                closeAllDropdowns();
                $dropdownContent.show();
                $icon.attr('class', upIcon);
            }
        });

        $dropdownContent.on('click', function(e) {
            e.stopPropagation();
        });

        $(document).on('click', function(e) {
            if (!$dropdown.is(e.target) && $dropdown.has(e.target).length === 0) {
                closeAllDropdowns();
            }
        });
    });

    $('.dropdown').not('.click-toggle').hover(
        function() {
            const $icon = $(this).find('.dropbtn i');
            const upIcon = $(this).find('.dropbtn').data('icon-up');
            const defaultIcon = $icon.attr('class');
            $icon.data('icon-default', defaultIcon);

            closeAllDropdowns();

            $(this).find('.dropdown-content').show();
            $icon.attr('class', upIcon);
        },
        function() {
            const $icon = $(this).find('.dropbtn i');
            const defaultIcon = $icon.data('icon-default');
            $(this).find('.dropdown-content').hide();
            $icon.attr('class', defaultIcon);
        }
    );

    $('.dropdown .dropdown-content').on('click', function(e) {
        e.stopPropagation();
    });
});
