<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneBook PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h3 class="text-center mt-3">Lista gradova</h3>

    <div class="row">
        <div class="col-8 offset-2 table-responsive mt-3">
            <form action="{{route('cities.index')}}" method="GET">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="searchTerm" class="form-control" value="{{request()->get('searchTerm')}}" placeholder="Pretraga gradova">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary w-100">Pretraži</button>
                    </div>
                    <div class="col-3">
                        <a href="{{route('cities.create')}}" class="btn btn-success w-100">+ Dodaj novi grad</a>
                    </div>
                </div>
            </form>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Naziv</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                    <tr>
                        <td>{{$city->id}}</td>
                        <td>{{$city->name}}</td>
                        <td><a href="{{route('cities.edit',['id'=>$city->id])}}" class="btn btn-primary btn-sm">Izmjena</a></td>
                        <td>
                            <form action="{{route('cities.delete',['id'=>$city->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Brisanje</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>
