<div id="stocks_table_container" class="tab-pane tablediv row-fluid">
    <div class="span12">
        <h4>Stock Types</h4>
        <table cellpadding="0" cellspacing="0" border="0" class="table-condensed table table-striped table-bordered" id="stocks_table">
            <thead>
                <tr>
                    <th>Stock Type ID</th>
                    <th>SKU</th>
                    <th>Unit of Measurement</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stocks as $stock)
                <tr>
                    <td>#{{$stock->id}}</td>
                    <td>{{$stock->sku}}</td>
                    <td>{{$stock->unit}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>