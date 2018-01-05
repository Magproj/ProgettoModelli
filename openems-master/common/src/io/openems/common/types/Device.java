package io.openems.common.types;

import java.util.Optional;
import java.util.regex.Matcher;
import java.util.regex.Pattern;
/**
 *
 * @author FENECON GmbH
 *
 */
public interface Device {
    /**
	 * Constant
	 */
	final static Pattern NAME_NUMBER_PATTERN = Pattern.compile("[^0-9]+([0-9]+)$");
	/**
	* method
	*/
	public Optional<Integer> getIdOpt();
	/**
	* @param name
	* @return
	*/
	public static Optional<Integer> parseNumberFromName(String name) {
		Matcher matcher = NAME_NUMBER_PATTERN.matcher(name);
		if (matcher.find()) {
			String nameNumberString = matcher.group(1);
			return Optional.ofNullable(Integer.parseInt(nameNumberString));
		}
		return Optional.empty();
	}
}
