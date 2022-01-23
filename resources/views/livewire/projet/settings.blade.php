<div class="row">
    <div class="col-md-6 mb-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Projet: {{ $projet->name }}</h3>
                <div class="card-actions">
                    <button class="btn btn-primary btn-icon" wire:click="edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path> <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path> <line x1="16" y1="5" x2="19" y2="8"></line> </svg>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if ($selected)
                    <label class="">Nom du projet</label>
                    <input type="text" class="form-control mb-2" wire:model.defer="name" placeholder="Nom du projet">

                    <label class="">Description du projet</label>
                    <textarea wire:model.defer="description" class="form-control mb-2" cols="30" rows="3"></textarea>

                    <button class="btn btn-primary" wire:click="update">Modifier</button>
                    <button class="btn btn-danger" wire:click="delete">Supprimer</button>
                    <button class="btn btn-secondary" wire:click="$set('selected',0)">Fermer</button>
                @else
                <div class="text-muted">Description</div>
                    <p class="">{{ $projet->description }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-2"></div>

    <div class="col-md-6 mb-2">
        <div class="card card-sm">
            <div class="card-header">
                <h3 class="card-title">Acteurs</h3>
                <div class="card-actions">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalActeur">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Acteur
                    </button>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($acteurs as $acteur)
                        @if ($actor_id == $acteur->id)
                            <div class="form-group ">
                                <label class="form-label">Nom du l'acteur </label>
                                <input type="text" wire:model.defer="actor_name" class="form-control" placeholder="Nom">
                            </div>
                            <div class="form-group ">
                                <label class="form-label">Nom description </label>
                                <textarea wire:model.defer="actor_description" class="form-control" placeholder="Description de l'acteur" cols="30"
                                    rows="3"></textarea>
                            </div>
                            <button class="btn btn-primary mt-2" wire:click="update_actor">Mettre à jour</button>
                        @else
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <div>{{ $acteur->name }}</div>
                                    <div class="text-muted">{!! nl2br($acteur->description) !!}</div>
                                </div>
                                <button class="btn btn-primary btn-icon" wire:click="edit_actor('{{ $acteur->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                        <line x1="16" y1="5" x2="19" y2="8" />
                                    </svg>
                                </button>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-2">
        <div class="card card-sm">
            <div class="card-header">
                <h3 class="card-title">Team</h3>
                <div class="card-actions">
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTeam">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Team
                    </a>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($teams as $team)
                        @if ($team_id == $team->id)
                            <div class="form-group ">
                                <label class="form-label">Nom du membre </label>
                                <input type="text" wire:model.defer="team_name" class="form-control" placeholder="Nom">
                            </div>
                            {{-- <div class="form-group ">
                                <label class="form-label">Nom description </label>
                                <textarea wire:model.defer="actor_description" class="form-control" placeholder="Description de l'acteur" cols="30"
                                    rows="3"></textarea>
                            </div> --}}
                            <button class="btn btn-primary mt-2" wire:click="update_team">Mettre à jour</button>
                        @else
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <div>{{ $team->name }}</div>
                                </div>
                                <button class="btn btn-primary btn-icon" wire:click="edit_team('{{ $team->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                        <line x1="16" y1="5" x2="19" y2="8" />
                                    </svg>
                                </button>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- Modal team ========================================================= --}}


    <div class="modal modal-blur fade" id="modalTeam" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un membre d'équipe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="form-group col-md-8">
                        <label class="form-label">Nom </label>
                        <input type="text" wire:model.defer="team_name" class="form-control" placeholder="Nom">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Fermer</button>
                    <button wire:click="store_team" class="btn btn-primary" data-bs-dismiss="modal">Ajouter le team member</button>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script> window.addEventListener('closeModal', event => { $("#modalTeam").modal('hide'); }) </script>
    @endsection

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
                    <div class="form-group col-md-8">
                        <label class="form-label">Nom description </label>
                        <textarea wire:model.defer="actor_description" class="form-control" placeholder="Description de l'acteur" cols="30" rows="3"></textarea>
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
        <script> window.addEventListener('closeModal', event => { $("#modalActeur").modal('hide'); }) </script>
    @endsection
</div>
