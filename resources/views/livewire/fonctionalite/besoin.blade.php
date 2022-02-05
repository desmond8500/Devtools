<div>
    <div class="row">
        <div class="col-md-7 mb-3">
            @foreach ($acteurs as $acteur)
                <button class="btn btn-primary mb-1" wire:click="show_actor_description('{{ $acteur->id }}')">{{ $acteur->name }}</button>
            @endforeach

            @if ($actor_desc)
            <div>
                {!! nl2br($actor_desc) !!}
            </div>
            @endif
        </div>
        <div class="col-md-5 mb-3">
            <div class="input-icon">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                </span>
                <input type="text" class="form-control" wire:model="search" placeholder="Rechercher…" >
            </div>
        </div>

        <div class="col-md-12">
            @forelse ($besoins as $besoin)
                <div class="card mb-2 border border-dark">
                    <div class="card-header">
                        <div>
                            <h3>{{ $besoin->name }}</h3>
                            <p>{!! nl2br($besoin->description) !!}</p>
                            <div class="text-muted">
                                Commentaires ({{ $besoin->commentaires->count() }})
                            </div>
                        </div>

                        <div class="card-actions">
                            <button class="btn btn-primary mb-1" wire:click="$set('selected',{{ $besoin->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="2"></circle>
                                    <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                                </svg>
                                Consulter
                            </button> <br>
                            @foreach ($besoin->stickers as $sticker)
                                <button class="btn btn-success btn-sm mb-1" >{{
                                    $sticker->team_name($sticker->team_id) }}
                                </button>
                            @endforeach
                        </div>

                    </div>
                    <div class=" ">
                        @if ($selected==$besoin->id)
                        <div class="accordion-body">
                            <div class="row">
                                @if ($besoin_id == $besoin->id)
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Nom de la fonctinalité</label>
                                        <input type="email" class="form-control" wire:model.defer='name' placeholder="Nom de la fonctinalité">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Acteurs</label>
                                        <input type="email" class="form-control" wire:model.defer='acteur' placeholder="Acteurs impliqués">
                                        <div class="btn-list mt-1">
                                            @foreach ($acteurs as $item)
                                                <h4><span class="badge" wire:click="add_actor('{{ $item->name }}')">{{ $item->name }}</span></h4>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Team</label>
                                        <div>
                                            @foreach ($besoin->stickers as $sticker)
                                                <button class="btn btn-success " wire:click="delete_sticker('{{ $sticker->id }}')">{{ $sticker->team_name($sticker->team_id) }}</button>
                                            @endforeach
                                        </div>
                                        <div class="mt-1">
                                            @foreach ($teams as $team)
                                                <button class="btn btn-secondary btn-sm" wire:click="add_sticker('{{ $team->id }}')">{{ $team->name }}</button>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Prérequis</label>
                                        <textarea class="form-control" wire:model.defer='prerequis' placeholder="Prérequis du projet" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" wire:model.defer='description' placeholder="Description du projet"
                                            rows="3"></textarea>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <button class="btn btn-primary" wire:click="update">Modifier</button>
                                        <button class="btn btn-danger" wire:click="delete">Supprimer</button>
                                        <button class="btn btn-secondary" wire:click="$set('besoin_id',0)">Fermer</button>
                                    </div>
                                @else
                                    <div class="col-md-11">
                                        <b>Acteurs :</b> {{ $besoin->acteur }}
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-outline-primary btn-icon" wire:click="edit('{{ $besoin->id }}')"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path> <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path> <line x1="16" y1="5" x2="19" y2="8"></line> </svg>
                                        </button>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <b>Description</b>
                                        <p>{!! nl2br($besoin->description) !!}</p>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <b>Prérequis</b>
                                        <p>{!! nl2br($besoin->prerequis) !!}</p>
                                    </div>
                                @endif
                                <hr>

                                <div class="col-md-6">
                                    @foreach ($besoin->scenarios as $scenario)
                                        @if ($loop->first)
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Scénario Nominal</th>
                                                        <th scope="col" width="20px">
                                                            <button type="button" class="btn btn-icon btn-primary" wire:click="store_etape('{{ $scenario->id }}')">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                </svg>
                                                            </button>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($scenario->etapes as $key => $etape)
                                                    <tr>
                                                        <th scope="row">{{ $key+1 }}</th>
                                                        <td>
                                                            @if ($etape->id == $etape_id)
                                                                <div>
                                                                    <input type="text" wire:model="etape_description" class="form-control">
                                                                </div>
                                                            @else
                                                                <div>{{ ucfirst($etape->description) }}</div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($etape->id == $etape_id)
                                                                <div>
                                                                    <span class="text-success" title="Modifier" wire:click="update_etape">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M5 12l5 5l10 -10"></path> </svg>
                                                                    </span>
                                                                    <span class="text-danger" title="Supprimer" wire:click="delete_etape">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="4" y1="7" x2="20" y2="7"></line> <line x1="10" y1="11" x2="10" y2="17"></line> <line x1="14" y1="11" x2="14" y2="17"></line> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                                                                    </span>
                                                                    <span class="text-primary" title="Créer un scénario alternatif"   wire:click="store_scenario('{{ $key+1 }}','{{ $besoin->id }}')">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 9h8v-3.586a1 1 0 0 1 1.707 -.707l6.586 6.586a1 1 0 0 1 0 1.414l-6.586 6.586a1 1 0 0 1 -1.707 -.707v-3.586h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1z"></path> </svg>
                                                                    </span>
                                                                </div>
                                                            @else
                                                                <div class="text-success" wire:click="edit_etape('{{ $etape->id }}')">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24"
                                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>
                                                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>
                                                                        <line x1="16" y1="5" x2="19" y2="8"></line>
                                                                    </svg>
                                                                </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    @foreach ($besoin->scenarios as $scenario)
                                        @if (!$loop->first)
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Scénario Alternatif Etape {{ $scenario->type }}</th>
                                                        <th scope="col">
                                                            <button type="button" class="btn btn-icon btn-primary" wire:click="store_etape('{{ $scenario->id }}')">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                </svg>
                                                            </button>
                                                            @if (!$scenario->etapes->count())
                                                            <button type="button" class="btn btn-icon btn-danger" wire:click="delete_scenario('{{ $scenario->id }}')">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <line x1="4" y1="7" x2="20" y2="7"></line>
                                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                                </svg>
                                                            </button>
                                                            @endif
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($scenario->etapes as $key => $etape)
                                                        <tr>
                                                            <th scope="row">{{ $key+1 }}</th>
                                                            <td  class="d-flex justify-content-between">
                                                                @if ($etape->id == $etape_id)
                                                                    <div>
                                                                        <input type="text" wire:model="etape_description" class="form-control">
                                                                    </div>
                                                                @else
                                                                    <div>{{ ucfirst($etape->description) }}</div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($etape->id == $etape_id)
                                                                    <div>
                                                                        <span class="text-success" title="Modifier" wire:click="update_etape">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24"
                                                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                                                                stroke-linejoin="round">
                                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                <path d="M5 12l5 5l10 -10"></path>
                                                                            </svg>
                                                                        </span>
                                                                        <span class="text-danger" title="Supprimer" wire:click="delete_etape">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                                                                stroke-linejoin="round">
                                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                <line x1="4" y1="7" x2="20" y2="7"></line>
                                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                @else
                                                                    <div class="text-success" wire:click="edit_etape('{{ $etape->id }}')">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24"
                                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>
                                                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>
                                                                            <line x1="16" y1="5" x2="19" y2="8"></line>
                                                                        </svg>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list list-timeline list-timeline-simple">
                                        @foreach ($besoin->commentaires as $comment)
                                            <li>
                                                <div class="list-timeline-icon ">
                                                    <div class="list-timeline-icon bg-twitter">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <circle cx="12" cy="12" r="9"></circle>
                                                            <circle cx="12" cy="10" r="3"></circle>
                                                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="list-timeline-content">
                                                    <div class="list-timeline-time">
                                                        {{ $comment->created_at }}
                                                        @auth
                                                            @if ($user_id == $comment->user_id)
                                                                <svg xmlns="http://www.w3.org/2000/svg" wire:click="edit_comment('{{ $comment->id }}')" class="text-success icon icon-tabler icon-tabler-edit" width="24" height="24"
                                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>
                                                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>
                                                                    <line x1="16" y1="5" x2="19" y2="8"></line>
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" wire:click="delete_comment('{{ $comment->id }}')" class="text-danger icon icon-tabler icon-tabler-trash" width="24" height="24"
                                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <line x1="4" y1="7" x2="20" y2="7"></line>
                                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                                </svg>
                                                            @endif
                                                        @endauth
                                                    </div>
                                                    <p class="list-timeline-title">{{ $comment->get_user($comment->user_id) }}</p>
                                                    @if ($comment_id == $comment->id)
                                                        <div class="mb-3">
                                                            <textarea wire:model.defer="comment_description" class="form-control" placeholder="Description" cols="30" rows="3"></textarea>
                                                        </div>
                                                        <button class="btn btn-primary" wire:click="update_comment">Mettre à jour</button>
                                                    @else
                                                        <p class="">  {!! nl2br($comment->description) !!}  </p>

                                                    @endif
                                                </div>

                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-2">
                                   @auth
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalComment">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="12" y1="5" x2="12" y2="19" />
                                                <line x1="5" y1="12" x2="19" y2="12" />
                                            </svg>
                                            Commentaire
                                        </a>
                                    @else
                                        <div class="text-danger text-center">
                                            Veuillez vous connecter pour laisser un commentaire
                                        </div>

                                   @endauth
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            @empty
                Veuillez ajouter un cas d'utilisation
            @endforelse
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

    {{-- Modal ========================================================= --}}

        <div class="modal modal-blur fade" id="modalComment" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un commentaire</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Description</label>
                            <textarea wire:model.defer="comment_description" data-bs-toggle="autosize" placeholder="Description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button wire:click="store_comment" class="btn btn-primary" data-bs-dismiss="modal">Ajouter le commentaire</button>
                    </div>
                </div>
            </div>
        </div>

        @section('script')
            <script>
                window.addEventListener('closeModal', event => {
                    $("#modalComment").modal('hide');
                })
            </script>
        @endsection


</div>

