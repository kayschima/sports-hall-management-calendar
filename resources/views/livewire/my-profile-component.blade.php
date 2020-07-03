<div>
    <div class="card mb-3 mx-auto">
        <div class="row no-gutters">
            <div class="col-md-4">
                @if(!is_null($user->photo))
                    <img src="/{{$user->photo}}" class="card-img-top" alt="...">
                    <button type="button" class="btn btn-primary"
                            wire:click="deletePhoto">{{__('Delete photo')}}</button>
                @else
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="{{__('Placeholder')}}: {{__('No photo')}}">
                        <title>{{__('Placeholder')}}</title>
                        <rect width="100%" height="100%" fill="#868e96"></rect>
                        <text x="35%" y="50%" fill="#dee2e6">{{__('No photo')}}</text>
                    </svg>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{__('My profile')}}</h5>
                    <p class="card-text"><b>Name:</b><br>
                        {{ $user->name }}</p>
                    <div class="form-group">
                        <label for="email"><b>{{__('E-Mail Address')}}</b></label>
                        <input type="email" class="form-control" wire:model.lazy="email" name="email" id="email"
                               placeholder="{{__('Email')}}">
                        @error('email')<small id="helpId" class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label for="photo"><b>{{__('Photo')}}</b></label>
                        <input type="file" class="form-control-file" wire:model.lazy="photo" name="photo" id="photo"
                               placeholder="{{__('Photo')}}">
                        @error('photo')<small id="helpId" class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div wire:loading class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>
