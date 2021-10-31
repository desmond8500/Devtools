<div class="row">
    <div class="col-md-12 mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ajouter un projet
        </button>
    </div>
    <div class="col-md-12 row">
        @forelse ($projets as $projet)
            <div class="col-md-3">
                <a href="{{ route('projet', ['projet_id'=>$projet->id]) }}" class="text-dark" style="text-decoration: none">
                    <div class="card border border-dark">
                        <div class="card-body">
                            <h5 class="card-title">{{ $projet->name }}</h5>
                            <p class="card-text">{{ $projet->description }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            Veuillez ajouter un projet
        @endforelse
    </div>

{{-- ========================================================================== --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un projet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nom du projet</label>
                        <input type="email" class="form-control" wire:model.defer='name' placeholder="Nom">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description du projet</label>
                        <textarea class="form-control" wire:model.defer='description' placeholder="Description du projet"  rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click='store'>Ajouter</button>
                </div>
            </div>
        </div>
    </div>
</div>
