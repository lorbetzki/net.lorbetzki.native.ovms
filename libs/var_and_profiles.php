<?php

# Status variable
$this->MaintainVariable('status_alarmsounding', $this->Translate('alarmsounding'),0, "OVMS_YESNO",100, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_bt_open', $this->Translate('trunk open'),0, "OVMS_YESNO",101, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_carawake', $this->Translate('car a wake'),0, "OVMS_YESNO",103, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_carlocked', $this->Translate('car locked'),0, "OVMS_YESNO",104, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_caron', $this->Translate('car on'),0, "OVMS_YESNO",105, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_chargestate', $this->Translate('chargestate'),3, "",106, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_charging', $this->Translate('charging'),1, "OVMS_CHARGING",107, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_charging_12v', $this->Translate('charging 12v'),0, "OVMS_YESNO",108, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_cooldown_active', $this->Translate('cooldown_active'),1, "",109, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_cp_dooropen', $this->Translate('charge port door open'),0, "OVMS_YESNO",110, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_estimatedrange', $this->Translate('estimated range'),2, "OVMS_KM",111, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_fl_dooropen', $this->Translate('door open front left'),0, "OVMS_YESNO",112, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_fr_dooropen', $this->Translate('door open front right'),0, "OVMS_YESNO",113, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_handbrake', $this->Translate('handbrake'),0, "OVMS_YESNO",114, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_idealrange', $this->Translate('idealrange'),2, "OVMS_KM",115, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_idealrange_max', $this->Translate('idealrange_max'),2, "OVMS_KM",116, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_m_msgage_d', $this->Translate('age of last doors/env (D) messages received'),1, "~UnixTimestampTime",117, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_m_msgage_s', $this->Translate('age of last status (S) message received'),1, "~UnixTimestampTime",118, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_m_msgtime_d', $this->Translate('last doors/env (D) messages received'),1, "~UnixTimestampTime",119, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_m_msgtime_s', $this->Translate('last status (S) message received'),1, "~UnixTimestampTime",120, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_mode', $this->Translate('mode'),3, "",121, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_odometer', $this->Translate('odometer'),2, "OVMS_KM",122, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_parkingtimer', $this->Translate('parking timer'),1, "~UnixTimestampTime",123, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_pilotpresent', $this->Translate('pilot present'),0, "OVMS_YESNO",124, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_soc', $this->Translate('SoC'),2, "OVMS_LEVEL",125, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_soh', $this->Translate('SoH'),2, "OVMS_LEVEL",126, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_speed', $this->Translate('speed'),2, "OVMS_KMH",127, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_temperature_ambient', $this->Translate('Ambient temperature'),2, "~Temperature",130, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_temperature_battery', $this->Translate('Battery temperature'),2, "~Temperature",131, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_temperature_cabin', $this->Translate('Cabin temperature'),2, "~Temperature",132, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_temperature_charger', $this->Translate('Charger temperature'),2, "~Temperature",133, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_temperature_motor', $this->Translate('Motor temperature'),2, "~Temperature",134, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_temperature_pem', $this->Translate('PEM temperature'),2, "~Temperature",135, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_tr_open', $this->Translate('trunk open'),0, "OVMS_YESNO",136, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_tripmeter', $this->Translate('tripmeter'),2, "OVMS_KM",137, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_vehicle12v', $this->Translate('vehicle 12v'),2, "~Volt",140, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_vehicle12v_current', $this->Translate('vehicle 12v current'),2, "OVMS_AH",141, $this->ReadPropertyBoolean('status') == true);
$this->MaintainVariable('status_vehicle12v_ref', $this->Translate('vehicle 12v ref'),2, "~Volt",142, $this->ReadPropertyBoolean('status') == true);

