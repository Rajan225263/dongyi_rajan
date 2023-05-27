<table id="dataTable" class="table table-sm table-bordered table-striped">
    <thead>
    <tr>
        <th width="10%">SL</th>
        <th width="50%">Name</th>
        <th width="20%">Balance</th>
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
            <td>{{$list->name}}</td>
            <td>{{number_format($list->balance, 2)}}</td>
            </td>
            <td class="text-center">
                <a class="btn btn-sm btn-success" href="{{route('account.edit',$list->id)}}">
                    <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-sm btn-danger delete" data-id="{{$list->id}}" data-route="{{route('account.delete')}}">

                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
