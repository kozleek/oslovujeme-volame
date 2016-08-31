<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oslovujeme, voláme!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="author" content="code: Tomas -kozleek- Musiol (tomas.musiol@gmail.com)">
        <meta name="description" content="Oslovujeme, voláme! Správné oslovení uživatelů.">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
<body>
<div class="container">

    <div class="page-header">
        <h1>Oslovujeme, voláme!</h1>
        <p>Správné oslovení uživatelů podle 5. pádu.</p>
    </div>  <!-- /page-header -->

    <p>Zadejte jméno uživatele v 1. pádu, jednotného čísla:</p>
    <form action="/" method="post" class="js-names form-inline">
        <div class="form-group">
            <input type="text" class="form-control input-lg" id="in-name" placeholder="Tomáš" required>
        </div>
        <input type="submit" class="btn btn-primary btn-lg" value="Odeslat" />
    </form> <!-- /js-names, form-inline -->

</div>

<div class="js-result modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oslovujeme, voláme!</h4>
            </div>
            <div class="modal-body">
                <p>Správné oslovení uživatele je: <strong class="js-result-name">Tomáši</strong></p>
            </div>
        </div><!-- /modal-content -->
    </div><!-- /modal-dialog -->
</div><!-- /js-result, modal -->
</body>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function () {
    $(".js-names").submit(function(){
        var userName = $("#in-name").val();

        $.ajax({
            type: "GET",
            url: "names.xml",
            cache: false,
            dataType: "xml",
            success: function(xml) {
                var selector = 'item[name="'+ userName +'"]';
                var name = $(xml).find(selector).attr('vokativ');

                $(".js-result-name").text(name.toString());
                $('.js-result').modal('show')
            }
        });

        return false;
    });
});
</script>
</html>