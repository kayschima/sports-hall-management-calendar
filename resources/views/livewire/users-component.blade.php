<div>
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">{{__('Name')}}</th>
            <th class="text-center">{{__('Admin')}}?</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td class="text-center">{{$user->id}}</td>
                <td class="text-center">{{$user->name}}</td>
                <td class="text-center">
                    @if ($user->is_admin)
                            <img src="/images/plus-circle.svg" alt="" title="{{__('Yes')}}">
                    @else
                            <img src="/images/dash-circle.svg" alt="" title="{{__('No')}}">
                    @endif
                </td>
                <td class="text-center">
                        <button type="button" class="btn btn-danger btn-xs" wire:click="deleteUser({{$user->id}})">
                            <img src="/images/trash-fill.svg" alt="" title="{{__('Delete user')}}">
                        </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
