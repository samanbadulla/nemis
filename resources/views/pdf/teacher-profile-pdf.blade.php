<!DOCTYPE html>
<html lang="si">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Student Registration</title>

    <style>
        .font-iskolapotha {
            font-family: 'iskolapotha', sans-serif;
            letter-spacing: 0px;
            /* Ensure no extra spacing is added */
            word-spacing: 0px;
            /* Prevent word gaps */
        }

        .font-abhaya {
            font-family: 'abhayalibre', sans-serif;
        }

        .font-hindmadurai {
            font-family: 'hindmadurai', sans-serif;
        }

        @page {
            header: page-header;
            footer: page-footer;
        }

        .page-break {
            page-break-after: always;
        }

        table {
            border-collapse: collapse;
            overflow: hidden;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            font-size: 12px;
            padding: 5px;
            border: white 2px solid;
        }

        th {
            background-color: #075f75;
            color: white;
        }
    </style>
</head>

<body>
    {{-- <htmlpageheader name="page-header">
        Your Header Content
    </htmlpageheader> --}}

    <span class="font-abhaya" style="font-size: 20px;">ගුරු තොරතුරු පත්‍රිකාව</span><br>

    <htmlpagefooter name="page-footer">
        <div style="text-align: center; font-size: 10px;">
            Page {PAGENO} of {nbpg}
        </div>
    </htmlpagefooter>
</body>

</html>