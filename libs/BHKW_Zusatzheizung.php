<?php

declare(strict_types=1);

trait BHKWZusatzHeizung
{	
	private function ZusatzHeizung()
	{
		$VorlaufSoll = GetValue($this->GetIDForIdent("VorlaufTemperaturSoll"));
		//IPS_LogMessage("zHeizung VorlaufSoll:", $VorlaufSoll);
		$VorlaufMitteAus = $VorlaufSoll +8;
		$SPmitte = GetValue($this->GetIDForIdent("T3"));
		//IPS_LogMessage("zHeizung SPmitte:", $SPmitte);
	/*	$VorlaufIst = GetValue($this->GetIDForIdent("T5"));
		IPS_LogMessage("zHeizung VorlaufIst:", $VorlaufIst);
		$HKPumpe = GetValue($this->GetIDForIdent("R1"));
		IPS_LogMessage("zHeizung HKPumpe:", $HKPumpe);	*/
		if(GetValue($this->GetIDForIdent("R1")))
		{
			// Heizung ist an
			if(GetValue($this->GetIDForIdent("T5")) < GetValue($this->GetIDForIdent("VorlaufTemperaturSoll"))-8)
			{
				SetValue($this->GetIDForIdent("zH1"), true);
				IPS_LogMessage("zHeizung Heizung SP oben:",GetValue($this->GetIDForIdent("T5")));
			}
			//(GetValue($this->GetIDForIdent("T3")) > 70) or 
			if($SPmitte > $VorlaufMitteAus)
			{
				SetValue($this->GetIDForIdent("zH1"), false);
				IPS_LogMessage("zHeizung Heizung mitte:",GetValue($this->GetIDForIdent("T3")));
				IPS_LogMessage("zHeizung Heizung vor+8:",$VorlaufSoll+8);
			}
			else
			{
				// Heizung is aus (Warmwasser)
				// Speichertemperatur oben > 65 zusatzHeizung aus
				if (GetValue($this->GetIDForIdent("T2")) > 65)
				{
					SetValue($this->GetIDForIdent("zH1"), false);
					IPS_LogMessage("zHeizung WWaus:",GetValue($this->GetIDForIdent("T2")));	
				}
				// Speichertemperatur oben < 55 zusatzHeizung an
				if (GetValue($this->GetIDForIdent("T2")) < 55)
				{
					SetValue($this->GetIDForIdent("zH1"), true);
					IPS_LogMessage("zHeizung WWan:",GetValue($this->GetIDForIdent("T2")));
				}
			}
			return;						     
		}
	}
}
