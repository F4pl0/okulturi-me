$("#slika-select-btn").click(function(){
    $("#slikaField").click();
});

function toMysqlFormat(date) {
    return date.getUTCFullYear() + "-" + twoDigits(1 + date.getUTCMonth()) + "-" + twoDigits(date.getUTCDate()) + " " + twoDigits(date.getUTCHours()) + ":" + twoDigits(date.getUTCMinutes()) + ":" + twoDigits(date.getUTCSeconds());
};

$("#submit-btn").click(function(){
    var error = false;

    if( $("#imeField").val().length < 1) {
        $("#imeField").css({ 'border': "2px solid red" });
        error = true;
    } else {
        $("#imeField").css({ 'border': "none" });
    }

    if( $("#opisField").val().length < 1) {
        $("#opisField").css({ 'border': "2px solid red" });
        error = true;
    } else {
        $("#opisField").css({ 'border': "none" });
    }

    if( $("#slikaField").val().length < 1) {
        alert("Odaberite Sliku");
        error = true;
    }

    if(error)
        return;

    var formData = new FormData();

    formData.append("ime", $("#imeField").val());
    formData.append("opis", $("#opisField").val());
    formData.append("datetime", toMysqlFormat(new Date($("#datumField").val())) );
    formData.append("kategorija", $('#kategorijaField').val());
    
    // HTML file input, chosen by user
    formData.append("slika", document.getElementById("slikaField").files[0]);
    
    var request = new XMLHttpRequest();
    request.open("POST", "api/desavanje/create");
    request.onreadystatechange = function() {
        if (request.readyState === XMLHttpRequest.DONE && request.status === 200) {
            document.location.href = "content";
        } else if (request.readyState === XMLHttpRequest.DONE && request.status !== 200) {
            alert("Doslo je do greske");
        }
    };
    request.send(formData);
});

function twoDigits(d) {
    if(0 <= d && d < 10) return "0" + d.toString();
    if(-10 < d && d < 0) return "-0" + (-1*d).toString();
    return d.toString();
}
