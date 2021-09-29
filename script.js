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

      //modifier.seance//
  const openModifierseance = document.getElementById('openModifierseance')
  const closeModifierseance = document.getElementById('closeModifierseance')
  const openModifierseance1 = document.getElementById('openModifierseance')
  const closeModifierseance1 = document.getElementById('closeModifierseance')
  
  const openmodifierseance = () => {
    openModifierseance1.style.display= "none"
    closeModifierseance1.style.display= "inline"
    }
  
    const closemodifierseance = () => {
      openModifierseance1.style.display= "inline"
      closeModifierseance1.style.display= "none"
    }
  
    openModifierseance.addEventListener('click', openmodifierseance)
    closeModifierseance.addEventListener('click', closemodifierseance)

    //modifier.seance2//
    const afficher = document.getElementById('afficher')
    const fermer = document.getElementById('fermer')
    const div = document.getElementById('div')

    const Afficher = () => {
      afficher.style.display= "none"
      fermer.style.display= "block"
      div.style.display= "block"
      }
    
      const Fermer = () => {
        afficher.style.display= "block"
        fermer.style.display= "none"
        div.style.display= "block"
      }
    
      afficher.addEventListener('click', Afficher)
      fermer.addEventListener('click', Fermer)