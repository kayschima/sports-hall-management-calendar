<div>
    <div class="jumbotron">
        <button type="button" class="close" wire:click="closeDialog"><span>&times;</span></button>
        <h2 class="display-6">{{$header}}</h2>
        <hr class="my-2">
        <form wire:submit.prevent="addUpdateTrainingtime">
            <div class="form-group">
                <input type="hidden" wire:model.lazy="newID" name="trainingtimeid">
                <label>{{__('Description of the trainingtime')}}</label>
                <input type="text" wire:model.lazy="newDescription" class="form-control"
                       aria-describedby="helpId" placeholder="{{__('Description of the trainingtime')}}">
                <div>
                    <p>
                        @error('newDescription')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="sport">{{__('Sport')}}</label>
                    <select wire:model="newSportID" class="form-control" name="sport" id="sport">
                        @foreach($allSports as $oneSport)
                            <option
                                value="{{$oneSport->id}}" {{$oneSport->sports_id == $sportid ? 'selected' : ''}}>{{$oneSport->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="hall">{{__('Hall')}}</label>
                    <select wire:model="newHallID" class="form-control" name="hall" id="hall">
                        @foreach($allHalls as $oneHall)
                            <option
                                value="{{$oneHall->id}}" {{$oneHall->hall_id == $hallid ? 'selected' : ''}}>{{$oneHall->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="trainingtimeslots">{{__('Number of slots')}}</label>
                <input type="number" pattern="[0-9]" title="{{__('Only digits allowed')}}" wire:model.lazy="newSlots"
                       class="form-control"
                       name="trainingtimeslots"
                       id="trainingtimeslots"
                       aria-describedby="helpId" placeholder="{{__('Number of slots')}}">
                <div>
                    <p>
                        @error('trainingtimeslots')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label>{{__('Date of the trainingtime')}}</label>
                <input type="text" wire:model.lazy="newDate" class="form-control"
                       aria-describedby="helpId" placeholder="{{__('Date of the trainingtime')}}">
                <div>
                    <p>
                        @error('newDate')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label for="trainingtimetime">{{__('Time of the trainingtime')}}</label>
                <input type="text" wire:model.lazy="newTime" class="form-control"
                       name="trainingtimetime"
                       id="trainingtimetime"
                       aria-describedby="helpId" placeholder="{{__('Time of the trainingtime')}}">
                <div>
                    <p>
                        @error('trainingtimetime')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </p>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
            <button type="button" class="btn btn-danger" wire:click="closeDialog">{{__('Cancel')}}</button>
        </form>
    </div>
</div>
