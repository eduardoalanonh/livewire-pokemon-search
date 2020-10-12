<div class="mt-5 d-flex justify-content-center">
    <div class="col-11 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header text-center">
                {{$user->name}}
            </div>
            <div class="card-body justify-center">
                <div class="row">
                    <div class="col-6"
                         x-data="{ isUploading: false, progress: 0 }"
                         x-on:livewire-upload-start="isUploading = true"
                         x-on:livewire-upload-finish="isUploading = false"
                         x-on:livewire-upload-error="isUploading = false"
                         x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        @if($user_photo == '')
                            <figure class="figure mt-3">
                                <img src="{{asset('storage/no-profile.jpg')}}"
                                     class="figure-img img-fluid rounded rounded-circle" alt="...">
                            </figure>
                        @else
                            <figure class="figure mt-3">
                                <img src="{{asset('storage/' . $user_photo)}}"
                                     class="figure-img img-fluid rounded rounded-circle" alt="...">
                            </figure>
                        @endif

                        <form wire:submit.prevent="save">
                            <div class="custom-file">
                                <input type="file" wire:model="photo" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>

                            @error('photo') <span class="error">{{ $message }}</span> @enderror

                            <button type="submit" class="btn btn-outline-secondary mt-3 text-center ">Update</button>

                            <!-- Progress Bar -->
                            <div class="text-center">
                                <div wire:loading wire:target="photo">
                                    <div class="spinner-grow text-primary" wire:loading wire:target="photo"
                                         role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-6">
                        <div class="input-group flex-nowrap mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Email</span>
                            </div>
                            <input type="text" wire:model="new_email" class="form-control"
                                   placeholder="{{$user->email}}"
                                   aria-label="Username" aria-describedby="addon-wrapping">
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="updateEmail" class="btn btn-outline-secondary">Update
                                Email
                            </button>
                        </div>
                        @if($response_email)
                            <div class="mt-3">
                                <div class="alert alert-success" role="alert">
                                    E-mail updated
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
