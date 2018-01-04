/*******************************************************************************
 * OpenEMS - Open Source Energy Management System
 * Copyright (c) 2016, 2017 FENECON GmbH and contributors
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * Contributors:
 *   FENECON GmbH - initial API and implementation and initial documentation
 *******************************************************************************/
package io.openems.impl.controller.asymmetric.avoidtotaldischarge;

import java.util.Optional;
import java.util.Set;

import io.openems.api.channel.ConfigChannel;
import io.openems.api.controller.Controller;
import io.openems.api.device.nature.ess.EssNature;
//import io.openems.api.doc.ChannelInfo;
//import io.openems.api.doc.ThingInfo;
import io.openems.api.exception.InvalidValueException;
import io.openems.api.exception.WriteChannelException;
import io.openems.impl.controller.asymmetric.avoidtotaldischarge.Ess.State;

//@ThingInfo(title = "Avoid total discharge of battery (Asymmetric)", description = "Makes sure the battery is not going into critically low state of charge. For asymmetric Ess.")
/**
*
* @author FENECON GmbH
*
*/
public class AvoidTotalDischargeController extends Controller {

	/*
	 * Constructors
	 */
	public AvoidTotalDischargeController() {
		super();
	}

	public AvoidTotalDischargeController(String id) {
		super(id);
	}

	/*
	 * Config
	 */
	//@ChannelInfo(title = "Ess", description = "Sets the Ess devices.", type = Ess.class, isArray = true)
	/**
	* variable esss
	* @param this
	*/
	public final ConfigChannel<Set<Ess>> esss = new ConfigChannel<Set<Ess>>("esss", this);
	//@ChannelInfo(title = "Max Soc", description = "If the System is full the charge is blocked untill the soc decrease below the maxSoc.", type = Long.class, defaultValue = "95")
	/**
	*
	* @param this
	*/
	public final ConfigChannel<Long> maxSoc = new ConfigChannel<Long>("maxSoc", this);

	/*
	 * Methods
	 */
	@Override
	public void run() {
		try {
			for (Ess ess : esss.value()) {
				/*
				 * Calculate SetActivePower according to MinSoc
				 */
				switch (ess.currentState) {
				case CHARGESOC:
					if (ess.soc.value() > ess.minSoc.value()) {
						ess.currentState = State.MINSOC;
					} else {
						int id = 1;
						//funzione
						ess = checkOpt(ess, ess.setActivePowerL1.writeMin(), id);

						id = 2;
						//funzione
						ess = checkOpt(ess, ess.setActivePowerL2.writeMin(), id);

						id = 3;
						//funzione
						ess = checkOpt(ess, ess.setActivePowerL3.writeMin(), id);
						}
					break;

				case MINSOC:
					//funzione
					ess = caseMinSoc(ess);
					break;

				case NORMAL:
					//funzione
					ess = caseNormal(ess);
					break;

				case FULL:
					//funzione
					ess = caseFull(ess);
					break;

				default:
				}
			}
		} catch (InvalidValueException e) {
			log.error(e.getMessage());
		}
	}


	private Ess caseMinSoc(Ess ess){

		if (ess.soc.value() < ess.chargeSoc.value()) {
			ess.currentState = State.CHARGESOC;
		} else if (ess.soc.value() >= ess.minSoc.value() + 5) {
			ess.currentState = State.NORMAL;
		} else {
			try {
				long maxPower = 0;
				//funzione
				ess = setEss(ess, maxPower);

			} catch (WriteChannelException e) {
				log.error(ess.id() + "Failed to set Max allowed power.", e);
			}
		}

	}

	private Ess caseNormale(Ess ess){

		if (ess.soc.value() <= ess.minSoc.value()) {
			ess.currentState = State.MINSOC;
		} else if (ess.soc.value() >= 99 && ess.allowedCharge.value() == 0
				&& ess.systemState.labelOptional().equals(Optional.of(EssNature.START))) {
			ess.currentState = State.FULL;
		}

		return ess;
	}


	private Ess checkOpt(Ess ess, Optional<Long> currentMinValueL, int id){

		try {
			if (currentMinValueL.isPresent() && currentMinValueL.get() < 0) {
				// Force Charge with minimum of MaxChargePower/5
				log.info("Force charge. Set ActivePowerL" + id + "=Max[" + currentMinValueL.get() / 5 + "]");
				if(id==1)
					ess.setActivePowerL1.pushWriteMax(currentMinValueL.get() / 5);
				else if(id==2)
					ess.setActivePowerL2.pushWriteMax(currentMinValueL.get() / 5);
				else
					ess.setActivePowerL3.pushWriteMax(currentMinValueL.get() / 5);
			} else {
				log.info("Avoid discharge. Set ActivePowerL" + id + "=Max[-1000 W]");
				if(id==1)
					ess.setActivePowerL1.pushWriteMax(-1000L);
				else if(id==2)
					ess.setActivePowerL2.pushWriteMax(-1000L);
				else
					ess.setActivePowerL3.pushWriteMax(-1000L);
			}
		} catch (WriteChannelException e) {
			log.error("Unable to set ActivePowerL" + id + ": " + e.getMessage());
		}

		return ess;

	}

	private Ess caseFull(Ess ess){

		try {
			ess.setActivePowerL1.pushWriteMin(0L);
		} catch (WriteChannelException e) {
			log.error("Unable to set ActivePowerL1: " + e.getMessage());
		}
		try {
			ess.setActivePowerL2.pushWriteMin(0L);
		} catch (WriteChannelException e) {
			log.error("Unable to set ActivePowerL2: " + e.getMessage());
		}
		try {
			ess.setActivePowerL3.pushWriteMin(0L);
		} catch (WriteChannelException e) {
			log.error("Unable to set ActivePowerL3: " + e.getMessage());
		}
		if (ess.soc.value() < maxSoc.value()) {
			ess.currentState = State.NORMAL;
		}

		return ess;
	}


	private Ess setEss(Ess ess, int maxPower){

		if (!ess.setActivePowerL1.writeMax().isPresent()
				|| maxPower < ess.setActivePowerL1.writeMax().get()) {
			ess.setActivePowerL1.pushWriteMax(maxPower);
		}
		if (!ess.setActivePowerL2.writeMax().isPresent()
				|| maxPower < ess.setActivePowerL2.writeMax().get()) {
			ess.setActivePowerL2.pushWriteMax(maxPower);
		}
		if (!ess.setActivePowerL3.writeMax().isPresent()
				|| maxPower < ess.setActivePowerL3.writeMax().get()) {
			ess.setActivePowerL3.pushWriteMax(maxPower);
		}

		return ess;
	}

}
