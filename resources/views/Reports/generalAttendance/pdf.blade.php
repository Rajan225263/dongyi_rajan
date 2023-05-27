
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Reports</title>
</head>

<body>

<table width="100%" border="0" align="center" id="reportTable">
<tr>
    <td colspan="11" align="center" valign="top"><b>Attendance Report For General Employee </b></td>
  </tr>
   <tr>

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

    <td colspan="11" align="center" valign="top"><b>Employee:</b> {{$employee}}, <b>Date:</b> {{$start_date}} <b>to</b> {{$end_date}}</td>
  </tr>
</table>

<table width="100%" border="1" align="center" id="reportTable">

  
 <thead>
  <tr>
    <th width="5%" align="left" valign="middle">SL</th>
    <th width="15%" align="left" valign="middle">Employee ID</th>
    <th width="9%" align="left" valign="middle">Name</th>
    <th width="13%" align="left" valign="middle">Date</th>
    <th width="7%" align="left" valign="middle">Day</th>
    <th width="7%" align="left" valign="middle">Working Hour</th>
    <th width="9%" align="left" valign="middle">In-Time</th>
    <th width="6%" align="left" valign="middle">In-Late</th>
    <th width="10%" align="left" valign="middle">Out-Time</th>
    <th width="5%" align="left" valign="middle">Early-Out</th>
    <th width="14%" align="left" valign="middle">Total Work Time</th>
  </tr>
</thead>
      <tbody>
  
                    @php
                    $i=1;

                    @endphp

                      @foreach($data as $list)

               

                           <tr>
                          <td>{{$i++}}</td>
                          <td>{{$list['employee_office_id']}}</td>
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



<style type="text/css">
    #reportTable thead{
        display:table-header-group;/*repeat table headers on each page*/
    }
    #reportTable tbody{
        display:table-row-group;
    }
    #reportTable tfoot{
        display:table-footer-group;/*repeat table footers on each page*/
    }

     table {
        border-collapse: collapse;
        font-size: 14px;
    }

     table tr td,table tr th{
        padding: 5px;
    }

    @page {
        size: A4 portrait;
        margin: 65px auto;
        /*        margin: 10 20;*/

    }
    @media print {
        html, body {
            font-size: 100px;
        }
        /* ... the rest of the rules ... */
    }


</style>
<script>window.print();</script>
</body>
</html>
