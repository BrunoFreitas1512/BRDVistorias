<!doctype html>
<html lang="en">
  <head>
    <title>@yield("titulo")</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}" />
</head>
  <body>
      <header>
          <div class="container">
            <section class="grid_cabecalho">
                <div class="imglogo">
                  <img src="/img/logo.png" alt="" class="img_cabecalho">
                </div>
                <div>
                    <div class="flex_menus">
                        <div>
                            <a href="/salacomercial">Salas Comerciais</a>
                        </div>
                        <div>
                            <a href="/pergunta">Perguntas</a>
                        </div>
                        <div>
                            <a href="/vistoria">Vistorias</a>
                        </div>
                    </div>
                </div>
            </section>
          </div>
      </header>
        @yield('content')
			  @yield("cadastro")
        @yield("listagem")
      <footer>
        
      </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js')}}"></script>
  </body>
</html>