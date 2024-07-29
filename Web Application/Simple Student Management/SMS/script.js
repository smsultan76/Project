function toggle() {
    document.getElementById("Popup").style.display = "flex";
    if (document.getElementById("Pip").innerHTML == "Login") {
        document.getElementById("Pip").innerHTML = "Register";
        document.getElementById("Piplog").style.display= "block";
        document.getElementById("Pipreg").style.display= "none";
    }
    else{
        document.getElementById("Pip").innerHTML = "Login";
        document.getElementById("Piplog").style.display= "none";
        document.getElementById("Pipreg").style.display= "block";
    }
}
function crossbutton(){
    document.getElementById("Pip").innerHTML="Login";
    document.getElementById("Popup").style.display = "none";
}
function stdl(){
    if (document.getElementById("Pips").innerHTML == "Student Login") {
        document.getElementById("Pips").innerHTML = "Cancel"
        document.getElementById("stdlog").style.display= "block";
        document.getElementById("Piplog").style.display= "none";
        document.getElementById("Pipreg").style.display= "none";

    }
    else {
        document.getElementById("Pips").innerHTML = "Student Login";
        document.getElementById("stdlog").style.display= "none";

    }
}