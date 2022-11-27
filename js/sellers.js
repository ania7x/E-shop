$(document).ready(()=>{
    $("#add-product-button").click(toggleAddProductSection)
    ajaxCall("GET","../php/product.php",{},"Products not found")
    .then(buildProductsTable)
    .catch((msg) => alert(msg))
})

const implementListButtonListeners = () => {
    //implement edit and delete listeners
}


const toggleAddProductSection = () => {
    $("#add-product-form").toggle()
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

    
}