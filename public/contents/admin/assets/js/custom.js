$(document).ready(function () {
    $(document).on("click", "#softDelete", function () {
        var deleteID = $(this).data('id');
        $(".modal-body #modal_id").val(deleteID);
    });
});



// $(document).ready(function () {
//     $('.btn').addClass('custom-btn');

//     $('.delete-btn').on('click', function () {
//         $('#delete-id').val($(this).data('id'));
//     });
// });


//datatable code start
$(document).ready(function () {
    $('#allTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false
    });
});

// csv
$('#json').on('click', function () {
    $("#table_with_data").tableHTMLExport({
        type: 'json',
        filename: 'sample.json'
    });
})
$('#csv').on('click', function () {
    $("#table_with_data").tableHTMLExport({
        type: 'csv',
        filename: 'sample.csv'
    });
})
//   $('#pdf').on('click',function(){
//     $("#example").tableHTMLExport({type:'pdf',filename:'sample.pdf'});
//   })


// excel
(function ($) {
    $.fn.tblToExcel = function () {
        var elm = true;
        if (this.length > 1) {
            $('body').append('<div id="tbl-tnv-back" style="position: fixed; z-index: 1;padding-top: 100px;left: 0;top: 0;width: 100%;height: 100%;overflow: auto;background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.4);">' +
                '<div id="tbl-tnv-excel" style="background-color: #fefefe;margin: auto;' +
                'padding: 20px; ' +
                'overflow: auto;' +
                'border: 1px solid #888;' +
                'width: 80%;" >  </div>' +
                '</div>');
            elm = false;
        }
        $('#tbl-tnv-back').click(function () {
            $(this).remove();
            $('#tbl-tnv-anch').remove();
        });
        var tableToExcel = (function () {
            var i = 0;
            var uri = 'data:application/vnd.ms-excel;base64,',
                template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
                base64 = function (s) {
                    return window.btoa(unescape(encodeURIComponent(s)))
                },
                format = function (s, c) {
                    return s.replace(/{(\w+)}/g, function (m, p) {
                        return c[p];
                    })
                };
            return function (table, name) {
                if (!table.nodeType) table
                var ctx = {
                    worksheet: name || 'Worksheet',
                    table: table.innerHTML
                }
                if (elm) {
                    window.location.href = uri + base64(format(template, ctx));
                } else {
                    i++;
                    var xl = uri + base64(format(template, ctx));
                    $('#tbl-tnv-excel').append('<a id="tbl-tnv-anch" style="background-color: #4CAF50;border: none;\n' +
                        'color: white;' +
                        'padding: 15px 32px;' +
                        'text-align: center;' +
                        'text-decoration: none;' +
                        'display: inline-block; margin: 1px;' +
                        'font-size: 16px;" href=' + xl + ' download>Download Excel-' + i + ' </a>');
                }
            }
        })();

        return this.each(function () {
            tableToExcel(this, 'W3C Example Table');
        });
    }

}(jQuery));


// pdf
//export table to excel
// function generateExcel() {
//     //getting data from our table
//     var data_type = 'data:application/vnd.ms-excel';
//     var table_div = document.getElementById('table_with_data');
//     var table_html = table_div.outerHTML.replace(/ /g, '%20');

//     var a = document.createElement('a');
//     a.href = data_type + ', ' + table_html;
//     a.download = 'Example_Table_To_Excel.xls';
//     a.click();
// }


//export table to pdf
function generatePDF() {
    var doc = new jsPDF('l', 'pt');

    var elem = document.getElementById('table_with_data');
    var data = doc.autoTableHtmlToJson(elem);
    doc.autoTable(data.columns, data.rows, {
        margin: {
            left: 35
        },
        theme: 'grid',
        tableWidth: 'auto',
        fontSize: 15,
        overflow: 'linebreak',
    });

    doc.save('Table_To_PDF.pdf');
}

// print table

function printDiv() {
    window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
