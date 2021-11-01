<div>
    @if ($selected)
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body bg-light">
                        <label class="">Nom du projet</label>
                        <input type="text" class="form-control mb-2" wire:model.defer="name" placeholder="Nom du projet">

                        <label class="">Description du projet</label>
                        <textarea wire:model.defer="description" class="form-control mb-2" cols="30" rows="3"></textarea>

                        <button class="btn btn-primary" wire:click="update">Modifier</button>
                        <button class="btn btn-danger"  wire:click="delete">Supprimer</button>
                        <button class="btn btn-secondary" wire:click="$set('selected',0)">Fermer</button>

                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="d-flex text-white">
            <h3 class="">{{ $projet->name }}</h3> <i wire:click='edit' class="fa fa-edit p-1" aria-hidden="true"></i>
        </div>
        <p class="text-white">{{ $projet->description }}</p>
    @endif

    @livewire('fonctionalite.besoin',['projet'=>$projet])
</div>
