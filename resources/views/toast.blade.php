<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>ToastUI Debug Test (Fixed ToolbarItems)</title>

  <!-- (Optional) Bootstrap CSS just to keep some spacing -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />

  <!-- Toast UI Editor CSS -->
  <link
    rel="stylesheet"
    href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css"
  />

  <style>
    body { padding: 2rem; }
    /* Give #editor a dashed border so we can see its bounds */
    #editor { border: 2px dashed crimson; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Debug: ToastUI Editor (Fixed ToolbarItems)</h2>
    <p id="status">Status: (waiting to initialize...)</p>

    <!-- Hidden input (just to supply some initial Markdown) -->
    <input
      type="hidden"
      id="hiddenContentInput"
      value="**Initial bold text**"
    />

    <!-- Placeholder for Toast UI Editor -->
    <div id="editor"></div>

    <button id="logMarkdown" class="btn btn-secondary mt-3">
      Log Markdown to Console
    </button>
  </div>

  <!-- (Optional) Bootstrap JS bundle (for any tooltips or modals, not strictly needed) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Toast UI Editor JS -->
  <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("status").innerText = "Status: DOMContentLoaded fired";

      // 1. Check that #editor exists
      const editorDiv = document.querySelector("#editor");
      if (!editorDiv) {
        console.error("ERROR: <div id=\"editor\"> NOT found in DOM.");
        document.getElementById("status").innerText = "Status: ERROR—#editor not found";
        return;
      }
      console.log("#editor was found in DOM:", editorDiv);
      document.getElementById("status").innerText = "Status: #editor found";

      // 2. Verify that toastui.Editor is available
      if (typeof toastui === "undefined" || typeof toastui.Editor !== "function") {
        console.error("ERROR: toastui.Editor is not available. CDN script failed?");
        document.getElementById("status").innerText = "Status: ERROR—toastui.Editor undefined";
        return;
      }
      console.log("toastui.Editor is available:", toastui.Editor);
      document.getElementById("status").innerText = "Status: toastui.Editor available";

      // 3. Initialize Toast UI Editor *with corrected toolbarItems*
      try {
        const editor = new toastui.Editor({
          el: editorDiv,
          initialEditType: "wysiwyg",
          previewStyle: "vertical",
          height: "300px",
          initialValue: document.getElementById("hiddenContentInput").value,
          usageStatistics: false,
          toolbarItems: [
            // Each nested array here is a “group” of buttons
            ["heading", "bold", "italic", "strike"],
            ["hr", "quote"],
            ["ul", "ol", "task", "indent", "outdent"],
            ["table", "image", "link"],
            ["code", "codeblock"]
          ]
        });
        console.log("SUCCESS: toastui.Editor initialized:", editor);
        document.getElementById("status").innerText = "Status: Editor initialized successfully";
      } catch (err) {
        console.error("ERROR while initializing toastui.Editor:", err);
        document.getElementById("status").innerText = "Status: ERROR during editor init";
        return;
      }

      // 4. Make “Log Markdown” button show the raw Markdown in the console
      document.getElementById("logMarkdown").addEventListener("click", function () {
        console.log("Current Markdown:", editor.getMarkdown());
        alert("Open your DevTools console to see the Markdown.");
      });
    });
  </script>
</body>
</html>
