@extends('layouts.main')
@section('main')
<div class="vh-10"></div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 offset-md-1 mt-5 mb-5">
            <form action="/reporter/{{$destination}}" method="POST" id="markdownForm">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control inp inp-title" name="title" id="inp-title" rows="1" placeholder="Title">@if($post != null){{$post->title}}@endif</textarea>
                </div>
                <div class="mb-3">

                    <input class="form-control" 
                            name="category" 
                            list="datalistOptions" 
                            @if($post != null)
                                value = {{$post->category->name}}
                            @endif 
                            id="exampleDataList" 
                            placeholder="Category" 
                            @if($destination == 'editAnnouncement' || 'createAnnouncements')
                                hidden value="Announcement"
                            @endif
                            title="Start typing and then select. if does not appear then write your own">

                    <datalist id="datalistOptions">
                        @foreach($categories as $category)
                        <option value="{{$category->name}}">
                        @endforeach
                        
                    </datalist>
                </div>
                <div class="mb-3">
                    <textarea class="form-control inp inp-body math" name="content" id="text" rows="15" placeholder="Start Writing ...">@if($post != null){{$post->content}}@endif</textarea>
                </div>
                @if($post != null)
                <input type="text" name="id" value="{{$post->id}}" hidden>
                @endif
                <div class="row">
                    
                    <div class="col-md-12 df jcfe">
                        
                        <button type="submit" class="btn btn-primary me-auto" style="width: 100%">
                        @if($post != null)
                            Update
                        @else
                            Create
                        @endif
                        </button> 
                    </div>
                </div>
                               
            </form>
            
        </div>
        <div class="col-md-5 preview mt-5 mb-5">
            <h1 class="display-5 mb-4" id="main-title"></h1>
            <div class="row">
                <div class="col-md-auto">
                    <p class="bcard" id="post-date"></p>
                </div>
                <div class="col-md-auto">
                    <p class="bcard">{{$member->name}}</p>
                </div>
            </div>
            <div class="markdown-here" id="content"></div>
            <!-- <p>$$e^2$$</p> -->
        </div>
    </div>
</div>



<style>
    .inp {
        border: none;
        border-radius: 0;
        /* background-color: rgba(150, 150, 150, 0.1); */
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.4); */
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    }
    .inp-title {
        font-size: 2rem;
        font-weight: bold;
    }
    .inp-body {
        font-size: 1.2rem;
    }

    .form-control:hover{
        border: none;
        box-shadow: none;
        border-radius: 10px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.5);
        background-color: rgba(150, 150, 150, 0.1);
    }

    .form-control:focus {
        border: none;
        box-shadow: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.5);
        background-color: rgba(150, 150, 150, 0.1);
        border-radius: 10px;
    }

    .preview {
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        padding: 10px;
        padding-left: 20px;
        padding-right: 20px;
        background-color: rgba(150, 150, 150, 0.1);
        min-height: 30vh;
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.4); */
    }

    @media (min-width: 992px) { /* Desktop screens and larger */
        .preview {
            margin-left: 50px;
        }
    }

    .bcard {
        border: 1px solid rgba(12, 103, 0, 0.559);
        border-radius: 10px;
        padding: 5px;
        padding-left: 12px;
        padding-right: 12px;
        background-color: rgba(30, 255, 0, 0.078);
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.4); */
        font-family: 'jetbrains mono', monospace;
        font-size: 0.8rem;
    }

    .markdown-here img {
        max-width: 100%;
        height: auto;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Event listener for textarea input
        document.getElementById('text').addEventListener('input', function() {
            updatePreview();
            updateMathPreview();
        });

        // Event listener for modal show
        document.getElementById('exampleModal').addEventListener('show.bs.modal', function () {
            updateMathPreview();
        });

        // Function to update the preview
        function updatePreview() {
            let textValue = document.getElementById('text').value;
            document.getElementById('content').innerHTML = marked.parse(textValue);
        }

        // Function to update MathJax rendering and display line breaks
        function updateMathPreview() {
            const content = document.getElementById('content');
            const contentWithLineBreaks = content.innerHTML.replace(/\n/g, '<br>');

            content.innerHTML = contentWithLineBreaks;

            // Update MathJax rendering
            MathJax.texReset();
            MathJax.typesetClear();
            MathJax.typesetPromise([content]);
        }
    });
</script>

<script>
    title_input = document.getElementById('inp-title');
    title_preview = document.getElementById('main-title');
    title_input.addEventListener('input', function() {
        title_preview.innerHTML = title_input.value;
    });

    date = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById('post-date').innerHTML = date.toLocaleDateString('en-US', options);

    link_input = document.getElementById('inp-link');
    link_display = document.getElementById('link-display');
    link_input.addEventListener('input', function() {
        link_display.src = link_input.value;
    });
</script>


<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>


@endsection