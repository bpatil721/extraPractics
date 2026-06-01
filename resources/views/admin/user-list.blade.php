<table class='table border'>
    <thead>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $val )
            <tr>
                <td> {{ $val->id }} </td>
                <td> {{ $val->name }} </td>
                <td> <button class="editRecord" data-url="{{ url('users/'.$val->id.'/edit') }}" > Edit</button> </td>
                
                
            </tr>
        @endforeach 

    </tbody>
</table>
        <div class="row">
            {{ $data->link() }}
        </div>
