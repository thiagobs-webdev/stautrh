<?php
/**
 * DATABASE
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_PORT", "3306");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "stautrh");

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "https://www.stautrh.thiagobs.me");
define("CONF_URL_TEST", "https://www.localhost/challenges/stautrh");
define("CONF_URL_ERROR", CONF_URL_BASE . "/404");


/**
 * SITE
 */
define("CONF_SITE_NAME", "StautRH");
define("CONF_SITE_TITLE", "Teste API Rest");
define("CONF_SITE_DESC", "Teste API no Processo Seletivo da StautRH");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "thiagobs.me");
define("CONF_SITE_ADDR_STREET", "*********");
define("CONF_SITE_ADDR_NUMBER", "*********");
define("CONF_SITE_ADDR_COMPLEMENT", "*********");
define("CONF_SITE_ADDR_CITY", "*********");
define("CONF_SITE_ADDR_STATE", "*********");
define("CONF_SITE_ADDR_ZIPCODE", "*********");

/**
 * SOCIAL
 */
define("CONF_SOCIAL_TWITTER_CREATOR", "@stautrh");
define("CONF_SOCIAL_TWITTER_PUBLISHER", "@stautrh");
define("CONF_SOCIAL_FACEBOOK_APP", "stautrh");
define("CONF_SOCIAL_FACEBOOK_PAGE", "stautrh");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", "stautrh");
define("CONF_SOCIAL_GOOGLE_PAGE", "stautrh");
define("CONF_SOCIAL_GOOGLE_AUTHOR", "stautrh");
define("CONF_SOCIAL_INSTAGRAM_PAGE", "stautrh");
define("CONF_SOCIAL_YOUTUBE_PAGE", "stautrh");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * SESSION
 */
define("CONF_SES_PATH", __DIR__ . "/../../storage/sessions/");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);


/**
 * VIEW
 */
define("CONF_VIEW_PATH", __DIR__ . "/../../assets/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "stautrhweb");
define("CONF_VIEW_APP", "stautrhapp");
define("CONF_VIEW_ADMIN", "stautrhadmin");

/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_DIR_GUESTS", "storage/guests");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);



