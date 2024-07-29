function showallstd(){
    document.getElementById("showallstd").style.display="block";
    document.getElementById("addstudents").style.display="none";
    document.getElementById("removestu").style.display="none";
    document.getElementById("Edit").style.display="none";
}
function addstudent(){
    document.getElementById("showallstd").style.display="none";
    document.getElementById("addstudents").style.display="flex";
    document.getElementById("removestu").style.display="none";
    document.getElementById("Edit").style.display="none";
}
function removestu(){
    document.getElementById("showallstd").style.display="none";
    document.getElementById("addstudents").style.display="none";
    document.getElementById("removestu").style.display="flex";
    document.getElementById("Edit").style.display="none";
}
function editinfo(){
    document.getElementById("showallstd").style.display="none";
    document.getElementById("addstudents").style.display="none";
    document.getElementById("removestu").style.display="none";
    document.getElementById("Edit").style.display="flex";

}