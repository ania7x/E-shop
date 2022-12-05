$(document).ready(() => {
    initialize()
    var products = ajaxCall("GET", "../php/seller.php", {}, "Products not found")
        .then(buildProductsTable)
        .catch((msg) => alert(msg))
})

const initialize = () => {
    $("#add-product-form").hide()
    $("#add-product-button").click(toggleAddProductSection)
    $("#product-form-btn").val("Save")
}

const implementListButtonListeners = (data) => {
    //implement edit and delete listeners
    $("button.edit").click({param:data}, editProduct)
    $("button.delete").click(deleteProduct)
}

const editProduct = (event) => {
    var myId = $(event.target).attr('id');
    var myData = event.data.param.filter(x => x['pId'] == myId)[0]
    $("input#product-name").val(myData['pName'])
    $("input#product-code").val(myData['PRODUCTCODE'])
    $("input#product-price").val(myData['PRICE'])
    $("input#product-category").val(myData['CATEGORY'])
    $("input#product-withdrawal").val(myData['DATEOFWITHDRAWAL'])
    $("input#product-form-btn").off('click', postProductToDB);
    $("input#product-form-btn").on('click', { param: myId }, postEditedProduct);

    $("#add-product-form").show()
}

const deleteProduct = (event) => {
    var pId = $(event.target).attr('id')
    //connect to db
    ajaxCall("POST", "../php/delete_product.php", { pId: pId }, "Product wasn't deleted").
    then(()=>{
        $("#products").DataTable().row($(event.target).parents('tr')).remove().draw()
    })
    .catch(err => console.log(err))
}


const toggleAddProductSection = () => {
    $("#add-product-form").toggle("fast")
    $("#product-form-btn").click(postProductToDB)
}

const postProductToDB = () => {
    var requestData = {
        pName: $("input#product-name").val(),
        PRODUCTCODE: $("input#product-code").val(),
        PRICE: $("input#product-price").val(),
        CATEGORY: $("input#product-category").val(),
        DATEOFWITHDRAWAL: $("input#product-withdrawal").val()
    }


    ajaxCall("POST","../php/add_product.php", requestData, "Product wasn't added")
    .then((response)=> {
        // console.log(parseInt(response.replace(/['"]+/g, '')))
        var dataWithId = {
            ...requestData,
            pId:parseInt(response.replace(/['"]+/g, ''))
        }
        var table = $("#products").DataTable();
        table.rows.add([dataWithId]).draw();
        implementListButtonListeners([dataWithId]);
        Object.values($(".form-element>input[type=text]")).forEach(el => $(el).val(""))
    })

}

const postEditedProduct = (event) => {
    var requestData = {
        pId: event.data.param,
        pName: $("input#product-name").val(),
        PRODUCTCODE: $("input#product-code").val(),
        PRICE: $("input#product-price").val(),
        CATEGORY: $("input#product-category").val(),
        DATEOFWITHDRAWAL: $("input#product-withdrawal").val()
    }


    ajaxCall("POST","../php/edit_product.php", requestData, "Product wasn't added")
    .then((response)=> {
        Object.values($(".form-element>input[type=text]")).forEach(el => $(el).val(""))
        $("#add-product-form").hide()
        // TODO edit hot reload
    })

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
    if(!data){ data = {} }
    var table = $("#products").DataTable({
        data: data,
        columns: [
            { data: 'pName' },
            { data: 'PRODUCTCODE' },
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