$('#name').keyup(function() {
    if (this.value.length < 6){
        $('.err_name').show();
        $('.err_name').html('hosszhiba');
        console.log(this.value.length);
        $("#name").css("background-color", "#f47442");
    }
    else{
       // $('.err_name').hide();
        $("#name").css("background-color", "#62f442");
    }

});

$('#pass').keyup(function() {
    if (this.value.length < 6){
        $('.err_pass').show();
        $('.err_pass').html('hosszhiba');
        console.log(this.value.length);
        $("#pass").css("background-color", "#f47442");
    }
    else{
      //  $('.err_pass').hide();
        $("#pass").css("background-color", "#62f442");
    }

});

$('#pass2').keyup(function() {
    if (this.value != $('#pass').val()){
        $('.err_pass2').show();
        $('.err_pass2').html('nem azonos');
        console.log(this.value.length);
        $("#pass2").css("background-color", "#f47442");
    }
    else{
        // $('.err_pass2').hide();
        $("#pass2").css("background-color", "#62f442");
    }

});

$('#email').keyup(function() {
    $.ajax();


});