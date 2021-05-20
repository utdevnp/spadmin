<table>
    <thead>
    <tr>
        <th> Project Name </th>
        <th> GRN. No.</th>
        <th> Purchase Order No. </th>
        <th> Receipt Date </th>
        <th>  Invoice Number  </th>
        <th>Invoice Date</th>
        <th> Supplier Name </th>
        <th>Item Name </th>
        <th>Unit</th>
        <th>Quantity Ordered </th>
        <th> Quantity Received </th>
        <th>Goods Inspected By</th>
        <th> Remarks</th>
        <th> Goods Received By </th>
        <th>Reviewed By</th>
    </tr>
    </thead>
    <tbody>
    @foreach($report as $staff)
        <tr>
        <th class="align-middle">{{$staff->project_name}}</th>
              <td class="align-middle">{{$staff->grn_number}}</td>
              <td class="align-middle">{{$staff->purchese_order_number}}</td>
              <td class="align-middle">{{$staff->recived_date}}</td>

              <th class="align-middle">{{$staff->invoice_number}}</th>
              <td class="align-middle">{{$staff->invoice_date}}</td>
              <td class="align-middle">{{$staff->supplier_name}}</td>
              <td class="align-middle">{{$staff->item_name_show}}</td>

              <th class="align-middle">{{$staff->unit}}</th>
              <td class="align-middle">{{$staff->quantity_order}}</td>

              <th class="align-middle">{{$staff->quantity_recived}}</th>
              <td class="align-middle">{{$staff->inspect_name}}</td>
              <td class="align-middle">{{$staff->remarks}}</td>

              <th class="align-middle">{{$staff->recived_name}}</th>
          
              <th class="align-middle">{{$staff->reviewed_name}}</th>
        </tr>
    @endforeach
    </tbody>
</table>