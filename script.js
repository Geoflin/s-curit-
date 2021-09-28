//Ajouter.seance//

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

  //supprimer.seance//

  const supprimerseance = document.getElementById('supprimerseance')
  const openSupprimerSeance = document.getElementById('openSupprimerSeance')
  const closeSupprimerSeance = document.getElementById('closeSupprimerSeance')
  
  const opensupprimerSeance = () => {
    supprimerseance.style.display = "inline"
    openSupprimerSeance.style.display= "none"
    closeSupprimerSeance.style.display= "inline"
    }
  
    const closesupprimerSeance = () => {
      supprimerseance.style.display = "none"
      openSupprimerSeance.style.display= "inline"
      closeSupprimerSeance.style.display= "none"
    }
  
    openSupprimerSeance.addEventListener('click', opensupprimerSeance)
    closeSupprimerSeance.addEventListener('click', closesupprimerSeance)