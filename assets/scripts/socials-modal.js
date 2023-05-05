const socialsModal = document.querySelector('.socials-modal')
const openSocialsModalBtns = socialsModal && document.querySelectorAll('[open-socials-modal]')

function openSocialsModal(e) {
  console.log(e)
  openModal(socialsModal)
}

function openModal(modal) {
  modal && modal.showModal()
  document.body.style.overflow = 'hidden'
}

function closeModal(modal) {
  modal && modal.close()
  document.body.style.removeProperty('overflow')
}

function closeSocialsModalIfOuterClick(e) {
  if (!checkIfOuterClick(socialsModal, e)) return

  closeModal(socialsModal)
}

function checkIfOuterClick(element, event) {
  const elementBox = element.getBoundingClientRect()

  return (event.clientX < elementBox.left ||
          event.clientX > elementBox.right ||
          event.clientY < elementBox.top ||
          event.clientY > elementBox.bottom)
}

socialsModal && openSocialsModalBtns.forEach(btn => {
  btn.addEventListener('click', openSocialsModal)
})

socialsModal && socialsModal.addEventListener('click', closeSocialsModalIfOuterClick)