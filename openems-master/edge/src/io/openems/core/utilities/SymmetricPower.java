/*****************************
 *  OpenEMS - Open Source Energy Management System
 * Copyright (c) 2016 FENECON GmbH and contributors
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
package io.openems.core.utilities;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import io.openems.api.channel.ReadChannel;
import io.openems.api.channel.WriteChannel;
import io.openems.api.exception.WriteChannelException;

/**
 * Helper class to reduce and set power to the ess
 *
 * @author matthias.rossmann
 *
 */
public class SymmetricPower {
	protected final Logger log = LoggerFactory.getLogger(this.getClass());

	private final ReadChannel<Long> allowedDischarge;
	private final ReadChannel<Long> allowedCharge;
	private final ReadChannel<Long> allowedApparent;
	private final WriteChannel<Long> setActivePower;
	private final WriteChannel<Long> setReactivePower;
	private long activePower = 0L;
	private long reactivePower = 0L;
	private boolean activePowerValid = false;
	private boolean reactivePowerValid = false;

	public SymmetricPower(ReadChannel<Long> allowedDischarge, ReadChannel<Long> allowedCharge,
			ReadChannel<Long> allowedApparent, WriteChannel<Long> setActivePower, WriteChannel<Long> setReactivePower) {
		super();
		this.allowedDischarge = allowedDischarge;
		this.allowedCharge = allowedCharge;
		this.allowedApparent = allowedApparent;
		this.setActivePower = setActivePower;
		this.setReactivePower = setReactivePower;
	}

	public void setActivePower(long power) {
		this.activePower = power;
		this.activePowerValid = true;
	}

	public void setReactivePower(long power) {
		this.reactivePower = power;
		this.reactivePowerValid = true;
	}

	public long getActivePower() {
		return this.activePower;
	}

	public long getReactivePower() {
		return this.reactivePower;
	}

	/**
	 * Reduces the active and reactive power to the power limitations
	 */
	public void reducePower() {
		// get Min/Max values
		long minActivePower = getMinActivePower();
		long maxActivePower = getMaxActivePower();
		long minReactivePower = getMinReactivePower();
		long maxReactivePower = getMaxReactivePower();

		// variables for reducedPower
		long reducedActivePower = 0L;
		long reducedReactivePower = 0L;

		//funzione
		checkSet();
		
		

		// calculate cosPhi
		double cosPhi = ControllerUtils.calculateCosPhi(activePower, reactivePower);

		if (minActivePower <= activePower && activePower <= maxActivePower && minReactivePower <= reactivePower
				&& reactivePower <= maxReactivePower) {
			// activePower and reactivePower are in allowed value range
			// no need to reduce power
			reducedActivePower = activePower;
			reducedReactivePower = reactivePower;
		} else if ((minActivePower > activePower || activePower > maxActivePower)
				&& (minReactivePower > reactivePower || reactivePower > maxReactivePower)) {
			// activePower and reactivePower are out of allowed value range
			long reducedActivePower1 = 0L;
			long reducedActivePower2 = 0L;
			long reducedReactivePower1 = 0L;
			long reducedReactivePower2 = 0L;
			if (!ControllerUtils.isCharge(activePower, reactivePower)) {
				// Discharge
				reducedActivePower1 = minActivePower;
				reducedReactivePower1 = ControllerUtils.calculateReactivePower(reducedActivePower, cosPhi);
				reducedReactivePower2 = minReactivePower;
				reducedActivePower2 = ControllerUtils.calculateActivePowerFromReactivePower(reducedReactivePower2,
						cosPhi);
			} else {
				// Charge
				reducedActivePower1 = maxActivePower;
				reducedReactivePower1 = ControllerUtils.calculateReactivePower(reducedActivePower, cosPhi);
				reducedReactivePower2 = maxReactivePower;
				reducedActivePower2 = ControllerUtils.calculateActivePowerFromReactivePower(reducedReactivePower2,
						cosPhi);
			}
			
			//funzione
			long[] tot = reduce(reducedActivePower1,reducedReactivePower1, reducedActivePower2, reducedReactivePower2, 
					 minActivePower,maxActivePower,minReactivePower,maxReactivePower,
					reducedActivePower,reducedReactivePower);
			
			reducedActivePower = tot[1];
			reducedReactivePower = tot[2];
			
		} else {
			
			//funzione
			long[] pas;
			pas = statPower(minActivePower,maxActivePower, reducedActivePower,reducedReactivePower);
			reducedReactivePower = pas[0];
			reducedActivePower = pas[1];
		}
		
		//funzione
		logStatus(reducedActivePower, reducedReactivePower);
		
		this.activePower = reducedActivePower;
		this.reactivePower = reducedReactivePower;
	}
	
	
	public void logStatus(long reducedActivePower, long reducedReactivePower){
		
		if (activePower != reducedActivePower || reactivePower != reducedReactivePower) {
			log.info("Reduce activePower from [{}] to [{}] and reactivePower from [{}] to [{}]",
					new Object[] { activePower, reducedActivePower, reactivePower, reducedReactivePower });
		}
		
	}
	
	
	/*
	 * 
	 */
	public long[] statPower(long minActivePower, long maxActivePower, long reducedActivePower, long reducedReactivePower){
	
		if (minActivePower > activePower || activePower > maxActivePower) {
			
			//funzione
			long[] tot;
			tot = checkRangeAct(minActivePower, maxActivePower, cosPhi, reducedActivePower);
			reducedActivePower = tot[0];
			reducedReactivePower = tot[1];
			
		} else {
			
			//funzione
			long[] tot;
			tot = checkRangeReact(minReactivePower, cosPhi,maxReactivePower);
			reducedReactivePower = tot[0];
			reducedActivePower = tot[1];
			
		}
		
		long[] pas = {0, 0};
		pas[0] = reducedReactivePower;
		pas[1] = reducedActivePower;
		
		return pas;
	
	}
	
	
	/*
	 *  only reactivePower is out of allowed value range
	 */
	public long[] checkRangeReact(long minReactivePower, double cosPhi, long maxReactivePower){
		

		
		long[] tot = {0, 0};
		if (minReactivePower > reactivePower) {
			// Discharge
			tot[0] = minReactivePower;
			tot[1] = ControllerUtils.calculateActivePowerFromReactivePower(tot[0], cosPhi);
		} else {
			// Charge
			tot[0] = maxReactivePower;
			tot[1] = ControllerUtils.calculateActivePowerFromReactivePower(tot[0],cosPhi);
			}
		return tot;
		
	}
	
