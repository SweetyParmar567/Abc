<!DOCTYPE html>
<html>
   <head>
      <title>Laravel 8 Form Example Tutorial</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container mt-4">
         @if(session('status'))
         <div class="alert alert-success">
            {{ session('status') }}
         </div>
         @endif
         <div class="card">
            <div class="card-header text-center font-weight-bold">
               Form 
            </div>
            <div class="card-body">
               <form name="add-blog-post-form" id="wizard_form_id" method="post" action="{{url('Wizard')}}">
                  @csrf
                  <div class="form-group">
                     <label for="exampleInputcode">Client Code</label>
                     <input type="text" id="code" name="code" class="form-control">
                     @if ($errors->has('code'))
                     <span class="text-danger">{{ $errors->first('code') }}</span>
                     @endif
                  </div>
                  <div class="form-group">
                     <label for="exampleInputname">Name</label>
                     <input type="text" name="name" id="name" class="form-control" onkeyup="getDataFromDatabase()" list="ice-cream-flavors">
                     @if ($errors->has('name'))
                     <span class="text-danger">{{ $errors->first('name') }}</span>
                     @endif
                  </div>
                  <div class="form-group">
                     <label for="exampleInputEmail">Email</label>
                     <input type="text" name="email" id="email" class="form-control" >
                     @if ($errors->has('email'))
                     <span class="text-danger">{{ $errors->first('email') }}</span>
                     @endif
                  </div>
                  <div class="form-group">
                     <label for="exampleInputtype">Type</label>
                     <input type="text" name="type" id="type" class="form-control" >
                     @if ($errors->has('type'))
                     <span class="text-danger">{{ $errors->first('type') }}</span>
                     @endif
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left: 70%;">View Data</button>
               </form>
               <datalist id="ice-cream-flavors">
                @foreach ($wizard as $value)
                    <option>{{ $value->name }}</option>
                @endforeach
            </datalist>
            </div>
         </div>

         <!-- Modal Open-->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <!-- <div class="modal-dialog" role="document"> -->
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">View Data</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <i aria-hidden="true" class="ki ki-close"></i>
                     </button>
                  </div>
                  <div class="modal-body">
                     <table class="table table-striped" id="wizard_tbl_id">
                        <thead>
                           <tr>
                              <th scope="col">Action</th>
                              <th scope="col">Code</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Type</th>
                              <th scope="col">Download PDF</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($wizard as $user)
                           <tr>
                              {{-- <td><button type="button" name="edit_btn" id="edit_btn" class="btn btn-primary">Edit</button></td> --}}
                                 {{-- <button type="button" name="edit_btn" id="edit_btn" class="btn btn-primary">Update</button> --}}
                              <td>
                                 {{-- <a href="{{url('/Edit',['id' => $user->id])}}"> --}}
                                    <button type="button" name="edit_btn" id="edit_btn" class="btn btn-primary" onclick="EditBtn()">Edit</button>
                                 {{-- </a> --}}
                              </td>
                              {{-- <input type="hidden" value="{{ $user->id }}" id="id" name="id"> --}}
                              <td><input type="text" id="code_td" value="{{ $user->code }}" readonly></td>
                              <td><input type="text" id="name_td" value="{{ $user->name }}" readonly></td>
                              <td><input type="text" id="email_td" value="{{ $user->email }}" readonly></td>
                              <td><input type="text" id="type_td" value="{{ $user->type }}" readonly></td>
                              <td>
                                 {{-- <a href="{{route('DownloadPDF',['name' => $user->name])}}"><img src="{{url('image/dowload.png')}}" style="width: 35px;" alt=""></a> --}}
                                 <a href="{{route('DownloadPDF',['name' => $user->name])}}"><img src="{{url('image/dowload.png')}}" style="width: 35px;" alt=""></a>
                              </td>
                              <td><button type="button" name="update_btn" id="update_btn" class="btn btn-primary" style="display: none;margin-left: -20px;">Update</button></td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-outline-danger font-weight-bold" data-dismiss="modal">Close</button>
                     <!-- <button type="submit" class="btn btn-primary font-weight-bold">Insert</button> -->
                  </div>
               </div>
            </div>
         </div>


         <button id="open-main-modal">Open Main Modal</button>

        <!-- Main Modal -->
        <div id="main-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Main Modal</h2>
                <p>This is the main modal content.</p>
                <!-- Button to open the nested modal -->
                <button id="open-nested-modal">Open Nested Modal</button>
            </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>

   {{-- get data from database --}}
   <script>
        function getDataFromDatabase() {
        var selectedValue = document.getElementById('name').value;

        if (selectedValue === "") {
            // alert(selectedValue);return false;
            // If the textbox is empty, clear all other fields
            $('#code').val("");
            $('#email').val("");
            $('#type').val("");
        } else {
                $.ajax({
                    url: "{{ url('NameData') }}",
                    // url: "{{ route('NameData') }}",
                    method: 'post',
                    data: {
                        selectedValue: selectedValue,
                        _token: '{{ csrf_token() }}'
                    },
                success: function(data) {
                    // alert(data);
                    // return false;
                    $('#code').val(data.code);
                    $('#email').val(data.email);
                    $('#type').val(data.type);
                },
                error: function() {
                    console.error('Error fetching data.');
                }
            });
        }
    }

   </script>

   {{-- <script>
      function EditBtn()
      {
         var name = document.getElementById('name_td').value;
         // alert(name); return false;
         if (name === "") {
            // alert(selectedValue);return false;
            // If the textbox is empty, clear all other fields
            $('#code').val("");
            $('#email').val("");
            $('#type').val("");
        } else {
            $.ajax({
                     url: "{{ url('Edit/{name}') }}",
                     // url: "{{ route('NameData') }}",
                     method: 'post',
                     data: {
                        name: name,
                        _token: '{{ csrf_token() }}'
                     },
                  success: function(data) {
                     alert(data);
                     // return false;
                     $('#code').val(data.code);
                     $('#email').val(data.email);
                     $('#type').val(data.type);
                  },
                  // error: function() {
                  //    console.error('Error fetching data.');
                  // }
            });
         }
      }
   </script> --}}

   {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
   
   {{-- display update button --}}
   {{-- <script>
      $(document).ready(function () {
         // Add a click event handler for the "Edit" button
         $('#edit_btn').click(function () {
               $(this).show();
               $('#update_btn').show();
         });

         // Add a click event handler for the "Save" button
         // $('#update_btn').click(function () {
         //       // Handle the save logic here, if needed

         //       // Hide the "Save" button
         //       $(this).hide();
         //       // Show the "Edit" button
         //       $('#edit_btn').show();
         // });
      });
   </script> --}}

   {{-- field readonly --}}
   {{-- <script>
      $(document).ready(function () {
         $('#edit_btn').click(function () {
            // Toggle readonly for all input fields in the table
            $('#wizard_tbl_id input[type="text"]').each(function () {
               var input = $(this);
                   if (input.prop('readonly')) {
                       // Input is currently readonly, remove readonly
                       input.prop('readonly', false);
                       $(this).show();
                        $('#update_btn').show();
                        //   input.val(''); // Clear the input value
                   } else {
                       // Input is currently editable, make readonly
                       input.prop('readonly', true);
                       $('#update_btn').hide();
                   }
                  });
           });
       });
   </script> --}}


   {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
   function EditBtn() {

      var name = document.getElementById('name').value;
      // alert(id);return false;
      // if (selectedValue === "") {
      //     // alert(selectedValue);return false;
      //     // If the textbox is empty, clear all other fields
      //     $('#code').val("");
      //     $('#email').val("");
      //     $('#type').val("");
      // } else {
              $.ajax({
                  url: "{{ url('Edit/{id}') }}",
                  // url: "{{ route('NameData') }}",
                  method: "post",
                  data: {
                      name: name,
                      _token: "{{ csrf_token() }}"
                  },
              success: function(data) {
                  alert(data);
                  return false;
                  $('#code').val(data.code);
                  $('#email').val(data.email);
                  $('#type').val(data.type);
              },
              error: function() {
                  console.error('Error fetching data.');
              }
          });
      // }
  }

 </script> --}}


   </body>
</html>


$fromDate = $_POST['From_Date'] ?? date('Y-04-01');
if(date('m') < 4) {
    $fromDate = $_POST['From_Date'] ?? date((date('Y') - 1).'-04-01');
}

$toDate = $_POST['To_Date'] ?? date('Y-m-d');
$fromDate1 = $fromDate . " 00:00:00";
$toDate1 = $toDate . " 23:59:59";




{{--Added Input field in table --}}