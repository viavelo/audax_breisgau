<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="themes/custom/audax_bootstrap/css/base/style.css">
    <style>
        .table {font-family: 'Helvetica Neue',Helvetica, Arial, sans-serif; border:1; table-layout:fixed;width:100%;}
        .td_0, .td_3, .td_4, .td_7 {text-align: center; background-color: #ededed; width: 100%;line-height: 1.8em;}
        .td_1, .td_2, .td_5, .td_6 {text-align: center; background-color: #fff; width: 100%;line-height: 1.8em;}
        .td_8 {text-align: center; background-color: #58D256; width: 100%; line-height: 1.8em;}
    </style>
    <script type="text/javascript">
        function ask_first(link, question)
        {
            if (typeof(question) == 'undefined')
                question = 'Datensatz löschen?'
            return window.confirm(question);
        }
        history.replaceState(null, "", window.location.href); // Reload ohne POST ermöglichen
    </script>
    </style>
</head>
<body>
