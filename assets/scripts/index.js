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
const signatureCardTemplate = document.querySelector('#signature-card-template')

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
  if (!isGeneratorFormValid()) return

  replaceWithGeneratedSignatures()
}

function generatorFormHandler(e) {
  e.preventDefault()
  
  replaceWithGeneratedSignatures()
}

async function replaceWithGeneratedSignatures() {
  if (!signaturesList) return
  signaturesList.scrollIntoView({
    block: 'center'
  })
  resetGeneratorData()
  
  const newSignatures = await generateSignatures()
  if (!newSignatures) return
  
  signaturesList.innerHTML = ''
  addSignaturesToList(newSignatures)

}

function addSignaturesToList(signatures) {
  signatures.forEach(image => {
    const newSignatureCard = getSignatureCard(image)
    if (!newSignatureCard) return

    signaturesList.appendChild(newSignatureCard)
  })
}

function getSignatureCard(image) {
  if (!signatureCardTemplate) return null

  const newCardClone = signatureCardTemplate.content.cloneNode(true)
  const newCard = newCardClone.querySelector('.signature-card')
  newCard.setAttribute('data-signature-src', image)

  const newCardImageMainPreviewButton = newCard.querySelector('.signature-card__top')
  newCardImageMainPreviewButton.addEventListener('click', previewSignature)
  const newCardImage = newCardImageMainPreviewButton.querySelector('.top__image')
  newCardImage.src = image

  const newCardDownloadLink = newCard.querySelector('[download-signature]')
  newCardDownloadLink.href = image

  const newCardToolsEditButton = newCard.querySelector('[edit-signature]')
  newCardToolsEditButton.addEventListener('click', editSignature)
  
  const newCardToolsPreviewButton = newCard.querySelector('.btn_view')
  newCardToolsPreviewButton.addEventListener('click', previewSignature)

  const newCardToolsShareButton = newCard.querySelector('.btn_share')
  newCardToolsShareButton.addEventListener('click', shareSignature)

  return newCard
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
    return null
  }
  if (isSignaturesGenerating || !(isGeneratorFormValid())) return null
  enableGeneratorLoader()

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
  
  const response = await fetch(`/signature_generator/api/get-signatures?first-name=${firstName}&last-name=${lastName}&middle-name=${middleName}&page=${page}`, {
    method: 'GET',
  })
  if (response.status == 200) {
    const signatures = await response.json()
    
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
  if (!signaturesList) return

  const newSignatures = await generateSignatures()
  if (!newSignatures) return
  
  addSignaturesToList(newSignatures)
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

disableGeneratorLoader()
fillGeneratorFormWithQuery()
generateIfDataFilled()
generatorForm && generatorForm.addEventListener('submit', generatorFormHandler)
if (generatorLoader) {
  const generatorLoaderObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        appendGeneratedSignatures()
      }
    })
  }, {
    threshold: 0.1
  })
  
  generatorLoaderObserver.observe(generatorLoader)
  generatorLoader.addEventListener('click', appendGeneratedSignatures)
}

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