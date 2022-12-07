$(document).ready(()=>{
    ajaxCall("GET","../php/product.php",{},"Products not found")
    .then(buildProductsTable)
    .catch((msg) => alert(msg))
})

const addToCart = (event) => {
    productId = $(event.target).attr('id');
    ajaxCall("POST", "../php/product.php", {pId: productId}, `Couldn't add product ${productId} to cart`)
    .then((res)=>alert(res))
    .catch((msg) => alert(msg))
}

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

const buildProductsTable = (fetcheddata) => {
    data = JSON.parse(fetcheddata)
    var table = $("#products").DataTable({
        data: data,
        columns: [
            { data: 'pName' },
            { data: 'PRICE' },
            { data: 'CATEGORY' },
            { data: 'sellerName' },
            { data: 'DATEOFWITHDRAWAL' },
            {
                render: (data, type, row, meta) => {
                    return "<button id=\"" + row['pId'] + "\"class=\"purchase\" >Purchase</button>"
                }
            }
        ]
    })

    $('.purchase').click(addToCart)

    
}