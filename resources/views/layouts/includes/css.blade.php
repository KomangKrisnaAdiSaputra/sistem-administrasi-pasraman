<link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}" />
<link rel="shortcut icon" type="image/png" sizes="114x114" href="{{ asset('assets/masyarakat/pasraman.png') }}">
<link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/DataTables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .customTable {
        padding: 10px !important;
    }

    .customTable th {
        font-size: 11px !important;
        width: 10px !important;
        padding: 10px 5px !important;


    }

    .customTable td {
        padding: 10px 4px !important;
        font-size: 11px;
    }

    .customTable .th-target,
    .customTable .th-result {
        width: 5px !important;
        padding: 10px 6px !important;

    }

    .tm {
        position: relative;
        /*width: 150px; height: 20px;*/
        /*color: white;*/

        display: block;
        width: 100%;
        height: 2.4rem;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        box-shadow: inset 0 0 0 transparent;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        align-content: center;
    }

    .tm:before {
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 0.8em;
        content: attr(data-date);
        display: block;
        color: #aaaaaa;
    }


    .tm::-webkit-datetime-edit,
    .tm::-webkit-inner-spin-button,
    .tm::-webkit-clear-button {
        display: none;
    }

    .tm::-webkit-calendar-picker-indicator {
        position: absolute;
        top: 10px;
        right: 13px;
        color: #495057;
    }

    .header-aktif {
        border-bottom-style: solid;
        border-bottom-color: rgb(255, 255, 255);
        width: 8em;
        background-color: #ced4da1b;
        border-radius: 8%;
    }


    .header-aktif span {
        margin-left: 0.8em;
        color: white;
    }

    .label-file {
        background-color: #d3d3d3;
        color: rgba(0, 0, 0, 0.441);
        padding: 0.5rem;
        font-family: sans-serif;
        cursor: pointer;
        margin-left: -0.8rem;
        margin-top: -0.6rem;
    }

    #file-chosen {
        margin-left: 0.3rem;
        font-family: sans-serif;
    }
</style>
@yield('container.css')
