<div class="card" style="width: 16rem;">
    <div align="center" style="height: 200px">
        <img style="height: 100%" src="/{{$participation->photo ?? 'images/person-circle.svg'}}" alt="">
    </div>
    <div class="card-body">
        <h5 class="card-title text-center">{{$participation->name}}</h5>
        @if ($participation->id == auth()->id() || auth()->user()->is_admin)
            <a wire:click="toggleParticipation({{$participation->id}})"
               class="btn btn-block btn-danger">{{__('Cancel participation')}}</a>
        @endif
    </div>
</div>
