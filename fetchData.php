<?php
require_once('ApiResponseParser.php');

if (isset($_POST['product'])) {
    $selectedProduct = $_POST['product'];

    $url = '';
    switch ($selectedProduct) {
        case 'Validifiv3-fi-risk-index':
            $url = 'https://de20dc0b-4015-431e-ae42-0dbc6260eee3.mock.pstmn.io/validifiv3-fi-risk-index';
            break;
        case 'Validifiv3-account-validation':
            $url = 'https://de20dc0b-4015-431e-ae42-0dbc6260eee3.mock.pstmn.io/validifiv3-account-validation';
            break;
        case 'Validifiv3-pi-risk4-individual':
            $url = 'https://de20dc0b-4015-431e-ae42-0dbc6260eee3.mock.pstmn.io/validifiv3-pi-risk4-individual';
            break;
        default:
            die('Unknown option');
    }

    // send request to product endpoint using curl
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);

    $fetchedData = curl_exec($curl);

    curl_close($curl);

    if ($fetchedData === false) {
        echo json_encode(['error' => 'Request failed with error'. curl_error($curl)]);
    } else {
        $parser = new ApiResponseParser($selectedProduct, $fetchedData);
        $parsedResponse = $parser->parse();
        echo json_encode([$parsedResponse]);
    }
} else {
    // when no product value is sent
    echo json_encode(['error' => 'No option selected']);
}