<div class="card" style="width: 16rem;">
    <div align="center" style="height: 200px">
        <img style="height: 100%" src="/{{$participation->user->photo ?? 'images/person-circle.svg'}}" alt="">
    </div>
    <div class="card-body">
        <h5 class="card-title text-center">{{$participation->user->name}}</h5>
        @if ($participation->user->id == auth()->id() || auth()->user()->is_admin)
            <a wire:click="detachParticipation({{$participation->user->id}})"
               class="btn btn-block btn-danger">{{__('Cancel participation')}}</a>
        @endif
    </div>
</div>
