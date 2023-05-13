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
const openEditorBtns = editor && document.querySelectorAll('[open-editor]')

var ctx = editorCanvas.getContext('2d')
var canvasRect = editorCanvas.getBoundingClientRect()
var inMemCanvas = document.createElement('canvas')
var inMemCtx = inMemCanvas.getContext('2d')

var pos = { x: 0, y: 0 }
var coordinatesMultipliers = { x: 0, y: 0 }
var isEditing = false

function setPosition(e) {
  canvasRect = editorCanvas.getBoundingClientRect()
  const clientX = e.touches?.length ? e.touches[0].clientX : e.clientX
  const clientY = e.touches?.length ? e.touches[0].clientY : e.clientY

  pos.x = (clientX - canvasRect.left) * coordinatesMultipliers.x
  pos.y = (clientY - canvasRect.top) * coordinatesMultipliers.y
}

function resize() {
  if (!editorCanvas.offsetWidth || !editorCanvas.offsetHeight) return

  inMemCanvas.width = editorCanvas.width
  inMemCanvas.height = editorCanvas.height
  inMemCtx.drawImage(editorCanvas, 0, 0)

  editorCanvas.width = window.innerWidth
  editorCanvas.height = window.innerHeight

  ctx.clearRect(0, 0, editorCanvas.width, editorCanvas.height)
  ctx.drawImage(inMemCanvas, 0, 0, editorCanvas.width, editorCanvas.height)
  ctx.lineCap = 'round'

  coordinatesMultipliers.x = window.innerWidth / editorCanvas.offsetWidth
  coordinatesMultipliers.y = window.innerHeight / editorCanvas.offsetHeight
  
  setColor(colorInput.value)
  setThickness(thicknessInput.value)

  // TODO: delete if no need to scale content on width change
  // let scale = Math.min(editorCanvas.width / inMemCanvas.width, editorCanvas.height / inMemCanvas.height)
  // let newWidth = inMemCanvas.width * scale
  // let newHeight = inMemCanvas.height * scale

  // let x = (editorCanvas.width - newWidth) / 2
  // let y = (editorCanvas.height - newHeight) / 2

  // ctx.clearRect(0, 0, editorCanvas.width, editorCanvas.height)
  // ctx.drawImage(inMemCanvas, 0, 0, inMemCanvas.width, inMemCanvas.height, x, y, newWidth, newHeight)
}

function draw(e) {
  if ((e.buttons !== 1 && e.type !== 'touchmove') || !isEditing) return

  ctx.beginPath()
  ctx.moveTo(pos.x, pos.y)
  setPosition(e)
  ctx.lineTo(pos.x, pos.y)

  ctx.stroke()
}

function clearCanvas(e) {
  thicknessInput.value = thicknessInput.min
  setThickness(thicknessInput.min)
  ctx.clearRect(0, 0, editorCanvas.width, editorCanvas.height)
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
  editorDownloadBtn.href = editorCanvas.toDataURL('image/png')
}

async function editSignature(e) {
  clearCanvas()

  const imageSrc = e.target.closest('[data-signature-src]').getAttribute('data-signature-src')

  drawImage(imageSrc)
  openEditor()
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

function openEditor() {
  openModal(editor)
  resize()
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

function closeEditorIfOuterClick(e) {
  if (!checkIfOuterClick(editor, e)) return

  clsoeEditor()
}

function clsoeEditor() {
  closeModal(editor)
}

if (editor) {
  window.addEventListener('resize', resize)
  document.addEventListener('mousemove', draw)
  editorCanvas.addEventListener('mousedown', enableEditing)
  document.addEventListener('mouseup', disableEditing)
  editorCanvas.addEventListener('touchmove', e => e.preventDefault())
  
  editorCanvas.addEventListener("touchstart", enableEditing)
  document.addEventListener("touchmove", draw)
  document.addEventListener("touchend", disableEditing)

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

  openEditorBtns.forEach(btn => {
    btn.addEventListener('click', openEditor)
  })
  editor.addEventListener('click', closeEditorIfOuterClick)
  editor.addEventListener('close', clsoeEditor)
}