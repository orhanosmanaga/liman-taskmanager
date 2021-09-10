<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class dosyaListeControlller
{
    function getList()
    {
        // Komut çalıştırdık
        $cmd = Command::run("ls -la /home/sysadmin/orhan");
       
       
        // Komutu newline ile böldük
        $cmd = explode("\n", $cmd);

        // İlk satırı attık
        array_splice($cmd, 0, 1);

        // her satır üzerinde işlem yapalım.
        foreach ($cmd as $key => &$process)
        {
            // fazlalık boşluklarımı sildim
            $process = preg_replace('/\s+/', ' ', $process);

            // boşluklara göre parçalayalım
            $process = explode(" ", $process);
            
            // veriyi formatlayalim
            $process = [
                "izinler" => $process[0],
                "pid" => $process[1],
                "kullanıcı" => $process[2],
                "grup" => $process[3],
                "boyut" => $process[4],
                "tarih" => $process[5].$process[6].$process[7],
                "dosyaad" => $process[8]
            ];
        }

        return view("table", [
            "value" => $cmd,
            "display" => ["izinler", "pid", "kullanıcı", "grup", "boyut", "tarih", "dosyaad"],
            "title" => ["İzin", "ID", "Oluşturan", "Grup", "Boyut", "Tarih", "Dosya adı"],
            "menu" => [
              /*  "Dosya Konumu" => [
                    "target" => "jsGetFileLocation",
                    "icon" => "fa-location-arrow"
                ],
                "Servis Durumu" => [
                    "target" => "jsGetServisDurum",
                    "icon" => "fa-address-book"
                ],*/
            ]
        ]);
    }
}
