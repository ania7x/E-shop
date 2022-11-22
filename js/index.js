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
            console.log(data)
        },
        error: (response
            //,exception 
            ) => {
            console.error("Error...")
            console.log(response);
        }
    });

};
