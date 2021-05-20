<table>
    <thead>
    <tr>
    <th>Project Name</th>
              <th>Name Of the Employee</th>
              <th>Designation</th>
              <th>Total Leave Hour</th>
              <th>Leave Start Date</th>
              <th>Leave Start Time</th>
              <th>Leave Ending Date</th>
              <th>Leave Ending Time</th>
              <th>Leave Type</th>
              <th>Staff Standing in during Leave Period</th>
              <th> Submitted To: </th>
              <th> Requested By</th>
              <th> Approved By </th>
    </tr>
    </thead>
    <tbody>
    @foreach($report as $staff)
        <tr>
        <th class="align-middle">{{$staff->project_name}}</th>
              <td class="align-middle">{{$staff->staff_detail->name}}</td>
              <td class="align-middle">{{$staff->staff_detail->designation_name}}</td>
              <td class="align-middle">{{$staff->leave_hour}}</td>

              <th class="align-middle">{{$staff->leave_form}}</th>
              <td class="align-middle">{{$staff->leave_start_time}}</td>
              <td class="align-middle">{{$staff->leave_to}}</td>
              <td class="align-middle">{{$staff->leave_end_time}}</td>

              <th class="align-middle">{{$staff->leave_type_name}}</th>
              <td class="align-middle">{{$staff->standing_person_name}}</td>

              <td class="align-middle">{{$staff->submitted_name}}</td>

              <td class="align-middle">{{$staff->staff_detail->name}}</td>
              <td class="align-middle">{{$staff->approved_name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>