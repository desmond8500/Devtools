<div class="row accordion" id="road_accordion">
    @if ($roadmap)
        @forelse ($roadmap->sprints as $sprint)
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <button class="btn btn-icon btn-outline-secondary btn-sm" wire:click="sprint_show('{{ $sprint->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <polyline points="6 9 12 15 18 9"></polyline> </svg>
                            </button>
                            Sprint {{ $sprint->order }}

                            @if ($sprint->start_date && $sprint->end_date)
                                [ {{ $sprint->start_date }} / {{ $sprint->end_date }} ]
                            @endif

                        </h3>
                        <div class="card-actions">
                            <div class="btn-list">
                                <a wire:click="add_jalon('{{ $sprint->id }}')" class="btn btn-icon btn-primary" title="Ajouter un jalon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                                </a>
                                <button wire:click="edit_sprint('{{ $sprint->id }}')" class="btn btn-icon btn-success" title="Editer le sprint">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path> <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path> <line x1="16" y1="5" x2="19" y2="8"></line> </svg>
                                </button>
                                <button wire:click="delete_sprint('{{ $sprint->id }}')" class="btn btn-icon btn-danger" title="Supprimmer un sprint">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="4" y1="7" x2="20" y2="7"></line> <line x1="10" y1="11" x2="10" y2="17"></line> <line x1="14" y1="11" x2="14" y2="17"></line> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @if ($jalon_form && $sprint_id == $sprint->id)
                        <div class="row card-body">
                            <div class="form-group col-md-6">
                                <label class="form-label">Nom du jalon </label>
                                <input type="text" wire:model.defer="jalon_description" class="form-control" placeholder="Nom ou description du jalon">

                                {{-- <label class="form-label">Description</label>
                                <textarea wire:model.defer="jalon_description" class="form-control" placeholder="Description du jalon" cols="30"
                                    rows="3"></textarea> --}}
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">Date de début </label>
                                <input type="date" wire:model.defer="jalon_start_date" class="form-control">

                                <label class="form-label">Date de fin </label>
                                <input type="date" wire:model.defer="jalon_end_date" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Ordre </label>
                                <input type="number" wire:model.defer="jalon_order" class="form-control mb-3">

                                <button type="button" class="btn btn-secondary" wire:click="close_jalon">Fermer</button>
                                <button wire:click="store_jalon('{{ $sprint->id }}')" class="btn btn-primary" data-bs-dismiss="modal">Ajouter le Jalon</button>
                            </div>
                        </div>
                    @endif
                    @if ($sprint->show)
                        <table class="table table-responsive" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-nowrap"> Description </th>
                                    <th class="text-nowrap"> Attribué à </th>
                                    <th class="text-nowrap text-center"> Avancement </th>
                                    <th class="text-nowrap text-center"> Début </th>
                                    <th class="text-nowrap text-center"> Date </th>
                                    {{-- <th class="text-nowrap"> Dates </th> --}}
                                    <th class="text-nowrap"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($sprint->id == $sprint_id && !$jalon_form)
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                {{-- <label class="form-label">Nom du jalon </label>
                                                <input type="text" wire:model.defer="jalon_name" class="form-control" placeholder="Nom ou description du jalon"> --}}

                                                <label class="form-label">Description</label>
                                                <textarea wire:model.defer="sprint_description" class="form-control" placeholder="Description du sprint" cols="30" rows="4"></textarea>
                                            </div>
                                            <div class="form-group col-md-4 row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Date de début </label>
                                                    <input type="date" wire:model.defer="sprint_start_date" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Date de fin </label>
                                                    <input type="date" wire:model.defer="sprint_end_date" class="form-control">
                                                </div>
                                                <div class="col-md-3 ">
                                                    <label class="form-label">Ordre </label>
                                                    <input type="number" wire:model.defer="sprint_order" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <button type="button" class="btn me-auto btn-secondary" wire:click="$set('sprint_id','0')">Fermer</button>
                                                <button wire:click="update_sprint('{{ $sprint->id }}')" class="btn btn-primary">Modifier</button>
                                            </div>
                                        </div>
                                    </div>
                                @else

                                @endif
                                @foreach ($sprint->jalons as $key => $jalon)

                                    @if ($jalon_id == $jalon->id)
                                        <tr>
                                            <td colspan="7">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Description</label>
                                                        <textarea wire:model.defer="jalon_description" class="form-control" placeholder="Description du jalon" cols="30" rows="4"></textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="form-label">Ordre </label>
                                                                <input type="number" wire:model.defer="jalon_order" class="form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Durée </label>
                                                                <input type="number" wire:model.defer="jalon_duration" class="form-control">
                                                            </div>
                                                        </div>

                                                        <label class="form-label">Avancement </label>
                                                        <input type="number" wire:model.defer="jalon_avancement" class="form-control">

                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Date de début </label>
                                                        <input type="date" wire:model.defer="jalon_start_date" class="form-control">

                                                        <label class="form-label">Date de fin </label>
                                                        <input type="date" wire:model.defer="jalon_end_date" class="form-control">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Attribué a </label>
                                                        <select class="form-control">
                                                            @foreach ( $team as $member)
                                                                <option wire:click="add_member('{{ $jalon->id }}','{{ $member->id }}')">{{ $member->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @foreach ($jalon->teams as $person)
                                                            <span class="badge bg-blue mb-1" wire:click="delete_member('{{ $person->id }}')">{{ $person->get_name($person->team_id) }}</span>
                                                        @endforeach

                                                    </div>
                                                    <div class="col-md-12 d-flex flex-row-reverse">
                                                        <div class="btn-list">
                                                            <button wire:click="$set('jalon_id',0)" class="btn btn-secondary">Fermer</button>
                                                            <button wire:click="delete_jalon" class="btn btn-danger">Supprimer</button>
                                                            <button wire:click="update_jalon" class="btn btn-primary">Modifier</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <th width=20px class="text-center">{{ $key+1 }}</th>
                                            <td> {{ $jalon->description }} </td>
                                            <td>
                                                @foreach ($jalon->teams as $person)
                                                    <span class="badge bg-blue mb-1">{{ $person->get_name($person->team_id) }}</span>
                                                @endforeach
                                            </td>
                                            <td width=20px class="text-center"> {{ $jalon->avancement }} %</td>
                                            <td width=50px class="text-center">
                                                <div>{{ $jalon->start_date }}</div>
                                                <div>{{ $jalon->end_date }}</div>
                                            </td>
                                            <td width=20px class="text-center"> {{ $tool->dateDiff($jalon->start_date,$jalon->end_date) }} </td>
                                            <td width=20px>
                                                <button class="btn btn-icon btn-primary" wire:click="edit_jalon('{{ $jalon->id }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path> <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path> <line x1="16" y1="5" x2="19" y2="8"></line> </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-md-4 offset-4 text-center mt-3">
                Veulliez ajouter un sprint ici
                <div class="mt-3">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSprint">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
                        Sprint
                    </a>
                </div>

            </div>
        @endforelse

    @endif

    {{-- Modal Sprint ========================================================= --}}

    <div class="modal modal-blur fade" id="modalSprint" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un sprint</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="form-group col-md-8">
                        <label class="form-label">Nom du sprint </label>
                        <input type="text" wire:model.defer="sprint_name" class="form-control" placeholder="Nom">

                        <label class="form-label">Description</label>
                        <textarea wire:model.defer="sprint_description" class="form-control" placeholder="Description du sprint" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Ordre </label>
                        <input type="text" wire:model.defer="sprint_order" class="form-control" placeholder="ordre">

                        <label class="form-label">Date de début </label>
                        <input type="date" wire:model.defer="sprint_start_date" class="form-control">

                        <label class="form-label">Date de fin </label>
                        <input type="date" wire:model.defer="sprint_end_date" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button wire:click="store_sprint" class="btn btn-primary" data-bs-dismiss="modal">Ajouter le Sprint</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Jalon ========================================================= --}}

    <div class="modal modal-blur fade" id="modalJalon" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un Jalon {{ $sprint_id }} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="form-group col-md-8">
                        <label class="form-label">Nom du jalon </label>
                        <input type="text" wire:model.defer="jalon_name" class="form-control" placeholder="Nom ou description du jalon">

                        <label class="form-label">Description</label>
                        <textarea wire:model.defer="jalon_description" class="form-control" placeholder="Description du jalon" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Ordre </label>
                        <input type="number" wire:model.defer="jalon_order" class="form-control" >

                        <label class="form-label">Date de début </label>
                        <input type="date" wire:model.defer="jalon_start_date" class="form-control">

                        <label class="form-label">Date de fin </label>
                        <input type="date" wire:model.defer="jalon_end_date" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button wire:click="store_jalon" class="btn btn-primary" data-bs-dismiss="modal">Ajouter la roadmap</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('closeModal', event => {
            $("#modalJalon").modal('hide');
        })
    </script>

</div>
