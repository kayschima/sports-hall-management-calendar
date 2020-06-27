<div>
    @if(!$isDialogVisible)
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('Name')}}</th>
                <th>
                    <button type="button" class="btn btn-primary float-right"
                            wire:click="addSport(null,null)">{{__('Add sports')}}
                    </button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sports as $sport)
                <tr>
                    <td>{{$sport->id}}</td>
                    <td>{{$sport->name}}</td>
                    <td>
                        <div class="float-right">
                            <button type="button" class="btn btn-primary btn-xs" wire:click="addSport({{$sport->id}},'{{$sport->name}}')">
                                <img src="/images/pencil.svg" alt="" title="{{__('Edit sport')}}">
                            </button>
                            <button type="button" class="btn btn-danger btn-xs" wire:click="deleteSport({{$sport->id}})">
                                <img src="/images/trash-fill.svg" alt="" title="{{__('Delete sport')}}">
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        @include('livewire.add-update-sports')
    @endif
</div>
