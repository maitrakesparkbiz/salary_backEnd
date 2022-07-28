<table>
    <thead>

    <tr>
        @foreach($table_columns as $key =>  $value)
                    <th>{{ $value }}</th>
        @endforeach

    </tr>
    </thead>
    <tbody>
        @foreach($User as $key =>  $value)
        <tr>
            <th>{{ $value->id }}</th>
            <th>{{ $value->name }}</th>
            <th>{{ $value->email }}</th>
            <th>{{ $value->email_verified_at }}</th>
            <th>{{ $value->password }}</th>
            <th>{{ $value->created_at }}</th>
            <th>{{ $value->updated_at }}</th>
        </tr>
    @endforeach
    </tbody>
</table>
