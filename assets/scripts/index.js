var page = 0
var isNoMoreSignatures = false
var isSignaturesGenerating = false
var randomIndex = null

const generatorForm = document.querySelector('#generator-form')
const generatorLoader = document.querySelector('#generator-loader')
const signaturesList = document.querySelector('#signatures-list')
const signaturePreviwBtns = document.querySelectorAll('[preview-signature]')
const signatureShareBtns = document.querySelectorAll('[share-signature]')
const goToTopBtn = document.querySelector('[go-top]')
const previewLightbox = document.querySelector('#preview-lightbox')
const previewLightboxImage = previewLightbox && previewLightbox.querySelector('img')
const paperPreviewLightbox = document.querySelector('#paper-preview-lightbox')
const paperPreviewLightboxImage = paperPreviewLightbox && paperPreviewLightbox.querySelector('.paper-preview__image')
const signatureCardTemplate = document.querySelector('#signature-card-template')
const goForMoreSignaturesBtn = document.querySelector('[go-for-more-signatures]')
const statisticsCounter = document.querySelector('[statistics-counter]')

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
    if (!input || !value) continue

    input.value = value
  }
}

async function generateIfDataFilled() {
  if (!isGeneratorFormValid()) return

  await replaceWithGeneratedSignatures()
}

function generatorFormHandler(e) {
  e.preventDefault()
  if (!isGeneratorFormValid()) return
  
  replaceWithGeneratedSignatures()

  signaturesList.scrollIntoView({
    block: 'center'
  })
}

async function replaceWithGeneratedSignatures() {
  updateUrlQueryByFormData()
  if (!signaturesList || !isGeneratorFormValid()) return
  
  resetGeneratorData()

  const signaturesListAdvertisementBlocks = signaturesList.querySelectorAll('.advertisement')
  signaturesList.innerHTML = ''
  signaturesListAdvertisementBlocks.forEach(block => {
    signaturesList.appendChild(block)
  })
  
  appendGeneratedSignatures()
}

function resetGeneratorData() {
  page = 0
  isNoMoreSignatures = false
  randomIndex = null
  generatorLoader.classList.remove('no-more-signatures')

  enableGeneratorLoader()
}

async function appendGeneratedSignatures() {
  const isGeneratingFormValid = isGeneratorFormValid()
  if ((!isGeneratingFormValid && !isSignaturesGenerating) || isNoMoreSignatures) {
    disableGeneratorLoader()
    return null
  }

  enableGeneratorLoader()

  if (!signaturesList) return

  var newSignatures
  for(var i=0; i < 15;i++) {
    newSignatures = await generateSignatures()
    if (!newSignatures) continue
    
    addSignaturesToList(newSignatures)
  }

  if (!newSignatures.length) {
    isNoMoreSignatures = true
    generatorLoader.classList.add('no-more-signatures')
  }

  if (!isElementVisible(generatorLoader) || isSignaturesGenerating || !isGeneratorFormValid()) return
  await appendGeneratedSignatures()
}

