console.log("Script loaded");
function showform() {
    var rad1 = document.getElementById('rad1');
    var rad2 = document.getElementById('rad2');
    var rad3 = document.getElementById('rad3');
    var form1 = document.getElementById("form-1");
    var form2 = document.getElementById("form-2");
    var form3 = document.getElementById("form-3");
    form1.style.display = 'none';
    form2.style.display = 'none';
    form3.style.display = 'none';
    if (rad1.checked) {
        form1.style.display = 'block';
    }
    else if (rad2.checked) {
        form2.style.display = 'block';
    }
    else if (rad3.checked) {
        form3.style.display = "block";
    }
}