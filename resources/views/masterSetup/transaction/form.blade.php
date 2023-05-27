@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Transactions</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage Transactions</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>{{$title}} Transaction</h5>
            </div>
            <!-- Form Start-->
            <form id="transactionForm" name="transactionForm" method="POST" @if($data->id)
                action="{{ route('transaction.update', ['id' => $data->id]) }}">
                <input name="_method" type="hidden" value="PUT">
                @else
                action="{{ route('transaction.store') }}">
                @endif
                @csrf

                <input type="hidden" id="id" name="id" value="{{$data->id}}">
                <div class="card-body">
                    <div class="row">

                        <div class="col-sm-6">

                            @php
                            $date="";

                            if($data->date){
                            $date=date('d-m-Y', strtotime($data->date));
                            }

                            @endphp

                            <div class="form-group">
                                <label class="control-label" for="date">Transaction Date<span style="color: red;"> *</span></label>
                                <div class="input-group date" id="date_calendar" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input @error('date') is-invalid @enderror" name="date" id="date" value="{{old('date', $date)}}" placeholder="DD-MM-YYYY" autocomplete="off" maxlength="30" data-target="#date_calendar" />
                                    <div class="input-group-append" data-target="#date_calendar" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>

                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="account_id">Account<span
                                            style="color: red;"> *</span></label>
                                    <select id="account_id" name="account_id" class="select2 form-control @error('account_id') is-invalid @enderror">
                                        <option value="">Select Account</option>
                                      
                                        @foreach ($accountList as $key => $value)
                                            @if($key==$data->account_id or $key==old('account_id'))
                                                <option selected
                                                        value="{{$key}}">{{$value}}</option>
                                            @else
                                                <option  value="{{$key}}">{{$value}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('account_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label" for="type">Type<span style="color: red;"> *</span></label>
                                <input type="text" id="type" name="type" value="{{old('type', $data->type)}}" class="form-control @error('type') is-invalid @enderror" placeholder="Enter type" autocomplete="off">

                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label" for="amount">Amount<span style="color: red;"> *</span></label>
                                <input type="number" id="amount" name="amount" value="{{old('amount', $data->amount)}}" class="form-control @error('amount') is-invalid @enderror" placeholder="Enter Amount" autocomplete="off" min="0"  step="any">

                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">
                                @if($data->id)
                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                                @else
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                                <button type="reset" class="btn btn-danger btn-sm">Clear</button>
                                @endif
                                <button type="button" class="btn btn-default btn-sm ion-android-arrow-back">
                                    <a href="{{route('transaction.index') }}">Back</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--Form End-->
        </div>
    </div>
</div>


<script>
    $(function() {
        //Date picker
        $('#date_calendar').datetimepicker({
            format: 'DD-MM-YYYY'
        });
    })
</script>

@endsection