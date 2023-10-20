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
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                              {{-- <th scope="col">Action</th> --}}
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
                              <td readonly>{{ $user->code }}</td>
                              <td readonly>{{ $user->name }}</td>
                              <td readonly>{{ $user->email }}</td>
                              <td readonly>{{ $user->type }}</td>
                              <td readonly>
                                 {{-- <a href="{{route('DownloadPDF',['name' => $user->name])}}"><img src="{{url('image/dowload.png')}}" style="width: 35px;" alt=""></a> --}}
                                 <a href="{{url('DownloadPDF',['name' => $user->name])}}"><img src="{{url('image/dowload.png')}}" style="width: 35px;" alt=""></a>
                              </td>
                              <td><button type="button" name="update_btn" id="update_btn" class="btn btn-primary" style="display: none;">Update</button></td>
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
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
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

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <script>
      $(document).ready(function () {
         // Add a click event handler for the "Edit" button
         $('#edit_btn').click(function () {
               // Hide the "Edit" button
               $(this).show();
               // Show the "Save" button
               $('#update_btn').show();
         });

         // Add a click event handler for the "Save" button
         // $('#update_btn').click(function () {
         //       // Handle the save logic here, if needed

         //       // Hide the "Save" button
         //       $(  vb   ,).hide();
         //       // Show the "Edit" button
         //       $('#edit_btn').show();
         // });
      });
   </script>


   </body>
</html>