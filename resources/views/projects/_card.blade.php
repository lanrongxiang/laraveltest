<div class="col-4 my-3">
        <div class="card projects_card">
            <ul  class="icon-bar">
                <li>
                   @include('projects._deleteForm')
                </li>
                <li>                <!-- Button trigzger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProjectModal-{{$project->id}}">
                    <i class="fa fa-btn fa-cog"> </i>
                    </button>
                </li>
            </ul>
        <a href="{{ route('projects.show',$project->id)  }}">
                <img src="{{ asset('storage/thumbs/cropped/'.$project->thumbnail )}}" class="card-img-top" alt="...">
            </a>
            <div class="card-body py-3">
                <a href="{{ route('projects.show',$project->id) }}">
                    <h6 class="card-title text-center">{{ $project->name }}</h6>
                </a>
            </div>
            </div>
            {{-- 引入编辑模块 --}}
          @include('projects._editModal')
</div>