<table>
    <thead>
    <tr>
    <th>Name Chart</th>
              <th>Category</th>
              <th >Item Description</th>
              <th >Purchase Date</th>
              <th>Quantity</th>
              <th>Rate</th>
              <th>Condition</th>
              <th>Suppliers</th>
              <th>Assets Location</th>
              <th>Responsible Person </th>
    </tr>
    </thead>
    <tbody>
    @foreach($report as $staff)
        <tr>
        <th class="align-middle">{{$staff->name_chart_name}}</th>
              <td class="align-middle">{{$staff->category_name}}</td>
              <td class="align-middle">{{$staff->item_name}}</td>
              <td class="align-middle">{{$staff->purchase_date}}</td>

              <th class="align-middle">{{$staff->quantity}}</th>
              <td class="align-middle">{{$staff->rate}}</td>
              <td class="align-middle">{{$staff->condition}}</td>
              <td class="align-middle">{{$staff->supplier_name}}</td>

              <th class="align-middle">{{$staff->assets_location}}</th>
              <td class="align-middle">{{$staff->staff_name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>