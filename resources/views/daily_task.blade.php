<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
    <form method="post" action="{{route('addData')}}">
      @csrf
      <h2>Employee Details</h2><br>
      <div class="form-group">
        <label>Id</label>
        <input type="text" name="e_id" id="e_id" class="form-control" placeholder="Enter Employee_Id">
        @if ($errors->has('e_id'))
            <span class="text-danger">{{ $errors->first('e_id') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="e_name" id="e_name" class="form-control" placeholder="Enter Your Name" onkeyup="getDataFromDatabase()" list="getdataname">
        @if ($errors->has('e_name'))
            <span class="text-danger">{{ $errors->first('e_name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label>Email address</label>
        <input type="email" name="e_email" id="e_email" class="form-control" placeholder="Enter Your Email">
        @if ($errors->has('e_email'))
            <span class="text-danger">{{ $errors->first('e_email') }}</span>
        @endif
      </div>
      <div class="form-group">
        <h2>Task Details</h2><br>
        <div class="form-group">
            <label>To Mail : </label>
            <input type="email" name="manager_email" id="manager_email" class="form-control" placeholder="">
            @if ($errors->has('manager_email'))
              <span class="text-danger">{{ $errors->first('manager_email') }}</span>
            @endif
        </div>
        <div class="form-group">
          <label>Monday</label>
          <input type="text" name="t_mon" class="form-control" placeholder="Task done by Monday">
          @if ($errors->has('t_mon'))
            <span class="text-danger">{{ $errors->first('t_mon') }}</span>
          @endif
        </div>
  
        <div class="form-group">
          <label>Tuesday</label>
          <input type="text" name="t_tue" class="form-control" placeholder="Task done by Tuesday">
          @if ($errors->has('t_tue'))
            <span class="text-danger">{{ $errors->first('t_tue') }}</span>
          @endif
        </div>
  
        <div class="form-group">
          <label>Wednesday</label>
          <input type="text" name="t_wed" class="form-control" placeholder="Task done by Wednesday">
          @if ($errors->has('t_wed'))
            <span class="text-danger">{{ $errors->first('t_wed') }}</span>
          @endif
        </div>
  
        <div class="form-group">
          <label>Thursday</label>
          <input type="text" name="t_thu" class="form-control" placeholder="Task done by Thursday">
          @if ($errors->has('t_thu'))
            <span class="text-danger">{{ $errors->first('t_thu') }}</span>
          @endif
        </div>
  
        <div class="form-group">
          <label>Friday</label>
          <input type="text" name="t_fri" class="form-control" placeholder="Task done by Friday">
          @if ($errors->has('t_fri'))
            <span class="text-danger">{{ $errors->first('t_fri') }}</span>
          @endif
        </div>
      </div>
      <div class="form-group"></div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <datalist id="getdataname">
        @foreach ($wizard as $value)
            <option>{{ $value->name }}</option>
        @endforeach
    </datalist>
  </div>



  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
   <script>
        function getDataFromDatabase() {
        var selectedValue = document.getElementById('e_name').value;
        // alert(selectedValue);return false;
        if (selectedValue === "") {
            // alert(selectedValue);return false;
            // If the textbox is empty, clear all other fields
            $('#e_id').val("");
            $('#e_email').val("");
            // $('#type').val("");
        } else {
                $.ajax({
                    // url: "{{ url('NameData') }}",
                    url: "{{ route('NameData') }}",
                    method: 'post',
                    data: {
                        selectedValue: selectedValue,
                        _token: '{{ csrf_token() }}'
                    },
                success: function(data) {
                    // alert(data);
                    // return false;
                    $('#e_id').val(data.code);
                    $('#e_email').val(data.email);
                    // $('#type').val(data.type);
                },
                error: function() {
                    console.error('Error fetching data.');
                }
            });
        }
    }

   </script>