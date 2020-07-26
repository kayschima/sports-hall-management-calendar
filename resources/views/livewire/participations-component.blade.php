<div class="d-flex flex-wrap">
    @foreach($participations->users as $participation)
        @include('livewire.participation-card')
    @endforeach

    @for ($i = 0; $i < $maxSlots - count ($participations->users); $i++)
        @include('livewire.participation-free-slot')
    @endfor
</div>
