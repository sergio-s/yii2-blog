<?php
use rmrevin\yii\ulogin\ULogin;

?>

<!--    <p>Please fill out the following fields to login:</p>-->
<?php
echo ULogin::widget([
    // widget look'n'feel
    'display' => ULogin::D_PANEL,

    // required fields
    'fields' => [   ULogin::F_FIRST_NAME,
                    ULogin::F_LAST_NAME,
                    ULogin::F_EMAIL,
//                    ULogin::F_PHONE,
                    ULogin::F_CITY,
                    ULogin::F_COUNTRY,
                    ULogin::F_PHOTO_BIG],

    // optional fields
    'optional' => [ULogin::F_BDATE],

    // login providers
    'providers' => [ULogin::P_VKONTAKTE, ULogin::P_FACEBOOK, ULogin::P_TWITTER, ULogin::P_GOOGLE, ULogin::P_ODNOKLASSNIKI],

    // login providers that are shown when user clicks on additonal providers button
    'hidden' => [],

    // where to should ULogin redirect users after successful login
    'redirectUri' => ['site/ulogin-auth'],

    // optional params (can be ommited)
    // force widget language (autodetect by default)
    'language' => ULogin::L_RU,

    // providers sorting ('relevant' by default)
    'sortProviders' => ULogin::S_RELEVANT,

    // verify users' email (disabled by default)
    'verifyEmail' => '0',

    // mobile buttons style (enabled by default)
    'mobileButtons' => '1',
]);

?>
