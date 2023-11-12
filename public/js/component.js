// Iterate over the data and render the components dynamically
function renderComponenets(data, functionsOnSuccess) {
    console.log(functionsOnSuccess)
    $("#content").html('');
    data.forEach(function (item) {
        var div = $('<div class="my-2 shadow text-white bg-dark p-1">');
        var container = $('<div class="d-flex justify-content-between">');
        var table = creatUsertable(item.name, item.email);
        var buttonDiv = $("<div>");
        if(functionsOnSuccess=='requests'){
            var itembtn = createButton(
                "btn btn-danger me-1",
                "create_request_btn_" + item.id,
                "Withdraw Request", 'onclickfun()'
            );
        }
        else if(functionsOnSuccess=='suggestions') {
            var itembtn = createButton(
                "btn btn-primary me-1",
                "create_request_btn_" + item.id,
                "Connect",
                'onclickfun()'
            );
        }
        else if(functionsOnSuccess=='connections'){
            var itembtn = createButton(
                "btn btn-primary",
                "get_connections_in_common_" + item.id,
                "Connections in common (0)",
                'onclickfun()'
            );
            var itembtn2 = createButton(
                "btn btn-danger me-1",
                "create_request_btn_" + item.id,
                "Remove Connection",
                'onclickfun()'
            );
            itembtn=itembtn2
        }
        buttonDiv.append(itembtn);
        container.append(table, buttonDiv);
        div.append(container);
        // Append the rendered component to a specific element on the page
        $("#content").append(div);
    });
}

function createButton(itemclass, itemid, itemtext, onclickfun) {
    var itemBtn = $('<button class="' + itemclass + '">')
        .attr("id", itemid)
        .attr("onclick", onclickfun)
        .text(itemtext);
    return itemBtn;
}
function creatUsertable(name, email) {
    var table = $('<table class="ms-1">');
    var tr = $("<tr>");
    var nameTd = $('<td class="align-middle">').text(name);
    var separatorTd = $('<td class="align-middle">').text(" - ");
    var emailTd = $('<td class="align-middle">').text(email);
    var emptyTd = $('<td class="align-middle">');
    tr.append(nameTd, separatorTd, emailTd, emptyTd);
    table.append(tr);
    return table;
}
