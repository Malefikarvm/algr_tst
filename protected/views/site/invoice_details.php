<script>
    $(function () {

        var invoiceDetails = JSON.parse('<?= json_encode($invoice_detail) ?>');
        var id = '<?= $id ?>';

        $('#personal'+id).html(
            '<h5><b>'+invoiceDetails.salesperson_name+'</b></h5>'
        );

        $('#invoice_info'+id).html(
            '<h2>FACTURA</h2>'+
            '<p class="flow-text">#'+invoiceDetails.invoice_number+' '+
            functions.dateFormat(invoiceDetails.date)+'</p>'
        );

        $('#customer'+id).html(
            '<p class="flow-text"><b>Facturar a:</b>'+' '+
                invoiceDetails.customer_name+
            '</p>'
        );

        $.each(invoiceDetails.line_items, function (key, val) {
            var html = $('#details'+id).html();
            $('#details'+id).html(html+
                    '<tr>'+
                        '<td>'+val.description+'</td>'+
                        '<td>'+val.quantity+'</td>'+
                        '<td>'+functions.moneyFormat(val.rate)+'</td>'+
                        '<td>'+functions.moneyFormat(val.item_total)+'</td>'+
                    '</tr>'
            );
        });

        $('#total'+id).html(
            '<p><b>Subtotal:</b>'+' '+
            functions.moneyFormat(invoiceDetails.sub_total)+
            '</p>'+
            '<p><b>Total:'+' '+
            invoiceDetails.currency_symbol+functions.moneyFormat(invoiceDetails.total)+
            '</b></p>'+
            '<p><b>Pago realizado:</b>'+' '+
            '<span class="red-text text-lighten-1">-'+functions.moneyFormat(invoiceDetails.payment_made)+'</span>'+
            '</p>'+
            '<div class="blue-grey lighten-5"><p><b>Saldo adeudado:'+' '+
            invoiceDetails.currency_symbol+functions.moneyFormat(invoiceDetails.balance)+
            '</b></p></div>'
        );

        $('#btn'+id).on('click', function () {
            $('#invoice_info'+id).html('');
            $('#peronal'+id).html(
                '<h5 class="right-align"><b>'+invoiceDetails.salesperson_name+'</b></h5>'
            );
            $('#customer'+id).html(
                '<p class="flow-text"><b>Factura #:</b>'+' '+
                invoiceDetails.invoice_number+' '+
                '<span class="red-text text-lighten-1">|</span><b> Fecha:</b>'+' '+
                functions.dateFormat(invoiceDetails.date)+
                '<span class="red-text text-lighten-1">|</span><b> Cliente:</b>'+' '+
                invoiceDetails.customer_name+
                '</p>'
            );
            $('table').removeAttr('class');
            $('table').attr('class','bordered');
            theadHtml = $('table >thead >tr').html();
            $('table >thead >tr').html('');
            $('table >thead >tr').html(theadHtml+
                '<th>Descuento</th>'
            );
            $('#details'+id).html('');
            $.each(invoiceDetails.line_items, function (key, val) {
                var html = $('#details'+id).html();
                $('#details'+id).html(html+
                    '<tr>'+
                    '<td>'+val.description+'</td>'+
                    '<td>'+val.quantity+'</td>'+
                    '<td>'+functions.moneyFormat(val.rate)+'</td>'+
                    '<td>'+functions.moneyFormat(val.item_total)+'</td>'+
                    '<td>'+val.discount+'</td>'+
                    '</tr>'
                );
            });
            functions.loadTooltip();
        });

        functions.loadTooltip();
    });
</script>

<a class="btn-floating btn-large waves-effect waves-light red tooltipped"
   data-position="right" data-delay="50" data-tooltip="Modificar interfaz" id="btn<?= $id ?>">
    <i class="material-icons">replay</i></a>

<div class="row">
    <div class="col s8 m8 l8" id="personal<?= $id ?>">
    </div>
    <div class="col s4 m4 l4" id="invoice_info<?= $id ?>">
    </div>
</div>
<div class="row">
    <div class="col s12 m12 l12" id="customer<?= $id ?>">
    </div>
</div>
<div class="row">
    <div class="col s12 m12 l12" id="">
        <table class="striped">
            <thead>
                <tr>
                    <th>Artículo</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="details<?= $id ?>">
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col s7 m7 l7" >
    </div>
    <div class="col s5 m5 l5 right" id="total<?= $id ?>">
    </div>
</div>
<?php
/*echo '<pre>';
print_r($invoice_detail);
echo '</pre>';*/