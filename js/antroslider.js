var i = 1; // Счетчик слайдов
var count;  // Всего слайдов
var j; // Переменная интервалла
var jbool = false;
var a = 0; // Переменная, расчитывающая перемещение слайдов
var width; // Ширина слайдера
var butt_id; // index нажатой кнопки
$(document).ready(function(){
    count = $('.slides').children().length; // Подсчет количества слайдов
    width = $('.antroslider_window').width(); // Определение ширины окна показа слайдов
    $('.slides').css({"width": "calc(100%*"+count+")"}); // Расчет и назначение ширины блока "slides"
    $('.antroslider_image_image').css({"width": "calc(100%/"+count+")"}); // Расчет и назначение ширины каждого слайда
    for (var t = 1; t <= count; t++) {
        $('.buttons_slides').append('<li value="'+t+'" class="button_slide"></li>');
    }
    $('.button_slide[value=1]').css({"backgroundColor": "white"});
    j = setInterval(function(){
        slideNext();
      },8000);
    $('.antroslider_window').hover(function(){
        clearInterval(j);
        jbool = true;
    },function(){
        if (jbool != false) {
        j = setInterval(function(){
        slideNext();
      },8000);
    }
    });
    $('.slides').hover(function(){
        $('.antroslider_image_image p, .antroslider_image_image h1').animate({"opacity":"1"},{duration: 500, queue: false});
        $('.antroslider_image_image img').animate({"opacity":"0.15"},{duration: 500, queue: false});
    },function(){
        $('.antroslider_image_image p, .antroslider_image_image h1').animate({"opacity":"0"},{duration: 500, queue: false});
        $('.antroslider_image_image img').animate({"opacity":"1"},{duration: 500, queue: false});
    });
    $(".button_next").click(function(){
        slideNext();
    });
    $(".button_prev").click(function(){
        slidePrev();
    });
    $(".button_slide").click(function(){
        butt_id = $(this).index();
        $(".button_slide").css({"backgroundColor": "black"});
        $(".buttons_slides li[value="+(butt_id +1) +"]").css({"backgroundColor": "white"});
        i = butt_id + 1;
        a = -width * (i-1);
        $(".antroslider_image_image").animate({"left": a},"slow");
    });
});
function slideNext () { //Функция переключения на следующий слайд
    a += -width;
    if (i == count) {slideFirstorLast();} else {$(".antroslider_image_image").animate({"left": a},"slow");i++;$(".button_slide").css({"backgroundColor": "black"});$(".buttons_slides li[value="+i+"]").css({"backgroundColor": "white"})}
}
function slidePrev() {  //Функция переключения на предыдущий слайд
    a += width;
    if (i == 1) {slideFirstorLast();} else {$(".antroslider_image_image").animate({"left": a},"slow");i--;$(".button_slide").css({"backgroundColor": "black"});$(".buttons_slides li[value="+i+"]").css({"backgroundColor": "white"})}
}
function slideFirstorLast() { //Функция переключения на первый или последний слайд
    if (i == count) {a = 0; i = 1;$(".antroslider_image_image").animate({"left": a},"slow");$(".button_slide").css({"backgroundColor": "black"});$(".buttons_slides li[value="+i+"]").css({"backgroundColor": "white"});}
    else {a = -width * (count-1);i = count;$(".antroslider_image_image").animate({"left": a},"slow");$(".button_slide").css({"backgroundColor": "black"});$(".buttons_slides li[value="+i+"]").css({"backgroundColor": "white"});}
}
