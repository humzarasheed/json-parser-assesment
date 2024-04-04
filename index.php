<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parse Response Script</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="loader"></div>
        <form id="dataForm">
            <select id="product" name="products">
                <option value="Validifiv3-fi-risk-index">Validifiv3-fi-risk-index</option>
                <option value="Validifiv3-account-validation">Validifiv3-account-validation</option>
                <option value="Validifiv3-pi-risk4-individual">Validifiv3-pi-risk4-individual</option>
            </select>
            <button type="submit">Submit</button>
        </form>
        <div id="responseArea"></div>
    </div>

    <script src="script.js" type="text/javascript"></script>
</body>

</html>