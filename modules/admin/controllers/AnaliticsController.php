<?php
/**
 * Created by PhpStorm.
 * User: MikeCh
 * Date: 08.06.2017
 * Time: 17:41
 */

namespace app\modules\admin\controllers;

use yii\web\Controller;
use SoapClient;

class AnaliticsController extends Controller
{
    public function actionSet() {
        $z_1 = $_POST["z_1"];
        $z_2 = $_POST["z_2"];
        $z_3 = $_POST["z_3"];
        $z_4 = $_POST["z_4"];
        $z_5 = $_POST["z_5"];
        $z_6 = $_POST["z_6"];
        $z_7 = $_POST["z_7"];
        $z_8 = $_POST["z_8"];
        $z_9 = $_POST["z_9"];
        $z_10 = $_POST["z_10"];
        $z_11 = $_POST["z_11"];
        $z_12 = $_POST["z_12"];
        $z_13 = $_POST["z_13"];
        $z_14 = $_POST["z_14"];
        $z_15 = $_POST["z_15"];
        $z_16 = $_POST["z_16"];
        $z_17 = $_POST["z_17"];
        $z_18 = $_POST["z_18"];
        $z_19 = $_POST["z_19"];
        $z_20 = $_POST["z_20"];


        $url = "http://ba40.ru/ba_xml.asmx?WSDL"; // url-адрес облачной службы
        $secretKey = "ba40_masterkey_04"; // секретный пароль
        $idBase = "_p31_24"; // ваш номер БД

        $data = '<?xml version="1.0" encoding="utf-8"?>
			<ba_load_docs>
				<docum>
					<docum_shablon id_shablon="5"></docum_shablon>
					<docum_firma id_firma="5"></docum_firma>
					<docum_period id_periods="4"></docum_period>
				</docum>
	  			<pokazateli count="20">
	    			<pokazatel id="44">
	      				<value_pokazateli>'.$z_1.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="45">
	      				<value_pokazateli>'.$z_2.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="46">
	      				<value_pokazateli>'.$z_3.'</value_pokazateli>
	    			</pokazatel>	  			
	    			<pokazatel id="47">
	      				<value_pokazateli>'.$z_4.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="48">
	      				<value_pokazateli>'.$z_5.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="49">
	      				<value_pokazateli>'.$z_6.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="50">
	      				<value_pokazateli>'.$z_7.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="51">
	      				<value_pokazateli>'.$z_8.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="52">
	      				<value_pokazateli>'.$z_9.'</value_pokazateli>
	    			</pokazatel>	  			
	    			<pokazatel id="53">
	      				<value_pokazateli>'.$z_10.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="54">
	      				<value_pokazateli>'.$z_11.'</value_pokazateli>
	    			</pokazatel>
	    		    <pokazatel id="55">
	      				<value_pokazateli>'.$z_12.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="56">
	      				<value_pokazateli>'.$z_13.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="57">
	      				<value_pokazateli>'.$z_14.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="58">
	      				<value_pokazateli>'.$z_15.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="59">
	      				<value_pokazateli>'.$z_16.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="60">
	      				<value_pokazateli>'.$z_17.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="61">
	      				<value_pokazateli>'.$z_18.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="62">
	      				<value_pokazateli>'.$z_19.'</value_pokazateli>
	    			</pokazatel>
	    			<pokazatel id="63">
	      				<value_pokazateli>'.$z_20.'</value_pokazateli>
	    			</pokazatel>
	  			</pokazateli>
  			</ba_load_docs>';


        $client = new SoapClient($url); // Создаете клиента
        $result = $client->SetDocums(array("xmlDocumsStru" => $data,"secretKey" =>$secretKey,"numConnectFile" => $idBase)); // Отправляете команды

        header('Location: result.php');
    }

    public function actionResult() {

        libxml_use_internal_errors(true);

        $url = "http://ba40.ru/ba_xml.asmx?WSDL"; // "http://ba40.ru/ba_xml.asmx?WSDL"; // url-адрес облачной службы
        $secretKey = "ba40_masterkey_04"; // секретный пароль
        $idBase = "_p31_24"; // ваш номер БД

        $option = array('trace'=>1);
        $client = new SoapClient($url, $option); // Создаете клиента
        $result = $client->RaschetMetodika(array("idMetodikaT" => "5", "idFirmaT" => "5","idPeriodT" => "4","secretKey" =>$secretKey,"numConnectFile" => $idBase)); // Отправляете команды

        // echo "REQUEST:\r\n<br>" . htmlspecialchars($client->__getLastRequest(), ENT_COMPAT | ENT_HTML401, ini_get("UTF-8")) . "<br>";
        $myXMLData = mb_convert_encoding($client->__getLastResponse(), 'UTF-8');
//        echo $myXMLData;

        return $this->render('result', compact('myXMLData'));
    }
}