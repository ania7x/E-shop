$(document).ready(()=>{
    ajaxCall("GET","../php/cart.php",{},"Cart not found")
    .then(CartList)
    .catch((msg) => alert(msg))
})

const ajaxCall = (requestType, requestURL, requestData, errorMessage) => {
    return new Promise((respond, reject) => {
        $.ajax({
            type: requestType,
            url: requestURL,
            data: requestData,
            success: (response) => respond(response),
            error: (response) => reject(errorMessage, response)
        })
    })
}

const CartList = (fetcheddata) => {
    data = JSON.parse(fetcheddata)
    var list=document.createElement("ul")
    $(list).addClass("cart-product-list")
    data.forEach((product)=>{
        var item=renderitem(product);
        $(list).append(item)
    })
    $(".cart-list").append(list)
    

    
}

function renderitem(productobject){
    

}