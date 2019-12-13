  <!-- Modal -->
<div class="modal fade" id="editProjectModal-{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="editProjectModal-{{$project->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProjectModal-{{$project->id}}">编辑项目</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            {{-- 将form将model进行绑定 --}}
                {!! Form::model($project,['route'=>['projects.update',$project->id],'method'=>'PATCH','files'=>1],) !!} 
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('name', '项目名称') !!}
                        {{-- // text value默认的为空的字符,无法和已有的数据进行绑定 --}}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        {!! $errors->getBag('update-'.$project->id)->first('name','<div class="alert alert-danger">:message</div>') !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('thumbnail', '项目缩略图') !!}
                        {!! Form::file('thumbnail',['class'=>'form-control-file']) !!}
                        {!! $errors->getBag('update-'.$project->id)->first('thumbnail','<div class="alert alert-danger">:message</div>') !!}

                    </div>
                    {{-- @if ($errors->getBag('update-'.$project->id)->any())
                        <ul class="alert alert-danger">
                        {{-- 错误信息不止一个所以需要遍历,获取所有的错误信息as单个error --}}
                        {{-- @foreach ($errors->getBag('update-'.$project->id)->all() as $error) --}}
                            {{-- <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    @endif --}} 
                    </div>
                    <div class="modal-footer">
                        {!! Form::submit('编辑项目', ['class'=>'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
    </div>
</div>