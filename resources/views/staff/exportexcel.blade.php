<table>
    <thead>
    <tr>
        <th>Fiscal Year</th>
        <th>Staff /Consultant Name</th>
        <th>Designation</th>
        <th >Duty Station</th>
        <th >Joining Date</th>
        <th>Contract End Date</th>
        <th>Project Name</th>
        @foreach($leaveType as $type)
                <th>{{$type->name}}</th>
              @endforeach
            
              <th> Document </th>
    </tr>
    </thead>
    <tbody>
    @foreach($staffs as $staff)
        <tr>
        <th class="align-middle">{{$staff->fiscal_year}}</th>
            <th class="align-middle">{{$staff->name}}</th>
            <td >{{$staff->designation_name}}</td>
            <td>{{$staff->duity_station}}</td>
            <td class="align-middle">{{$staff->join_date}}</td>

            <th class="align-middle">{{$staff->contract_end_date}}</th>
            <td class="align-middle">{{$staff->project_title}}</td>
            @if($staff->leave_report)
                @foreach($staff->leave_report as $type)
                  <th>{{$type->total_hour}}</th>
                @endforeach
              @endif
            <td class="align-middle">{{url(route("document",['document'=>$staff->id]))}}</td>
        </tr>
    @endforeach
    </tbody>
</table>