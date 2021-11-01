<div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 mb-3">
                <div class="d-flex flex-row-reverse">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fonctionalite">
                        Ajouter une fonctionalité
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="accordion accordion-flush" id="accordionFlushExample">

                @forelse ($besoins as $besoin)
                    <div class="accordion-item">
                        <h2 class="accordion-header accordion-button" wire:click="$set('selected',{{ $besoin->id }})">
                                <b>{{ $besoin->name }}</b>
                        </h2>
                        <div class=" ">
                            @if ($selected==$besoin->id)
                            <div class="accordion-body">
                                <div class="row">
                                    @if ($besoin_id == $besoin->id)
                                        <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Nom de la fonctinalité</label>
                                                    <input type="email" class="form-control" wire:model.defer='name' placeholder="Nom de la fonctinalité">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Acteurs</label>
                                                    <input type="email" class="form-control" wire:model.defer='acteur' placeholder="Acteurs impliqués">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Prérequis</label>
                                                    <textarea class="form-control" wire:model.defer='prerequis' placeholder="Prérequis du projet" rows="3"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control" wire:model.defer='description' placeholder="Description du projet"
                                                        rows="3"></textarea>
                                                </div>
                                                <div class="mb-2">
                                                    <button class="btn btn-primary" wire:click="update">Modifier</button>
                                                    <button class="btn btn-danger" wire:click="delete">Supprimer</button>
                                                    <button class="btn btn-secondary" wire:click="$set('besoin_id',0)">Fermer</button>

                                                </div>
                                        </div>
                                    @else
                                        <div class="col-md-11">
                                            <b>Acteurs :</b> {{ $besoin->acteur }}
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-outline-primary" wire:click="edit('{{ $besoin->id }}')"> <i class="fa fa-edit" aria-hidden="true"></i> </button>
                                        </div>
                                        <div class="col-md-6">
                                            <b>Description</b>
                                            <p>{{ $besoin->description }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <b>Prérequis</b>
                                            <p>{{ $besoin->prerequis }}</p>
                                        </div>
                                    @endif
                                    <hr>
                                    @foreach ($besoin->scenarios as $scenario)
                                        @if ($loop->first)
                                            <div class="col-md-6">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Scénario nominal</th>
                                                            <th scope="col">
                                                                <button type="button" class="btn btn-primary" wire:click="store_etape('{{ $scenario->id }}')">
                                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                </button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($scenario->etapes as $key => $etape)
                                                            <tr>
                                                                <th scope="row">{{ $key+1 }}</th>
                                                                <td colspan="2" class="d-flex justify-content-between">
                                                                    @if ($etape->id == $etape_id)
                                                                        <div>
                                                                            <input type="text" wire:model="etape_description" class="form-control">
                                                                        </div>
                                                                        <div >
                                                                            <span class="text-success" title="Modifier" wire:click="update_etape"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                                            <span class="text-danger" title="Supprimer" wire:click="delete_etape"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                                                            <span class="text-primary" title="Créer un scénario alternatif" wire:click="store_scenario('{{ $key+1 }}','{{ $besoin->id }}')"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                                                                        </div>
                                                                    @else
                                                                        <div>{{ $etape->description }}</div>
                                                                        <div class="text-success" wire:click="edit_etape('{{ $etape->id }}')"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                    @endif

                                                                </td>
                                                            </tr>

                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <div class="col-md-6">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Scénario Alternatif Etape {{ $scenario->type }}</th>
                                                            <th scope="col">
                                                                <button type="button" class="btn btn-primary" wire:click="store_etape('{{ $scenario->id }}')">
                                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                </button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($scenario->etapes as $key => $etape)
                                                            <tr>
                                                                <th scope="row">{{ $key+1 }}</th>
                                                                <td colspan="2" class="d-flex justify-content-between">
                                                                    @if ($etape->id == $etape_id)
                                                                        <div>
                                                                            <input type="text" wire:model="etape_description" class="form-control">
                                                                        </div>
                                                                        <div >
                                                                            <span class="text-success" title="Modifier" wire:click="update_etape"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                                            <span class="text-danger" title="Supprimer" wire:click="delete_etape"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                                                        </div>
                                                                    @else
                                                                        <div>{{ $etape->description }}</div>
                                                                        <div class="text-success" wire:click="edit_etape('{{ $etape->id }}')"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                    @endif

                                                                </td>
                                                            </tr>

                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    @endforeach

                                    <div class="col-md-6">

                                    </div>
                                </div>


                            </div>

                            @endif
                        </div>
                    </div>
                @empty
                    Pas de besoin encore
                @endforelse
            </div>


        </div>
    </div>


    {{-- ========================================================================== --}}
    <!-- Modal -->
    <div class="modal fade" id="fonctionalite" tabindex="-1" aria-labelledby="fonctionaliteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fonctionaliteLabel">Ajouter une fonctionalité</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nom de la fonctinalité</label>
                        <input type="email" class="form-control" wire:model.defer='name' placeholder="Nom de la fonctinalité">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Acteurs</label>
                        <input type="email" class="form-control" wire:model.defer='acteur' placeholder="Acteurs impliqués">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prérequis</label>
                        <textarea class="form-control" wire:model.defer='prerequis' placeholder="Prérequis du projet"  rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" wire:model.defer='description'  placeholder="Description du projet" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click='store'>Ajouter</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="etape" tabindex="-1" aria-labelledby="etapeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="etapeLabel">Ajouter une fonctionalité</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Ordre</label>
                        <input type="number" class="form-control" wire:model.defer='ordre'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" wire:model.defer='description'  placeholder="Description du projet" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click='store_etape'>Ajouter</button>
                </div>
            </div>
        </div>
    </div>
</div>
