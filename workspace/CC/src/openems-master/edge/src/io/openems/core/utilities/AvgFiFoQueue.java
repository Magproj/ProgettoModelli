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
package io.openems.core.utilities;

import com.google.common.collect.EvictingQueue;

public class AvgFiFoQueue {

	private EvictingQueue<Long> queue;
	private Long lastValue;
	private double gradeient;

	public AvgFiFoQueue(int length, double gradient) {
		queue = EvictingQueue.create(length);
		this.gradeient = gradient;
	}

	public void add(long number) {
		queue.add(number);
		lastValue = number;
	}

	public long avg() {
		long sum = 0;
		double multiplier = 1;
		double divisor = 0;
		for (long value : queue) {
			sum += value * multiplier;
			divisor += multiplier;
			multiplier = (long) ((multiplier) * gradeient);
		}
		if (sum == 0) {
			return 0;
		} else {
			long result = sum / divisor;
			return result;
		}
	}

	public Long lastAddedValue() {
		return lastValue;
	}

	@Override
	public String toString() {
		return "Avg: " + avg();
	}

}