	/*
	 * Only activePower is out of allowed value range
	 */
	public long[] checkRangeAct(long minActivePower,long maxActivePower, double cosPhi){
		
		long[] tot = {0, 0};
		if (minActivePower > activePower) {
			// Discharge
			tot[0] = minActivePower;
			tot[1] = ControllerUtils.calculateReactivePower(tot[0], cosPhi);
		} else {
			// Charge
			tot[0] = maxActivePower;
			tot[1] = ControllerUtils.calculateReactivePower(tot[0], cosPhi);
		}
		
		return tot;
					
	}

	
	/*
	 * Get largest fitting active and reactive power for min max values
	 */
	public long[] reduce(long reducedActivePower1,long reducedReactivePower1,long reducedActivePower2, long reducedReactivePower2, 
			long minActivePower, long maxActivePower,long minReactivePower, long maxReactivePower,
			long reducedActivePower, long reducedReactivePower){
		
		long[] tot = {0, 0};
		
		if (ControllerUtils.calculateApparentPower(reducedActivePower1, reducedReactivePower1) > ControllerUtils
				.calculateApparentPower(reducedActivePower2, reducedReactivePower2)
				&& minActivePower <= reducedActivePower1 && reducedActivePower1 <= maxActivePower
				&& minReactivePower <= reducedReactivePower1 && reducedReactivePower1 <= maxReactivePower) {
			reducedActivePower = reducedActivePower1;
			reducedReactivePower = reducedReactivePower1;
		} else if (minActivePower <= reducedActivePower2 && reducedActivePower2 <= maxActivePower
				&& minReactivePower <= reducedReactivePower2 && reducedReactivePower2 <= maxReactivePower) {
			reducedActivePower = reducedActivePower2;
			reducedReactivePower = reducedReactivePower2;
		} else {
			log.error("Can't reduce power to fit the power limitations!");
		}
		
		tot[1] = reducedActivePower;
		tot[2] = reducedReactivePower;
		
		return tot;
	}
	
	
	/*
	 * Check if the power is set
	 */
	public void checkSet(){
	
		// Check if active power is already set
		if (setActivePower.getWriteValue().isPresent()) {
			this.activePower = setActivePower.peekWrite().get();
		}
		// Check if reactive power is already set
		if (setReactivePower.getWriteValue().isPresent()) {
			this.reactivePower = setReactivePower.peekWrite().get();
		}
				
	}

