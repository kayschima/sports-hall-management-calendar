<div>
    <div class="form-group">
        <label for="sport">{{__('Sport')}}</label>
        <select wire:model="sportid" class="form-control" name="sport" id="sport">
            @foreach($allSports as $oneSport)
                <option value="{{$oneSport->id}}">{{$oneSport->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="hall">{{__('Hall')}}</label>
        <select wire:model="hallid" class="form-control" name="hall" id="hall">
            @foreach($allHalls as $oneHall)
                <option value="{{$oneHall->id}}">{{$oneHall->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="d-flex justify-content-center">
        <div wire:loading class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <table wire:loading.remove class="table table-striped table-sm">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">{{__('Sport')}}</th>
            <th class="text-center">{{__('Hall')}}</th>
            <th class="text-center">{{__('Description')}}</th>
            <th class="text-center">{{__('When')}}?</th>
            <th class="text-center">{{__('Slots')}}</th>
            <th class="text-center">{{__('Attendees')}}</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($trainingtimes as $trainingtime)
            <tr>
                <td class="text-center">{{$trainingtime->id}}</td>
                <td class="text-center">{{$trainingtime->sports->name}}</td>
                <td class="text-center">{{$trainingtime->hall->name}}</td>
                <td class="text-center">{{$trainingtime->description}}</td>
                <td class="text-center">{{$trainingtime->date->format('d.m.y')}}
                    , {{$trainingtime->time->format('H:i')}}</td>
                <td class="text-center">{{$trainingtime->slots}}</td>
                <td class="text-center">{{$trainingtime->participations_count}}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger btn-xs"
                            wire:click="deleteTrainingtime({{$trainingtime->id}})">
                        <img src="/images/trash-fill.svg" alt="" title="{{__('Delete trainingtime')}}">
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
