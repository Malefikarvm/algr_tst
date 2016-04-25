<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h3>Zoho Invoice</h3>
            <h5>Facturas</h5>
            <div class='row center-align'>
                <div class='col s12 m12 l12 center-align'>
                    <button class="waves-effect waves-light btn red darken-1 center-align tooltipped" id='btnRefrescar'
                    data-position="top" data-delay="50" data-tooltip="Refresca las facturas">Refrescar</button>
                    <button class="btn waves-effect waves-light center-align red darken-1 tooltipped" type="submit"
                    name="action" id="btnFiltrar"
                    data-position="top" data-delay="50" data-tooltip="Filtra facturas por valor mayor a COP100,00.00 (Cien mil pesos)">
                        Filtrar
                    </button>
                </div>
            </div>

            <div id="invoices">
            </div>
        </div>
    </div>
</div>