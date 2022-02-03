<div>
    <div class="row row-deck">
        @foreach ($ressources as $ressource)
            <div class="col-md-4 mb-2">
                @if ($ressource_id == $ressource->id)
                    <div class="card fieldset">
                        <div class="card-header">
                            <h3>Editer la ressource </h3>
                            <div class="card-actions">
                                <a wire:click="$set('ressource_id',0)" class="btn btn-outline-secondary btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Nom</label>
                                <input type="text" wire:model.defer="name" required class="form-control" placeholder="Nom de la ressource">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Lien</label>
                                <input type="text" wire:model.defer="link" required class="form-control" placeholder="Lien vers la ressource">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea wire:model.defer="description" data-bs-toggle="autosize" placeholder="Description de la ressource" class="form-control"></textarea>
                            </div>
                            <div>
                                <div class="btn-list justify-content-between">
                                    <button wire:click="delete_ressource" class="btn btn-danger">Supprimer</button>
                                    <button wire:click="update_ressource" class="btn btn-primary">Modifier</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">
                                    <a href="{{ $ressource->link }}" target="_blank">{{ $ressource->name }}</a>
                                </h3>
                                <p class="card-subtitle">{{ $ressource->description }}</p>
                            </div>
                            <div class="card-actions">
                                <button class="btn btn-primary btn-icon" wire:click="edit_ressource('{{ $ressource->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path> <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path> <line x1="16" y1="5" x2="19" y2="8"></line> </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>


    {{-- Modal ressource ========================================================= --}}
        <div class="modal modal-blur fade" id="modalRessource" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter une ressource</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="mb-3">
                            <label class="form-label required">Nom</label>
                            <input type="text" wire:model.defer="name" required class="form-control" placeholder="Nom de la ressource">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Lien</label>
                            <input type="text" wire:model.defer="link" required class="form-control" placeholder="Lien vers la ressource">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea wire:model.defer="description" data-bs-toggle="autosize" placeholder="Description de la ressource" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button wire:click="store_ressource" class="btn btn-icon btn-primary" data-bs-dismiss="modal"> Ajouter </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- @section('script')
            <script>
                window.addEventListener('closeModal', event => {
                    $("#modalRessource").modal('hide');
                })
            </script>
        @endsection --}}
</div>
