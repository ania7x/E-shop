$(document).ready(() => {
    initialize()
    var products = ajaxCall("GET", "../php/seller.php", {}, "Products not found")
        .then(buildProductsTable)
        .catch((msg) => alert(msg))
})

const initialize = () => {
    $("#add-product-form").hide()
    $("#add-product-button").click(toggleAddProductSection)
    $("#product-form-btn").val("Add Product")
}

const implementListButtonListeners = (data) => {
    //implement edit and delete listeners
    $("button.edit").click({param:data}, editProduct)
    $("button.delete").click(deleteProduct)
}

const editProduct = (event) => {
    var myId = $(event.target).attr('id');
    var myData = event.data.param.filter(x => x['pId'] == myId)[0]
    $("#product-form-btn").val("Edit Product")
    $("input#product-name").val(myData['pName'])
    $("input#product-price").val(myData['PRICE'])
    $("input#product-category").val(myData['CATEGORY'])
    $("input#product-withdrawal").val(myData['DATEOFWITHDRAWAL'])
    $("#add-product-form").show()
}

const deleteProduct = (event) => {
    console.log($(event.target).attr('id'))
    //connect to db
}


const toggleAddProductSection = () => {
    $("#add-product-form").toggle("fast")
}

const postProductToDB = (data) => {
    var requestData = {
        name: $("input#product-name").val(),
        code: $("input#product-code").val(),
        price: $("input#product-price").val(),
        category: $("input#product-category").val(),
        withdrawal_date: $("input#product-withdrawal").val()
    }
        

    ajaxCall("POST",",,/php/add_product.php", requestData, "Product wasn't added")

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
            { data: 'DATEOFWITHDRAWAL' },
            {
                render: (data, type, row, meta) => {
                    return "<button id=\"" + row['pId'] + "\"class=\"edit\" >Edit</button>"
                }
            },
            {
                render: (data, type, row, meta) => {
                    return "<button id=\"" + row['pId'] + "\"class=\"delete\" >Delete</button>"
                }
            }
        ]
    })

    implementListButtonListeners(data)
    return data


}