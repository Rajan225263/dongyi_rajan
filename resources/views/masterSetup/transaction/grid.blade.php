<table id="dataTable" class="table table-sm table-bordered table-striped">
    <thead>
        <tr>
            <th width="10%">SL</th>
            <th width="20%">Date</th>
            <th width="20%">Account Name</th>
            <th width="20%">Amount</th>
            <th width="10%">Type</th>
            <th width="20%" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>

        @php
        $i=1;
        @endphp

        @foreach($data as $list)

        <tr>
            <td>{{$i++}}</td>
            <td>{{$list->date}}</td>
            <td>{{$list->account->name}}</td>
            <td>{{number_format($list->amount, 2)}}</td>
            <td>{{$list->type}}</td>
            </td>
            <td class="text-center">
                <a class="btn btn-sm btn-success" href="{{route('transaction.edit',$list->id)}}">
                    <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-sm btn-danger delete" data-id="{{$list->id}}" data-route="{{route('transaction.delete')}}">

                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>