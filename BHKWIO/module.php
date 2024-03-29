<?php
	class BHKWIO extends IPSModule {

		public function Create()
		{
			//Never delete this line!
			parent::Create();
			$this->RegisterPropertyString('bhkw_ip', "192.168.178.111");
			$this->RegisterPropertyInteger('port', 12004);
        		
			//IPS_LogMessage("Parent ID: ","Dierk");
			//IPS_LogMessage("BHKWIO ID: ", $this->InstanceID));
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
			
			//IPS_LogMessage("Parent ID: ","Dierk");

			//IPS_LogMessage("Parent ID: ",$this->GetParentId());
			//IPS_LogMessage("BHKWIO ID: ", $this->InstanceID));
		}

		public function ForwardData($JSONString)
		{
			$data = json_decode($JSONString);
			//IPS_LogMessage("IO FRWD", utf8_decode($data->Buffer));
		}

		public function Send(string $Text)
		{
			$this->SendDataToChildren(json_encode(Array("DataID" => "{683476B1-08B4-682B-EF58-B892247FC2E1}", "Buffer" => $Text)));
		}
		
		    /**
     * Read config
     */
    private function ReadConfig()
    {
        // get settings
		$this->bhkw_ip = $this->ReadPropertyInteger('bhkw_ip');
        $this->port = $this->ReadPropertyInteger('port');
        
    }
		    public function GetConfigurationForParent()
    {
        // read config
        $this->ReadConfig();

        // return config
        return json_encode([
            'Port' => $this->port,
            'Open' => true
        ]);
    }

	}
