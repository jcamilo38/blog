@extends ('layouts.layout')


@section('content')
<!-- Contenido -->
<section class="container-fluid content py-5">


        <div class="row justify-content-center">
            <!-- Post -->
            <div class="col-12 col-md-7 text-center">
                <h1>{{$post->title}}</h1>
                <hr>
                <img src="{{asset($post->featured)}}" width="50%" alt="{{$post->title}}" class="img-fluid">

                <p class="text-left mt-3 ">
                    <span><a href="{{$post->author}}" target="_Blank"> Enlace </a></span><br>
                    <span class="float-right">Publicado: {{$post->created_at->diffForHumans()}}</span>
                </p>
                <p class="text-left">
                    <p>{{$post->content}}</p>
                </p>
                <p class="text-left "><i>Categoría: {{$post->category->name}}</i></p>
            </div>


            <!-- Entradas recientes -->
            <div class="col-md-3 offset-md-1">
                <p>Últimos eventos</p>
                @foreach ($latestPosts as $post)    
                <div class="row mb-4">
                    <div class="col-4 p-0">
                        <a href="{{route('post', $post->id)}}">
                            <img src="{{asset($post->featured)}}" class="img-fluid rounded" width="50%" alt="{{$post->title}}">
                        </a>
                    </div>
                    <div class="col-7 pl-0">
                        <a href="{{route('post', $post->id)}}" class="link-post">{{$post->title}}</a>
                    </div>
                </div>
                @endforeach
               
                <button type="button" class="btn btn-info">          
                <div class="row mb-1">             
                    <div class="col-7 ">
                        <a href="/" class="link-post"><strong>Regresar</strong></a>
                    </div>
                </div>
                </button>
            </div>

        </div>
    </section>


@endsection
