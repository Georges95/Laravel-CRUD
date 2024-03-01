<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">



        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <title>Page de connexion</title>
    </head>
    <body>

        <div class="d-flex align-items-center justify-content-center vh-100 w-100">
            <div class="w-50">
                <h3>Formulaire de connexion</h3>

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error')}}</div>
                @endif

                <form action="{{route('login.post')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text"  class="form-control" name="email" id="email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="text"  class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-info">Se connecter</button>
                </form>
            </div>


        </div>
    </body>
</html>
