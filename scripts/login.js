$("#loginBtn").click(function(){
    var error = false;

    if( $("#password").val().length < 8) {
        $("#password").css({ 'border': "2px solid red" });
        error = true;
    } else {
        $("#password").css({ 'border': "none" });
    }

    if (!validateEmail($("#email").val())) {
        $("#email").css({ 'border': "2px solid red" });
        error = true;
    } else {
        $("#email").css({ 'border': "none" });
    }

    if(error)
        return;

    $.post(
        "api/user/login",
        {
            email: $("#email").val(),
            pass: $("#password").val(),
        },
        function(data, status) {
            let tempData = JSON.parse(data);
            if(tempData['success']){
                window.location.href = "/home";
            } else {
                alert("Doslo je do greske : " + tempData['message']);
            }
        },
    );
});

function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email ) && $email.length > 0;
}