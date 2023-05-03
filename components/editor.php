<div class="editor">
  <canvas class="editor__canvas"></canvas>
  <div class="editor__tools">
    <span class="tools__left">
      <button class="left__tool tool_edit">
        <?php include('icons/edit.php'); ?>
        <span class="tool__text">Edit</span>
      </button>
      <button class="left__tool tool_eraser">
        <?php include('icons/eraser.php'); ?>
        <span class="tool__text">Eraser</span>
      </button>
      <input value="#000000" type="color" class="left__tool tool_color" name="editor-color" id="editor-color">
      <input value="1" type="range" min="1" max="10" class="left__tool tool_thickness">
    </span>
    <span class="tools__right">
      <button class="right__tool tool_share">
        <?php include('icons/share.php'); ?>
      </button>
      <a href="download:" class="right__tool tool_download">
        <?php include('icons/download.php'); ?>
      </a>
    </span>
  </div>
</div>