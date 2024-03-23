<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

Route::get('/', [LeadController::class, 'index']);

//Route::get('/', function () {
//    dd(apiClient()->leads()->get());
//});
//
//Route::get('/add', function () {
////    $lead = new LeadModel();
////    $lead->setName('NEEEW!!');
////    $lead->setPrice(1000);
////
////    $leadCustomFieldsValues = new CustomFieldsValuesCollection();
////    $cost = new NumericCustomFieldValuesModel();
////    $cost->setFieldId(9505);
////    $cost->setValues(( new NumericCustomFieldValueCollection())->add((new NumericCustomFieldValueModel())->setValue(123)));
////    $leadCustomFieldsValues->add($cost);
////
////
////    $profit = new NumericCustomFieldValuesModel();
////    $profit->setFieldId(9503);
////    $profit->setValues(( new NumericCustomFieldValueCollection())->add((new NumericCustomFieldValueModel())->setValue(321)));
////    $leadCustomFieldsValues->add($profit);
////
////    $lead->setCustomFieldsValues($leadCustomFieldsValues);
////
////    $leadsCollection = new LeadsCollection();
////    $leadsCollection->add($lead);
////    apiClient()->leads()->add($leadsCollection);
////    dd(apiClient()->leads()->get());
//});
//// себестоимость - 9505
//// прибыль - 9506
//
//function apiClient()
//{
//    try {
//        $clientId = '9a5b4a56-34b3-4150-8156-9da43ee48878';
//        $clientSecret = '5scIBwhXgQjju2ZbU3ta6mL8mOMpygakcnd0IXB2mQwjkEJ6oNRzF1xrIDGriYoo';
//        $redirectUri = 'http://localhost:5555/';
//        $apiClient = new AmoCRMApiClient($clientId, $clientSecret, $redirectUri);
//        $uri = 'https://newerbest.amocrm.ru/';
//        $token =  'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjcwZDE3NjFkZTllODA5ZWRjYWI0M2NmOWFjOTlhNTY2ZWFhN2UzZmMwMmEwN2YxNzZjMjcyMTcxZjE2NzJjOTAxMzBlNzY2NWZlYWNiOWU1In0.eyJhdWQiOiI5YTViNGE1Ni0zNGIzLTQxNTAtODE1Ni05ZGE0M2VlNDg4NzgiLCJqdGkiOiI3MGQxNzYxZGU5ZTgwOWVkY2FiNDNjZjlhYzk5YTU2NmVhYTdlM2ZjMDJhMDdmMTc2YzI3MjE3MWYxNjcyYzkwMTMwZTc2NjVmZWFjYjllNSIsImlhdCI6MTcxMTExNTUzMSwibmJmIjoxNzExMTE1NTMxLCJleHAiOjE3MTI5NjY0MDAsInN1YiI6IjEwODM3OTU0IiwiZ3JhbnRfdHlwZSI6IiIsImFjY291bnRfaWQiOjMxNjUwNTU4LCJiYXNlX2RvbWFpbiI6ImFtb2NybS5ydSIsInZlcnNpb24iOjIsInNjb3BlcyI6WyJjcm0iLCJmaWxlcyIsImZpbGVzX2RlbGV0ZSIsIm5vdGlmaWNhdGlvbnMiLCJwdXNoX25vdGlmaWNhdGlvbnMiXSwiaGFzaF91dWlkIjoiNjQ5NWQ5NGItNzJkYi00YTZkLWJkZTYtMWU2YmE4NGM2ODJmIn0.h5A83Q_oQNoSel-XaOZaSs4_Uq607-Q3SZwjxwHWDBh-FUxiVq5ow57aqhDWeEj6hHDd748KStZhkWIggZpb1NYY7dx4-pA2qSDPShikV64fAzXlzuV_krTSQRBmuOjlDx7FvlYJjNcqcKaGiRI1OdPMWeJsIV52o4U3lMuQiN3AG0uxfrhjg1muJhCZxEi7dSCpoMp3M1cYDGB96IaGvgHdMSWZeaU5q2b1BcxTojphZEjTQ5OuOoDPiVvrFqX0CulSoQICNYdlmIDkVX95oR8VyEdH3zV-B7jTvu5HKsuJYAq-T03fA5WphCTqmhzrkXN5ofHyjZzmlmH3JnXhmA';
//        $authtoken = 'def502001fbc1ff8e6b7d48c06fca341690b754e7cd56380a5d15b343796b7ccb950bf1072faede4d4b5e5055b6f91cf78201202aec8c99240e5600d66590b40c5eadb5065feea0abf3ebe8f283ae703ab933f193146d93566a3500f336a9cd5cc9c75d0bf77433d87a28accc0c443c1705911ae286bf196d2221eb23075e078d6b881f00897f9c98c6f89fb7524c6e943d99d48c1a825a121d7ed6049531b2d30a00569f8cf636b1d1629e7c17b05cb2f6408df9024f5da709374e5f62b6373bb023bb1d66c191b08b5d104ec73b77a7da60e785661c85b94a41763b201200bce04abe617bccc50dbc3fc1f60bc08111c7023c18cb2a574f56f40e2cef15305bcc4cdd87068c6e67ad986270e3e4f35dad44a03396e8f55897efda392f2000b7c11a774683e54833a7877cd9cf78e8885f6657c5535430fb063e67a2fb5128031f51ba566f31709925f082f237032f095331cdf995ee912b760fdf5f495eb4f7132b4705f6dacf420f25f7717fbcfb62bfbae6e7b10d8e62be4974fa846cefb55cf5ade1cd5684c4d389aefd7ebfb0fa6d51645bc459ae5d328939a044e9324ac2f57b243da26709204b6a0178a6f2f3ed4cede05bf67d272a014ab0522f0c0d7495269b7245d5aec9c6a3c0b90877f00daa83716f0b4c28f1a90af526790d4af105aa097297f16';
//        $refreshtoken = 'def5020074b0c8e379390e2ca8b2537a70306db8df86cde41de7b3e384c8753ffa78d5945c3795c1ba1325dffd760d265912ca891b2607f5e9b9fe503314b1cebf2408bca5e5880f9f4e64cd3c3b62f37e9da4108c389acd371d679f4e0ff4c964bd2e96f7653c742055290d9821887ef4e94a333d696ba0824a2d0c37d83c3b89af672921d3e49fe1198e7621a88b6f4b2aa7a0722fd5f71e6f31d373eb2ff620fea341b810e83a1d3abd0e9d068d6506fff9d23a49fbf4c8638dc4796254223401ced506c0318c847a30d45e8dba410d189e513b1846961a83ed541d1588cc07f695618796823c817f02f06dd29e0727aac67e71a13e1ab2b7654760d24ad7e15916fa63a9630ad27dca6814f9d5462df8896865abf02c79fed3f15adcf7eb3f63b06bfe37ec093e14f5831ed07212819ff6d78f67daa0a3ecfa4e2800e71d193a8daf07d33d3b39621035a57f84302555eceaafbb644c3706efce7809bd0412b36a6a446745953a7e637bdfce0daba2d44e7ebd1e5a270727286d41c55668be0cbe8471bd8db93f23db9acac9fbf81aba0b363606b25da40b5292c871414dc7cfeaafaf0d906c276d38ce99971b7f5de126877f1035293efd2a35eb7c618db90d8bdf4a0047c604b83e70d5f6cf9685e788b3481b69abd615dd8b86fc8160e8f0f4b919dbe06c67b6b2412ab1';
//
//        $provider = new GenericProvider([
//            'clientId' => $clientId,
//            'clientSecret' => $clientSecret,
//            'redirectUri' => $redirectUri,
//            'urlAuthorize' => 'https://newerbest.amocrm.ru/oauth',
//            'urlAccessToken' => 'https://newerbest.amocrm.ru/oauth2/access_token',
//            'urlResourceOwnerDetails' => '',
//        ]);
//
//        $accessToken = new AccessToken([
//            'access_token' => $token,
//            'refresh_token' => $refreshtoken,
//            'expires' => time() + 360000, // Время истечения срока действия токена
//            'baseDomain' => 'newerbest.amocrm.ru'
//        ]);
//
//        $apiClient->setAccessToken($accessToken)
//            ->setAccountBaseDomain($accessToken->getValues()['baseDomain'])
//            ->onAccessTokenRefresh(
//                function (\League\OAuth2\Client\Token\AccessTokenInterface $accessToken, string $baseDomain) {
//                    return [
//                        'accessToken' => $accessToken->getToken(),
//                        'refreshToken' => $accessToken->getRefreshToken(),
//                        'expires' => $accessToken->getExpires(),
//                        'baseDomain' => $baseDomain,
//                    ];
//                });
//        return $apiClient;
//    } catch (\AmoCRM\OAuth2\Client\Provider\AmoCRMException $e) {
//        return "Не удалось подключиться к API AMO CRM: " . $e->getMessage();
//    }
//}
