<div>
    <div class="jumbotron">
        <button type="button" class="close" wire:click="closeDialog"><span>&times;</span></button>
        <h2 class="display-6">{{__('Add hall')}}</h2>
        <hr class="my-2">
        <form wire:submit.prevent="addUpdateHall">
            <div class="form-group">
                <input type="hidden" wire:model.lazy="hallid" name="hallid">
                <label for="hallname">{{__('Name of the hall')}}</label>
                <input type="text" wire:model.lazy="hallname" class="form-control" name="hallname" id="hallname"
                       aria-describedby="helpId" placeholder="{{__('Name of the hall')}}">
            </div>
            <div class="form-group">
                <label for="halldescription">{{__('Description of the hall')}}</label>
                <input type="text" wire:model.lazy="halldescription" class="form-control" name="halldescription"
                       id="halldescription"
                       aria-describedby="helpId" placeholder="{{__('Description of the hall')}}">
                <div><p>@error('hallname')<small id="helpId" class="text-danger">{{ $message }}</small></p>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
            <button type="button" class="btn btn-danger" wire:click="closeDialog">{{__('Cancel')}}</button>
        </form>
    </div>
</div>
