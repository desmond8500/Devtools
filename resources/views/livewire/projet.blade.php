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
                <div class="d-flex btn-list">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalActeur">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Acteur
                    </button>
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


    {{-- Modal acteur ========================================================= --}}

    <div class="modal modal-blur fade" id="modalActeur" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un acteur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="form-group col-md-8">
                        <label class="form-label">Nom du l'acteur </label>
                        <input type="text" wire:model.defer="actor_name" class="form-control" placeholder="Nom">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Fermer</button>
                    <button wire:click="store_actor" class="btn btn-primary" data-bs-dismiss="modal">Ajouter le client</button>
                </div>
            </div>
        </div>
    </div>

    @section('script')
    <script>
        window.addEventListener('closeModal', event => {
                    $("#modalActeur").modal('hide');
                })
    </script>
    @endsection
</div>
