  function ShowUser() {
    $.ajax ({
      url: "/admin/manager",
      type: "POST",
      data: ({nickname: $("input[name=nickname]").val(), action: 'search', email: $("input[name=email]").val()}),
      dataType: "html",
      success: function(data) {
        if(data == 'fail') {
          var error = '<h2 style="color: red;">Пользователь не найден!</h2>';
          $(".results").html(error);
        }
        else {
          myarray = data.split ('&');
          var user = '<p>ID: ' + myarray[0] + '</p><p>Email: ' + myarray[1] + '</p><p>Nickname: ' + myarray[2] + '</p><p>Reg.Date: ' + myarray[3] + '</p><p>Root: ' + myarray[4] + ' <select style="float: none;" id="root" name="root"><option disabled selected>root</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></p>';
          $(".results").html(user);
        }
        }
    });
  };
  function ChangeUserRoot () {
    $.ajax ({
        url: "/admin/manager",
        type: "POST",
        data: ({root: $("#root").val(), action: 'change', id: myarray[0]}),
        dataType: "html",
        success: function(data) {
          if (data == 'success') ShowUser();
          else alert("Error!");
        }
    });
  };

  function showStates() {
  $.ajax({
    url: "/admin/manager",
    type: "POST",
    data: ({action: 'showstates'}),
    dataType: "html",
    success: function(data) {
      if (data == 'fail') {
        var error = '<h2 style="color: red;">Не удалось вывести статью</h2>';
        $(".results").html(error);
      }
      else {
        $(".results").html(data);
      }
    }
  })
};

function createState() {
if (($("input[name=title]").val() == '') || ($("input[name=primary_text]").val() == '') || ($("textarea[name=text]").val() == '') || ($("select[name=cat]").val() == '')) alert('Ошибка валидации');
else {
$.ajax({
  url: "/admin/manager",
  type: "POST",
  data: ({title: $("input[name=title]").val(), primary_text: $("input[name=primary_text]").val(), text: $("textarea[name=text]").val(), category: $("select[name=cat]").val(), image: $("input[name=image]").val(), action: 'createstate'}),
  dataType: "html",
  success: function(data) {
    if (data == 'success') {alert('Статья успешно создана!'); $('.input_createstate').val('');}
    else alert(data);
  }
})
}
};

function searchState() {
if ($("input[name=title]").val() == '') alert ('Ошибка валидации формы!');
else {
  $.ajax({
    url: "/admin/manager",
    type: "POST",
    data: ({action: 'searchstate', title: $("input[name=title]").val() }),
    dataType : "html",
    success: function(data) {
      if (data == "fail") {
        var error = '<h2 style="color: red;">Статья не найдена!</h2>';
        $(".results").html(error);
      }
      else {
        myarray = data.split ('&');
        var state = '<a href="/state/'+ myarray[0] + '"><h2>' + myarray[1] + '</h2></a><p>' + myarray[2] + '</p>';
        $(".results").html(state);
      }
    }
  })
}
};