# vehicle
$this->MaintainVariable('vehicle_m_msgage_s', $this->Translate('age of last status (S) message received'),1, "~UnixTimestampTime",200, $this->ReadPropertyBoolean('vehicle') == true);
$this->MaintainVariable('vehicle_m_msgtime_s', $this->Translate('last status (S) message received'),1, "~UnixTimestampTime",201, $this->ReadPropertyBoolean('vehicle') == true);
$this->MaintainVariable('vehicle_v_apps_connected', $this->Translate('number of apps currently connected'),1, "",202, $this->ReadPropertyBoolean('vehicle') == true);
$this->MaintainVariable('vehicle_v_btcs_connected', $this->Translate('number of batch clients currently connected'),1, "",203, $this->ReadPropertyBoolean('vehicle') == true);
$this->MaintainVariable('vehicle_v_first_peer', $this->Translate('the API connection is the first peer connecting to the car'),0, "OVMS_YESNO",204, $this->ReadPropertyBoolean('vehicle') == true);
$this->MaintainVariable('vehicle_v_net_connected', $this->Translate('the car is currently connected to the server'),0, "OVMS_YESNO",205, $this->ReadPropertyBoolean('vehicle') == true);

# TPMS
$this->MaintainVariable('tpms_fl_pressure', $this->Translate('pressure front left'),2, "OVMS_PSI",210, $this->ReadPropertyBoolean('tpms') == true);
$this->MaintainVariable('tpms_fl_temperature', $this->Translate('temperature front left'),2, "~Temperature",211, $this->ReadPropertyBoolean('tpms') == true);
$this->MaintainVariable('tpms_fr_pressure', $this->Translate('pressure front right'),2, "OVMS_PSI",212, $this->ReadPropertyBoolean('tpms') == true);
$this->MaintainVariable('tpms_fr_temperature', $this->Translate('temperature front right'),2, "~Temperature",213, $this->ReadPropertyBoolean('tpms') == true);
$this->MaintainVariable('tpms_m_msgage_w', $this->Translate('age of last tire message received'),1, "",214, $this->ReadPropertyBoolean('tpms') == true);
$this->MaintainVariable('tpms_m_msgtime_w', $this->Translate('last tire essage received'),1, "~UnixTimestampTime",215, $this->ReadPropertyBoolean('tpms') == true);
$this->MaintainVariable('tpms_rl_pressure', $this->Translate('pressure rear left'),2, "OVMS_PSI",216, $this->ReadPropertyBoolean('tpms') == true);
$this->MaintainVariable('tpms_rl_temperature', $this->Translate('temperature rear left'),2, "~Temperature",217, $this->ReadPropertyBoolean('tpms') == true);
$this->MaintainVariable('tpms_rr_pressure', $this->Translate('pressure rear right'),2, "OVMS_PSI",218, $this->ReadPropertyBoolean('tpms') == true);
$this->MaintainVariable('tpms_rr_temperature', $this->Translate('temperature rear right'),2, "~Temperature",219, $this->ReadPropertyBoolean('tpms') == true);

# location
$this->MaintainVariable('location_altitude', $this->Translate('altitude'),2, "",230, $this->ReadPropertyBoolean('location') == true);
$this->MaintainVariable('location_direction', $this->Translate('direction'),3, "",231, $this->ReadPropertyBoolean('location') == true);
$this->MaintainVariable('location_drivemode', $this->Translate('drivemode'),3, "",232, $this->ReadPropertyBoolean('location') == true);
$this->MaintainVariable('location_energyrecd', $this->Translate('energy received'),2, "",233, $this->ReadPropertyBoolean('location') == true);
$this->MaintainVariable('location_energyused', $this->Translate('energy used'),2, "",234, $this->ReadPropertyBoolean('location') == true);
$this->MaintainVariable('location_gpslock', $this->Translate('gpslock'),0, "OVMS_YESNO",235, $this->ReadPropertyBoolean('location') == true);
$this->MaintainVariable('location_invefficiency', $this->Translate('invefficiency'),3, "",236, $this->ReadPropertyBoolean('location') == true);
$this->MaintainVariable('location_invpower', $this->Translate('inverter power'),3, "",237, $this->ReadPropertyBoolean('location') == true);
$this->MaintainVariable('location_latitude', $this->Translate('latitude'),2, "",238, $this->ReadPropertyBoolean('location') == true);
$this->MaintainVariable('location_longitude', $this->Translate('longitude'),2, "",239, $this->ReadPropertyBoolean('location') == true);
$this->MaintainVariable('location_m_msgage_l', $this->Translate('age of last location (L) message received'),1, "~UnixTimestampTime",240, $this->ReadPropertyBoolean('location') == true);
$this->MaintainVariable('location_m_msgtime_l', $this->Translate('last location (L) message received'),1, "~UnixTimestampTime",241, $this->ReadPropertyBoolean('location') == true);
$this->MaintainVariable('location_power', $this->Translate('power'),2, "",242, $this->ReadPropertyBoolean('location') == true);
$this->MaintainVariable('location_speed', $this->Translate('speed'),2, "OVMS_KMH",243, $this->ReadPropertyBoolean('location') == true);
$this->MaintainVariable('location_tripmeter', $this->Translate('tripmeter'),2, "OVMS_KM",245, $this->ReadPropertyBoolean('location') == true);

