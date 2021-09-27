const ajoutseance = document.getElementById('ajoutseance')
const openAjoutSeance = document.getElementById('openAjoutSeance')
const closeAjoutSeance = document.getElementById('closeAjoutSeance')

const openajoutSeance = () => {
    ajoutseance.style.display = "inline"
    openAjoutSeance.style.display= "none"
    closeAjoutSeance.style.display= "inline"
  }

  const closeajoutSeance = () => {
    ajoutseance.style.display = "none"
    openAjoutSeance.style.display= "inline"
    closeAjoutSeance.style.display= "none"
  }

  openAjoutSeance.addEventListener('click', openajoutSeance)
  closeAjoutSeance.addEventListener('click', closeajoutSeance)