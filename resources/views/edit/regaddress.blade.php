<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>{{$title}}</title>
  </head>
  <body class="jumbotron ">
@foreach($person as $p) 
<h2>Edycja danych dla pracownika {{$p->name_contract}} {{$p->surname_contract}}</h2>   
<form action="/submitreg" method="post">

@csrf

<ul class="list-group">
    <p class="alert alert-dark">W przypadku braku zmiany danych wpisz obecne</p>
Obecny adres zameldowania:
<li class="list-group-item">{{$p->regCode}} {{$p->regCountry}}</li>
<li class="list-group-item">{{$p->regCity}} ul. {{$p->regStreet}} {{$p->regHouse}}/{{$p->regFlat}}</li>
<li class="list-group-item"><label class="badge badge-dark">Kod pocztowy</label><input type="text" class="form-control"  name="regCode"/></li>
<li class="list-group-item"><label class="badge badge-dark">Kraj</label><input type="text" class="form-control"  name="regCountry"/></li>
<li class="list-group-item"><label class="badge badge-dark">Miejscowość</label><input type="text" class="form-control"  name="regCity"/></li>
<li class="list-group-item"><label class="badge badge-dark">Ulica</label><input type="text" class="form-control" name="regStreet"/></li>
<li class="list-group-item"><label class="badge badge-dark">Numer domu / numer lokalu(mieszkania)</label><input type="text"   name="regHouse"/> / <input type="text"   name="regFlat"/>
<li class="list-group-item"><button class="btn btn-outline-success btn-sm" type="submit">Zapisz</button><button class="btn btn-outline-dark btn-sm" type="reset">Wyczyść dane</button></li>
</ul>
</form>
@endforeach

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>