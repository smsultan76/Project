var isclicked =true;
function toggle(){
    var toggle = document.getElementById("Pip");
    if(toggle.innerHTML =="Login"){
        toggle.innerHTML ="Register";
    }
    else toggle.innerHTML = "Login";

    var Popup = document.getElementById("Popup");
    var Piplog = document.getElementById("Piplog");
    var Pipreg = document.getElementById("Pipreg");
    if(isclicked){
        Pipreg.style.display = "none";
        Piplog.style.display = "block";
    }
    else{
        Piplog.style.display = "none";
        Pipreg.style.display = "block";
    }
    Popup.style.display = "flex";
    isclicked = !isclicked;
}

function logout(){
    window.location.href = 'welcome.php?logout=true';
}