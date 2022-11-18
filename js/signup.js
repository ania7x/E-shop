$(document).ready(assignSub);

function assignSub() {
    $("#sub").click(function () { RegisterNewUser($("#input_name").val(), $("#input_surname").val(), $("#input_username").val(), $("#input_password").val(), $("#input_email").val(), $("#role").val()) });

}

function RegisterNewUser(name, surname, username, password, email, role) {
    var Data = {
        name: name,
        surname: surname,
        username: username,
        password: password,
        email: email,
        role: role
    };
    $.ajax({
        type: "POST",
        url: "../php/register_user.php",
        data: Data,
        dataType: "json",
        encode: true,
        success: function(data) {
            console.log("new user created")
         }
    })
    //.done(function (data) {
   //     console.log(data);
    //});

};
