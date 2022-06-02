var sidebarState = true;

$(document).ready(()=>{
   var sidebar = document.getElementById('sidebar');
   sidebarState = (window.innerWidth < 720) ? true : false;
   sBar.handleSidebarState();
   var control = document.getElementById('control');
});

const sBar = {
    handleSidebarState: () =>{
        let linkId = document.querySelectorAll('.link-text');
        if(!sidebarState){
            sidebar.classList.remove('w-20');
            sidebar.classList.add('w-72');
            control.classList.remove('rotate-180');
            linkId.forEach((item) =>{
                item.classList.remove('hidden');
            });
        }else{
            sidebar.classList.remove('w-72');
            sidebar.classList.add('w-20');
            control.classList.add('rotate-180');
            linkId.forEach((item) =>{
                item.classList.add('hidden');
            });
        }
        sidebarState = !sidebarState;
    }
}
