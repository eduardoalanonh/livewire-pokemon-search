<div class="mt-5 d-flex justify-content">
    <div class="container">
        @if(count($pokemons) > 0)
            <h1 class="h1 text-center 0">My {{count($pokemons)}} Pokemons </h1>
            <div class="row">
                <!-- Then put toasts within -->
                @foreach($pokemons as $pokemon)
                    <div class="card mt-5 ml-5">
                        <div class="row no-gutters">
                            <div class="col-md-4 text-center">
                                <img src="{{$pokemon->image}}" class="card-img" alt="{{$pokemon->name}}">
                            </div>
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ucfirst($pokemon->name)}}</h5>
                                    <h5>Weigtht</h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar"
                                             style="width:{{$pokemon->weight}}%"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h5>Base Experience</h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-succes" role="progressbar"
                                             style="width: {{$pokemon->base_experience}}%"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h5>Height</h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                             style="width:{{$pokemon->height}}%"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h5 class="mt-1"><span
                                            class="badge badge-pill badge-success">{{$pokemon->ability}}</span></h5>
                                    <p class="card-text"><small class="text-muted">Created at  {{$pokemon->created_at->locale('en')->diffForHumans()}}</small></p>
                                    <div class="text-center">
                                        <button class="btn btn-danger" wire:click="destroy({{$pokemon->id}})">Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="spinner-grow text-danger" wire:loading wire:target="destroy" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                @else
                    <div>
                        <div class="alert alert-primary text-center" role="alert">
                            List Empty
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-emoji-frown"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path fill-rule="evenodd"
                                      d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683z"/>
                                <path
                                    d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                            </svg>
                        </div>
                    </div>
                @endif

            </div>
    </div>
</div>

