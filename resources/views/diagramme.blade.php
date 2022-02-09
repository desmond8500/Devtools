<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Devtools</title>
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@latest/dist/css/tabler.min.css">
</head>

<body class="antialiased">
    <div class="wrapper">
        @livewire('navbar')
        <div class="page-wrapper">
            <div class="container-xl">
                <div class="page-header d-print-none mb-2">
                    <div class="row align-items-center">
                        <div class="col ">
                            <h2 class="page-title"> {{ $diagramme->name }} </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="d-flex btn-list">
                                <a href="{{ route('projet', ['projet_id'=> $diagramme->projet_id]) }}" class="btn btn-primary" >Retour</a>
                            </div>
                        </div>
                    </div>
                </div>
                <p>{{ $diagramme->description }}</p>
                <div class="d-flex justify-content-center">
                    <div class="mermaid">
                        {!! $diagramme->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@tabler/core@latest/dist/js/tabler.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mermaid/dist/mermaid.min.js"></script>

</body>

</html>
