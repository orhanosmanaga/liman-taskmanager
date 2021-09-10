<script>
    function listeManager()
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('dosya_Liste') }}", data, function (response) {
            // Başarılıysa
            
            $("#dosya_liste").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

</script>