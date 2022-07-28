<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
        <table border="1px">
            <thead>
            <tr>
                @foreach($table_columns as $key =>  $value)
                    <th>{{ $value }}</th>
                @endforeach

            </tr>
            </thead>
            <tbody>
            @foreach($users as $key =>  $value)
                <tr>
                    <th>{{ $value->id }}</th>
                    <th>{{ $value->name }}</th>
                    <th>{{ $value->email }}</th>
                    <th>{{ $value->email_verified_at }}</th>
                    <th>{{ $value->created_at }}</th>
                    <th>{{ $value->updated_at }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
</body>
</html>
