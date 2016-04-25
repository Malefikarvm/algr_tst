<script>
    $(function () {

        $('.collapsible').collapsible({
            accordion: false
        });

        var invoices = JSON.parse('<?= json_encode($invoices) ?>');

        //console.log(JSON.stringify(invoices));

        $.each(invoices, function (key, val) {
            var html = $('#header').html();
            $('#header').html(
                html+
                '<li >'+
                '<div class="collapsible-header btnDetails tooltipped" data-position="top" data-delay="50" data-tooltip="Click para ver detalle" id="'+val.invoice_id+'"><i class="material-icons">receipt</i>'+
                '<p class="flow-text"><h5>Factura No. : '+val.invoice_number+'</h5><blockquote>'+
                    'Fecha: '+val.date+' <span class="red-text text-lighten-1">|</span> '+
                    'Cliente: '+val.customer_name+' <span class="red-text text-lighten-1">|</span>  '+
                    'Importe: '+val.currency_code+functions.moneyFormat(val.total)+' <span class="red-text text-lighten-1">|</span>  '+
                    'Orden Número: '+val.reference_number+
                '</blockquote></p>'+
                '</div>'+
                '<div class="collapsible-body"><p>' +
                    '<div id="id'+val.invoice_id+'"></div>'+
                '</p></div>'+
                '</li>'
            );
        });

        functions.loadTooltip();

        functions.loadInvoicesDetails();
    });
</script>
<div class="row">
    <div class="col s12 m12 l12">
        <ul class="collapsible popout" data-collapsible="accordion" id="header">
        </ul>
    </div>
</div>
<?php
/*echo '<pre>';
print_r($invoices);
echo '</pre>';*/