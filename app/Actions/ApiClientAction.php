<?php

namespace App\Actions;
use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\OAuth2\Client\Provider\AmoCRMException;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Provider\GenericProvider;
use AmoCRM\Client\LongLivedAccessToken;
use AmoCRM\Collections\CustomFieldsValuesCollection;
use AmoCRM\Models\LeadModel;
use AmoCRM\Models\CustomFieldsValues\NumericCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueModels\NumericCustomFieldValueModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\NumericCustomFieldValueCollection;
use AmoCRM\Collections\Leads\LeadsCollection;


class ApiClientAction
{
    public static function handle()
    {
        try {
            $clientId = env('CLIENT_ID', '0474abdc-ea83-428d-96a8-cf8d7dcfef56');
            $clientSecret = env('CLIENT_SECRET', 'cjxY38dcI2AUwvQ0uq1UMx5K3u8SiTSaBNeU7Nhs19B7rr9k495Y4ZDVeycyKHQv');
            $redirectUri = env('REDIRECT_URI', 'http://localhost:5555');
            $apiClient = new AmoCRMApiClient($clientId, $clientSecret, $redirectUri);
            $uri = 'https://newerbest.amocrm.ru/';
            $token =  env('TOKEN', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjA3YzdhN2U4YTQ1YzA0NjE4ZjFmNWFhMzA0NmQ2M2Y0OTYwMGNkYjAzMTM1NGYwZDJlNWZjMTFiYTUyNzI0YTJhYjYxYjA2YTQ2ZTVkZGI4In0.eyJhdWQiOiIwNDc0YWJkYy1lYTgzLTQyOGQtOTZhOC1jZjhkN2RjZmVmNTYiLCJqdGkiOiIwN2M3YTdlOGE0NWMwNDYxOGYxZjVhYTMwNDZkNjNmNDk2MDBjZGIwMzEzNTRmMGQyZTVmYzExYmE1MjcyNGEyYWI2MWIwNmE0NmU1ZGRiOCIsImlhdCI6MTcxMTE2NDU1OCwibmJmIjoxNzExMTY0NTU4LCJleHAiOjE3MTI4ODAwMDAsInN1YiI6IjEwODM3OTU0IiwiZ3JhbnRfdHlwZSI6IiIsImFjY291bnRfaWQiOjMxNjUwNTU4LCJiYXNlX2RvbWFpbiI6ImFtb2NybS5ydSIsInZlcnNpb24iOjIsInNjb3BlcyI6WyJjcm0iLCJmaWxlcyIsImZpbGVzX2RlbGV0ZSIsIm5vdGlmaWNhdGlvbnMiLCJwdXNoX25vdGlmaWNhdGlvbnMiXSwiaGFzaF91dWlkIjoiYmI2N2ZkODktYzcyMi00MTFkLTgxN2YtMzkyZDgxNmQ5MzA5In0.hLqIAPqbojwK78t67RJL6vA3yoNWBVLmDEQjqCm0mKliTvqNLpIAsSRSTqQRXQfz1s7Hm24k5Z8Lt54ZpC8kD-oKrUHuq_EdF8-5nMYleB7w75XFriMZq6heB0035Fc6oobiBXQMT9F2EMfkWMOYDzjUfSb9pbzOO-zYwAU1PRa958N_8_2Jubc9surB6m7LkCpXe2pu0spnDj2X4osXtkocX_Zr1LomA0WQRcBXNEdvyJjr4DtnATI8VpUHu-HpXQvZ4wuVEarwLCqNGgZLAeuF6HWhxGJ2azVRWvSLtqnOU8BQZDVK50Lw-um8BJ6LfHO5-k3qnCr9jrOMCbzj1A');
            $authtoken = env('AUTH_TOKEN', 'def50200ecde9ae251489588830c263916184faed491ad1ff12dc496ade9c19c25a05ab0d3b2bfce342364c48a688ee705ad52baf01429620611a1d1e280a9fdf6cfd776807cc84e3642914b25105d2cc182f45119d0f5c63da60e0bb8658ac113b86b8264bfd6f9326ff3e494103a066e900efd3c5f17bf650fde900217aa30f6c81fed978a64be53f0916e773b802ed6e6aa01bf28beca64a0428b78b7627e0e1356ab26d46fa592730d6b4e98fc71a695575cfd11a456df2bca64178458e3717626c61bb90178a56e80d1e7ce10f381aac4eaaef2f71acf4c75ef2b0fa802b625af8abcea6122f4630cc0dc5577ffb146a91f710621bf524cb21dcbf970e1df20fbbebce70fcd3d3ae6ac8889d544f68fbcadff05c305f462a68b52757ed7406d198a47bca5582737bf17f4c19d315ca48ad341dcb79a0b4ecd393741165a7873fd388605607f03428b1fd7d7444a3d4bbe025bf635abd4afe4479381a76180d3f8c1ada87a103d4b51ba6da54f4072035692805ac6eff9c17fff45ec18086e64a7c16d70892777cf95e73fc779fb7311300a13e58b1223dd520c7061d96a233475a239aaa3bfe376c8e2a0542e66783967636d3f40d3500b5bc78703f104004bb7889ac68177570642234543cccd4ca3c91c4f714f378b509e98e94980fc761c816ebd739de7');
            $refreshtoken = env('REFRESH_TOKEN', 'def5020074b0c8e379390e2ca8b2537a70306db8df86cde41de7b3e384c8753ffa78d5945c3795c1ba1325dffd760d265912ca891b2607f5e9b9fe503314b1cebf2408bca5e5880f9f4e64cd3c3b62f37e9da4108c389acd371d679f4e0ff4c964bd2e96f7653c742055290d9821887ef4e94a333d696ba0824a2d0c37d83c3b89af672921d3e49fe1198e7621a88b6f4b2aa7a0722fd5f71e6f31d373eb2ff620fea341b810e83a1d3abd0e9d068d6506fff9d23a49fbf4c8638dc4796254223401ced506c0318c847a30d45e8dba410d189e513b1846961a83ed541d1588cc07f695618796823c817f02f06dd29e0727aac67e71a13e1ab2b7654760d24ad7e15916fa63a9630ad27dca6814f9d5462df8896865abf02c79fed3f15adcf7eb3f63b06bfe37ec093e14f5831ed07212819ff6d78f67daa0a3ecfa4e2800e71d193a8daf07d33d3b39621035a57f84302555eceaafbb644c3706efce7809bd0412b36a6a446745953a7e637bdfce0daba2d44e7ebd1e5a270727286d41c55668be0cbe8471bd8db93f23db9acac9fbf81aba0b363606b25da40b5292c871414dc7cfeaafaf0d906c276d38ce99971b7f5de126877f1035293efd2a35eb7c618db90d8bdf4a0047c604b83e70d5f6cf9685e788b3481b69abd615dd8b86fc8160e8f0f4b919dbe06c67b6b2412ab1');

            $provider = new GenericProvider([
                'clientId' => $clientId,
                'clientSecret' => $clientSecret,
                'redirectUri' => $redirectUri,
                'urlAuthorize' => 'https://newerbest.amocrm.ru/oauth',
                'urlAccessToken' => 'https://newerbest.amocrm.ru/oauth2/access_token',
                'urlResourceOwnerDetails' => '',
            ]);

            $accessToken = new AccessToken([
                'access_token' => $token,
                'refresh_token' => $refreshtoken,
                'expires' => time() + 360000, // Время истечения срока действия токена
                'baseDomain' => 'newerbest.amocrm.ru'
            ]);

            $apiClient->setAccessToken($accessToken)
                ->setAccountBaseDomain($accessToken->getValues()['baseDomain'])
                ->onAccessTokenRefresh(
                    function (\League\OAuth2\Client\Token\AccessTokenInterface $accessToken, string $baseDomain) {
                        return [
                            'accessToken' => $accessToken->getToken(),
                            'refreshToken' => $accessToken->getRefreshToken(),
                            'expires' => $accessToken->getExpires(),
                            'baseDomain' => $baseDomain,
                        ];
                    });
            return $apiClient;
        } catch (\AmoCRM\OAuth2\Client\Provider\AmoCRMException $e) {
            return "Не удалось подключиться к API AMO CRM: " . $e->getMessage();
        }
    }
}
