<div class="mt-5 d-flex justify-content-center">
    <div class="col-10">
        <div class="card">
            <div class="card-header">
                Pokémon Search
            </div>
            <div class="card-body justify-center">
                <div class="input-group mb-3">
                    <input wire:model="pokemon" wire:keydown.enter="getPokemon" type="text" class="form-control" placeholder="Pokemon name or ID"
                           aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button wire:click="getPokemon" class="btn btn-outline-secondary" type="button"
                                id="button-addon2">
                            <span wire:loading wire:target="getPokemon" class="spinner-border spinner-border-sm"
                                  role="status" aria-hidden="true"></span>
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @if($data)
            <div class="mt-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h1 class="h1">
                            {{$data['name']}}
                        </h1>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3>Weigtht</h3>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: {{$data['weight']}}%"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h3>Base Experience</h3>
                            <div class="progress">
                                <div class="progress-bar bg-succes" role="progressbar"
                                     style="width: {{$data['base_experience']}}%"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h3>Height</h3>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar"
                                     style="width: {{$data['height']}}%"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h3>Ability</h3>
                            <h1><span class="badge badge-pill badge-info">{{$ability}}</span></h1>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($images as $key => $image)
                            @if($image)
                                <div class="col-2">
                                    <img src="{{$image}}" class="img-fluid rounded-pill" alt="{{$key}}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @if($pokemon_model != $data['name'])
                    <div class="text-center mb-5">
                        <button class="btn btn-success btn-lg" wire:click="addPokemonOnDeck">Add on deck
                            <span wire:loading wire:target="addPokemonOnDeck" class="spinner-border spinner-border-sm"
                                  role="status" aria-hidden="true"></span>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        @endif
        @if($response_code === 404)
            <div class="mt-3">
                <div class="alert alert-danger" role="alert">
                    Try again!
                </div>
            </div>
        @endif
        @error('pokemon')
        <div class="alert alert-danger mt-3" role="alert"><span class="error">{{ $message }}</span></div> @enderror
    </div>
</div>



