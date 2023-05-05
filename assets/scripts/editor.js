const editor = document.querySelector('#editor')
const editorCanvas = editor && editor.querySelector('#editor-area')
const editBtn = editor && editor.querySelector('#editor-edit')
const clearBtn = editor && editor.querySelector('#editor-clear')
const colorInput = editor && editor.querySelector('#editor-color')
const thicknessInput = editor && editor.querySelector('#editor-thickness')

var canvasRect = editorCanvas.getBoundingClientRect()
var ctx = editorCanvas.getContext('2d')
ctx.lineCap = 'round'

var pos = { x: 0, y: 0 }
var coordinatesMultipliers = { x: 0, y: 0 }
var isEditing = false

function setPosition(e) {
  canvasRect = editorCanvas.getBoundingClientRect()
  pos.x = (e.clientX - canvasRect.left) * coordinatesMultipliers.x
  pos.y = (e.clientY - canvasRect.top) * coordinatesMultipliers.y
}

function resize() {
  ctx.canvas.width = window.innerWidth
  ctx.canvas.height = window.innerHeight

  coordinatesMultipliers.x = window.innerWidth / editorCanvas.offsetWidth
  coordinatesMultipliers.y = window.innerHeight / editorCanvas.offsetHeight

  setColor(colorInput.value)
  setThickness(thicknessInput.value)
}

function draw(e) {
  if (e.buttons !== 1 || !isEditing) return

  ctx.beginPath()
  ctx.moveTo(pos.x, pos.y)
  setPosition(e)
  ctx.lineTo(pos.x, pos.y)

  ctx.stroke()
}

function clearCanvas(e) {
  ctx.clearRect(0, 0, editorCanvas.width, editorCanvas.height);
}

function changeColor(e) {
  const newColor = e.target.value
  
  setColor(newColor)
}

function setColor(color) {
  ctx.strokeStyle = color
}

function changeThickness(e) {
  const newThickness = e.target.value

  setThickness(newThickness)
}

function setThickness(thickness) {
  ctx.lineWidth = thickness * coordinatesMultipliers.x
}

function enableEditing(e) {
  isEditing = true
  setPosition(e)
}

function disableEditing() {
  isEditing = false
}

if (editor) {
  window.addEventListener('resize', resize)
  document.addEventListener('mousemove', draw)
  document.addEventListener('mouseenter', setPosition)
  editorCanvas.addEventListener('mousedown', enableEditing)
  document.addEventListener('mouseup', disableEditing)

  clearBtn.addEventListener('click', clearCanvas)
  // eraserBtn.addEventListener('click', setEraserMode)
  colorInput.addEventListener('change', changeColor)
  thicknessInput.addEventListener('change', changeThickness)

  resize()
}
