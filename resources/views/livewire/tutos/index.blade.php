<div>
    <link rel="stylesheet" href="{{ asset('bt/css/tuto.css') }}">

    <div class="row">
        @if ($file)
        <div class="col-md-9 mb-2">
            <div class="card">
                <div class="card-body">
                    @parsedown($file)
                </div>
            </div>
        </div>

        @endif
        <div class="col-md-3">
            @foreach ($tags as $tag)
                <a class="btn btn-sm btn-outline-light mb-1 @if($categorie==$tag->name) active @endif " wire:click="$set('categorie','{{ $tag->name }}')" >{{ ucfirst($tag->name) }}</a>
            @endforeach
            <div class="list-group">
                @foreach ($list as $item)
                    <a href="{{ route("index", ["file_id"=>$item->id, "categorie"=>$categorie]) }}" type="button" class="list-group-item list-group-item-action @if($file_id==$item->id) active @endif">{{ $item->name }}</a>
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
