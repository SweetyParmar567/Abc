<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
.container{
    width:50%;
    height:30%;
    padding:20px;
}
</style>
</head>
 
<body>
    <div class="container">
    <br/><br/>
    @if (Session::has('success'))
            <div class="alert alert-info" id="al">{{ Session::get('success') }}
              <button class="close" onclick="document.getElementById('al').style.display='none'" >&cross;</button>
            </div>
    @endif
    {{-- <form action="{{route('laravel.mailsend')}}" method="post"> --}}
    <form action="/MailSend_Data" method="post">
        @csrf
        <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="name">Subject :</label>
                <input type="text" class="form-control" name="subject">
                @if ($errors->has('subject'))
                    <span class="text-danger text-left">{{ $errors->first('subject') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Message :</label>
                <textarea name="message" class="form-control" cols="20" rows="5"></textarea>
                @if ($errors->has('message'))
                    <span class="text-danger text-left">{{ $errors->first('message') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Reciepent Email :</label>
                 <input type="email" class="form-control" name="email">
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-sm" name="save">Submit</button>
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif         --}}
        </div>
          
         
    </div>
    </form>
</div>
     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>