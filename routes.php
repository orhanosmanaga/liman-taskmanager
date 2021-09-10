<?php

return [
    "index" => "HomeController@index",

    // Tasks
    "runTask" => "TaskController@runTask",
    "checkTask" => "TaskController@checkTask",

    // Hostname Settings
    "get_hostname" => "HostnameController@get",
    "set_hostname" => "HostnameController@set",

    // Systeminfo
    "get_system_info" => "SystemInfoController@get",
    "install_lshw" => "SystemInfoController@install",

    // Runscript
    "run_script" => "RunScriptController@run",

    // TaskView
    "example_task" => "TaskViewController@run",

    // Task Manager Routes
    "task_manager_list" => "TaskManagerController@getList",
    "get_file_location" => "TaskManagerController@getFileLocation",
    "get_Servis_Durum" => "TaskManagerController@getServisDurum",
    "get_Islem_Agaci"=>"TaskManagerController@getIslemAgaci",
    "get_Calitirma_Arguman"=>"TaskManagerController@getCalitirmaArguman",
    "get_Islem_Sonlandir"=>"TaskManagerController@getIslemSonlandir",
    "get_Tum_Islem_Sonlandir"=>"TaskManagerController@getTumIslemSonlandir",
    // Dosya liste
    "dosya_Liste" => "dosyaListeControlller@getList"
];
