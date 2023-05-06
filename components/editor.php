<div class="editor" id="editor">
  <canvas class="editor__canvas" id='editor-area'></canvas>
  <div class="editor__tools">
    <span class="tools__left">
      <!-- <button class="left__tool tool_edit" id="editor-edit">
        <?php // include('icons/edit.php'); ?>
        <span class="tool__text">Edit</span>
      </button> -->
      <button class="left__tool tool_clear"  id="editor-clear" title="Clear">
        <?php include('icons/eraser.php'); ?>
        <span class="tool__text">Clear</span>
      </button>
      <input value="#000000" type="color" class="left__tool tool_color" name="editor-color" id="editor-color" title="Color">
      <input value="3" type="range" min="3" max="8" class="left__tool tool_thickness" id="editor-thickness" title="Thickness">
    </span>
    <span class="tools__right">
      <button class="right__tool tool_share" id="editor-share" title="Share">
        <?php include('icons/share.php'); ?>
      </button>
      <a href="download:" class="right__tool tool_download" id="editor-download" title="Download">
        <?php include('icons/download.php'); ?>
      </a>
    </span>
  </div>
</div>