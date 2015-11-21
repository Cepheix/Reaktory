/**
 * Created by Piotr on 2015-10-11.
 */
$(document).ready(function() {

    // Setup - add a text input to each footer cell
    $('#reactors tfoot th').each( function () {
        if($(this).index() == $('#reactors tfoot th').length - 1)
            return;
        var title = $('#example thead th').eq( $(this).index() ).text();
        var element  = $(this).attr('id');
        $(this).html( '<input type="text" style="width: 100%" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#reactors').DataTable( {
        "bProcessing": true,
        "sAjaxSource": "../cephei/php/server.php",
        "columnDefs": [{
            "targets": 7,
            "data": null,
            "render": function ( data, type, full, meta ) {
                return '<a href="show.php/?id=' + data[data.length - 1] + '">Show</a>';
            }
        }]
    } );

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
