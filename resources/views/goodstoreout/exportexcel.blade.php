<table>
          <thead >
            <tr>
              <th> Project Name </th>
              <th>GSOF No.</th>
              <th > Submitted Date </th>
              <th >Required Date </th>
              <th>Issued Date</th>
              <th>Purpose/Activity</th>
              <th>Item Name</th>
              <th>Unit</th>
              <th>Quantity Required</th>
              <th>Quantity Issued</th>
              <th> Requested By </th>
              <th> Approved By</th>
              <th>Issued By</th>
              <th>Received By</th>

            </tr>
          </thead>
          <tbody>

          @foreach($report as $staff)
            <tr class="btn-reveal-trigger">
             
              <th class="align-middle">{{$staff->project_name}}</th>
              <td class="align-middle">{{$staff->grn_out_number}}</td>
              <td class="align-middle">{{$staff->submitted_date}}</td>
              <td class="align-middle">{{$staff->required_date}}</td>

              <th class="align-middle">{{$staff->issue_date}}</th>
              <td class="align-middle">{{$staff->purpose_activity}}</td>
              <td class="align-middle">{{$staff->item_name_show}}</td>

              <th class="align-middle">{{$staff->unit}}</th>
              <td class="align-middle">{{$staff->quantity_required}}</td>

              <th class="align-middle">{{$staff->quantity_issued}}</th>
              <td class="align-middle">{{$staff->requested_name}}</td>
              <td class="align-middle">{{$staff->approve_name}}</td>
              <th class="align-middle">{{$staff->issue_name}}</th>
              <th class="align-middle">{{$staff->recived_name}}</th>
            </tr>
            @endforeach
            


            
          </tbody>
        </table>