<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->


@extends('Reports.layouts.index')
@section('content')

<div class="container-fluid">

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
<div class="text-center">
  <h4>Attendance Report For General Employee</h4>
   <h4><b>Employee:</b> {{$employee}}, <b>Date:</b> {{$start_date}} <b>to</b> {{$end_date}}</h4>
 </div>

<div class="row">

 
<div class="col-lg-12">

      <table class="table table-sm table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Serial No.</th>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Working Hour</th>
                                    <th>In-Time</th>
                                    <th>In-Late</th>
                                    <th>Out-Time</th>
                                    <th>Early-Out</th>
                                    <th>Total Work Time</th>
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
            </div>
          </div>
        </div>


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

        @media print {
            html, body {
            font-size: 14px;
        }
           table tr td,table tr th{
            padding-left: 5px;
        }
        /* ... the rest of the rules ... */
    }

     table {
        border-collapse: collapse;
     
    }

     table tr td,table tr th{
        padding: 5px;
    }
</style>


        @endsection



