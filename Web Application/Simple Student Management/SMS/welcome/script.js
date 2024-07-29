function goschool(cls){
    switch (cls) {
        case 1:
            window.location.href = '../data/cse.php';
            break;
        case 2:
            window.location.href = '../data/eee.php';
            break;
        case 3:
            window.location.href = '../data/ce.php';
            break;
        default:
            break;
    }
    document.getElementById("mainhead").innerHTML = "Students of CSE department";
}

function logout() {
    window.location.href = 'welcome.php?logout=true';
}