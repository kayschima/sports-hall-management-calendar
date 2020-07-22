<div class="card" style="width: 16rem;">
    <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg"
         preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap">
        <title>Placeholder</title>
        <rect width="100%" height="200px" fill="#868e96"></rect>
    </svg>
    <div class="card-body">
        <h5 class="card-title text-center">{{__('Free slot')}}</h5>
        @if ( ! $alreadyParticipating)
            <a wire:click="attachParticipation()"
               class="btn btn-block btn-outline-primary">{{__('Occupy training slot')}}</a>
        @endif
    </div>
</div>
