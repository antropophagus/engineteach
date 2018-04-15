<? $Row = ShowStatesForSlider($CONNECT); ?>
<div class="antroslider">
  <div class="antroslider_window">
       <button title="Следующий слайд" class="button_next button button-royal button-circle button-giant"><i class="fas fa-angle-right fa-2x"></i></button>
       <button title="Предыдущий слайд" class="button_prev button button-royal button-circle button-giant"><i class="fas fa-angle-left fa-2x"></i></button>
       <ul class="buttons_slides">
       </ul>
     <div class="slides">
          <!-- <a href="#1" title="first" class="antroslider_image"><div class="antroslider_image_image"><h1>lorem1</h1><p>jewogwjegowiejgeoiwgjwoeigj</p><img src="https://i04.fotocdn.net/s23/90/public_pin_l/198/2579285337.jpg" alt="" ></div></a> -->
          <? foreach ($Row as $slide) {
            echo '<a href="/state/'.$slide["id"].'" title="'.$slide["title"].'" class="antroslider_image"><div class="antroslider_image_image"><h1>'.$slide["title"].'</h1><p>'.$slide["primary_text"].'</p><img src="https://i04.fotocdn.net/s23/90/public_pin_l/198/2579285337.jpg" alt="" ></div></a>';
          } ?>





          <!-- <a href="#2" title="second" class="antroslider_image"><div class="antroslider_image_image"><h1>lorem2</h1><p>jewogwjegowiejgeoiwgjwoeigj</p><img src="https://static.zerochan.net/Hatsune.Miku.full.2035781.jpg" alt="" ></div></a>
          <a href="#3" title="third" class="antroslider_image"><div class="antroslider_image_image"><h1>lorem3</h1><p>jewogwjegowiejgeoiwgjwoeigj</p><img src="https://static.zerochan.net/Oginohama.Akane.full.1820022.jpg" alt="" ></div></a>
          <a href="#4" title="four" class="antroslider_image"><div class="antroslider_image_image"><h1>lorem4</h1><p>jewogwjegowiejgeoiwgjwoeigj</p><img src="http://ii.yakuji.moe/s/src/1497530643255.png" alt="" ></div></a>
          <a href="#5" title="five" class="antroslider_image"><div class="antroslider_image_image"><h1>lorem5</h1><p>jewogwjegowiejgeoiwgjwoeigj</p><img src="https://s1.1zoom.ru/big0/10/187720-dikemoon.jpg" alt="" ></div></a>
          <a href="#6" title="six" class="antroslider_image"><div class="antroslider_image_image"><h1>lorem6</h1><p>jewogwjegowiejgeoiwgjwoeigj</p><img src="http://i.want.tf/to/that/DTP3xyrg.jpg" alt="" ></div></a> -->
     </div>
  </div>
</div>
