<div>
    <div class="jumbotron">
        <button type="button" class="close" wire:click="closeDialog"><span>&times;</span></button>
        <h2 class="display-6">{{__('Add sports')}}</h2>
        <hr class="my-2">
        <form wire:submit.prevent="addUpdateSport">
            <div class="form-group">
                <input type="hidden" wire:model.lazy="sportid" name="sportid">
                <label for="sportname">{{__('Name of the sport')}}</label>
                <input type="text" wire:model.lazy="sportname" class="form-control" name="sportname" id="sportname"
                       aria-describedby="helpId" placeholder="{{__('Name of the sport')}}">
                <div><p>@error('sportname')<small id="helpId" class="text-danger">{{ $message }}</small>@enderror</p>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                <button type="button" class="btn btn-danger" wire:click="closeDialog">{{__('Cancel')}}</button>
            </div>
        </form>
    </div>
</div>
