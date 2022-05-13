<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Action filmes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/indexmovie.css">
</head>

<body>
  <header class="header"></header>
      <div class="container-fluid">
           <a class="btn btn-primary" href="{{url('/filmes')}}">Voltar</a>
      </div>

      <h1>ACTION FLIX</h1>

     <div class="container-fluid text-center">
       <h2>{{$movie['title']}}</h2>
     </div>

     <div class="container-fluid text-center">
            <div class="container">
              <img  src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}"  width="200px" alt="">
            </div>
      </div>

      <h5>{{$movie['overview']}}</h5>

      <form method="POST" action="{{url('/watchlists')}}">
        @csrf
        <input type="hidden" name="tmdb_id" value="{{$movie['id']}}" />
        <button type="submit" class="btn btn-secondary">Assitir mais tarde</button>
      </form>

</body>
</html>
