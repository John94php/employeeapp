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
  <bod class="wrap">
    <h1>{{$title}}</h1>
<form action="attendance" method="POST">
@csrf
        <table class="table table-dark table-bordered">
            <tr>
                <td><label class="badge badge-light">Imię Nazwisko</label></td>
                <td >
                @foreach($person as $p)
                <input type="hidden" name="id_contract" value="{{$p->id_contract}}"/>
                    <input readonly value="{{$p -> name_contract}} {{$p->surname_contract}}"  name="fname">    </p>
                @endforeach
                </td>

            </tr>
            <tr>
                <td><label class="badge badge-light">DATA</label></td>
                <td ><input  name="currentDate" readonly value="{{date('Y.m.d')}}"/></td>
                
            </tr>
            <tr>
                <td><label class="badge badge-light">Godzina od</label></td>
                <td><input type="time" name="startHour" id="startHour" /></td>
                
            </tr>
            <tr>
                <td><label class="badge badge-light">Godzina do</label></td>
                <td><input type="time" name="endHour" id="endHour"   /></td>

            </tr>
            <tr>
                <td><label class="badge badge-light">Komentarz</label></td>
                <td><textarea name="comment" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><button class="btn btn-outline-success btn-sm" type="submit">Zgłość obecność</button>
                    <button class="btn btn-outline-warning btn-sm" type="reset">Wyczyść dane</button>
            </td>
            </tr>
        </table>
        </form>
</div>

<a href="/welcomelog">Powrót</a>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>