var isclicked =true;
function toggle(){
    if(isclicked){
        document.getElementById("Pipin").style.display ="flex";
        isclicked = !isclicked;
    }
    else{
        document.getElementById("Pipin").style.display ="none";
        isclicked = !isclicked;
    }
}

function logout(){
    window.location.href = 'welcome.php?logout=true';
}
