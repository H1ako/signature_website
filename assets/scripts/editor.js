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

var ctx = editorCanvas.getContext('2d')
var canvasRect = editorCanvas.getBoundingClientRect()
ctx.lineCap = 'round'
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
  // var newWidth = window.innerWidth
  // var newHeight = window.innerHeight
  // var ratio = editorCanvas.width / editorCanvas.height
  // var newRatio = newWidth / newHeight
  // if (newRatio > ratio) {
  //   newHeight = newWidth / ratio
  // } else {
  //   newWidth = newHeight * ratio
  // }
  
  // inMemCanvas.width = editorCanvas.width
  // inMemCanvas.height = editorCanvas.height
  // inMemCtx.drawImage(editorCanvas, 0, 0)

  // const newWidth = window.innerWidth
  // const newHeight = window.innerHeight
  // const oldWidth = editorCanvas.width
  // const oldHeight = editorCanvas.height

  inMemCanvas.width = editorCanvas.width
  inMemCanvas.height = editorCanvas.height
  inMemCtx.drawImage(editorCanvas, 0, 0)

  editorCanvas.width = window.innerWidth
  editorCanvas.height = window.innerHeight

  let scale = Math.min(editorCanvas.width / inMemCanvas.width, editorCanvas.height / inMemCanvas.height)
  let newWidth = inMemCanvas.width * scale
  let newHeight = inMemCanvas.height * scale

  let x = (editorCanvas.width - newWidth) / 2
  let y = (editorCanvas.height - newHeight) / 2

  // Clear the canvas and draw the scaled drawings in their new position
  ctx.clearRect(0, 0, editorCanvas.width, editorCanvas.height)
  ctx.drawImage(inMemCanvas, 0, 0, inMemCanvas.width, inMemCanvas.height, x, y, newWidth, newHeight)
  console.log(inMemCanvas, 0, 0, inMemCanvas.width, inMemCanvas.height, x, y, newWidth, newHeight)
  

  // var xOffset = (newWidth - canvas.width) / 2
  // var yOffset = (newHeight - canvas.height) / 2

  
  // ctx.drawImage(inMemCanvas, 0, 0)
  ctx.lineCap = 'round'

  coordinatesMultipliers.x = window.innerWidth / editorCanvas.offsetWidth
  coordinatesMultipliers.y = window.innerHeight / editorCanvas.offsetHeight

  setColor(colorInput.value)
  setThickness(thicknessInput.value)
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
  console.log(e)
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
  editorCanvas.addEventListener('mousedown', enableEditing)
  document.addEventListener('mouseup', disableEditing)
  editorCanvas.addEventListener('wheel', e => e.preventDefault())
  editorCanvas.addEventListener('mousewheel', e => e.preventDefault())
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

  resize()
}