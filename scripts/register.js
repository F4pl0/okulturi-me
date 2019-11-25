$("#registerBtn").click(function() {

    
    debugger;
    if ($("#passwordField").value != $("#repeatPasswordField").value) {
        $("#repeatPasswordField").css({ 'border': "2px solid red" });
        return;
    } else {
        $("#repeatPasswordField").css({ 'border': "none" });
    }

    if (!validateEmail($("#emailField").value)) {
        $("#emailField").css({ 'border': "2px solid red" });
        return;
    } else {
        $("#emailField").css({ 'border': "none" });
    }

    $.post(
        "api/user/register",
        {
            email: $("#emailField").value,
            pass: $("#passwordField").value,
            imePrezime: $("#nameField").value,
        },
        function(data, status) {
            alert("Data: " + data + "\nStatus: " + status);
        },
    );
    
});

function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
}