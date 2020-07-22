<div class="d-flex flex-wrap">
    @foreach($participations as $participation)
        @include('livewire.participation-card')
    @endforeach

    @for ($i = 0; $i < $maxSlots - count ($participations); $i++)
        @include('livewire.participation-free-slot')
    @endfor
</div>
