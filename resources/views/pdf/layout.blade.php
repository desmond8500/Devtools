<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title' ?? 'PDF')</title>
    <link rel="stylesheet" href="css/pdf/diagramme.css">
</head>

<body>
    <table>
        <thead>
            <tr> <td> <div class="header-space">&nbsp;</div> </td> </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="content">
                        @yield('content')
                    </div>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr> <td> <div class="footer-space">&nbsp;</div> </td> </tr>
        </tfoot>
    </table>
    <div class="header">@yield('header')</div>
    <div class="footer">@yield('footer')</div>
</body>

</html>
