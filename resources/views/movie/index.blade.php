<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Action Flix</title>
    <link rel="stylesheet" href="/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
       <h1 class="text">ACTION FLIX</h1>
       <a class="btn btn-primary" href="{{url('/')}}">voltar ao perfil</a>
       <a class="btn btn-secondary" href="{{url('/assistir-depois')}}">filmes marcados para assistir depois</a>
       <h2 class="text">Filmes populares</h2>
    <div class="container"></div>
        <div class="d-flex flex-wrap">

            <form action="{{url('/filmes/busca')}}">
              <input name="search" type="text" class="input-search" placeholder="Faça aqui sua busca">
              <button type="submit"  class="btn1">Buscar</button>
            </form>

        @foreach ($popular as $movie)
            <div class="">
              <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}"  width="300px" alt="">
              <a class="text-center" href="{{ url('/filme/'.$movie['id']) }}"><p>{{$movie['title']}}<br></p></a>

            </div>
           @endforeach

           <div class="text" >
              <h2>Mais votado</h2>
           </div>


           @foreach ($topRated as $movie)
           <div class="">
               <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}"  width="300px" alt="">
               <a  class="text-center" href="{{ url('/filme/'.$movie['id']) }}"><p>{{$movie['title']}}</p></a><br>
           </div>
            @endforeach


            <div class="text">
                <h2>Assistindo agora</h2>
            </div>


           @foreach ($nowPlaying as $movie)
           <div class="cover">
              <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}"  width="300px" alt="">
              <a  class="text-center" href="{{ url('/filme/'.$movie['id']) }}"><p>{{$movie['title']}}</p></a>
           </div>
          @endforeach


     </div>

       </div>
     </div>

</body>
</html>
