
        <table>
          <thead class="bg-200 text-900">
            <tr>
              <td colspan="5">
                  <h3>Inventory Log Sheet Report</h3>
              </td>
            </tr>
            <tr>
              <th> Project Name </th>
              <th>Item Name</th>
              <th>Store In</th>
              <th>Store Out  </th>
              <th>Balance as per Register    </th>
            </tr>
          </thead>
          <tbody id="purchases">

         
            <tr class="btn-reveal-trigger">
             @foreach($report as $data)
                <th class="align-middle">{{$data->project_name}}</th>
                <th class="align-middle">{{$data->item_name}}</th>
                <th class="align-middle">{{$data->store_in}}</th>
                <th class="align-middle">{{$data->store_out}}</th>
                <th class="align-middle">{{$data->blance}}</th>
             @endforeach

            </tr>

            


            
          </tbody>
        </table>
     