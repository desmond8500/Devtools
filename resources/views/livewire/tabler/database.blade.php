<div>
   <div class="row row-deck">
        @foreach ($diagrammes as $diagramme)
            @if ($diagramme_id == $diagramme->id)
                <div class="col-md-12 mb-2">
                    <div class="card fieldset">
                        <div class="card-header">
                            <h3>Editer le diagramme </h3>
                            <div class="card-actions">
                                <a wire:click="$set('diagramme_id',0)" class="btn btn-outline-secondary btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="18" y1="6" x2="6" y2="18" /> <line x1="6" y1="6" x2="18" y2="18" /> </svg>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label required">Nom</label>
                                    <input type="text" wire:model.defer="name" required class="form-control" placeholder="Nom de la diagramme">

                                    <label class="form-label required">Description</label>
                                    <textarea wire:model.defer="description" data-bs-toggle="autosize" rows="7" placeholder="Description" class="form-control"></textarea>
                                </div>
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Contenu  <span class="text-green cursor-pointer" onclick="copy()">Copy</span> </label>
                                    <textarea wire:model="content" rows="10" placeholder="Contenu du diagramme" class="form-control"></textarea>

                                    <div class="btn-list justify-content-between mt-2">
                                        <button wire:click="delete_diagramme" class="btn btn-danger">Supprimer</button>
                                        <button wire:click="$set('diagramme_id',0)" class="btn btn-secondary">Fermer</button>
                                        <button wire:click="update_diagramme" class="btn btn-primary">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">
                                    {{ $diagramme->name }}
                                </h3>
                                <p class="card-subtitle">{{ $diagramme->description }}</p>
                            </div>
                            <div class="card-actions">
                                <button class="btn btn-primary btn-icon" wire:click="edit_diagramme('{{ $diagramme->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path> <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path> <line x1="16" y1="5" x2="19" y2="8"></line> </svg>
                                </button>
                                <a target="_blank" href="{{ route('diagramme',['id'=> $diagramme->id]) }}" class="btn btn-primary btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="2"></circle> <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"> </path> </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="modal modal-blur fade" id="modalDiagramme" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter une diagramme</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="mb-3">
                        <label class="form-label required">Nom</label>
                        <input type="text" wire:model.defer="name" required class="form-control" placeholder="Nom de la diagramme">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Description</label>
                        <textarea wire:model.defer="description" data-bs-toggle="autosize" placeholder="Description" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contenu</label>
                        <textarea wire:model.defer="content" id="contenu" data-bs-toggle="autosize" rows="7" placeholder="Contenu du diagramme" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button wire:click="store_diagramme" class="btn btn-icon btn-primary" data-bs-dismiss="modal"> Ajouter </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            function copy() {
            /* Get the text field */
            var copyText = document.getElementById("contenu");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

            /* Alert the copied text */
            alert("Contenu copié: " + copyText.value);
            }
        })
    </script>
</div>
