var authorsTbl = '';
$(function() {
    // draw function [called if the database updates]
    function draw_data() {
console.log('runnning');
        if ($.fn.dataTable.isDataTable('#authors-tbl') && authorsTbl != '') {
            authorsTbl.draw(true)
        } else {
            load_data();
        }
    }

    function load_data() {
        authorsTbl = $('#authors-tbl').DataTable({
   dom:  "<'row'<'col-sm-1'B><'col-sm-5'f><'col-sm'l>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "processing": true,
            "serverSide": true,

            "ajax": {

                url: "get_authors.php",
                method: 'POST',
       'data': function (data) {
                        var status = $('#status').val();
                        data.status = status;
                    }


                    },
dataType: 'json',



            columns: [{
                    data: 'id',
                    className: 'py-0 px-1'
                },
                {
                    data: 'first_name',
                    className: 'py-0 px-1'
                },
                {
                    data: 'last_name',
                    className: 'py-0 px-1'
                },
                {
                    data: 'email',
                    className: 'py-0 px-1'
                },

       {
                    data: 'telephone',
                    className: 'py-0 px-1'
                },
{
                    data: 'groupes',
                    className: 'py-0 px-1'
                },


                {
                    orderable: false,
                    className: 'text-center py-0 px-1',
                    render: function(data, type, row, meta) {
                        console.log()
                        return '<a class="me-2 btn btn-sm rounded-0 py-0 edit_data btn-primary" href="javascript:void(0)" data-id="' + (row.id) + '">Edit</a><a class="btn btn-sm rounded-0 py-0 delete_da                                                                                                                         ta btn-danger" href="javascript:void(0)" data-id="' + (row.id) + '">Delete</a>';


   }
                }
            ],




            "order": [
                [1, "asc"]
            ],
            initComplete: function(settings) {
                $('.paginate_button').addClass('p-1')
            }
        });

      $('#status').change(function () {
draw_data();
            });
    }

//Load Data
//
load_data();


});

