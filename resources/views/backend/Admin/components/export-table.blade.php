<div class="table-responsive mb-4">
    <table id="dtMaterialDesignExample" class="table table-striped">
        <thead>
            <tr>
                <th class="th-sm">Name</th>
                <th class="th-sm">Email</th>
                </th>
            </tr>
        </thead>
        <tbody>
            @if(count($users)>0)
            @foreach($users as $user)
            <tr>
                <td>{{$user->name ?? 'Not Assigned'}}</td>
                <td>{{$user->email ?? 'Not Assigned'}}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="8" class="text-center">No User Found!</td>
            </tr>
            @endif

        </tbody>
    </table>
    @if ($users instanceof \Illuminate\Pagination\LengthAwarePaginator)
     <div class="col-md-6" style="margin-bottom:10px">
              {{$users->links("pagination::bootstrap-4")}}
     </div>
     @endif
</div>