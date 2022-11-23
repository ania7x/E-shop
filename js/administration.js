$(document).ready(() => {
    // fetchSampleData()
    //     .then(buildUsersTable)

    fetchData("GET", "../php/admin.php", { get_users: true })

        .then(buildUsersTable)
    // .catch(alertError)

})

const buildUsersTable = (fetcheddata) => {
    data = JSON.parse(fetcheddata)
    console.log(data)
    var table = $("#usersTable").DataTable({
        data: data,
        columns: [
            { data: 'ID'},
            { data: 'NAME' },
            { data: 'SURNAME' },
            { data: 'EMAIL'},
            { data: 'ROLE' },
            {
                data: 'CONFIRMED',
                render: (data, type, row, meta) => {
                    // console.log(data)
                    var disabled = "";
                    if (data == "1") {
                        disabled = "disabled"
                    }
                    // id = row.data()['id'];
                    return "<button id=\"" + row['ID'] + "\"class=\"confirm\" " + disabled + ">Confirm</button>"

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
    console.log(JSON.parse(data))

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