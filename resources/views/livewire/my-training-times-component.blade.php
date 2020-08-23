<div class="col-lg-12 p-2">
    <h2>{{__('My training times')}}</h2>
    <table class="table table-striped table-sm table-responsive-md">
        <thead>
        <tr>
            <th class="text-center">{{__('Sport')}}</th>
            <th class="text-center">{{__('Hall')}}</th>
            <th class="text-center">{{__('When')}}?</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($myTrainingTimes as $trainingtime)
            <tr>
                <td class="text-center">{{$trainingtime->sport}}</td>
                <td class="text-center">{{$trainingtime->hall}}</td>
                <td class="text-center">{{\Carbon\Carbon::parse($trainingtime->date)->format(config('shmc.dateformat'))}}
                    , {{\Carbon\Carbon::parse($trainingtime->time)->format(config('shmc.timeformat'))}}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger btn-xs"
                            wire:click="cancelParticipation({{$trainingtime->training_id}})">
                        <img src="/images/trash-fill.svg" alt="" title="{{__('Cancel participation')}}">
                    </button>
                    <a type="button" class="btn btn-primary btn-xs"
                       href="/participations/{{$trainingtime->training_id}}">
                        <img src="/images/arrow-right-circle.svg" alt="" title="{{__('Go to trainingtime')}}">
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
