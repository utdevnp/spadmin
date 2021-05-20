        <table>
          <thead>
            <tr>
              <th>Project Name</th>
              <th>Name Of the Employee</th>
              <th>Designation</th>
              @foreach($leaveType as $type)
                <th>{{$type->name}}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
          
          @foreach($report as $leave)
            <tr class="btn-reveal-trigger">
            <th class="align-middle">{{$leave->project_title}}</th>
              <td class="align-middle">{{$leave->name}}</td>
              <td class="align-middle">{{$leave->designation_name}}</td>
                @if($leave->leave_report)
                    @foreach($leave->leave_report as $leavereport)
                        <td class="align-middle">{{$leavereport->leave_zero}}</td>
                    @endforeach
                @else 
                  @foreach($leaveType as $type)
                  <td class="align-middle"></td>
                  @endforeach
                @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      