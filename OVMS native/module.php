<?php

declare(strict_types=1);
require_once __DIR__ . '/../libs/VariableProfileHelper.php';

	class OVMSnative extends IPSModule
	{
		use VariableProfileHelper;
		public function Create()
		{
			//Never delete this line!
			parent::Create();

			$this->RegisterPropertyString('UserName', '');
			$this->RegisterPropertyString('Password', '');
			$this->RegisterPropertyString('VehicleID', '');
			$this->RegisterPropertyString('SelectServer', 'ovms.dexters-web.de');
			$this->RegisterPropertyString('OwnServerURL', '');
			$this->RegisterAttributeString('ServerURL', '');
			$this->RegisterPropertyBoolean('status', 'true');
			$this->RegisterPropertyBoolean('vehicle', 'false');
			$this->RegisterPropertyBoolean('tpms', 'false');
			$this->RegisterPropertyBoolean('location', 'false');
			$this->RegisterPropertyBoolean('charge', 'false');
			$this->RegisterPropertyBoolean('unknownvariable', 'false');

			$this->RegisterTimer('OVMSNAT_UpdateData', 0, 'OVMSNAT_UpdateData($_IPS[\'TARGET\']);');
			$this->RegisterPropertyInteger('UpdateDataInterval', 60);

			$this->RegisterProfileFloat("OVMS_AH", "", "", " Ah", 0, 0, 0, 0);
			$this->RegisterProfileFloat('OVMS_KM', '', '', ' km', 0, 0, 0, 0);
			$this->RegisterProfileFloat('OVMS_LEVEL', '', '', ' %', 0, 0, 0, 0);
			$this->RegisterProfileBooleanEx('OVMS_YESNO', '', '', '', [
				[false, 'no',  '', 0xFF0000],
				[true, 'yes',  '', 0x00FF00]
			]);
			$this->RegisterProfileFloat('OVMS_PSI', '', '', ' psi', 0, 0, 0, 1);

		}

		public function Destroy()
		{
			//Never delete this line!
			parent::Destroy();
		}

		public function ApplyChanges()
		{
			//Never delete this line!
			parent::ApplyChanges();

			$this->SetTimerInterval('OVMSNAT_UpdateData', $this->ReadPropertyInteger('UpdateDataInterval') * 1000);

			if ($this->ReadPropertyInteger('UpdateDataInterval') == 0){
				$this->SetStatus(104);
			} else {
				$this->SetStatus(102);
			}

			if ($this->ReadPropertyString('SelectServer') == "another Server") 
			{
				$this->WriteAttributeString('ServerURL', $this->ReadPropertyString('OwnServerURL'));
			}
			else
			{
				$this->WriteAttributeString('ServerURL', $this->ReadPropertyString('SelectServer'));
			}
		
			require_once __DIR__ . '/../libs/var_and_profiles.php';


		}

		################################### functions #######################################
    
		public function RequestAction($Ident, $Value)
		{
			$this->LogMessage("RequestAction : $Ident, $Value",KL_MESSAGE);

			switch ($Ident) {
				case 'unHideServerURL':
					if ($Value == "another Server"){
						$this->UpdateFormField("OwnServerURL", "visible", true);
					}
				break;
				case 'nix':
					echo "nix";
				break;
			}
		}

		public function GetConfigurationForm()
		{
			$jsonForm = json_decode(file_get_contents(__DIR__ . "/form.json"), true);
			
			if ($this->ReadPropertyString('SelectServer') == "another Server") 
			{
				$jsonForm["elements"][7]["visible"] = true;

			}
			
			return json_encode($jsonForm);
		}

		private function CookieHandle(string $value, $SessionID = 0){

			$Server	 		= $this->ReadAttributeString('ServerURL');
			$UserName		= $this->ReadPropertyString('UserName');
			$Password		= $this->ReadPropertyString('Password');

			switch ($value)
			{
				case "get":
		 			$uri       			= 'https://'.$Server.':6869/api/cookie?username='.$UserName.'&password='.$Password;
		
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $uri);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
					curl_setopt($ch, CURLOPT_HEADER, true);
					curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
					curl_setopt($ch, CURLOPT_TIMEOUT, 60);
					$response = curl_exec($ch);
					$curl_error = curl_error($ch);
					curl_close($ch);
					
					if (empty($response) || $response === false || !empty($curl_error)) {
						$this->SendDebug(__FUNCTION__, 'CookieHandle(): no response from Server.' . $curl_error, 0);
						$this->LogMessage($this->Translate('CookieHandle(): no response from Server'), KL_ERROR);
						return false;
					}
					else
					{
						preg_match('/Set-Cookie: (.*)/',$response, $SessionID);
						$this->SendDebug(__FUNCTION__, 'CookieHandle(): Cookieinfo.' . $SessionID[1], 0);
	
						$this->SendDebug(__FUNCTION__, 'CookieHandle(): Get CookieID from Server' . $response, 0);
						$this->LogMessage($this->Translate('CookieHandle(): Get CookieID from Server'), KL_MESSAGE);
						return $SessionID[1];
					}
		
				break;
		
				case "delete":

					$uri       			= 'https://'.$Server.':6869/api/cookie';
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $uri);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array("cookie: ".$SessionID));
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
					curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
					curl_setopt($ch, CURLOPT_TIMEOUT, 60);
					$response = curl_exec($ch);
					$curl_error = curl_error($ch);
					curl_close($ch);		

					if (empty($response) || $response === false || !empty($curl_error)) {
						$this->SendDebug(__FUNCTION__, 'CookieHandle(): no response from Server ' . $curl_error, 0);
						$this->LogMessage($this->Translate('CookieHandle(): no response from Server '), KL_ERROR);
						return false;
					}
					else
					{
						$this->SendDebug(__FUNCTION__, 'CookieHandle(): delete CookieID ' . $response, 0);
						$this->LogMessage($this->Translate('CookieHandle(): delete CookieID '), KL_MESSAGE);
						return true;
					}
				break;
			}
		}
		
		# only the options are allowed vehicle, status, tpms, location, charge, historical 
		public function GetData(string $option, string $SessionID = NULL)
		{

			$Server	 		= $this->ReadAttributeString('ServerURL');
			$UserName		= $this->ReadPropertyString('UserName');
			$Password		= $this->ReadPropertyString('Password');
			$VehicleID		= $this->ReadPropertyString('VehicleID');
			$option			= $option;

			$uri       			= 'https://'.$Server.':6869/api/'.$option.'/'.$VehicleID;

			if ($SessionID == NULL){
			// lets start, first get cookieID
				$SessionID = $this->CookieHandle('get');
				$this->SendDebug(__FUNCTION__, 'GetData(): get cookie', 0);
			}
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $uri);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
           	curl_setopt($ch, CURLOPT_HTTPHEADER, array("cookie: ".$SessionID));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
			curl_setopt($ch, CURLOPT_TIMEOUT, 60);
			$response = curl_exec($ch);
			$curl_error = curl_error($ch);
			curl_close($ch);
			
			if (empty($response) || $response === false || !empty($curl_error)) {
				$this->SendDebug(__FUNCTION__, 'GetData(): no response from Server for '.$option.' '. $curl_error, 0);
				$this->LogMessage($this->Translate('GetData(): no response from Server for '.$option), KL_ERROR);
				if ($SessionID == NULL){
					$this->CookieHandle('delete', $SessionID);
					$this->SendDebug(__FUNCTION__, 'GetData(): delete cookie', 0);	
				}
				return false;
			}
			else
			{
				$this->SendDebug(__FUNCTION__, 'GetData(): Get ' .$option. '-data from Server ' . $response, 0);
				$this->LogMessage($this->Translate('GetData(): Get '.$option.' data from Server '), KL_MESSAGE);
				$responseData = json_decode($response, TRUE);
				if ($SessionID == NULL){
					$this->CookieHandle('delete', $SessionID);
					$this->SendDebug(__FUNCTION__, 'GetData(): delete cookie', 0);	
				}
				return $responseData;
			}
		}


		# only the options are allowed vehicle, status, tpms, location, charge, historical 

		public function UpdateData()
		{
			include __DIR__ . '/../libs/var_and_profiles.php';

			$SessionID = $this->CookieHandle('get');

			if ($this->ReadPropertyBoolean('status'))
			{
				$StatusData['status'] = $this->GetData('status', $SessionID);
				$this->SendDebug(__FUNCTION__, 'UpdateData(): get status informations...', 0);	
			} 
			if ($this->ReadPropertyBoolean('vehicle'))
			{
				$StatusData['vehicle'] = $this->GetData('vehicle', $SessionID);
				$this->SendDebug(__FUNCTION__, 'UpdateData(): get vehicle informations...', 0);	
			} 
			if ($this->ReadPropertyBoolean('tpms'))
			{
				$StatusData['tpms'] = $this->GetData('tpms', $SessionID);
				$this->SendDebug(__FUNCTION__, 'UpdateData(): get TPMS informations...', 0);	
			} 
			if ($this->ReadPropertyBoolean('location'))
			{
				$StatusData['location'] = $this->GetData('location', $SessionID);
				$this->SendDebug(__FUNCTION__, 'UpdateData(): get location informations...', 0);	
			} 
			if ($this->ReadPropertyBoolean('charge'))
			{
				$StatusData['charge'] = $this->GetData('charge', $SessionID);
				$this->SendDebug(__FUNCTION__, 'UpdateData(): get charge informations...', 0);	
			}  
			
			$SessionID = $this->CookieHandle('delete',$SessionID );

			if (!empty($StatusData))
			{
				include __DIR__ . '/../libs/var_and_profiles.php';

				foreach($StatusData as $option=>$value)
					{

						foreach($value as $var=>$result)
						{
							$IdentName = $option."_".$var;

							if (!(in_array($IdentName,$blacklist)))																					
							{
								if (((!$this->GetIDForIdent($IdentName)) AND $this->ReadPropertyBoolean('unknownvariable') == true))
								{
									$this->MaintainVariable($IdentName, $IdentName." unknown!",3, "",0, $this->ReadPropertyBoolean('unknownvariable') == true);
								}

								if ($IdentName == "status_odometer"){ $result = $result / 10;}
								$this->SetValue($IdentName,$result);
							}
						}
					}
			}
		}
}