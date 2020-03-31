<!-- Button trigger modal -->
<button type="button" class="btn modal-trigger" data-toggle="modal" data-target="#createPorjetsModal">
  <i class="fa fa-btn fa-plus"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="createPorjetsModal" tabindex="-1" role="dialog" aria-labelledby="createPorjetsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPorjetsModalLabel">新建项目</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['route'=>'projects.store','method'=>'POST','files'=>1],) !!} 
      <div class="modal-body">
          <div class="form-group">
            {!! Form::label('name', '项目名称') !!}
            {!! Form::text('name', '', ['class'=>'form-control']) !!}
             {!! $errors->create->first('name','<div class="alert alert-danger">:message</div>') !!}
          </div>
          
          <div class="form-group">
            {!! Form::label('thumbnail', '项目缩略图') !!}
            {!! Form::file('thumbnail',['class'=>'form-control-file']) !!}
             {!! $errors->create->first('thumbnail','<div class="alert alert-danger">:message</div>') !!}

          </div>
           {{-- @include('errors._errors') --}}
           {{-- @if ($errors->create->any())
               <ul class="alert alert-danger"> --}}
              {{-- 错误信息不止一个所以需要遍历,获取所有的错误信息as单个error --}}
              {{-- @foreach ($errors->create->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
           @endif --}}
        </div>
        <div class="modal-footer">
            {!! Form::submit('新建项目', ['class'=>'btn btn-primary']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>