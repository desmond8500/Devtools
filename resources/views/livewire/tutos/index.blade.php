<div>
    <link rel="stylesheet" href="{{ asset('bt/css/tuto.css') }}">
    @if ($folder)
        <h3 class="text-light">{{ ucfirst($folder) }}</h3>
    @else
        <h3 class="text-light">Tutoriels</h3>
    @endif

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    @if ($md)
                        @parsedown($parsed)
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="list-group">
                @foreach ($files as $file)
                    <a href="{{ route('index',["folder"=>$folder, "md"=>basename($file)]) }}" class="list-group-item list-group-item-action">{{ basename($file) }}</a>
                @endforeach
            </div>

        </div>
    </div>


{{-- ======================================================================================= --}}
    <script>
        document.addEventListener('livewire:load', function () {
            hljs.initHighlightingOnLoad();
        })
    </script>
</div>
