<div>
    <div class="row row-deck">
        @foreach ($ressources as $ressource)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        @if ($ressource_id == $ressource->id)
                            <div class="form-group">
                                <label class="form-label">Nom</label>
                                <input type="text" wire:model.defer="name" class="form-control" placeholder="Nom">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Lien</label>
                                <input type="text" wire:model.defer="link" class="form-control" placeholder="Lien">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea wire:model.defer="description" data-bs-toggle="autosize" placeholder="Description" class="form-control"></textarea>
                            </div>
                            <div>
                                <div class="mt-2">
                                    <button wire:click="$set('ressource_id',0)" class="btn btn-secondary">Fermer</button>
                                    <button wire:click="delete_ressource" class="btn btn-danger">Supprimer</button>
                                    <button wire:click="update_ressource" class="btn btn-primary">Modifier</button>
                                </div>
                            </div>
                        @else
                            <h3 class="card-title">
                                <a href="{{ $ressource->link }}" target="_blank">{{ $ressource->name }}</a>
                            </h3>
                            <p>{{ $ressource->description }}</p>
                        @endif
                  </div>
                  <div class="card-footer">
                      <button class="btn btn-primary btn-sm" wire:click="edit_ressource('{{ $ressource->id }}')">Edit</button>
                  </div>
                </div>
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
                        <div class="form-group col-md-8">
                            <label class="form-label">Nom</label>
                            <input type="text" wire:model.defer="name" class="form-control" placeholder="Nom">
                        </div>
                        <div class="form-group col-md-8">
                            <label class="form-label">Lien</label>
                            <input type="text" wire:model.defer="link" class="form-control" placeholder="Lien">
                        </div>

                        <div class="form-group col-md-12">
                            <label class="form-label">Description</label>
                            <textarea wire:model.defer="description" data-bs-toggle="autosize" placeholder="Description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button wire:click="store_ressource" class="btn btn-primary" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path> <circle cx="12" cy="14" r="2"></circle> <polyline points="14 4 14 8 8 8 8 4"></polyline> </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @section('script')
            <script>
                window.addEventListener('closeModal', event => {
                    $("#modalRessource").modal('hide');
                })
            </script>
        @endsection
</div>
