<!DOCTYPE html>

<html>

<head>

    <title>{{$title}}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

  

<body class="jumbotron jumbotron-fluid">

<div class="container ">

   

    <div class="panel panel-primary">

      <div class="panel-heading"><h2>{{$title}}</h2></div>

      <div class="panel-body">


        @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

        </div>

        <img src="uploads/{{ Session::get('file') }}">

        @endif

  

        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

  

        <form action="{{ route('file.upload.post') }}" name="post" method="POST" enctype="multipart/form-data">

            @csrf
            @foreach($person as $p) 

   <input type="hidden" name="id_contract" value="{{$p->id_contract}}"/>
   <label class="badge badge-success">Obecny numer i seria dokumentu</label><br>
<input type="text" readonly class="alert alert-success" name="olddata" value="{{$p->document_contract}}"></p>    
<label class="badge badge-dark">Powód złożenia wniosku:</label>
<select class="form-control" name="reason">
<option value="Dokument stracił ważność"> Dokument stracił ważność</option>
<option value="Błędne dane">Błędne dane</option>
</select>
<p class="badge badge-success">Wprowadź nowy numer i serię dokumentu tożsamości</p>
<input type="text" name="newdata" class="form-control"/>
   @endforeach

            <div class="row">

  

                <div class="col-md-6">

                    <input type="file" id='file' name="file" class="form-control">
                    <input type="hidden"  id="fileName"  name="fileName"/>

                </div>

   

                <div class="col-md-6">

                    <button type="submit" class="btn btn-outline-success btn-sm">Zapisz</button>
                    <button type="reset" class="btn btn-outline-warning btn-sm">Wyczyśc dane</button>
                    <button class="btn btn-outline-dark btn-sm" onclick="window.close()">Zamknij okno</button>
</form>
                </div>

   

            </div>

        </form>

  

      </div>

    </div>

</div>
<script>
document.getElementById('file').onchange = function() {

    var nazwa  = document.forms[0].file.value.split(/[\\\/]/).reverse()[0];
    document.getElementById('fileName').value = nazwa;
    console.log(nazwa);
}
</script>
</body>

  

</html>