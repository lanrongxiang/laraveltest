{{-- 全局变量$error可以获取错误信息,any()是否存在错误信息 --}}
          @if($errors->any())
            <ul class="alert alert-danger">
              {{-- 错误信息不止一个所以需要遍历,获取所有的错误信息as单个error --}}
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          @endif