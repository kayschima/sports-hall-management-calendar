<div>
    @if(!$isDialogVisible)
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('Name')}}</th>
                <th>{{__('Description')}}</th>
                <th>
                    <button type="button" class="btn btn-primary float-right"
                            wire:click="addHall(null,null,null)">{{__('Add hall')}}
                    </button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($halls as $hall)
                <tr>
                    <td>{{$hall->id}}</td>
                    <td>{{$hall->name}}</td>
                    <td>{{$hall->description}}</td>
                    <td>
                        <div class="float-right">
                            <button type="button" class="btn btn-primary btn-xs"
                                    wire:click="addHall({{$hall->id}},'{{$hall->name}}','{{$hall->description}}')">
                                <img src="/images/pencil.svg" alt="" title="{{__('Edit hall')}}">
                            </button>
                            <button type="button" class="btn btn-danger btn-xs" wire:click="deleteHall({{$hall->id}})">
                                <img src="/images/trash-fill.svg" alt="" title="{{__('Delete hall')}}">
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        @include('livewire.add-update-halls')
    @endif
</div>
