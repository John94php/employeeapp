<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
    <title>{{$title_mail}}</title>
  </head>
  <body>
    <h1>{{$title_mail}}</h1>

      {{Form::open(['action'=>'MailController@answer'])}}

    <p class="alert alert-dark"  value="{{$sender_mail}}">Nadawca: {{$sender_mail}}</p>
    <p class="alert alert-dark" >Odbiorca: {{$recipient_mail}}</p>
    <p class="alert alert-dark" >Data: {{$created_at}}</p>
    <p class="alert alert-dark" >{{$text_mail}}</p>
    <h3>ODPOWIEDŹ</h3>
    <div class="form-group">
    {{Form::label('sender_mail','Nadawca')}}
  <input type="text" readonly class="form-control"  name="sender_mail" value="{{$recipient_mail}}"/>
  <input type="hidden" name="recipient_mail" value="{{$sender_mail}}"/>
    </div>
<div class="form-group">
{{Form::label('title_mail','Tytuł')}}
<input type="text" class="form-control" name="title_mail" value="Re: {{$title_mail}}" />
<hr>
{{ Form::label('text_mail','Treść')}}

<textarea name="text_mail" class="form-control"></textarea>
{{Form::label('created_at','Data odpowiedzi')}}
<input type="text" name="created_at" value="{{date('Y-m-d H:i:s')}}"/>
</div>
<button class="btn btn-success" type="submit">Odpowiedz!</button>
{{Form::close()}}
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>