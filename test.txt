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
                            @if($destination == 'editAnnouncement' || $destination == 'createAnnouncements')
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
                    <textarea class="form-control inp inp-body math" name="content" id="text" rows="15" placeholder="Start Writing . Click on Help to learn...">@if($post != null){{$post->content}}@endif</textarea>
                </div>
                @if($post != null)
                <input type="text" name="id" value="{{$post->id}}" hidden>
                @endif
                <div class="row">
                    
                    <div class="col-md-12 df jcfe">
                        
                        <button type="submit" class="btn btn-dark me-auto" >
                        @if($post != null)
                            Update
                        @else
                            Create
                        @endif
                        </button> 
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="uil uil-fire"></i> Help
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Markdown Helper</h1>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h2>Markdown Basics</h2>
          <ul class="list-group">
            <li class="list-group-item"><strong>Headings:</strong> Use <code>#</code> for headings. More <code>#</code> means smaller heading.<br>Example: <code># Heading 1</code>, <code>## Heading 2</code></li>
            <li class="list-group-item"><strong>Bold:</strong> Use <code>**text**</code> or <code>__text__</code> for bold text.<br>Example: <code>**bold text**</code> or <code>__bold text__</code></li>
            <li class="list-group-item"><strong>Italic:</strong> Use <code>*text*</code> or <code>_text_</code> for italic text.<br>Example: <code>*italic text*</code> or <code>_italic text_</code></li>
            <li class="list-group-item"><strong>Lists:</strong> Use <code>-</code> or <code>*</code> for unordered lists, and numbers for ordered lists.<br>Example: <code>- Item 1</code>, <code>* Item 2</code>, <code>1. Item 3</code></li>
            <li class="list-group-item"><strong>Links:</strong> Use <code>[text](url)</code> for links.<br>Example: <code>[Google](https://www.google.com)</code></li>
            <li class="list-group-item"><strong>Images:</strong> Use <code>![alt text](url)</code> for images.<br>Example: <code>![Logo](https://example.com/logo.png)</code></li>
            <li class="list-group-item"><strong>Inline Code:</strong> Use <code>`code`</code> for inline code.<br>Example: <code>`print("Hello, World!")`</code></li>
            <li class="list-group-item"><strong>Code Blocks:</strong> Use <code>```language</code> to start a code block and <code>```</code> to end it.<br>Example: <code>```python<br>print("Hello, World!")<br>```</code></li>
            <li class="list-group-item"><strong>Inline Equations:</strong> Use <code>\\(inline equation\\)</code> for inline equations.<br>Example: <code>\\(E = mc^2\\)</code></li>
            <li class="list-group-item"><strong>Block Equations:</strong> Use <code>\\[block equation\\]</code> for block equations.<br>Example: <code>\\[a^2 + b^2 = c^2\\]</code></li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <style>
    .modal-header {
      background-color: #007bff;
      color: white;
    }
  
    .btn-close-white {
      filter: invert(1);
    }
  
    .modal-body h2 {
      border-bottom: 2px solid #007bff;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }
  
    .list-group-item {
      border: none;
      padding: 15px;
      border-bottom: 1px solid #f0f0f0;
    }
  
    .list-group-item:last-child {
      border-bottom: none;
    }
  
    .list-group-item code {
      background-color: #f8f9fa;
      padding: 2px 4px;
      border-radius: 4px;
    }
  </style>
  



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