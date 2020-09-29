$(document).ready(function(){

    // Calendar

    //Pagination
    var paginateCount = 8;
    var filterInit = "collectif";


    initCalendar(filterInit, paginateCount);


    $('.navigation-calendar a').click(function(event){
        event.preventDefault();

        if(!$(this).hasClass('active')){
            $('.navigation-calendar a').removeClass('active');
            $(this).addClass('active');
            var filterInit = jQuery(this).attr('href');
            $('.calendar-dates tbody tr').addClass('hidde');
            $('.moreCalendar').removeClass('hidde');
            initCalendar(filterInit, paginateCount);
        }
    });


    $('.moreCalendar').click(function(event){
        event.preventDefault();

        filterInit = $('.navigation-calendar a.active').attr('href');
        initCalendar(filterInit, paginateCount);

    });

    function initCalendar(filterInit, paginateCount){
        var countInc = 0;

        $('tbody tr.' + filterInit + '.hidde').each(function( ) {
            var el = $(this);

            if(paginateCount > countInc){
                el.removeClass('hidde');
            }

            countInc++;

        });

        if($('tbody tr.' + filterInit + '.hidde').length == 0){
            $('.moreCalendar').addClass('hidde')
        }

    }



});

window.onload = function() {
    $('.slider').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
        infinite: true,
        speed: 500,
        autoplay: true,
        arrows: false,
    });





};
