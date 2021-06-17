// Popup modal with error
$(function () {
    var modalId = $(".is-invalid").closest(".modal").attr("id");
    if (modalId) {
        $(`#${modalId}`).modal('show');
    }
});


// Load all datatable
$(".data-table").each(function() {
    $("#" + $(this).attr("id")).DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        columnDefs: [
            {
                targets: "datatable-nosort",
                orderable: false
            }
        ],
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        language: {
            info: "_START_-_END_ of _TOTAL_ entries",
            searchPlaceholder: "Search",
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>'
            }
        }
    });
});
