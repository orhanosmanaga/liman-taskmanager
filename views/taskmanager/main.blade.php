<div id="task_list">

</div>

@component("modal-component", [
    "id" => "fileLocationModal",
    "title" => "Dosya Konumu",
    "notSized" => "true"
])
<div id="fileLocationContent"></div>


@endcomponent


@component("modal-component", [
    "id" => "servisDurumModal",
    "title" => "servis durum",
    "notSized" => "true"
])
<div id="servisDurumContent"></div>
@endcomponent



@component("modal-component", [
    "id" => "IslemAgaciModal",
    "title" => "servis durum",
    "notSized" => "true"
])
<div id="IslemAgaciContent"></div>
@endcomponent

@component("modal-component", [
    "id" => "CalitirmaArgumanModal",
    "title" => "servis durum",
    "notSized" => "true"
])
<div id="CalitirmaArgumanContent"></div>
@endcomponent

@include("taskmanager.scripts")