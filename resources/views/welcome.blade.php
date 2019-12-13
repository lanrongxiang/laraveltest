@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card-deck">
            {{-- each()方法有四个参数,第一个分离出去视图的名字,第二个是一个集合的名字,第三个是给这个集合的as取一个变量名要和视图一致,第四个可选填如果这个集合为空执行的视图是什么 --}}
            @each('projects._card', $projects, 'project')
            {{-- 引入一个projects目录下的createModal模块 --}}
                <div class="card col-4 my-3">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        @include('projects._createModal')
                    </div>
                </div>
        </div>
    </div>
@endsection


{{-- js分离后的模块 --}}
@section('customJS')  
    <script>
        $(document).ready(function(){
            $('.icon-bar').hide();
           $('.projects_card').hover(function(){
               $(this).find('.icon-bar').toggle();
           })
        })
    </script>
@endsection

