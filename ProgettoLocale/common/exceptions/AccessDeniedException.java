package io.openems.common.exceptions;
/**
 *
 * @author FENECON GmbH
 *
 */
public class AccessDeniedException extends OpenemsException {

	private static final long serialVersionUID = 7779793299118221193L;

	public AccessDeniedException(String message) {
		super(message);
	}

}
