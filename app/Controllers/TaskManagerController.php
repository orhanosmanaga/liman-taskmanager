<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class TaskManagerController
{
	function getList()
    {
        // Komut çalıştırdık
        $cmd = Command::runSudo("ps -Ao user,pid,pcpu,stat,unit,pmem,comm --sort=-pcpu");

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
                "user" => $process[0],
                "pid" => $process[1],
                "cpu" => $process[2],
                "status" => $process[3],
                "service" => $process[4],
                "ram" => $process[5],
                "command" => $process[6]
            ];
        }

        return view("table", [
            "value" => $cmd,
            "display" => ["user", "pid", "cpu", "status", "service", "ram", "command"],
            "title" => ["Kullanıcı", "PID", "% İşlemci", "Durum", "Servis", "% Bellek", "İşlem"],
            "menu" => [
                "Dosya Konumu" => [
                    "target" => "jsGetFileLocation",
                    "icon" => "fa-location-arrow"
                ],
                "Servis Durumu" => [
                    "target" => "jsGetServisDurum",
                    "icon" => "fa-address-book"
                ],
                "Islem Agaci" => [
                    "target" => "jsGetIslemAgaci",
                    "icon" => "fa-address-book"
                ],
                "Calitirma Arguman" => [
                    "target" => "jsGetCalitirmaArguman",
                    "icon" => "fa-address-book"
                ],
                "Islem sonlandir" => [
                    "target" => "jsGetIslemSonlandir",
                    "icon" => "fa-address-book"
                ],
                "Tum Islem sonlandir" => [
                    "target" => "jsGetTumIslemSonlandir",
                    "icon" => "fa-address-book"
                ],
            ]
        ]);
    }

    function getFileLocation()
    {
        validate([
            "pid" => "required|numeric"
        ]);

        $location = Command::runSudo("readlink -f /proc/@{:pid}/exe", [
            "pid" => request("pid")
        ]);

        return respond($location);
    }
    function getServisDurum()
    {
        validate([
            "service" => "required|string"
        ]);

        $location = Command::runSudo("systemctl status @{:service}", [
            "service" => request("service")
        ]);

        return respond($location);
    }
    function getIslemAgaci()
    {
        validate([
            "pid" => "required|numeric"
        ]);

        $location = Command::runSudo("ps f -g @{:pid}", [
            "pid" => request("pid")
        ]);

        return respond($location);
    }
    function getCalitirmaArguman()
    {
        validate([
            "command" => "required|string"
        ]);

        $location = Command::runSudo("man @{:command}", [
            "command" => request("command")
        ]);

        return respond($location);
    }
    function getIslemSonlandir()
    {
        validate([
            "pid" => "required|numeric"
        ]);

        $location = Command::runSudo("kill @{:pid}", [
            "pid" => request("pid")
        ]);

        return respond($location);
    }
    function getTumIslemSonlandir()
    {
        validate([
            "command" => "required|string"
        ]);

        $location = Command::runSudo("pkill @{:command}", [
            "command" => request("command")
        ]);

        return respond($location);
    }
}
