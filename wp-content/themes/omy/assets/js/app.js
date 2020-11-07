$(document).ready(function(){

    // Calendar
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


    // Checkbox recommandation

    $('.domaine-checkbox input').change(function(){
        var statusActif = $(this).prop('checked');
        if(statusActif){
            $(this).parent().find('label').addClass('active');
        }else{
            $(this).parent().find('label').removeClass('active');
        }
    });

    $('#send-recommandation').submit(function(){
        if($('#status-recommendation').val() == 0){
            event.preventDefault();
            $('#status-recommendation').parent().addClass('require');
        }
    });

    $('#status-recommendation').change(function(){
        var element = jQuery(this);

        if(element.val() > 2 || element.val() == 0 ){
            $('.recommendation-domaine-list').css('display','none');
        }else{
            $('.recommendation-domaine-list').css('display','block');
        }
    });



    // Fake Select
    $('.fake-select .placeholder').click(function(){
        $('.fake-select-content').slideUp();
        if($(this).parent().find('.fake-select-content').hasClass('is-open')){
            $(this).parent().find('.fake-select-content').slideUp();
            $(this).parent().find('.fake-select-content').removeClass('is-open');
        }else{
            $('.fake-select-content').removeClass('is-open');
            $(this).parent().find('.fake-select-content').slideDown();
            $(this).parent().find('.fake-select-content').addClass('is-open');
        }
    });


    $(document).mouseup(function(e)
    {
        var container = $(".fake-select");

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0)
        {
            $('.fake-select-content').slideUp();
            $('.fake-select-content').removeClass('is-open');
        }
    });

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
