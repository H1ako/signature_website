var page = 0
var isNoMoreSignatures = false
var isSignaturesGenerating = false


const generatorForm = document.querySelector('#generator-form')
const generatorLoader = document.querySelector('#generator-loader')
const signaturesList = document.querySelector('#signatures-list')

const signaturePreviwBtns = document.querySelectorAll('[preview-signature]')
const signatureShareBtns = document.querySelectorAll('[share-signature]')

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
  if (isSignaturesGenerating) return

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

function startLoading() {
  isSignaturesGenerating = true

  generatorLoader.classList.add('loading')
}

async function getGeneratedSignatures() {
  const formData = new FormData(generatorForm)
  const cleanFormData = getTransliteratedGeneratorData(formData)
  const dataToSend = {
    ...cleanFormData,
    page
  }

  const response = await fetch('/signature_generator/api/get-signatures', {
    method: 'GET',
    body: new URLSearchParams(dataToSend),
  })
  if (response.status == 200) {
    const signatures = response.json()

    return signatures
  }
  
  return []
}

function getTransliteratedGeneratorData(formData) {
  const firstName = transliterate?.(formData.get('first-name'))
  const lastName = transliterate?.(formData.get('last-name'))
  const middleName = transliterate?.(formData.get('middle-name') ?? '')

  return {firstName, lastName, middleName}
}

function stopLoading() {
  isSignaturesGenerating = false

  generatorLoader.classList.remove('loading')
}

async function appendGeneratedSignatures() {
  const newSignatures = await generateSignatures()
}

function shareSignature(e) {
  const domain = window
  const generatorData = getTransliteratedGeneratorData(formData)

  
}

// async function shareSignature(e) {
//   const imageLink = await e.target.getAttribute('image-link')
//   const imageBlob = await getBlobFromString(imageLink)

//   shareImage('My Signature', 'Check out my Signature', imageBlob)
// }

// async function getBlobFromString(blobString) {
//   const response = await fetch(blobString)
//   const blob = await response.blob()
  
//   return blob
// }

// async function shareImage(title, text, blob) {
//   const data = {
//     files: [
//       new File([blob], 'signature.png', {
//         type: blob.type,
//       }),
//     ],
//     title: title,
//     text: text,
//   };
//   try {
//     if (!navigator.share || !(navigator.canShare(data))) {
//       throw new Error("Can't share data.", data);
//     }
//     await navigator.share(data);
//   } catch (err) {
//     console.error(err.name, err.message);
//   }
// }

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