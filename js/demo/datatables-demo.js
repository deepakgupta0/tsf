// Call the dataTables jQuery plugin
$(document).ready(function () {
    $("#dataTable").DataTable({
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': [-1] /* 1st one, start by the right */
        }],
        "stateSave": true
    })
});

