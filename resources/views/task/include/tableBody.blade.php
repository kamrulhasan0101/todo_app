<tr>
    <th scope="row">{{ $loop->iteration }}</th>
    <td><a href="{{route('task.show',$task->id)}}" class="text-dark">{{$task->title}}</a></td>
    <td>{{$task->status}}</td>
    <td>{{$task->category->name}}</td>
    <td>{{ date('d-M-y', strtotime($task->created_at))}}</td>
    <td class="text-center">
        <form method="POST" action="{{route('task.done',$task->id)}}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn-sm btn-success border-0 float-left ml-2">Done</button>
        </form>

        <a href="{{route('task.edit',$task->id)}}" class="float-left btn-sm btn-warning ml-2">Edit</a>
        <form method="POST" action="{{route('task.destroy',$task->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-sm btn-danger border-0 float-left ml-2" onclick= "return confirm('Are You Sure to Delete?')">Delete</button>
        </form>
    </td>
</tr>