function addSignaturesToList(signatures) {
  signatures.forEach(image => {
    const newSignatureCard = getSignatureCard(image)
    if (!newSignatureCard) return

    signaturesList.insertBefore(newSignatureCard, signaturesList.children[signaturesList.children.length - 2])
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
  newCardDownloadLink.download = getDownloadFileName()

  const newCardToolsEditButton = newCard.querySelector('[edit-signature]')
  newCardToolsEditButton.addEventListener('click', editSignature)
  
  const newCardToolsPreviewButton = newCard.querySelector('.btn_view')
  newCardToolsPreviewButton.addEventListener('click', paperPreviewSignature)

  const newCardToolsShareButton = newCard.querySelector('.btn_share')
  newCardToolsShareButton.addEventListener('click', shareSignature)

  return newCard
}

function getDownloadFileName() {
  return `OnlineSignatures.net-${Math.round(Math.random() * 1000)}.png`
}

function enableGeneratorLoader() {
  if (!generatorLoader) return

  generatorLoader.classList.remove('disabled')
}

async function generateSignatures() {
  page++

  startLoading()
  const signatures = await getGeneratedSignatures()
  stopLoading()

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

  return !isEmpty(firstName) && !isEmpty(lastName)
}

function isEmpty(value) {
  return !value || value.trim().length === 0
}

function startLoading() {
  isSignaturesGenerating = true

  generatorLoader && generatorLoader.classList.add('loading')
}

async function getGeneratedSignatures() {
  const formData = new FormData(generatorForm)
  const cleanFormData = getTransliteratedGeneratorData(formData)
  const firstName = cleanFormData.firstName
  const lastName = cleanFormData.lastName
  const middleName = cleanFormData.middleName
  
  const response = await fetch(`/signature_generator/api/get-signatures?first-name=${firstName}&last-name=${lastName}&middle-name=${middleName}&page=${page}&randomIndex=${randomIndex ?? ''}`, {
    method: 'GET',
  })
  if (response.status == 200) {
    try {
      const data = await response.json()
      randomIndex = data.randomIndex

      return data.signatures
    } catch (error) {
      return []
    }
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

function paperPreviewSignature(e) {
  const signatureSrc = e.target.closest('[data-signature-src]').getAttribute('data-signature-src')

  openPaperPreviewLightbox(signatureSrc)
}

function openPaperPreviewLightbox(imageSrc) {
  paperPreviewLightboxImage.src = imageSrc
  
  openModal(paperPreviewLightbox)
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

function closePaperPreviewLightbox() {
  paperPreviewLightboxImage.src = ''
  
  closeModal(paperPreviewLightbox)
}

function closePreviewLightboxlIfOuterClick(e) {
  if (!checkIfOuterClick(previewLightbox, e)) return

  closePreviewLightbox()
}

function closePaperPreviewLightboxlIfOuterClick(e) {
  if (!checkIfOuterClick(paperPreviewLightbox, e)) return

  closePaperPreviewLightbox()
}

function goToTop() {
  window.scroll({
    top: 0
  })
}

function enableGoTopBtnIfScrolled() {
  goToTopBtn.classList.toggle('active', window.scrollY > window.screen.height / 2)
}

function isElementVisible(el) {
  const rect = el.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

function goToOpenEditorBtn() {
  if (!openEditorBtn) return

  replaceWithGeneratedSignatures()

  openEditorBtn.scrollIntoView({
    block: 'center'
  })
}

function spincrement(targetEl, endVal, duration) {
  let startVal = Number(targetEl.innerText),
      range = endVal - startVal,
      minTimer = 50,
      easeInOut = t => {return t<.5 ? 2*t*t : -1+(4-2*t)*t},
      stepTime = Math.abs(Math.floor(duration / range)),
      startTime = null,
      previousVal = startVal

  function update(now) {
    if (!startTime) startTime = now

    let timeLeft = Math.max(0, Math.min(1, (now - startTime) / duration)),
        val = Math.floor(easeInOut(timeLeft) * range + startVal)

    if (range > 0 && val > endVal) val = endVal
    if (range < 0 && val < endVal) val = endVal

    targetEl.innerText = val

    if (val === endVal) return

    previousVal = val

    requestAnimationFrame(update)
  }

  requestAnimationFrame(update);
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
    threshold: 0.1,
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
  previewLightbox.addEventListener('click', closePreviewLightboxlIfOuterClick)
  previewLightbox.addEventListener('close', closePreviewLightbox)
}

if (paperPreviewLightbox) {
  paperPreviewLightbox.addEventListener('click', closePaperPreviewLightboxlIfOuterClick)
  paperPreviewLightbox.addEventListener('close', closePaperPreviewLightbox)
}

goForMoreSignaturesBtn && goForMoreSignaturesBtn.addEventListener('click', goToOpenEditorBtn)
statisticsCounter && spincrement(statisticsCounter, SIGNATURES_GENERATED, 3000)