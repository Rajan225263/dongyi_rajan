<!-- @php
    $i=1;

@endphp

@foreach($data as $list)

        <tr>
          <td>{{$i++}}</td>
          <td>{{$list->employee_office_id}}</td>
          <td>{{$list->name}}</td>
          <td>{{$list->date}}</td>
          <td>{{$list->day}}</td>
          <td>{{$list->working_our}}</td>
          <td>{{$list->in_time}}</td>
         <td @if($list->in_late) style="color:red" @endif>{{$list->in_late}}</td>
          <td style="">{{$list->out_time}}</td>
          <td @if($list->early_out) style="color:red" @endif>{{$list->early_out}}</td>

          @php 
          $color="";
            $covert_w_h=date('H:i', strtotime($list->total_work_time));

            if($list->working_our>$covert_w_h){
             $color="red";
          }

        @endphp
           <td style="color: {{$color}}">{{$list->total_work_time}}</td>
    </tr>

    </tr>
@endforeach
 -->