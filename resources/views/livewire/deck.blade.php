<div class="mt-5 d-flex justify-content">
    <div class="container">
        <h1 class="h1 text-center 0">My Pokemons</h1>
        <div class="row">
            @foreach($pokemons as $pokemon)
                <div class="card mt-5 ml-5">
                    <div class="row no-gutters">
                        <div class="col-md-4 text-center">
                            <img src="{{$pokemon->image}}" class="card-img" alt="{{$pokemon->name}}">
                        </div>
                        <div class="col-md-12">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{$pokemon->name}}</h5>
                                <h5>Weigtht</h5>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width:{{$pokemon->weight}}%"
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
                                         style="width:{{$pokemon->heightt}}%"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <h5 class="mt-1"><span class="badge badge-pill badge-success">{{$pokemon->ability}}</span></h5>
                                <p class="card-text"><small class="text-muted">Last updated {{$pokemon->created_at->locale('en')->diffForHumans()}}</small></p>
                                <div class="text-center">
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

