<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script>

function displayWindow(url, width, height) {
        var Win = window.open(url,"displayWindow",'width=' + width + ',height=' + height + ',resizable=0,scrollbars=yes,menubar=no' );
};
</script>
    <title>{{$title}}</title>
  </head>
  <body>
    <h1>{{$title}}</h1>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dane podstawowe + kontaktowe</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Adresy [zameldowania + zamieszkania/korespondecyjny]</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Dane umowy</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
<table class="table table-dark table-hover ">

@foreach($person as $p) 
<tr>
<td><label class="badge badge-dark">Imię</label></td>
<td>{{$p->name_contract}}</td>
</tr>
<tr>
<td><label class="badge badge-dark">Nazwisko</label></td>
<td>{{$p->surname_contract}}</td>
</tr>
<tr>
  <td><label class="badge badge-dark">PESEL</label></td>
  <td>{{$p->pesel_contract}}</td>
</tr>
<tr>
  <td><label class="badge badge-dark">Dokument tożsamości</label></td>
  <td>{{$p->document_contract}}&nbsp;<button onclick="displayWindow('edit/file-upload',500,500)" class="btn btn-outline-warning btn-sm">Wyślij wniosek o edycję</button></td>
</tr>
<tr>
  <td><label class="badge badge-dark">Adres e-mail firmowy / prywatny</label></td>
  <td>
    {{$p->email}}<br>
      {{$p->email_contract}}   <a href="javascript:displayWindow('edit/email',500,500)"  class="btn btn-outline-success btn-sm">Edycja</button>
        
  </td>


</tr>
<tr>
<tr>
  <td><label class="badge badge-dark">Numer telefonu</label></td>
  <td>{{$p->telephone_contract}} <a href="javascript:displayWindow('edit/telephone',500,500)" class="btn btn-outline-success btn-sm">Edycja</button></td>
</tr>
<tr>
<td>  <button class="btn btn-outline-success btn-sm" onclick="location.reload()">Aby zaczytać nowe dane kliknij </button></td>

</tr>

@endforeach

</table>

  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Adres zameldowania&nbsp;<a href="javascript:displayWindow('edit/regaddress',500,500)" class="btn btn-outline-success btn-sm">Edycja</a></h5>
        <p class="card-text">
          
   <table class="table table-dark table-bordered">
     <tr>
       <td><label class="badge badge-dark">Kod pocztowy</label></td>
       <td>{{$p->regCode}}</td>
     </tr>
     <tr>
       <td><label class="badge badge-dark">Kraj</label></td>
       <td>{{$p->regCountry}}</td>
     </tr>
     <tr>
       <td><label class="badge badge-dark">Miejscowość</label></td>
       <td>{{$p->regCity}}</td>
     </tr>
     <tr>
       <td><label class="badge badge-dark">Ulica</label></td>
       <td>{{$p->regStreet}}</td>
     </tr>
     <tr>
       <td><label class="badge badge-dark">Numer budynku</label></td>
       <td>{{$p->regHouse}}</td>
     </tr>
     <tr>
       <td><label class="badge badge-dark">Numer mieszkania</label></td>
       <td>{{$p->regFlat}}</td>
     </tr>
     <tr>
<td>  <button class="btn btn-outline-success btn-sm" onclick="location.reload()">Aby zaczytać nowe dane kliknij </button></td>

</tr>

   </table>
        </p>


      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Adres zamieszkania/korespondecyjny&nbsp;<a href="javascript:displayWindow('edit/corraddress',500,500)" class="btn btn-outline-success btn-sm">Edycja</a></h5>
        <p class="card-text">
    <table class="table table-dark table-bordered  ">
      <tr>
        <td><label class="badge badge-dark">Kod pocztowy</label></td>
        <td>{{$p->corrCode}}</td>

      </tr>
      <tr>
        <td><label class="badge badge-dark">Kraj</label></td>
        <td>{{$p->corrCountry}}</td>

      </tr>
<tr>
        <td><label class="badge badge-dark">Miejscowość</label></td>
        <td>{{$p->corrCity}}</td>
        
      </tr>
      <tr>
        <td><label class="badge badge-dark">Ulica</label></td>
        <td>{{$p->corrStreet}}</td>
        
      </tr>
      <tr>
        <td><label class="badge badge-dark">Numer mieszkania</label></td>
        <td>{{$p->corrHouse}}</td>
        
      </tr>
      <tr>
        <td><label class="badge badge-dark">Numer lokalu</label></td>
        <td>{{$p->corrFlat}}</td>
        
      </tr>
      <tr>
<td>  <button class="btn btn-outline-success btn-sm" onclick="location.reload()">Aby zaczytać nowe dane kliknij </button></td>

</tr>


    </table>

        </p>

      </div>
    </div>
  </div>
</div>

<!--...-->
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
<table class="table table-dark table-bordered ">
<tr>
  <td><label class="badge badge-dark">Data podpisania umowy</label></td>
  <td>{{$p->dateContract}}</td>
</tr>
<tr>
<td><label class="badge badge-dark">Rodzaj umowy</label></td>
<td>{{$p->typeContract}}</td>

</tr>
<tr>
  <td><label class="badge badge-dark">Dział</label></td>
  <td>{{$p->branchContract}}</td>
</tr>
</table>


  </div>
</div>
<a href="/welcomelog">Powrót</a>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>