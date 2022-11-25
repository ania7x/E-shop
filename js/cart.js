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
    console.log(productobject)
    var item=document.createElement("li")
    $(item).addClass("cart-product-list-item")
    var name=document.createElement("span")
    $(name).addClass("cart-product-list-name")
    $(name).html(productobject["name"])
    $(item).append(name)
    var price=document.createElement("span")
    $(price).addClass("cart-product-list-price")
    $(price).html(productobject["price"])
    $(item).append(price)
    var dateofinsertion=document.createElement("span")
    $(dateofinsertion).addClass("cart-product-list-dateofinsertion")
    $(dateofinsertion).html(productobject["dateofinsertion"])
    $(item).append(dateofinsertion)
    var deletebutton=document.createElement("button")
    $(deletebutton).addClass("cart-product-list-deletebutton")
    $(deletebutton).addClass("delete")
    $(deletebutton).attr('id', productobject['productid'])
    $(deletebutton).attr('type','button')
    $(deletebutton).attr('value','X')
    $(item).append(deletebutton)

    return item;



}