{!! Form::open(['route'=>['tasks.destroy',$task->id],'method'=>'DELETE']) !!}
<button type="submit" class="btn btn-danger btn-sm" >
    <i class="fas fa-window-close"></i>
</button>
{!! Form::close() !!}