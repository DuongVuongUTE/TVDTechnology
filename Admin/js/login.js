function isEmail(inputEmail){
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(inputEmail);
}
function validatePassword(inputPassword){
    return inputPassword.length > 4;
}
$('document').ready(function(){
    $('#email').change(function(){
        var email = $(this).val().trim();
        if(!isEmail(email)){
            $(".emailError").html("Email không hợp lệ!");
        }
        else{
            $(".emailError").html("");
        }
    });
    $('#password').change(function(){
        var password = $(this).val();
        if(!validatePassword(password)){
            $(".passwordError").html("Mật khẩu phải dài hơn 4 kí tự!");
        }
        else{
            $(".passwordError").html("");
        }
    });
});