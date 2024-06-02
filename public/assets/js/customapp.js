
//Custom JS


$(function () {


// Date Picker for Entries & Rectification From
  $('#date_of_entry').datepicker({
    autoclose: true,
    format: 'yyyy/mm/dd'
  });

  $('#date_of_rect').datepicker({
    autoclose: true,
    format: 'yyyy/mm/dd'
  });
  $('#flg_date').datepicker({
    autoclose: true,
    format: 'yyyy/mm/dd'
  });
//

    $('#qty_received_date').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });

        $('#consumption_date').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });

        $('#radioFrom input:options').click(function() {
          if ($(this).val() === '2') {
            alert('sdsads');
          } else if ($(this).val() === '2') {
            myOtherFunction();
          }
        });
  // Show Toast Alert
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });


        $('.toastrDefaultSuccess').click(function() {
          toastr.success('Successfully Submited')
        });

        $(document).ready(function () {
          bsCustomFileInput.init();
        });


    $("#nonteachingstaff_datatable_backend").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        buttons: [

        ]
        ,'columnDefs' : [
            //hide the second & fourth column
            // { 'visible': false, 'targets': [3,4] }
        ],
    }).buttons().container().appendTo('#nonteachingstaff_datatable_backend_wrapper .col-md-6:eq(0)');
    $("#nonteachingstaff_datatable_backend thead th").css({
        "background-color": "#FFCC00",
        "color": "#000" // Set the text color to black or a color that contrasts well with yellow
    });
    $("#notice_datatable_backend").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": false,
        buttons: [

        ]
        ,'columnDefs' : [
            //hide the second & fourth column
            // { 'visible': false, 'targets': [3,4] }
        ],
    }).buttons().container().appendTo('#notice_datatable_backend_wrapper .col-md-6:eq(0)');

    $("#notice_datatable_backend thead th").css({
        "background-color": "#FFCC00",
        "color": "#000" // Set the text color to black or a color that contrasts well with yellow
    });
    $("#admissinonfee_datatable_backend").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": false,
        buttons: [

        ]
        ,'columnDefs' : [
            //hide the second & fourth column
            // { 'visible': false, 'targets': [3,4] }
        ],
    }).buttons().container().appendTo('#admissinonfee_datatable_backend_wrapper .col-md-6:eq(0)');
    $("#admissinonfee_datatable_backend thead th").css({
        "background-color": "#FFCC00",
        "color": "#000" // Set the text color to black or a color that contrasts well with yellow
    });



    $("#teachingstaff_datatable_back").DataTable({
        "createdRow": function(row, data, dataIndex) {
            console.log(data["9"]);
        },
        "responsive": true,
        "lengthChange": true,
        "autoWidth": true,
        "searching": true,
        buttons: [
            {
                extend: 'excel',
                filename: 'Teaching Staff List',
                messageTop: 'Teaching Staff List'
            },
            {
                extend: 'pdfHtml5',
                filename: 'Teaching Staff List',
                messageTop: 'Teaching Staff List',
            },
            {
                extend: 'print',
                filename: 'Teaching Staff List',
                messageTop: 'Teaching Staff List'
            }
        ]

    }).buttons().container().appendTo('#teachingstaff_datatable_back_wrapper .col-md-6:eq(0)');
    $("#teachingstaff_datatable_back thead th").css({
        "background-color": "#FFCC00",
        "color": "#000" // Set the text color to black or a color that contrasts well with yellow
    });
    $("#nonteachingstaff_datatable_back").DataTable({
        "createdRow": function(row, data, dataIndex) {
            console.log(data["9"]);
        },
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        buttons: [
            {
                extend: 'excel',
                filename: 'Teaching Staff List',
                messageTop: 'Teaching Staff List'
            },
            {
                extend: 'pdfHtml5',
                filename: 'Teaching Staff List',
                messageTop: 'Teaching Staff List',
            },
            {
                extend: 'print',
                filename: 'Teaching Staff List',
                messageTop: 'Teaching Staff List'
            }
        ]

    }).buttons().container().appendTo('#nonnonteachingstaff_datatable_back_wrapper .col-md-6:eq(0)');
    $("#nonteachingstaff_datatable_back thead th").css({
        "background-color": "#FFCC00",
        "color": "#000" // Set the text color to black or a color that contrasts well with yellow
    });

    $("#image_datatable_backend").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        buttons: [

        ]
        ,'columnDefs' : [
            //hide the second & fourth column
            // { 'visible': false, 'targets': [3,4] }
        ],
    }).buttons().container().appendTo('#image_datatable_backend_wrapper .col-md-6:eq(0)');
    $("#image_datatable_backend thead th").css({
        "background-color": "#FFCC00",
        "color": "#000" // Set the text color to black or a color that contrasts well with yellow
    });

    $("#generel_datatable_backend").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        buttons: [
        ]
        ,'columnDefs' : [
            //hide the second & fourth column
            // { 'visible': false, 'targets': [3,4] }
        ],
    }).buttons().container().appendTo('#generel_datatable_backend_wrapper .col-md-6:eq(0)');
    $("#generel_datatable_backend thead th").css({
        "background-color": "#FFCC00",
        "color": "#000" // Set the text color to black or a color that contrasts well with yellow
    });


});

function configureDataTable(filename, messageTop, hiddenColumns) {
    var exportOptions = {
        columns: ':visible'
    };

    return {
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: [
            {
                extend: 'copy',
                filename: filename,
                messageTop: messageTop,
                exportOptions: exportOptions
            },
            {
                extend: 'csv',
                filename: filename,
                messageTop: messageTop,
                exportOptions: exportOptions
            },
            {
                extend: 'excel',
                filename: filename,
                messageTop: messageTop,
                exportOptions: exportOptions
            },
            {
                extend: 'print',
                filename: filename,
                messageTop: messageTop,
                exportOptions: exportOptions
            },
            {
                extend: 'colvis'
            }
        ],
        columnDefs: [
            {
                'visible': false,
                'targets': hiddenColumns
            }
        ]
    };
}


