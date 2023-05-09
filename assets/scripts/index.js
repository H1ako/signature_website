var page = 0
var isNoMoreSignatures = false
var isSignaturesGenerating = false

const generatorForm = document.querySelector('#generator-form')
const generatorLoader = document.querySelector('#generator-loader')
const signaturesList = document.querySelector('#signatures-list')
const signaturePreviwBtns = document.querySelectorAll('[preview-signature]')
const signatureShareBtns = document.querySelectorAll('[share-signature]')
const goToTopBtn = document.querySelector('[go-top]')
const previewLightbox = document.querySelector('#preview-lightbox')
const previewLightboxImage = previewLightbox && previewLightbox.querySelector('img')

function fillGeneratorFormWithQuery() {
  const urlParams = new URLSearchParams(window.location.search)
  
  const firstName = urlParams.get('first-name')
  const lastName = urlParams.get('last-name')
  const middleName = urlParams.get('middle-name')
  const data = {
    'first-name': firstName,
    'last-name': lastName,
    'middle-name': middleName
  }

  for (const [key, value] of Object.entries(data)) {
    const input = generatorForm.elements[key]
    if (!input) continue

    input.value = value
  }
}

function generateIfDataFilled() {
  replaceWithGeneratedSignatures()
}

function generatorFormHandler(e) {
  e.preventDefault()
  
  replaceWithGeneratedSignatures()
}

async function replaceWithGeneratedSignatures() {
  resetGeneratorData()

  const newSignatures = await generateSignatures()
}

function resetGeneratorData() {
  page = 0
  isNoMoreSignatures = false

  enableGeneratorLoader()
}

function enableGeneratorLoader() {
  if (!generatorLoader) return

  generatorLoader.classList.remove('disabled')
}

async function generateSignatures() {
  if (isNoMoreSignatures) {
    disableGeneratorLoader()
    return
  }
  if (isSignaturesGenerating || !(isGeneratorFormValid())) return

  page++

  startLoading()
  const signatures = await getGeneratedSignatures()
  stopLoading()
  if (!signatures.length) {
    isNoMoreSignatures = true
  }

  return signatures
}

function disableGeneratorLoader() {
  if (!generatorLoader) return

  generatorLoader.classList.add('disabled')
}

function isGeneratorFormValid() {
  const formData = new FormData(generatorForm)
  const firstName = formData.get('first-name')
  const lastName = formData.get('last-name')
  const middleName = formData.get('middle-name')

  return !(isEmpty(firstName) || isEmpty(lastName))
}

function isEmpty(value) {
  return !value || value.trim().length === 0;
}

function startLoading() {
  isSignaturesGenerating = true

  generatorLoader && generatorLoader.classList.add('loading')
}

async function getGeneratedSignatures() {
  updateUrlQueryByFormData()
  const formData = new FormData(generatorForm)
  const cleanFormData = getTransliteratedGeneratorData(formData)
  const firstName = cleanFormData.firstName
  const lastName = cleanFormData.lastName
  const middleName = cleanFormData.middleName
  
  const response = await fetch(`/signature_generator/api/get-signatures?first-name=${firstName}&last-name=${lastName}&middle-name=${middleName}&style=${page}`, {
    method: 'GET',
  })
  if (response.status == 200) {
    const signatures = response.json()

    return signatures
  }
  
  return []
}

function updateUrlQueryByFormData() {
  const formData = new FormData(generatorForm)
  const firstName = formData.get('first-name')
  const lastName = formData.get('last-name')
  const middleName = formData.get('middle-name')

  window.history.replaceState(null, null, (firstName || lastName || middleName) ? `?first-name=${firstName ?? ''}&last-name=${lastName ?? ''}&middle-name=${middleName ?? ''}` : window.location.pathname)
}

function getTransliteratedGeneratorData(formData) {
  const firstName = transliterate?.(formData.get('first-name'))
  const lastName = transliterate?.(formData.get('last-name'))
  const middleName = transliterate?.(formData.get('middle-name') ?? '')

  return {firstName, lastName, middleName}
}

function stopLoading() {
  isSignaturesGenerating = false

  generatorLoader && generatorLoader.classList.remove('loading')
}

async function appendGeneratedSignatures() {
  const newSignatures = await generateSignatures()
}

async function shareSignature(e) {
  if (isNavigateShareWorks) {
    shareSignatureWithNavigator(e)

    return
  }

  shareSignatureBySocialsModal(e)
}

function shareSignatureBySocialsModal(e) {
  const link = window.location.href

  openSocialsModal(link)
}

async function shareSignatureWithNavigator(e) {
  const imageLink = await e.target.closest('[data-signature-src]').getAttribute('data-signature-src')
  const imageBlob = await getBlobFromString(imageLink)

  shareImage('My Signature', 'Check out my Signature', imageBlob)
}

async function getBlobFromString(blobString) {
  const response = await fetch(blobString)
  const blob = await response.blob()
  
  return blob
}

async function shareImage(title, text, blob) {
  const data = {
    files: [
      new File([blob], 'signature.png', {
        type: blob.type,
      }),
    ],
    title: title,
    text: text,
  }

  try {
    if (!navigator.share || !(navigator.canShare(data))) {
      throw new Error("Can't share data.", data)
    }

    await navigator.share(data)
  } catch (err) {
    console.error(err.name, err.message)
  }
}

function previewSignature(e) {
  const signatureSrc = e.target.closest('[data-signature-src]').getAttribute('data-signature-src')

  openPreviewLightbox(signatureSrc)
}

function openPreviewLightbox(imageSrc) {
  previewLightboxImage.src = imageSrc
  
  openModal(previewLightbox)
}

function openModal(modal) {
  modal && modal.showModal()
  document.body.style.overflow = 'hidden'
}

function closePreviewLightbox() {
  previewLightboxImage.src = ''
  
  closeModal(previewLightbox)
}

function closeModal(modal) {
  modal && modal.close()
  document.body.style.removeProperty('overflow')
}

function closePreviewLightboxlIfOuterClick(e) {
  if (!checkIfOuterClick(previewLightbox, e)) return

  closePreviewLightbox()
}

function goToTop() {
  window.scroll({
    top: 0
  })
}

function enableGoTopBtnIfScrolled() {
  goToTopBtn.classList.toggle('active', window.scrollY > window.screen.height / 2)
}

fillGeneratorFormWithQuery()
generateIfDataFilled()
generatorForm && generatorForm.addEventListener('submit', generatorFormHandler)
const generatorLoaderObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      appendGeneratedSignatures()
    }
  })
}, {
  threshold: 0.1
})
generatorLoader && generatorLoaderObserver.observe(generatorLoader)
signatureShareBtns.forEach(btn => {
  btn.addEventListener('click', shareSignature)
})

if (goToTopBtn) {
  goToTopBtn.addEventListener('click', goToTop)
  document.addEventListener('scroll', enableGoTopBtnIfScrolled)
}
if (previewLightbox) {
  signaturePreviwBtns.forEach(btn => {
    btn.addEventListener('click', previewSignature)
  })
  previewLightbox.addEventListener('click', closePreviewLightboxlIfOuterClick)
}