<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>

    <style>
        body, html {
            height: 100%;
            padding: 0;
            margin: 0;
        }

        .certificate {
            padding: 0;
            margin: 0;
            background: url('{{ asset("certificate_image") . "/" . $data['certificate']->file }}');

            /* Full height */
            height: 100vh;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            z-index: 0;
        }

        .name {
            text-align: center;
            font-size: 40pt;
            color: red;
            z-index: 0;
            padding-top: {{$data['certificate']->margin_name}}%;
        }

        .desc {
            text-align: center;
            font-size: 40pt;
            color: red;
            z-index: 0;
            padding-top: {{$data['certificate']->margin_desc}}%;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="name">NAMA AKAN DISINI</div>
        <div class="desc">DESC AKAN DISINI</div>
    </div>
</body>
</html>
