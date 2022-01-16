<div>
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                @if ($selected)
                    <div class="card-body bg-light">
                        <label class="">Nom du projet</label>
                        <input type="text" class="form-control mb-2" wire:model.defer="name" placeholder="Nom du projet">

                        <label class="">Description du projet</label>
                        <textarea wire:model.defer="description" class="form-control mb-2" cols="30" rows="3"></textarea>

                        <button class="btn btn-primary" wire:click="update">Modifier</button>
                        <button class="btn btn-danger" wire:click="delete">Supprimer</button>
                        <button class="btn btn-secondary" wire:click="$set('selected',0)">Fermer</button>

                    </div>
                @else
                    <h2 class="page-title"> Projet : {{ $projet->name }} <i wire:click='edit' class="fa fa-edit p-1" aria-hidden="true"></i>
                    </h2>
                    <p class="">{{ $projet->description }}</p>
                @endif

            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fonctionalite">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Fonctionalité
                    </button>
                </div>
            </div>
        </div>
    </div>

    @livewire('fonctionalite.besoin',['projet'=>$projet])
</div>
