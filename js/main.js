
function sidebarToggle(sidebarID,mainId){
    const sidebar = document.getElementById(sidebarID);
    sidebar.classList.add('sidebar-small');
    const main = document.getElementById(mainId);
    main.classList.add('main-on');
    
}
function sidebarOff(sidebarID,mainId){
    const sidebar = document.getElementById(sidebarID);
    sidebar.classList.remove('sidebar-small');
    const main = document.getElementById(mainId);
    main.classList.remove('main-on');
    
}

const sidebar = document.getElementById('sidebar-id');
const main = document.getElementById('main');
const toggle_on = document.getElementById('menu_toggle');
const toggle_open = document.getElementById('menu_toggle-off');


    const mostrar = document.querySelector('.toggle_on');
    mostrar.addEventListener('click',function(){
    sidebarToggle('sidebar-id','main');
    toggle_on.classList.add('toggle-off');
    toggle_open.classList.add('toggle-open');
    });
    const reative = document.querySelector('.menu-toggle-off');
    reative.addEventListener('click',function(){
        sidebarOff('sidebar-id','main');
        toggle_on.classList.remove('toggle-off');
        toggle_open.classList.remove('toggle-open');
        });

