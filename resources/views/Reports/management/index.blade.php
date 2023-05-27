@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark">Attendances Reports for Management</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Attendances Reports</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="col-md-12">
            <div class="card">
                {{--  <div class="card-header">
                      <h3>Selec </h3>
                  </div>--}}
                <div class="card-body">
                    <form id="myAttendanceSearchForm"  name="myAttendanceSearchForm" class="form-horizontal" action="#" method="get">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-12 text-right">

                                   <a class="print" href="#" data-status="print" target="_blank">PRINT</a> | 
                                   <a class="pdf" href="#" data-status="pdf">PDF</a> | 
                                   <a class="excel"  href="#" data-status="excel" target="_blank">EXCEL</a> 

                            </div>

                            <div class="col-sm-4">
                                <label class="control-label" for="hrm_employee_id">Management<span class="required">*</span></label>
                                <select id="hrm_employee_id" name="hrm_employee_id" class="form-control form-control-sm select2" required>
                                    <option value="0">All</option>
                                    @foreach ($employeeList as $list)
                                        @if($list['id']==old('hrm_employee_id'))
                                            <option selected
                                                    value="{{$list['id']}}">{{$list['name']}} ({{$list['employee_office_id']}})</option>
                                        @else
                                            <option  value="{{$list['id']}}">{{$list['name']}} ({{$list['employee_office_id']}})</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <label class="control-label" for="start_date">Start Date<span class="required">*</span></label>
                                    
                                <div class="input-group date" id="start_date_calendar" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                               name="start_date" id="start_date"
                                               value="@php echo date('d-m-Y'); @endphp"
                                               placeholder="DD-MM-YYYY" autocomplete="off" maxlength="30"
                                               data-target="#start_date_calendar"  required="" />


                                        <div class="input-group-append" data-target="#start_date_calendar" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>

                                    </div>
                            </div>

                                <div class="col-sm-2">
                                <label class="control-label" for="end_date">End Date<span class="required">*</span></label>
                                    
                                <div class="input-group date" id="end_date_calendar" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                               name="end_date" id="end_date"
                                               value="@php echo date('d-m-Y'); @endphp"
                                               placeholder="DD-MM-YYYY" autocomplete="off" maxlength="30"
                                               data-target="#end_date_calendar" required="" />

                                        <div class="input-group-append" data-target="#end_date_calendar" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>

                                    </div>
                            </div>

                            <div class="col-sm-2 mt-1">
                                <button type="button" class="btn btn-info btn-sm seachAttendance" style="margin-top:28px">
                                    <i class="ion-search"></i> Search</button>
                            </div>

                        </div>

                    </form>

                </div>
            </div>

        </div>

        <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <table id="dataTableAttendance" class="table table-sm table-bordered table-striped">
                        
                            <thead>
                                <tr>
                                  <th>SL</th>
                                  <th>User ID</th>
                                  <th>Name</th>
                                   <th>Date</th>
                                    <th>Day</th>
                                    <th>In-Time</th>
                                    <th>Out-Time</th>
                                    <th>Total Work Time</th>
                                </tr>
                                </thead>
                            

                             <!--    <tbody id="loadMyAttendanceList">

                                </tbody> -->
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>

         <script>


             $(document).ready(function () {

                    generateDatable();

                    $(".seachAttendance").click(function () {

                           var hrm_employee_id=$('#hrm_employee_id :selected').val();    
                            var start_date=$("#start_date").val();
                            var end_date=$("#end_date").val();

                            if(start_date==""){
                                alert("Start date is required");
                                return false;
                            }

                            if(end_date==""){
                                alert("End date is required");
                                return false;
                            }


                              generateDatable();

                      });

                });


             function generateDatable(){


                var dataTableDynamic = $('#dataTableAttendance').DataTable({
                "sPaginationType" : "full_numbers",
                "ajax": {
                        "url" : '{{ route('management-reports.grid') }}',
                       // data:{hrm_employee_id:hrm_employee_id, start_date:start_date, end_date:end_date} 

                             "data": function (d) {
                                            return $.extend({}, d, {
                                                "hrm_employee_id": $('#hrm_employee_id :selected').val(),
                                                "start_date": $('#start_date').val(),
                                                 "end_date": $('#end_date').val(),
                                            });
                                        }
                                        },
                "processing" : true,
                "serverSide" : true,
                 "retrieve" : true,
                //"fixedHeader" : true,
                "lengthMenu" : [[10, 25, 50, 100, 200],[10,25,50,100,200]],
                "pageLength" : 25,
                //"sScrollX" : "110%",
                //"sScrollY" : "600px",
               // "bScrollCollapse": true,
                 columns: [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex', orderable:false,serachable:false, "width": "5%",},
                    {data: 'employee_office_id', name: 'employee_office_id', "width": "10%"},
                    {data: 'name', name: 'name', "width": "25%"},
                    {data: 'date', name: 'date', "width": "20%"},
                    {data: 'day', name: 'day', "width": "10%"},
                    {data: 'in_time', name: 'in_time', "width": "10%"},
                    {data: 'out_time', name: 'out_time', "width": "10%"},
                    {data: 'total_work_time', name: 'total_work_time', "width": "10%"},

                ]
            });

                dataTableDynamic.draw();

                }


            

            function LoadAttendanceGrid() {
               // search();
                  exportUrlUpdate(); 
            }
      
            //----------------Export------------------
           function exportUrlUpdate(){

                var url = "{{ route('management-reports.exports') }}";
               // var employee_id=$("#hrm_employee_id").val();
                var employee_id=$('#hrm_employee_id :selected').val();
                var start_date=$('#start_date').val();
                var end_date=$('#end_date').val();


                     // For PRINT
                 url_pdf=url+'?status=print&hrm_employee_id='+employee_id+'&start_date='+start_date+'&end_date='+end_date;
                 $(".print").attr("href", url_pdf); 
                 $(".print").attr("target", '_blank');


                // For PDF
                 url_pdf=url+'?status=pdf&hrm_employee_id='+employee_id+'&start_date='+start_date+'&end_date='+end_date;;
                 $(".pdf").attr("href", url_pdf); 
                 $(".pdf").attr("target", '_blank'); 


                 // For excel
                 url_pdf=url+'?status=excel&hrm_employee_id='+employee_id+'&start_date='+start_date+'&end_date='+end_date;;
                 $(".excel").attr("href", url_pdf); 
                 $(".excel").attr("target", '_blank'); 

            }

            $(".print, .excel, .pdf").click(function () {


                var start_date=$("#start_date").val();
                 var end_date=$("#end_date").val();

                if(start_date==""){
                    alert("Start date is required");
                    return false;
                }

                if(end_date==""){
                    alert("End date is required");
                    return false;
                }

            exportUrlUpdate();

            });


        //----------------Export End------------------


                  
                $(function () {
                    //Date picker
                    $('#start_date_calendar').datetimepicker({
                        format: 'DD-MM-YYYY',
                    });

                    $('#end_date_calendar').datetimepicker({
                        format: 'DD-MM-YYYY'
                    });
        });

        </script>

@endsection


