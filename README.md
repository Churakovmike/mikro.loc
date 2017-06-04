yii2-mikrotik
================================

Yii 2 Basic Application Template with net_routeros package for mikrotik API web.


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

 - The minimum requirement by this application template that your Web server supports PHP 5.4.0.
 - A host with RouterOS v3 or later.
 - Enabled API service on the RouterOS host.
 - Enabled outgoing connections with stream_socket_client().


INSTALLATION
------------

### Install from github repo and update composer packages

- git clone https://github.com/bahirul/yii2-mikrotik.git.
- composer update

BASIC EXAMPLE USAGE
-------------------
in controller :


```
<?php

namespace app\controllers;

use yii\web\Controller;

use PEAR2\Net\RouterOS as Mikrotik;

class ServerController extends Controller{
      public function actionIndex(){
            $host   = 'your Mikrotik IP or Hostname';
            $user   = 'your Mikrotik User';
            $pass   = 'your Mikrotik Pass';
            $connect = new Mikrotik\Client($host,$user,$pass);
            if($connect){
                  //your code 
            }else{
                  throw new \yii\web\HttpException(400, "Error connecting to router OS");
            }
      }
}
```

DOCUMENTATION 
---------------
See documentation of Yii2, PEAR2 Net Router OS, and Mikrotik Manual.

- Yii2 Docs http://www.yiiframework.com/doc-2.0/
- PEAR2 Net RouterOS https://github.com/pear2/Net_RouterOS/wiki
- Mikrotik Wiki http://wiki.mikrotik.com/wiki/Main_Page
