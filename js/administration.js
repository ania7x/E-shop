$(document).ready(() => {
    fetchSampleData()
        .then(buildUsersTable)

})

const buildUsersTable = (data) => {
    var table = $("#usersTable").DataTable({
        data: data,
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'surname'},
            {data: 'email'},
            {data: 'role'},
            {data: 'confirmed',
             render: (data, type, row, meta)=>{
                console.log(row['id'])
                var disabled = "";
                if(data){
                    disabled = "disabled"
                }
                // id = row.data()['id'];
                return "<button id=\""+row['id']+"\"class=\"confirm\" "+disabled+">Confirm</button>"

             }
        },
        ]
    })

    $('.confirm').click((event) => {
        confirmedId = $(event.target).attr('id')
        $(event.target).prop('disabled', true)
        updateConfirmed(confirmedId);
    })
}

const updateConfirmed = (id) => {
    alert(id)
    //ajax to update db and fetch new data and rerender datatables
}

const fetchSampleData = (errordata = null) => {
    return new Promise((respond, reject) => {
        if (errordata) { reject(errordata) }
        respond(SAMPLE_DATA)
    })
}

const fetchData = (requestType, requestURL, requestData) => {
    return new Promise((respond, reject) => {
        $.ajax({
            type: requestType,
            url: requestURL,
            data: requestData,
            success: (response) => respond(response),
            error: (response) => reject("Couldn't load users", response)
        })
    })
}

const buildUsersList = (data) => {
    // var data = JSON.parse(data)
    console.log(data)

}

const alertError = (message, response) => {
    console.log(response)
    alert(message)
}

SAMPLE_DATA = [
    {
        id: 1,
        name: "anta",
        surname: "mouz",
        email: "sfsdf@ibibi.sf",
        role: "ADMIN",
        confirmed: true
    },
    {
        id: 2,
        name: "pan",
        surname: "sav",
        email: "sfsdf@ibibi.sf",
        role: "USER",
        confirmed: true
    },
    {
        id: 3,
        name: "tati",
        surname: "sisi",
        email: "sfsdf@ibibi.sf",
        role: "PRODUCTSELLER",
        confirmed: false
    }
]