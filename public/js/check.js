$('#name').keyup(function() {
    if (this.value.length < 6){
        $('.err_name').show();
        $('.err_name').html('hosszhiba');
        console.log(this.value.length);
        $("#name").css("background-color", "#f47442");
        $('#gomb').prop('disabled', true);
    }
    else{
       // $('.err_name').hide();
        $('#gomb').prop('disabled', false);
        $("#name").css("background-color", "#62f442");

    }

});

$('#pass').keyup(function() {
    if (this.value.length < 6){
        $('.err_pass').show();
        $('.err_pass').html('hosszhiba');
        console.log(this.value.length);
        $("#pass").css("background-color", "#f47442");
        $('#gomb').prop('disabled', true);
    }
    else{
      //  $('.err_pass').hide();
        $('#gomb').prop('disabled', false);
        $("#pass").css("background-color", "#62f442");

    }

});

$('#pass2').keyup(function() {
    if (this.value != $('#pass').val()){
        $('.err_pass2').show();
        $('.err_pass2').html('nem azonos');
        console.log(this.value.length);
        $("#pass2").css("background-color", "#f47442");
        $('#gomb').prop('disabled', true);
    }
    else{
        // $('.err_pass2').hide();
        $('#gomb').prop('disabled', false);
        $("#pass2").css("background-color", "#62f442");
    }

});

$('#email').keyup(function(){
    if(this.value.indexOf('@') === -1 ){
        $("#email").css("background-color", "#f47442");
        $('#gomb').prop('disabled', true);
        return false;
    }
  if(this.value.indexOf('.') === -1 ){
      $("#email").css("background-color", "#f47442");
      $('#gomb').prop('disabled', true);
     return false;
  }
    var string = this.value.split('.');
    console.log(string[1].length);
    if(string[1].length < 2 ){
        $("#email").css("background-color", "#f47442");
        $('#gomb').prop('disabled', true);
        return false;
    }
        var url = "/Api/checkuser";
        var data = {email : this.value};
        $.ajax({
            type: "POST",
            url: url,
            data: data
        }).done(function (data) {

            if(data == 'ok'){
                $("#email").css("background-color", "#62f442");
                $('#gomb').prop('disabled', false);
            }else{
                $("#email").css("background-color", "#f47442");
                $('#gomb').prop('disabled', true);
            }
        });

});

$('#search').keyup(function(){
    var url = "/api/search";
    var search = {search : this.value};
    $.ajax({
        type: "POST",
        url: url,
        data: search
    }).done(function (data) {
        $('#results').empty();
        data = JSON.parse(data);
        for(var i = 0;i<data.length;i++){
            $('#results').append('<a href="/profile/edit/'+data[i].id+'">'+data[i].username+'</a><br/>');
        }
    });
});