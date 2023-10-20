$(document).ready(function(){

    var table = '#projects-table';
    var modal = '#add-project-modal';
    var form = '#add-project-form';

    $(form).on('submit', function(event){
        event.preventDefault();

        var url = $(this).attr('data-action');
        // alert(url);return false;
        $('#add-project-modal').modal('hide');
        location.reload();
        // alert('Data Inserted Successfully');
        $.ajax({
            // url: "{{route('projects.store')}}",
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                // alert(response);exit;
                // var row = '<tr>';
                // // alert(row);return false;
                //     row += '<th scope="row">'+response.id+'</th>';
                //     row += '<td>'+response.title+'</td>';
                //     row += '<td>'+response.title+'</td>';
                // row += '</tr>';

                
                // alert(response);
                // window.close(); Data Inserted
                // $(table).find('tbody').prepend(row);


                // $(form).trigger("reset");
               
            },
            error: function(response) {
            }
        });
    });

    // delete 
    $('body').on('click', '.deletePost', function () {
     
        var id = $(this).data("id");
        // alert(id);return false;
        confirm("Are You sure want to delete this Data!");return false;
      
        $.ajax({
            type: "DELETE",
            url: "{{route('projects.delete')}}"+'/'+id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    // // Edit
    $('body').on('click', '.editPost', function () {
        var id = $(this).data('id');
        $.get("{{ route('ajaxposts.index') }}" +'/' + id +'/edit', function (data) {
            $('#modelHeading').html("Edit Post");
            $('#savedata').val("edit-user");
            $('#ajaxModelexa').modal('show');
            $('#id').val(data.id);
            $('#title').val(data.title);
            $('#description').val(data.description);
        })
     });

    // //  save data
    $('#savedata').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
          data: $('#postForm').serialize(),
          url: "{{ route('ajaxposts.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#postForm').trigger("reset");
              $('#ajaxModelexa').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#savedata').html('Save Changes');
          }
      });
    });

});