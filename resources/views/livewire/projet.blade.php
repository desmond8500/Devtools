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
                    @if ($tab_selected==0)
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalActeur">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Acteur
                        </button>

                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTeam">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Team
                        </a>
                    @elseif($tab_selected==2)
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
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="card mb-2">
        <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs">
            @foreach ($tabs as $tab)
                <li class="nav-item">
                    @if ($tab_selected == $tab['number'])
                        <a type="button" class="nav-link bg-primary active" wire:click="set_tab('{{$tab['number'] }}')">
                    @else
                        <a type="button" class="nav-link" wire:click="set_tab('{{$tab['number'] }}')">
                    @endif
                        {!! $tab['icon'] !!} {{ $tab['name'] }}
                    </a>
                </li>

            @endforeach

            <li class="nav-item ms-auto">
                @if ($tab_selected == 0)
                    <a type="button" class="nav-link bg-primary active" wire:click="set_tab(0)">
                @else
                    <a type="button" class="nav-link" wire:click="set_tab(0)">
                @endif
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                        </path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </a>
            </li>
        </ul>

    </div>

    @if ($tab_selected==0)
        @livewire('settings', ['projet'=>$projet])
    @elseif($tab_selected==2)
        @livewire('fonctionalite.besoin',['projet'=>$projet])

    @endif



</div>
