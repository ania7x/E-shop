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
    var sum=document.createElement("span")
    $(sum).addClass("sum-number")
    $(list).addClass("cart-product-list")
    var total=0;
    data.forEach((product)=>{
        let values = renderitem(product);
        var item = values.item;
        var floatpriceofcart = values.floatprice;
        total += floatpriceofcart;
        $(list).append(item)
    })
    $(sum).html(total)
    $(".cart-sum").append(sum)
    $(".cart-list").append(list)
    $(".delete").click(deleteitem)
}

function deleteitem(event){
    var productid=$(event.target).attr('id');
    var parent=$(event.target).parent();
    //hide element from list 
    //delete product from database
    ajaxCall("POST", "../php/cart.php", {productid:productid}, "Could not delete from database")
    .then(()=>$(parent).remove())
    .catch((msg) => alert(msg))


}

function renderitem(productobject){
    var item=document.createElement("li")
    $(item).addClass("cart-product-list-item")
    var name=document.createElement("span")
    $(name).addClass("cart-product-list-name")
    $(name).html(productobject["name"])
    $(item).append(name)
    var price=document.createElement("span")
    $(price).addClass("cart-product-list-price")
    $(price).html(productobject["price"])
    var floatprice = parseFloat($(price).text()) || 0;
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
    return { item, floatprice };
}
