$(document).ready(function() {
  var myarray;
  $('.close_message').click(function() {
    $('.messagetouser_error').hide('slow', function() {
      $(this).remove();
    });
    $('.messagetouser_success').hide('slow', function() {
      $(this).remove();
    });
    $('.messagetouser_warning').hide('slow', function() {
      $(this).remove();
    });
  });

  $(".button-group button:first").click(function(){
    $('.forms').html('<p><input class="input_createstate" name="title" type="text" required placeholder="Заголовок"></p><p><input class="input_createstate" name="primary_text" type="text" required placeholder="Вступительный текст"></p><p><textarea class="input_createstate" name="text" cols="30" rows="10" placeholder="Текст"></textarea></p><p><select name="cat"><option value="1" selected>IT</option><option value="2">News</option><option value="3">Games</option><option value="4">Hacking</option></select></p><input name="image" placeholder="Ссылка на картинку" type="text" /><p><button name="createstate" class="button button-pill button-primary">Создать статью</button></p>');
  });
  $(".button-group button:eq(1)").click(function(){
    $('.forms').html('<p><input type="text" name="title"  placeholder="Заголовок"/></p><p><button name="search_state" class="button button-pill button-primary"><i class="fas fa-search"></i></button></p>');
  });

  $("button[name=search_user]").click(function(){
    ShowUser();
  });

  $("#root").live('change', function(){
    ChangeUserRoot();
  });

  $(".button-group button:last").click(function(){
    showStates();
  });

  $("button[name=createstate]").live('click', function(){
    createState();
  });

  $("button[name=search_state]").live('click', function(){
    searchState();
  });



});
