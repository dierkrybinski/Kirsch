<?php
class KRUPP extends IPSModule 
{
    public function Create()
	{
        //Never delete this line!
        parent::Create();
        //These lines are parsed on Symcon Startup or Instance creation 
        //You cannot use variables here. Just static values.
        $this->RegisterPropertyInteger("Hauptschalter", 0);
		$this->RegisterPropertyInteger("Brenner_Schalter", 0);
		$this->RegisterPropertyInteger("Pumpen_Schalter", 0);
		
		$this->RegisterVariableBoolean("Hauptschalter", "Hauptschalter", "Kirsch.AnAus", 10);
		$this->RegisterVariableBoolean("Holz_Oel", "Holz/Oel", "Kirsch.AnAus", 20);
		$this->RegisterVariableBoolean("Automatik", "Automatik", "Kirsch.AnAus", 30);
		$this->RegisterVariableBoolean("Brenner", "Brenner", "Kirsch.AnAus", 40);
		$this->RegisterVariableBoolean("Punmpe", "Pumpe", "Kirsch.AnAus", 50);
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
    }
	
	public function MainPower()
	{
		//schaltet die Heizung An/Aus
	 //echo "Dierk";
	}
	
	public function Brenner()
	{
		//schaltet die Brennner An/Aus
	
	}
	
	public function Pumpe()
	{
		//schaltet die Pumpe An/Aus
	
	}
	
		public function Automatik()
	{
		//schaltet die Automatic An/Aus
	
	}
}
?>