<div>
    <div class="page-header d-print-none mb-2">
        <div class="row align-items-center">
            <div class="col ">
                <h2 class="page-title"> Projet : {{ $projet->name }} </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="d-flex btn-list">
                    @if ($tab_selected==0)



                    @elseif($tab_selected==2) {{-- Description détaillé --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fonctionalite">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                            Fonctionalité
                        </button>
                    @elseif($tab_selected==3) {{-- Ressources --}}
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDiagramme">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
                            Diagramme
                        </a>
                        <a target="_blank" class="btn btn-primary" href="https://mermaid.live/edit#pako:eNpVkE1qw0AMha8itEohvoAXhcZOsgm00Ow8XgiPnBna-WEsU4Ltu3ccE2i1kvS-9xCasAuascRbomjgWisPud6ayiQ7iKOhhaJ4nc8s4ILn-wyH3TnAYEKM1t9eNv6wQlBNlxVjEGP917JJ1cP_7nmGurlQlBDbv8r1J8xwbOyHyfH_FZM4u05NT2VPRUcJKkot7tFxcmR1PntaDQrFsGOFZW419zR-i0Lll4yOUZPwUVsJCUtJI--RRgmfd989542pLeUnuG25_ALXsls9">
                            Editeur
                        </a>
                        <a target="_blank" class="btn btn-primary" href="https://mermaid-js.github.io/mermaid/#/n00b-gettingStarted">
                            Documentation
                        </a>
                    @elseif($tab_selected==4) {{-- Ressources --}}
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRessource">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
                            Ressource
                        </a>
                    @elseif($tab_selected==5) {{-- Roadmap --}}
                        @if (!$roadmap)
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRoadmap">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
                                Roadmap
                            </a>
                        @else
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSprint">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
                            Sprint
                        </a>
                        @endif
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
        @livewire('projet.settings', ['projet'=>$projet])
    @elseif($tab_selected==1)
        @livewire('projet.presentation', ['projet'=>$projet])
    @elseif($tab_selected==2)
        @livewire('fonctionalite.besoin',['projet'=>$projet])
    @elseif($tab_selected==3)
        @livewire('tabler.database',['projet'=>$projet])
    @elseif($tab_selected==4)
        @livewire('tabler.ressources',['projet'=>$projet])
    @elseif($tab_selected==5)
        @livewire('tabler.roadmap',['projet'=>$projet])
    @endif

    {{-- Modal roadmap ========================================================= --}}
    <div class="modal modal-blur fade" id="modalRoadmap" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter une roadmap</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Nom du client </label>
                        <input type="text" wire:model.defer="roadmap_client" class="form-control" placeholder="Nom">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Nom du projet </label>
                        <input type="text" wire:model.defer="roadmap_name" class="form-control" placeholder="Nom">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Chef de projet </label>
                        <input type="text" wire:model.defer="roadmap_chief" class="form-control" placeholder="Nom">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Date de début </label>
                        <input type="date" wire:model.defer="roadmap_date" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Fermer</button>
                    <button wire:click="store_roadmap" class="btn btn-primary" data-bs-dismiss="modal">Ajouter la
                        roadmap</button>
                </div>
            </div>
        </div>
    </div>

</div>
