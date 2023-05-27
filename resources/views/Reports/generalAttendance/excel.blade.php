 <table>
    <thead>
      <tr>
    <td colspan="11" align="center" valign="top" style="font-size: 15px;"><b>Attendance Report For General Employee </b></td>
  </tr>
   
  @php 
      if($hrm_employee_id==0){
      $employee="All";
    }else{
       $employee="";
        if($data){
        $employee= $data[0]['name'];
      }       
  }

  @endphp 
    <tr>
    <td colspan="11" align="center" valign="top" style="font-size: 15px;"><b>Employee:</b> {{$employee}}, <b>&nbsp;Date:</b> {{$start_date}} <b> &nbsp;to&nbsp;</b> {{$end_date}}</td>
   </tr>

    <tr>
    <th width="5" align="center" style="font-weight: bold;">SL</th>
    <th width="15" align="left" style="font-weight: bold;">Employee ID</th>
    <th width="30" align="left" style="font-weight: bold;">Name</th>
    <th width="15" align="left" style="font-weight: bold;">Date</th>
    <th width="15" align="left" style="font-weight: bold;">Day</th>
    <th width="15" align="left" style="font-weight: bold;">Working Hour</th>
    <th width="15" align="left" style="font-weight: bold;">In-Time</th>
    <th width="15" align="left" style="font-weight: bold;">In-Late</th>
    <th width="15" align="left" style="font-weight: bold;">Out-Time</th>
    <th width="15" align="left" style="font-weight: bold;">Early-Out</th>
    <th width="15" align="left" style="font-weight: bold;">Total Work Time</th>
    </tr>
    </thead>
    <tbody>
     @php
      $i=1;

      @endphp

      @foreach($data as $list)
          <tr>
          <td align="center">{{$i++}}</td>
          <td align="left">{{$list['employee_office_id']}}</td>
          <td>{{$list['name']}}</td>
          <td>{{$list['date']}}</td>
          <td>{{$list['day']}}</td>
          <td>{{$list['working_our']}}</td>
          <td>{{$list['in_time']}}</td>
         <td @if($list['in_late']) style="color:red" @endif>{{$list['in_late']}}</td>
          <td style="">{{$list['out_time']}}</td>
          <td @if($list['early_out']) style="color:red" @endif>{{$list['early_out']}}</td>

          @php 
          $color="";
            $covert_w_h=date('H:i', strtotime($list['total_work_time']));

            if($list['working_our']>$covert_w_h){
             $color="red";
          }

        @endphp
           
      <td style="color: {{$color}}">{{$list['total_work_time']}}</td>
      </tr>
   @endforeach
    </tbody>
</table>


