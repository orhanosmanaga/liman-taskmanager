<script>
    function taskManager()
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('task_manager_list') }}", data, function (response) {
            // Başarılıysa
            $("#task_list").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetFileLocation(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_file_location') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#fileLocationModal").modal("show");
            $("#fileLocationContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }
    function jsGetServisDurum(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("service", $(node).find("#service").html())
        request("{{ API('get_Servis_Durum') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#servisDurumModal").modal("show");
            if(response.message == "")
            {
                response.message="servis yok";
            }
            $("#servisDurumContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }
    function jsGetIslemAgaci(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_Islem_Agaci') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#IslemAgaciModal").modal("show");
            if(response.message == "")
            {
                response.message="islem yok";
            }
            $("#IslemAgaciContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }
    function jsGetCalitirmaArguman(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("command", $(node).find("#command").html())
        request("{{ API('get_Calitirma_Arguman') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#CalitirmaArgumanModal").modal("show");
            if(response.message == "")
            {
                response.message="arguman bulunamadı";
            }
            $("#CalitirmaArgumanContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }
    function jsGetIslemSonlandir(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_Islem_Sonlandir') }}", data, function (response) {
            // Başarılıysa
           
            showSwal("başarı ile sonlandırıldı","success",2000);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }
    function jsGetTumIslemSonlandir(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("command", $(node).find("#command").html())
        request("{{ API('get_Tum_Islem_Sonlandir') }}", data, function (response) {
            // Başarılıysa
           
            showSwal("tümü başarı ile sonlandırıldı","success",2000);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }
</script>