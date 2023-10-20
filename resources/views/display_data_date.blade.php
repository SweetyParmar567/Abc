<html>
<head>
    <title>Data Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js">
</head>
<body>
    <h3 class="text-center mb-4" >Data Table</h3>
<div class="container">
    <form action="{{route('Data')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-4">
                <label for="fromDate">From Date:</label>
                <input type="date" class="form-control" name="fromDate" id="fromDate" value="{{$fromDate1}}">
                @if ($errors->has('fromDate'))
                    <span class="text-danger">{{ $errors->first('fromDate') }}</span>
                @endif
            </div>
            <div class="col-lg-4">
                <label for="toDate">To Date:</label>
                <input type="date" class="form-control" name="toDate" id="toDate" value="{{$toDate1}}">
                @if ($errors->has('toDate'))
                    <span class="text-danger">{{ $errors->first('toDate') }}</span>
                @endif
            </div>
            <div class="col-lg-4" style="margin-top:30px;">
                <button class="form-comtrol btn btn-primary" type="submit" id="submit_btn" name="submit_btn">Submit</button>
                <a href="{{url('Wizard')}}" class="form-comtrol btn btn-primary" id="insert_form" name="insert_form">Add Data
                    {{-- <button class="form-comtrol btn btn-primary" type="submit" id="insert_form" name="insert_form">Add Data</button> --}}
                </a>
            </div>
        </div>
    </form>

    <table class="table table-striped" id="data-table" style="width:100%;">
        <thead>
          <tr>
            {{-- <th scope="col">#</th> --}}
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
            <th scope="col">created_at</th>
            <th scope="col">PDF Download</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $user)
            <tr>
                {{-- <td><button type="button" name="edit_btn" id="edit_btn" class="btn btn-primary">Edit</button></td> --}}
                    {{-- <button type="button" name="edit_btn" id="edit_btn" class="btn btn-primary">Update</button> --}}
                <td>{{ $user->code }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->type }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a href="{{url('DownloadPDF',['name' => $user->name])}}"><img src="{{url('image/dowload.png')}}" style="width: 35px;" alt=""></a>
                </td>
                <td><button type="button" name="update_btn" id="update_btn" class="btn btn-primary" style="display: none;">Update</button></td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.getElementById('submit_btn');
            const dataTable = document.getElementById('data-table');

            toggleButton.addEventListener('click', function () {
                if (dataTable.style.display === 'none') {
                    dataTable.style.display = 'table';
                } else {
                    dataTable.style.display = 'none';
                }
            });
        });
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Check if the page was refreshed
            if (performance.navigation.type === 1) {
                // Page was refreshed, hide the table
                document.getElementById('data-table').style.display = 'none';
            }
        });
    </script>
</body>
</html>
