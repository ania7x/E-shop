$(document).ready(()=>{
    $("#do-login").click((e)=>{
        LoginUser($("#username").val(), $("#password").val())
    });
});


function LoginUser(username, password) {
    var Data = {
        username: username,
        password: password
    };
    $.ajax({
        type: "POST",
        url: "php/login_user.php",
        data: Data,
        dataType: "json",
        encode: true,
        success: function (data) {
            console.log("Success...")
            if (data['message']=='User exists'){
                window.location.href='pages/welcome.php'
            }else if(data['errormsg']=='Invalid Username or Password'){
                $('#errormsg').html(data['errormsg'])
                $('#username').val("")
                $('#password').val("")
            }else if(data['errorm']=='User Not Yet Confirmed'){
                $('#errormsg').html(data['errorm'])
                $('#username').val("")
                $('#password').val("")

            }
        },
        error: (response
            //,exception 
            ) => {
            console.error("Error...")
            console.log(response);
        }
    });

};
