$(function () {

    functions = {

        loadInvoices : function () {
            $.ajax({
                data : {},
                type : 'POST',
                url : 'index.php?r=site/getInvoices',
                beforeSend : function () {},
                success : function (data) {
                    $('#invoices').html(data);
                }
            });
        },

        loadInvoicesFiltered : function () {
            $.ajax({
                data : {},
                type : 'POST',
                url : 'index.php?r=site/getInvoicesFiltered',
                beforeSend : function () {},
                success : function (data) {
                    $('#invoices').html(data);
                }
            });
        },
        
        loadInvoicesDetails : function () {
            $('.btnDetails').on('click', function () {
                var id = $(this).attr('id');
                $.ajax({
                    data : {
                        id : id
                    },
                    type : 'POST',
                    url : 'index.php?r=site/getInvoiceById',
                    beforeSend : function () {},
                    success : function (data) {
                        $('#id'+id).html(data);
                    }
                });
            });
        },

        moneyFormat : function (n) {
            return n.toLocaleString('en-GB', {minimumFractionDigits: 2});
        },

        dateFormat : function (date) {
            var d = new Date(date);
            return d.toLocaleDateString();
        },

        loadTooltip : function () {
            $('.tooltipped').tooltip('remove');
            $('.tooltipped').tooltip({delay: 50});
        }
    };

    functions.loadTooltip();

    functions.loadInvoices();

    $('#btnRefrescar').on('click', function () {
        functions.loadInvoices();
        $('.tooltipped').tooltip('remove');
        functions.loadTooltip();
    });

    $('#btnFiltrar').on('click', function () {
        functions.loadInvoicesFiltered();
        functions.loadTooltip();
    })
});