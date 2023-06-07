# OVMS Native


### Inhaltsverzeichnis

1. [Funktionsumfang](#1-funktionsumfang)
2. [Voraussetzungen](#2-voraussetzungen)
3. [Software-Installation](#3-software-installation)
4. [Einrichten der Instanzen in IP-Symcon](#4-einrichten-der-instanzen-in-ip-symcon)
5. [Statusvariablen und Profile](#5-statusvariablen-und-profile)
6. [PHP-Befehlsreferenz](#7-php-befehlsreferenz)

### 1. Funktionsumfang
das Modul hilft euch, bei vorhandem OVMS Modul, die Daten eures Fahrzeug über die klassische V.2 Schnittstelle auszulesen. Dabei können die beiden Standardserver oder auch ein eigener angegeben werden. Es stehen somit alle Metricen zur Verfügung die über die V.2 Schnittstelle übertragen werden. Es wird nur lesend auf die Schnittstelle zugegriffen, schreiben ist nicht möglich.

Leider fehlen mir bei manchen Variablen die Übersetzung, schreibt mich gerne an.

### 2. Voraussetzungen

- IP-Symcon ab Version 6.3
- OVMS Hardware und vorkonfigueriert Server V.2

### 3. Software-Installation

* Über den Module Store das 'OVMS Native'-Modul installieren.
* Alternativ über das Module Control folgende URL hinzufügen https://github.com/lorbetzki/net.lorbetzki.native.ovms.git

### 4. Einrichten der Instanzen in IP-Symcon

 Unter 'Instanz hinzufügen' kann das 'OVMS Native'-Modul mithilfe des Schnellfilters gefunden werden.  
	- Weitere Informationen zum Hinzufügen von Instanzen in der [Dokumentation der Instanzen](https://www.symcon.de/service/dokumentation/konzepte/instanzen/#Instanz_hinzufügen)

__Konfigurationsseite__:

Name          				     | Beschreibung
-------------------------------- | -------------------------------------------------------
Vehicle ID | Vehicle ID, diese befindet sich in der OVMS Webui unter Config -> Server V2 (MP) -> Vehicle ID
Benutzername | Hier muss der Benutzername des Servers eingetragen werden, den man in der OVMS Webui unter Config -> Server V2 (MP) ausgewählt hat.
Passwort | Hier muss das Passwort des Servers eingetragen werden, den man in der OVMS Webui unter Config -> Server V2 (MP) ausgewählt hat.
Server | Hier muss der Servers eingetragen werden, den man in der OVMS Webui unter Config -> Server V2 (MP) ausgewählt hat.
Hostnamen | optional: bei Auswahl eines eigenen Servers, diesen hier eintragen.
Intervall | in sek. Gibt an, wie oft die Daten abgerufen werden.
erstelle Variablen vom Typ Statusinformationen | Es werden variablen erstellt mit allen Metricen des typen status_
erstelle Variablen vom Typ Fahrzeuginformationen | Es werden variablen erstellt mit allen Metricen des typen vehicles_
erstelle Variablen vom Typ Reifeninformationen | Es werden variablen erstellt mit allen Metricen des typen tpms_
erstelle Variablen vom Typ Ortung und GPS | Es werden variablen erstellt mit allen Metricen des typen location_
erstelle Variablen vom Typ Ladeinformationen | Es werden variablen erstellt mit allen Metricen des typen charge_
erstelle unbekannte Variablen, bsw. durch Firmwareupdates | Es werden variablen erstellt mit allen unbekannten oder neuen Metricen 

### 5. Statusvariablen und Profile

Die Statusvariablen/Kategorien werden automatisch angelegt. Das Löschen einzelner kann zu Fehlfunktionen führen.

Es gibt dabei verschiedene Typen der Statusvariablen, zum einen kann im Konfigurationfenster dieser Typ explizit de/aktiviert werden, zum anderen kann man mittels `OVMSNAT_GetData(int $InstanceID, string $Type);` alle Variablen innerhalb des Typs manuell abrufen.

Manche Variablen können zudem mehrfach vorkommen, meistens weil die bereits in einem anderem Type zusätzlich vorhanden sind. Man kann OVMS zudem mitteilen, nicht alle Daten zu senden. Dazu lest euch bitte hier ein :https://github.com/openvehicles/Open-Vehicle-Monitoring-System-3/blob/master/docs/source/userguide/components.rst

__Type: status__:

Name			| Typ     | Beschreibung
--------------- | ------- | ------------
 Alarmton | boolean | Alarmton aktiv
 Kofferraum offen | boolean |  Kofferraumklappe ist geöffnet
 Auto wach | boolean | Fahrzeugelektronik ist wach
 Auto verschlossen | boolean | Fahrzeug ist verschlossen
 Auto Betriebsbereit | boolean | Fahrzeug ist im Betriebsbereitem Zustand
 Ladestatus | string | Gibt den Ladestatus als stringvariable aus
 Fahrzeug lädt | integer | 0 = gestoppt und 16 = Fahrzeug lädt
 Fahrzeug lädt 12v | boolean |  12V Batterie wird geladen
 Vorklimatisierung aktiv | integer |  Zustand der Klimatisierung. Leider noch keine weiteren Infos. -1 = nicht aktiv
 Ladeport offen | boolean |  Ladeanschlussport ist offen
 geschätzte Reichweite | float | geschätzte Reichweite
 Tür vorne links offen | boolean | Tür vorne links offen
 Tür vorne rechts offen | boolean | Tür vorne rechts offen
 Handbremse | boolean | Handbremse angezogen
 Idealreichweite | float | Idealreichweite
 Idealreichweite_max | float | max. Idealreichweite
 alter der letzten empf. Türnachrichten | integer |  alter der letzten empf. Türnachrichten
 alter der zuletzt empf. Statusnachrichten | integer |  alter der zuletzt empf. Statusnachrichten
 zuletzt empf. Türnachrichten | integer |  zuletzt empf. Türnachrichten 
 zuletzt empf. Statusnachrichten | integer | zuletzt empf. Statusnachrichten
 Modus | string | Modus, leider noch keine weiteren Infos
 Kilometerzähler | float | gesamt-Kilometerstand
 geparkt vor x Stunden. | integer | geparkt vor x Stunden.
 Pilotsignal erkannt | boolean | Ladekabel ist eingesteckt und das Pilotsignal wurde erkannt
 SoC | float | State of Charge, aktueller Ladestand in %
 SoH | float | State of health, Gesundheit der HV-Batterie in %
 Geschwindigkeit | float | aktuelle Geschwindigkeit
 Umgebungstemperatur | float | Umgebungstemperatur
 Batterietemperatur | float | Batterietemperatur
 Innentemperatur | float | Innentemperatur
 Ladetemperatur | float | Ladetemperatur
 Motortemperatur | float | Motortemperatur
 PEM-Temperatur | float | PEM-Temperatur
 Tageskilometerzähler | float | Tageskilometerzähler
 12V Bordspannung | float | aktuelle 12V Bordspannung
 12V Bordspannung current | float | 12V Stromstärke der Batterie

 __Type: vehicle__:

Name			| Typ     | Beschreibung
--------------- | ------- | ------------ 
 12V Bordspannung ref | float | 12v Referenzspannung, kann im OVMS Webui unter Config -> Vehicle -> 12V Monitor -> 12V reference eingestellt werden
 alter der zuletzt empf. Statusnachrichten | integer | alter der zuletzt empf. Statusnachrichten 
 zuletzt empf. Statusnachrichten | integer |  zuletzt empf. Statusnachrichten
 Anzahl der aktuell verbundenen Apps | integer | Anzahl der aktuell verbundenen Apps 
 Anzahl der derzeit verbundenen Batch-Clients | integer |  Anzahl der derzeit verbundenen Batch-Clients 
 Die API-Verbindung ist der erste Peer, der sich mit dem Auto verbindet | boolean |  Die API-Verbindung ist der erste Peer, der sich mit dem Auto verbindet 
 Das Auto ist derzeit mit dem Server verbunden | boolean |  Das Auto ist derzeit mit dem Server verbunden


 __Type: tpms__:

Name			| Typ     | Beschreibung
--------------- | ------- | ------------
Luftdruck vorne links | float | 
Temperatur vorne links | float | 
Luftdruck vorne rechts | float | 
Temperatur vorne rechts | float | 
Alter der zuletzt erhalten Nachrichten vom Reifensystem | integer | Alter der zuletzt erhalten Nachrichten vom Reifensystem
zuletzt empfangenen Nachrichten vom Reifensystem | integer | zuletzt empfangenen Nachrichten vom Reifensystem
Luftdruck hinten links | float | 
Temperatur hinten links | float | 
Luftdruck hinten rechts | float | 
Temperatur hinten rechts | float | 

 __Type: location__:

Name			| Typ     | Beschreibung
--------------- | ------- | ------------
 Altitude | float | 
 Richtung | string | 
 driveModus | string | 
 Energie erhalten | float | 
 verbrauchte Energie | float | 
 GPS Lock | boolean | 
 Ineffizienz | string | 
 Wechselrichterleistung | string | 
 Latitude | float | 
 Longitude | float | 
 Alter der zuletzt empfangene Standortnachricht | integer | 
 zuletzt empfangene Standortnachricht | integer | 
 Leistung | float | 
 Geschwindigkeit | float | 
 Tageskilometerzähler | float | 
 
 __Type: charge__:

Name			| Typ     | Beschreibung
--------------- | ------- | ------------
 Batteriespannung | float | 
 Auto wach | boolean | 
 voraussichtliche Ladedauer | integer | 
 Ladezeit bis voll | integer | 
 charge etr limit | float | 
 charge etr range | float | 
 charge etr soc | float | 
 charge limit range | float | 
 charge limit soc | float | 
 Ladestrom | float | 
 Ladedauer | integer | 
 geladene kWh | float | 
 charge limit | string | 
 charge Leistung | float | 
 charge Leistunginput | float | 
 Ladeeffizienz | float | 
 Startzeit Ladung | integer | 
 charge substat | integer | 
 charge timerModus | integer | 
 charge timerstale | integer | 
 Ladetyp | integer | 
 Klimatisierung | integer | 
 Klimatisierung Traktions Batterie | integer | 
 Klimatisierung Zeitlimit | integer | 
 Leitungsspannung | integer | 
 alter der letzten empf. Türnachrichten | integer | 
 alter der zuletzt empf. Statusnachrichten | integer | 
 zuletzt empf. Türnachrichten | integer | 
 zuletzt empf. Statusnachrichten | integer | 
 Umgebungstemperatur | float | 
 Batterietemperatur | float | 
 Innentemperatur | float | 
 Ladetemperatur | float | 
 Motortemperatur | float | 
 PEM-Temperatur | float | 

#### Profile

Name                    | Typ	      | Beschreibung
------------------------| ----------| ------------
OVMS_PSI 				| float 	| druck in PSI
OVMS_YESNO 				| boolean 	| Ja/Nein Profil
OVMS_KMH  				| float 	| km/h 
OVMS_KM 				| float 	| km
OVMS_KWHF 				| float 	|  kw/h als float
OVMS_LEVEL 				| float 	| prozentualer Wert
OVMS_VOLT 				| integer 	| Spannung in Volt
OVMS_AH 				| float 	| Ampere/h 
OVMS_KWH 				| integer 	| kw/h als integer  
OVMS_CHARGING 			| integer 	| Ladestatus 0 = gestoppt, 16 = Fahrzeug lädt

### 6. PHP-Befehlsreferenz

`OVMSNAT_UpdateData(int $InstanceID);`

aktualsiert alle Daten und setzt die Variablen

`OVMSNAT_GetData(int $InstanceID, string $Type);`

holt sich nur bestimmte Daten vom angegeben Typen ab:
Folgende Typen sind erlaubt: vehicle, status, tpms, location, charge, historical 
zum beispiel: `OVMSNAT_GetData(12345, "status");` holt nur Werter vom Typ Status.