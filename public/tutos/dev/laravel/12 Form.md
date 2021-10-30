# Laravel : Formulaires

## Description

Faire des formulaires avec des boites modales.

## Create

```html
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClient{ { $client->id}}">
Ajouter un client
</button>

<!-- Modal -->
<div class="modal fade" id="addClient{{ $client->id}}" tabindex="-1" role="dialog" aria-labelledby="addClient{ { $client->id}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClient{ { $client->id}}Label">Ajouter un client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('clients')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="compte_id" class="form-control" value="0" hidden>
                    </div>
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Adresse</label>
                        <input type="text" name="adresse"  class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" >Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
```


## Form 

add

```html
<form action="{{route('clients')}}" method="post">
    @csrf
</form>
```

update

```html
<form action="{{route('clients.update',['client'=>$client])}}" method="post">
    @csrf
    @method('put')
</form>
```

delete

```html
<form action="{{route('clients.destroy',['client'=>$client])}}" method="POST">
    @csrf
    @method('delete')
</form>
```
