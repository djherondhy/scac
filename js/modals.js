
function onModal(modalId,subModalId){
    const modal = document.getElementById(modalId);
    const subModal = document.getElementById(subModalId);
    modal.classList.add('modal-on');
    subModal.classList.add('submodal-on');
    modal.addEventListener('click', (e) => {
        if(e.target.id == modalId || e.target.id == 'close' || e.target.id == 'sub'){
            modal.classList.remove('modal-on');
            subModal.classList.remove('submodal-on');
        }
        
    })
}

    const atv = document.getElementById("add-ativ");
    atv.addEventListener('click', ()=> onModal("modal-atividade","sub-atividade"));

    const maquina = document.getElementById("add-maquinas");
    maquina.addEventListener('click', ()=> onModal("modal-maquinas","sub-maquinas"));

