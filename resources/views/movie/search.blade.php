<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Action filmes</title>
    <link rel="stylesheet" href="/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

       <h1 class="text">ACTION FLIX</h1>
       <h2 class="text">Filmes encontrados</h2>
       <a  class="btn btn-primary"href="{{url('/filmes')}}">voltar</a>
    <div class="container"></div>
        <div class="d-flex flex-wrap">
            <form action="{{url('/filmes/busca')}}">
              <input name="search" type="text" class="input-search" placeholder="Faça aqui sua busca">
              <button type="submit"  class="btn1">Buscar</button>
            </form>

        @foreach ($movies as $movie)
            <div class="">
              <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}"  width="300px" alt="">
              <a class="text-center" href="{{ url('/filme/'.$movie['id']) }}"><p>{{$movie['title']}}<br></p></a>
              <h2>{{$movie['title']}}</h2>
            </div>
           @endforeach


     </div>

       </div>
     </div>

</body>
</html>
