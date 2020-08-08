
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5629bafd13.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>

function displayWindow(url, width, height) {
        var Win = window.open(url,"displayWindow",'width=' + width + ',height=' + height + ',resizable=0,scrollbars=yes,menubar=no' );
}
</script>
    <title>{{$title}}</title>
  </head>
  <body>
  <div class="jumbotron jumbotron-fluid">
  <h1>{{$title}}</h1>
  <hr>
  <div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><span class="fas fa-plus"></span>&nbsp;Nowa wiadomość</a>
    <a class="nav-link active " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><span class="fas fa-inbox"></span>&nbsp;Odebrane</a>
    
      <a class="nav-link  " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span class="fas fa-envelope-square"></span>&nbsp;Wysłane</a>
    </div>
  </div>
  <div class="col-9">
  <h3>Skrzynka mailowa dla adresu : {{$sender}}</h3>
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

      <table class="table table-sm table-hover">
   
      <thead>

      <th>{{$mailbox1}}</th>
      <th>{{$mailbox2}}</th>
      <th>{{$mailbox3}}</th>
      
      </thead>
      <tbody>
        @foreach($msg as $msg)

      <td>{{ $msg->recipient_mail }}</td>
      <td>{{ $msg->title_mail }}</td>
      <td>{{ $msg->created_at}}</td>
    <td>
    <a href="javascript:displayWindow('showMail/{{$msg->title_mail}}/{{$msg->sender_mail}}/{{$msg->recipient_mail}}/{{$msg->text_mail}}/{{$msg->created_at}}',500,500)" class="btn btn-outline-dark btn-sm" > <span class="fas fa-envelope-open"></span>&nbsp;Podgląd</a>

  </td>  
  </tr>
    @endforeach 
    </table>
       </div>
      <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"><table class="table table-sm table-hover">
      <thead> <!-- Odebrane-->
      <th>{{$mailbox4}}</th>
      <th>{{$mailbox5}}</td>
      <th>{{$mailbox6}}</td>

      </thead>
      <tbody>
        @foreach($recipient as $rec)

      <td>{{$rec->sender_mail}}</td>
      <td>{{$rec->title_mail }}</td>
      <td>{{$rec->created_at}}</td>
      
      <td>
    
<a href="javascript:displayWindow('showMail/{{$rec->title_mail}}/{{$rec->sender_mail}}/{{$rec->recipient_mail}}/{{$rec->text_mail}}/{{$rec->created_at}}',500,500)" class="btn btn-outline-dark btn-sm" > <span class="fas fa-envelope-open"></span>&nbsp;Podgląd</a>


  
      </td>
</tr>

      @endforeach
      
    </table>



      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
      <table class="table table-sm table-bordered">
      <form action="submitMail" method="post">
   @csrf

      <td>Nadawca</td>
      <td><input type="text" name="sender_mail" class="form-control" value="{{$sender}}"></td>

      </tr>
    <tr>
    <td>Odbiorca</td>
      <td><input type="text" class="form-control"  name="recipient_mail" rerequire/>
    </tr>
      <tr>
      <td>Temat wiadomości</td>
      <td><input  type="text"  class="form-control" name="title_mail" require/>
      </tr>
      <tr>
      <td>Treść wiadomości</td>
      <td>

      <textarea maxlength="5000" rows="17" name="text_mail" class="form-control"></textarea>
     

          
      </td>
      </tr>
      <tr>
        <td>Data utworzenia</td>
       <td> <input type="text" class="form-control"  name="created_at" value="{{date('Y-m-d H:i:s') }}"/></td>
      
      </tr>

      <tr>
      <td></td> 
      <td><button class="btn btn-sm btn-outline-success" type="submit">Wyślij</button>
   
      </tr>
      </table>
</form>
      </div>
    </div>
  </div>
</div>


  </div>
  <a href="/welcomelog" class="btn btn-outline-primary">Powrót do strony głównej</a>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>





