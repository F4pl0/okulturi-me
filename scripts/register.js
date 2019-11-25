$("#registerBtn").click(function() {
    var error = false;

    if( $("#nameField").val().length < 1) {
        $("#nameField").css({ 'border': "2px solid red" });
        error = true;
    } else {
        $("#nameField").css({ 'border': "none" });
    }

    if( $("#passwordField").val().length < 8) {
        $("#passwordField").css({ 'border': "2px solid red" });
        error = true;
    } else {
        $("#passwordField").css({ 'border': "none" });
    }

    if ($("#passwordField").val() != $("#repeatPasswordField").val()) {
        $("#repeatPasswordField").css({ 'border': "2px solid red" });
        error = true;
    } else {
        $("#repeatPasswordField").css({ 'border': "none" });
    }

    if (!validateEmail($("#emailField").val())) {
        $("#emailField").css({ 'border': "2px solid red" });
        error = true;
    } else {
        $("#emailField").css({ 'border': "none" });
    }

    if(error)
        return;

    $.post(
        "api/user/register",
        {
            email: $("#emailField").val(),
            pass: $("#passwordField").val(),
            imePrezime: $("#nameField").val(),
        },
        function(data, status) {
            let tempData = JSON.parse(data);
            if(tempData['success']){
                alert("Uspesno Ste registrovani, mozete da se loginujete");
                window.location.href = "/login";
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