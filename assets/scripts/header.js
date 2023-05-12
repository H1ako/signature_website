const languageChooser = document.querySelector('#language-chooser')

function updateSiteLagnuage(e) {
  console.log(e)
}

function updateLanguageInputValueByCurrent() {
  languageChooser.value = ''
}

if (languageChooser) {
  languageChooser.addEventListener('change', updateSiteLagnuage)
  updateLanguageInputValueByCurrent()
}