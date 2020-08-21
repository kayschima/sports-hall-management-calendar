<div>
    @if(!$isDialogVisible)
        <div class="row">
            <div class="form-group col-md-5">
                <label for="sport">{{__('Sport')}}</label>
                <select wire:model="sportid" class="form-control" name="sport" id="sport">
                    @foreach($allSports as $oneSport)
                        <option value="{{$oneSport->id}}">{{$oneSport->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-center">
                <div wire:loading class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="form-group col-md-5">
                <label for="hall">{{__('Hall')}}</label>
                <select wire:model="hallid" class="form-control" name="hall" id="hall">
                    @foreach($allHalls as $oneHall)
                        <option value="{{$oneHall->id}}">{{$oneHall->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <table class="table table-striped table-sm table-responsive-md">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">{{__('Sport')}}</th>
                <th class="text-center">{{__('Hall')}}</th>
                <th class="text-center">{{__('Description')}}</th>
                <th class="text-center">{{__('When')}}?</th>
                <th class="text-center">{{__('Max. slots')}}</th>
                <th class="text-center">{{__('Attendees')}}</th>
                <th>
                    @can('isAdministrator', auth()->user())
                        <button type="button" class="btn btn-primary btn-sm float-right"
                                wire:click="addTrainingtime(null)">{{__('Add trainingtime')}}
                        </button>
                    @endcan
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($trainingtimes as $trainingtime)
                <tr>
                    <td class="text-center">{{$trainingtime->id}}</td>
                    <td class="text-center">{{$trainingtime->sports->name}}</td>
                    <td class="text-center">{{$trainingtime->hall->name}}</td>
                    <td class="text-center">{{$trainingtime->description}}</td>
                    <td class="text-center">{{$trainingtime->date->format(config('shmc.dateformat'))}}
                        , {{$trainingtime->time->format(config('shmc.timeformat'))}}</td>
                    <td class="text-center">{{$trainingtime->slots}}</td>
                    <td class="text-center">{{$trainingtime->users_count}}</td>
                    <td class="text-center">
                        @can('isAdministrator', auth()->user())
                            <button type="button" class="btn btn-danger btn-xs"
                                    wire:click="deleteTrainingtime({{$trainingtime->id}})">
                                <img src="/images/trash-fill.svg" alt="" title="{{__('Delete trainingtime')}}">
                            </button>
                            <button type="button" class="btn btn-primary btn-xs"
                                    wire:click="addTrainingtime({{$trainingtime->id}})">
                                <img src="/images/pencil.svg" alt="" title="{{__('Edit trainingtime')}}">
                            </button>
                        @endcan
                        <a type="button" class="btn btn-primary btn-xs" href="/participations/{{$trainingtime->id}}">
                            <img src="/images/arrow-right-circle.svg" alt="" title="{{__('Go to trainingtime')}}">
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        @include('livewire.add-update-trainingtimes')
    @endif
</div>