#charge
$this->MaintainVariable('charge_battvoltage', $this->Translate('battvoltage'),2, "~Volt",250, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_carawake', $this->Translate('car a wake'),0, "OVMS_YESNO",252, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_charge_estimate', $this->Translate('charge estimate'),1, "",254, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_charge_etr_full', $this->Translate('charge etr full'),1, "~UnixTimestampTime",255, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_charge_etr_limit', $this->Translate('charge etr limit'),2, "",256, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_charge_etr_range', $this->Translate('charge etr range'),2, "",257, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_charge_etr_soc', $this->Translate('charge etr soc'),2, "",258, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_charge_limit_range', $this->Translate('charge limit range'),2, "",259, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_charge_limit_soc', $this->Translate('charge limit soc'),2, "",260, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_chargecurrent', $this->Translate('charge current'),2, "~Ampere",262, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_chargeduration', $this->Translate('charge duration'),1, "~UnixTimestampTime",263, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_chargekwh', $this->Translate('charge kwh'),2, "OVMS_KWHF",264, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_chargelimit', $this->Translate('charge limit'),3, "",265, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_chargepower', $this->Translate('charge power'),2, "~Ampere",266, $this->ReadPropertyBoolean('charge') == true);

$this->MaintainVariable('charge_chargepowerinput', $this->Translate('charge powerinput'),2, "OVMS_KWHF",267, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_chargerefficiency', $this->Translate('charger efficiency'),2, "OVMS_LEVEL",268, $this->ReadPropertyBoolean('charge') == true);

$this->MaintainVariable('charge_chargestarttime', $this->Translate('charge starttime'),1, "",269, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_chargesubstate', $this->Translate('charge substate'),1, "",271, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_chargetimermode', $this->Translate('charge timermode'),1, "",272, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_chargetimerstale', $this->Translate('charge timerstale'),1, "",273, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_chargetype', $this->Translate('charge type'),1, "",274, $this->ReadPropertyBoolean('charge') == true);

$this->MaintainVariable('charge_cooldown_active', $this->Translate('cooldown active'),1, "",277, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_cooldown_tbattery', $this->Translate('cooldown traction battery'),1, "",278, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_cooldown_timelimit', $this->Translate('cooldown timelimit'),1, "",279, $this->ReadPropertyBoolean('charge') == true);

$this->MaintainVariable('charge_linevoltage', $this->Translate('line voltage'),1, "OVMS_VOLT",284, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_m_msgage_d', $this->Translate('age of last doors/env (D) messages received'),1, "~UnixTimestampTime",285, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_m_msgage_s', $this->Translate('age of last status (S) message received'),1, "~UnixTimestampTime",286, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_m_msgtime_d', $this->Translate('last doors/env (D) messages received'),1, "~UnixTimestampTime",287, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_m_msgtime_s', $this->Translate('last status (S) message received'),1, "~UnixTimestampTime",288, $this->ReadPropertyBoolean('charge') == true);

$this->MaintainVariable('charge_temperature_ambient', $this->Translate('Ambient temperature'),2, "~Temperature",295, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_temperature_battery', $this->Translate('Battery temperature'),2, "~Temperature",296, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_temperature_cabin', $this->Translate('Cabin temperature'),2, "~Temperature",297, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_temperature_charger', $this->Translate('Charger temperature'),2, "~Temperature",298, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_temperature_motor', $this->Translate('Motor temperature'),2, "~Temperature",299, $this->ReadPropertyBoolean('charge') == true);
$this->MaintainVariable('charge_temperature_pem', $this->Translate('PEM temperature'),2, "~Temperature",300, $this->ReadPropertyBoolean('charge') == true);

// dont show these variables
$blacklist = array("status_cac100", 
"charge_units", 
"charge_vehicle12v", 
"charge_vehicle12v_current", 
"charge_vehicle12v_ref", 
"charge_mode", 
"charge_pilotpresent", 
"charge_soc", 
"charge_soh", 
"charge_staleambient", 
"charge_staletemps", 
"charge_cp_dooropen", 
"charge_estimatedrange", 
"charge_idealrange", 
"charge_idealrange_max", 
"charge_charging", 
"charge_charging_12v", 
"charge_chargestate", 
"charge_chargeb4", 
"status_staleambient", 
"status_staletemps", 
"status_units", 
"status_valetmode", 
"location_stalegps", 
"charge_cac100", 
"charge_caron", 
"tpms_staletpms" 
            );

/*
$this->MaintainVariable('status_cac100', $this->Translate('cac100'),3, "",102, false);
$this->MaintainVariable('charge_units', $this->Translate('units'),3, "",301, false);
$this->MaintainVariable('charge_vehicle12v', $this->Translate('vehicle 12v'),2, "~Volt",302, false);
$this->MaintainVariable('charge_vehicle12v_current', $this->Translate('vehicle 12v current'),2, "OVMS_AH",303, false);
$this->MaintainVariable('charge_vehicle12v_ref', $this->Translate('vehicle 12v ref'),2, "~Volt",304, false);
$this->MaintainVariable('charge_mode', $this->Translate('mode'),3, "",289, false);
$this->MaintainVariable('charge_pilotpresent', $this->Translate('pilot present'),0, "OVMS_YESNO",290, false);
$this->MaintainVariable('charge_soc', $this->Translate('SoC'),2, "OVMS_LEVEL",291, false);
$this->MaintainVariable('charge_soh', $this->Translate('SoH'),2, "OVMS_LEVEL",292, false);
$this->MaintainVariable('charge_staleambient', $this->Translate('staleambient'),1, "",293, false);
$this->MaintainVariable('charge_staletemps', $this->Translate('staletemps'),1, "",294, false);
$this->MaintainVariable('charge_cp_dooropen', $this->Translate('charge port door open'),0, "OVMS_YESNO",280, false);
$this->MaintainVariable('charge_estimatedrange', $this->Translate('estimated range'),1, "",281, false);
$this->MaintainVariable('charge_idealrange', $this->Translate('idealrange'),2, "OVMS_KM",282, false);
$this->MaintainVariable('charge_idealrange_max', $this->Translate('idealrange_max'),2, "OVMS_KM",283, false);
$this->MaintainVariable('charge_charging', $this->Translate('charging'),1, "",275, false);
$this->MaintainVariable('charge_charging_12v', $this->Translate('charging 12v'),3, "",276, false);
$this->MaintainVariable('charge_chargestate', $this->Translate('charge state'),3, "",270, false);
$this->MaintainVariable('charge_chargeb4', $this->Translate('chargeb4'),2, "",261, false);
$this->MaintainVariable('status_staleambient', $this->Translate('staleambient'),1, "",128, false);
$this->MaintainVariable('status_staletemps', $this->Translate('staletemps'),1, "",129, false);
$this->MaintainVariable('status_units', $this->Translate('units'),3, "",138, false);
$this->MaintainVariable('status_valetmode', $this->Translate('valetmode'),0, "OVMS_YESNO",139, false);
$this->MaintainVariable('location_stalegps', $this->Translate('stalegps'),3, "",244, false);
$this->MaintainVariable('charge_cac100', $this->Translate('cac100'),2, "",251, false);
$this->MaintainVariable('charge_caron', $this->Translate('car on'),0, "OVMS_YESNO",253, false);
$this->MaintainVariable('tpms_staletpms', $this->Translate('staletpms'),3, "",220, false);

*/

