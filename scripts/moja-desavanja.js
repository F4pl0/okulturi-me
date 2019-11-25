function brisi(id){
    $.post(
        "api/desavanje/delete",
        {
            id: id,
        },
        function(data, status) {
            let tempData = JSON.parse(data);
            if(tempData['success']){
                window.location.href = "moja-desavanja";
            } else {
                alert("Doslo je do greske : " + tempData['message']);
            }
        },
    );
}