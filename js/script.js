function dropDownMenu() {
    document.getElementById("dropdown-user").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.tombol-dropdown')) {
        var dropdowns = document.getElementsByClassName("tombol-dropdown");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}