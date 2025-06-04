@extends('layouts.main')

@section('main')
<div class="vh-10"></div>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8 mt-5 mb-5">
      <form action="/reporter/{{$destination}}" method="POST" id="markdownForm">
        @csrf

        {{-- Title --}}
        <div class="mb-3">
          <textarea
            class="form-control inp inp-title"
            name="title"
            id="inp-title"
            rows="1"
            placeholder="Title..."
          >@if($post){{ $post->title }}@endif</textarea>
        </div>

        {{-- Category --}}
        <div class="mb-3">
          <input
            class="form-control"
            name="category"
            list="datalistOptions"
            @if($post)
              value="{{ $post->category->name }}"
            @endif
            id="exampleDataList"
            placeholder="Category"
            @if($destination == 'editAnnouncement' || $destination == 'createAnnouncements')
              hidden value="Announcement"
            @endif
            title="Start typing and then select. If it does not appear, write your own"
          />
          <datalist id="datalistOptions">
            @foreach($categories as $category)
              <option value="{{ $category->name }}">
            @endforeach
          </datalist>
        </div>

        {{-- Hidden input for raw Markdown --}}
        <input
          type="hidden"
          name="content"
          id="hiddenContentInput"
          @if($post)
            value="{{ htmlentities($post->content) }}"
          @endif
        />

        {{-- Toast UI Editor placeholder --}}
        <div class="mb-3">
          <div id="editor"></div>
        </div>

        {{-- If editing, include post ID --}}
        @if($post)
          <input type="hidden" name="id" value="{{ $post->id }}" />
        @endif

        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-dark">
            @if($post) Update @else Create @endif
          </button>
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
          >
            <i class="uil uil-fire"></i> Help
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Your existing “Markdown Helper” modal stays exactly the same --}}
<div
  class="modal fade"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">
          Markdown Helper
        </h1>
        <button
          type="button"
          class="btn-close btn-close-white"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <h2>Markdown Basics</h2>
        <ul class="list-group">
          <li class="list-group-item">
            <strong>Headings:</strong> Use <code>#</code> for headings. More
            <code>#</code> means smaller heading.<br />
            Example: <code># Heading 1</code>, <code>## Heading 2</code>
          </li>
          <li class="list-group-item">
            <strong>Bold:</strong> Use <code>**text**</code> or <code>__text__</code>
            for bold text.<br />
            Example: <code>**bold text**</code> or <code>__bold text__</code>
          </li>
          <li class="list-group-item">
            <strong>Italic:</strong> Use <code>*text*</code> or <code>_text_</code>
            for italic text.<br />
            Example: <code>*italic text*</code> or <code>_italic text_</code>
          </li>
          <li class="list-group-item">
            <strong>Lists:</strong> Use <code>-</code> or <code>*</code> for unordered
            lists, and numbers for ordered lists.<br />
            Example: <code>- Item 1</code>, <code>* Item 2</code>, <code>1. Item 3</code>
          </li>
          <li class="list-group-item">
            <strong>Links:</strong> Use <code>[text](url)</code> for links.<br />
            Example: <code>[Google](https://www.google.com)</code>
          </li>
          <li class="list-group-item">
            <strong>Images:</strong> Use <code>![alt text](url)</code> for images.<br />
            Example: <code>![Logo](https://example.com/logo.png)</code>
          </li>
          <li class="list-group-item">
            <strong>Inline Code:</strong> Use <code>`code`</code> for inline code.<br />
            Example: <code>`print("Hello, World!")`</code>
          </li>
          <li class="list-group-item">
            <strong>Code Blocks:</strong> Use <code>```language</code> to start a code block
            and <code>```</code> to end it.<br />
            Example:<br />
            <pre><code>```python
print("Hello, World!")
```</code></pre>
          </li>
          <li class="list-group-item">
            <strong>Inline Equations:</strong> Use <code>\\(inline equation\\)</code> for
            inline equations.<br />
            Example: <code>\(E=mc^2\)</code>
          </li>
          <li class="list-group-item">
            <strong>Block Equations:</strong> Use <code>\\[block equation\\]</code> for block
            equations.<br />
            Example:<br />
            <pre><code>\\[a^2 + b^2 = c^2\\]</code></pre>
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button
          type="button"
          class="btn btn-secondary"
          data-bs-dismiss="modal"
        >
          Close
        </button>
      </div>
    </div>
  </div>
</div>

{{-- (Optional styling tweaks) --}}
<style>
  .inp {
    border: none;
    border-radius: 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
  }
  .inp-title {
    font-size: 2rem;
    font-weight: bold;
  }
  .form-control:hover {
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
</style>

  <!-- Toast UI Editor JS -->
  <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>

  <!-- Toast UI Editor CSS -->
  <link
    rel="stylesheet"
    href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css"
  />

{{-- Initialize Toast UI Editor (with *correctly nested* toolbarItems) --}}
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // 1. Grab existing Markdown (if $post != null), otherwise empty
    const initialMarkdown =
      document.getElementById("hiddenContentInput").value || "";

    // 2. Initialize Toast UI Editor in WYSIWYG mode
    const editor = new toastui.Editor({
      el: document.querySelector("#editor"),
      initialEditType: "wysiwyg",
      previewStyle: "vertical",
      height: "60vh", // or '400px', whichever you prefer
      initialValue: initialMarkdown,
      usageStatistics: false,
      toolbarItems: [
        ["heading", "bold", "italic", "strike"],
        ["hr", "quote"],
        ["ul", "ol", "task", "indent", "outdent"],
        ["table", "image", "link"],
        ["code", "codeblock"]
      ]
    });

    // 3. On form submit, copy Markdown back into hidden input
    document
      .getElementById("markdownForm")
      .addEventListener("submit", function (e) {
        document.getElementById("hiddenContentInput").value =
          editor.getMarkdown();
      });

    // 4. (Optional) Title live‐preview
    const titleInput = document.getElementById("inp-title");
    const titlePreview = document.getElementById("main-title");
    if (titleInput && titlePreview) {
      titleInput.addEventListener("input", function () {
        titlePreview.innerText = titleInput.value;
      });
    }

    // 5. (Optional) Date live‐preview
    const dateEl = document.getElementById("post-date");
    if (dateEl) {
      const date = new Date();
      const options = { year: "numeric", month: "long", day: "numeric" };
      dateEl.innerHTML = date.toLocaleDateString("en-US", options);
    }
  });
</script>
@endsection
