<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>{{$title}}</title>
  </head>
  <body>
    <h1>{{$title}}</h1>


<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-outline-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Złóż wniosek urlopowy
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <table class="table table-dark table-sm">
            <form action="vacation" method="post">
              @csrf
            <tr>
                <td><label class="badge badge-light">Imię Nazwisko</label></td>
                <td >
                @foreach($person as $p)
                     {{$p -> name_contract}} {{$p->surname_contract}}
                        <input type="hidden" name="id_contract" value="{{$p->id_contract}}"/>
            
                @endforeach
                </td>

            </tr>
            <tr>
                <td><label class="badge badge-light">Typ urlopu</label></td>
                <td>
        <select class="form-control"  name="type_vacation">
        @foreach($person as $p)
            @if($p->typeContract ==='Umowa Zlecenie')
            <option>Urlop bezpłatny</option>
            @else
            <option >Urlop płatny[max.14 dni]</option>
            <option>Urlop na żądanie[1 dzień]</option>
            <option>Urlop z powodu śmierci bliskiej osoby[2 dni]</option>
            <option>Urlop z okazji ślubu[3 dni]</option>
            <option>Urlop z okazji narodzin dziecka[4 dni]</option>
          
            @endif
            @endforeach
        </select>
              <input type="hidden" name="status_vacation" value="Waiting">
                </td>
            </tr>
            <tr>
                <td><label class="badge badge-light">DATA początkowa</label></td>
                <td><input type="text" placeholder="YYYY-MM-DD" name="dateStart" id="date1"/></td>
                
            </tr>
            <tr>
                <td><label class="badge badge-light">DATA końcowa </label></td>
                <td><input type="text" placeholder="YYYY-MM-DD" name="dateEnd" id="date2" /></td>
                
            </tr>
            <tr>
                <td><label class="badge badge-light">Ilość dni</label></td>
                <td><p class="btn btn-light btn-sm" onclick="countDay()">Wylicz liczbę dni</p><br><input type="text" name="countDays" id="countDay"></p>
              
              </td>
            </tr>
        <tr>
          <td><label class="badge badge-light">Data i godzina utworzenia wniosku:</label></td>
          <td> <input type="text" readonly name="created_atVacation" value="{{date('Y-m-d H:i:s',strtotime('+2 hours'))}}"/></td>
        </tr>

            <tr>
                <td>&nbsp;</td>
                <td><button class="btn btn-outline-success btn-sm" type="submit">Kontrola</button>
                    <button class="btn btn-outline-warning btn-sm" type="reset">Wyczyść dane</button>
            </td>
            </tr>
        </table>
    </form>
</div>

    </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-outline-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Lista wniosków urlopowych
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      <table class="table table-dark table-sm">
    <thead>
        <th>Przedział datowy</th>
        <th>Ilość dni</th>
        <th>Status</th>
        <th>Typ urlopu</th>
        <th>Utworzono</th>
        <th>Zmodyfikowano</th>
        <th>Akcja</th>
    </thead>
        <tbody>

            @foreach($data as $l)
            <tr>
            <td>{{$l->dateStart}} - {{$l->dateEnd}}</td>
            <td>{{$l->countDays}}</td>
            <td>{{$l->status_vacation}}</td>
            <td>{{$l->type_vacation}}</td>
            <td>{{$l->created_atVacation}}</td>
            <td>{{$l->updated_atVacation}}</td> 
</tr>
            @endforeach
        </tbody>

    </table>


    
    </div>
    </div>
  </div>
  </div>
</div>
<a href="/welcomelog">Powrót</a>
    <!-- Optional JavaScript -->
    <script>

    function countDay() 
    {
    var data1 = new Date(document.getElementById('date1').value);
    var data2 = new Date(document.getElementById('date2').value);
// To calculate the time difference of two dates 
var Difference_In_Time = data2.getTime() - data1.getTime(); 

// To calculate the no. of days between two dates 
var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
if(Difference_In_Days <0) {
  document.getElementById('countDay').value = "Wybierz poprawne daty!!";
}
else {
 
document.getElementById('countDay').value = (Difference_In_Days);

 
}
    }

</script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>