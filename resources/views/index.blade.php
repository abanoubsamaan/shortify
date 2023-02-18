
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shortify | URL shortener service</title>
    <!-- Bootstrap core & font awesome CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body class="text-center">
<main class="form">
        <h1 class="mb-4 logo"><i class="fa-solid fa-scissors"></i></h1>
        <h1 class="mb-3 fw-normal">SHORTIFY</h1>
        <p>Shortify is a free URL shortener service, create short links in seconds.</p>
        <form method="post">
            @csrf
            <div class="d-flex flex-row align-items-center flex-wrap justify-content-around">
                <div class="form-floating">
                    <input type="url" class="form-control" name="url" id="validUrl" placeholder="Please enter valid URL">
                    <label for="validUrl">Please enter valid URL</label>
                </div>
                <input type="submit" class=" btn btn-lg btn-secondary" value="GO" />
            </div>
        </form>
    @if(!empty($shortenerResult))
        <div class="shortener-result">
            <span id="textToCopy">https://shortify.test/q84mnGJ</span>
            <button type="button" class="btn btn-link" onclick="copyText()">
                <i class="fa fa-thin fa-copy"></i>
            </button>
            <input id="hiddenResult">
        </div>
    @endif
</main>

<script>
    function copyText() {
        let hiddenInput  = document.getElementById('hiddenResult');
        hiddenInput.value = document.getElementById('textToCopy').textContent;
        hiddenInput.select();
        hiddenInput.setSelectionRange(0, 99999);
        document.execCommand('copy');
    }
</script>
</body>
</html>
