const isNavigateShareWorks = !!navigator.share

const editor = document.querySelector('#editor')
const editorCanvas = editor && editor.querySelector('#editor-area')
const editBtn = editor && editor.querySelector('#editor-edit')
const clearBtn = editor && editor.querySelector('#editor-clear')
const colorInput = editor && editor.querySelector('#editor-color')
const thicknessInput = editor && editor.querySelector('#editor-thickness')
const editorDownloadBtn = editor && editor.querySelector('#editor-download')
const editorShareBtn = editor && editor.querySelector('#editor-share')
const signaturesEditBtns = editor && document.querySelectorAll('[edit-signature]')

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

function downloadEditorSignature(e) {
  editorDownloadBtn.download = 'signature.png'
  editorDownloadBtn.href = editorCanvas.toDataURL('image/png');
}

async function editSignature(e) {
  clearCanvas()

  const imageSrc = e.target.closest('[data-signature-src]').getAttribute('data-signature-src')

  drawImage(imageSrc)
  goToEditor()
}

function drawImage(src) {
  const image = new Image()

  image.onload = () => {
    const canvasWidth = editorCanvas.width
    const canvasHeight = editorCanvas.height
    const imageWidth = image.width * coordinatesMultipliers.x / 2
    const imageHeight = image.height * coordinatesMultipliers.y / 2
    const x = (canvasWidth - imageWidth) / 2
    const y = (canvasHeight - imageHeight) / 2
    
    ctx.drawImage(image, x, y, imageWidth, imageHeight)
  }
  
  image.src = src
}

function goToEditor() {
  editor.scrollIntoView({
    block: 'center'
  })
}

async function shareEditorSignature() {
  editorCanvas.toBlob(blob => {
    shareImage('', '', blob)
  })
}

function disableShareBtnIfCantShare() {
  if (isNavigateShareWorks) return

  editorShareBtn?.remove()
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
  editorDownloadBtn.addEventListener('click', downloadEditorSignature)
  editorShareBtn.addEventListener('click', shareEditorSignature)
  disableShareBtnIfCantShare()

  signaturesEditBtns.forEach(btn => {
    btn.addEventListener('click', editSignature)
  })

  resize()
}