	/**
	 * Writes active and reactive power to the setActive-/setReactivePower Channel if the value was set
	 */
	public void writePower() {
		this.reducePower();
		try {
			// activePowerQueue.add(activePower);
			if (activePowerValid) {
				setActivePower.pushWrite(activePower);
			}
			// reactivePowerQueue.add(reactivePower);
			if (reactivePowerValid) {
				setReactivePower.pushWrite(reactivePower);
			}
		} catch (WriteChannelException e) {
			log.error("Failed to reduce and set Power!");
		}
		activePowerValid = false;
		reactivePowerValid = false;
		activePower = 0L;
		reactivePower = 0L;
	}

	/**
	 * Get the max active power out of allowedDischarge, allowedApparent and writeMax of setActivePower channels
	 *
	 * @return max allowed activePower
	 */
	public long getMaxActivePower() {
		long maxPower = 0;
		boolean valid = false;
		if (allowedDischarge.valueOptional().isPresent()) {
			maxPower = allowedDischarge.valueOptional().get();
			valid = true;
		}
		if (valid && allowedApparent.valueOptional().isPresent()) {
			maxPower = Math.min(maxPower, allowedApparent.valueOptional().get());
		} else if (allowedApparent.valueOptional().isPresent()) {
			maxPower = allowedApparent.valueOptional().get();
			valid = true;
		}
		if (valid && setActivePower.writeMax().isPresent()) {
			maxPower = Math.min(maxPower, setActivePower.writeMax().get());
		} else if (setActivePower.writeMax().isPresent()) {
			maxPower = setActivePower.writeMax().get();
		}
		
		checkLogMax(valid);
		return maxPower;
	}
	
	
	public void checkLogMax(boolean valid){
		
		if (!valid) {
			log.error("Failed to get Max value for ActivePower! Return 0.");
		}
		
	}
	/**
	 * Get the min active power out of allowedCharge, allowedApparent and writeMin of setActivePower channels
	 *
	 * @return min allowed activePower
	 */
	public long getMinActivePower() {
		long minPower = 0;
		boolean valid = false;
		if (allowedCharge.valueOptional().isPresent()) {
			minPower = allowedCharge.valueOptional().get();
			valid = true;
		}
		if (valid && allowedApparent.valueOptional().isPresent()) {
			minPower = Math.max(minPower, allowedApparent.valueOptional().get() * -1);
		} else if (allowedApparent.valueOptional().isPresent()) {
			minPower = allowedApparent.valueOptional().get() * -1;
			valid = true;
		}
		if (valid && setActivePower.writeMin().isPresent()) {
			minPower = Math.max(minPower, setActivePower.writeMin().get());
		} else if (setActivePower.writeMin().isPresent()) {
			minPower = setActivePower.writeMin().get();
		}
		
		checkLogMin(valid);
		
		return minPower;
	}
	
	public void checkLogMin(boolean valid){
	
		if (!valid) {
			log.error("Failed to get Min value for ActivePower! Return 0.");
		}
		
	}

	/**
	 * Get the max reactive power out of allowedDischarge, allowedApparent and writeMax of setReactivePower channels
	 *
	 * @return max allowed reactivePower
	 */
	public long getMaxReactivePower() {
		long maxPower = 0;
		boolean valid = false;
		if (allowedApparent.valueOptional().isPresent()) {
			maxPower = allowedApparent.valueOptional().get();
			valid = true;
		}
		if (valid && setReactivePower.writeMax().isPresent()) {
			maxPower = Math.min(maxPower, setReactivePower.writeMax().get());
		} else if (setReactivePower.writeMax().isPresent()) {
			maxPower = setReactivePower.writeMax().get();
		}
		if (!valid) {
			log.debug("Failed to get Max value for ReactivePower! Return 0.");
		}
		return maxPower;
	}

	/**
	 * Get the min reactive power out of allowedCharge, allowedApparent and writeMin of setReactivePower channels
	 *
	 * @return min allowed reactivePower
	 */
	public long getMinReactivePower() {
		long minPower = 0;
		boolean valid = false;
		if (allowedApparent.valueOptional().isPresent()) {
			minPower = allowedApparent.valueOptional().get() * -1;
			valid = true;
		}
		if (valid && setReactivePower.writeMin().isPresent()) {
			minPower = Math.max(minPower, setReactivePower.writeMin().get());
		} else if (setReactivePower.writeMin().isPresent()) {
			minPower = setReactivePower.writeMin().get();
		}
		if (!valid) {
			log.debug("Failed to get Min value for ReactivePower! Return 0.");
		}
		return minPower;
	}

}

}
